<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Airframe;
use App\Models\Flight;
use App\Models\MaintenanceLog;
use App\Models\User;

use Carbon\Carbon;

use Symphony\Component\HttpFoundation\Response;


class PagesController extends Controller
{
    public function register(){
        return view('admin.register');
    }


    public function create_account(Request $request){
        $user = User::create([
            'name'=>$request->input('name'),
            'role'=>$request->input('role'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        ]);

        session()->flash('message', 'Account Created!!!');
       
        return redirect()->back()->with('message','Account Created');
    }



    public function index(){
        return view('login');
    }

    public function signin(Request $request){

        $email =$request->input('email');
        $password =$request->input('password');

        if(!User::where('email','=',$email)->exists()){
            session()->flash('message', 'Email Not Found');
            return redirect()->back();
        }

        $credentials = ['email' => $email, 'password' => $password];
  
        if (auth()->attempt($credentials)) {
            //check banned status
            $user = DB::table('users')->where('email',$email)->first();
            $status = $this->bannedStatus($user->id);
            switch ($status) {
                case 'Banned':
                    session()->flash('message', 'Account has been banned... contact admin');
                    return redirect()->back();
                    break;
                case 'Suspended':
                    session()->flash('message', 'Account has been suspended.. Try Later');
                    return redirect()->back();
                    break;
                
                case 'Not Banned':
                    if($request->session()->exists('wrong_input') ){
                        $request->session()->forget('wrong_input');
                    }
        
                    switch(Auth::user()->role){
                        case 'Engineer':
                            return redirect()->route('e_dashboard');
                            break;
                        case 'Admin':
                            return redirect()->route('a_dashboard');
                            break;
                        default:
                            return redirect()->route('login');
                            break;
                    }
                default:
                    # code...
                    break;
            }




        }else{

            if($request->session()->missing('wrong_input')){
                $request->session()->put('wrong_input',0);
            
            }

            if($request->session()->exists('wrong_input')){
               $value= $request->session()->increment('wrong_input');
                if($value >=3){
                    $users = DB::table('users')->where('email',$email)->first();
                    $this->ban($users->id);
                    session()->flash('message', 'Account Has Been Blocked for 15 minutes');
                    $request->session()->forget('wrong_input');
                    return redirect()->back();   
                }
                else{
                    session()->flash('message', 'Incorrect Login Details');
                    return redirect()->back();
                }
            }
            
       
        }

    }

    public function ban($user_id){

        $ban_for_next_15_mins = Carbon::now()->minute(15);
        $ban_permanently = 0;
        $user = User::find($user_id);
        $user->banned_till = $ban_for_next_15_mins;
        $user->save();
        $message = "Account Has been blocked for 15mins";
        return $message;
    }

    public function unban($user_id){
        $user = User::find($user_id);
        $user->banned_till = null;
        $user->save();
    }

    public function bannedStatus($user_id){
        $user = User::find($user_id);
        $message = "Not Banned";
        if ($user->banned_till != null) {
            if ($user->banned_till == 0) {
                $message = "Banned Permanently";
            }

            if (now()->lessThan($user->banned_till)) {
                // $banned_days = now()->diffInDays($user->banned_till) + 1;
                // $message = "Suspended for " . $banned_days . ' ' . Str::plural('Minutes', $banned_days);
                $message = "Suspended";
            }

            if(now()->gte($user->banned_till)){
                DB::table('users')->where('id',$user->id)->update(['banned_till'=>null]);
                $message ="Not Banned";
            }


        }

        return $message;
    }


    public function e_dashboard(){
        $airframes = DB::table('airframes')->count();
        $flights = DB::table('flights')->latest()->take(5)->get();
        return view('engineer.dashboard')->with('airframes',$airframes)->with('flights',$flights);
    }

    public function airframes(){
        $airframes = DB::table('airframes')->paginate(10);
        return view('engineer.airframes')->with('airframes',$airframes);
    }

    public function record_airframe(){
        
        return view('engineer.add_airframe');
    }

    public function add_airframe(Request $request){

        $airframe = new Airframe();
        $airframe->aircraft_no= $request->input('aircraft');
        $airframe->model= $request->input('model');
        $airframe->a_check= $request->input('a_check');
        $airframe->b_check= $request->input('b_check');
        $airframe->c_check= $request->input('c_check');
        $airframe->d_check= $request->input('d_check');

        $airframe->save();
        session()->flash('message', 'Record Saved!!!');
       
        return redirect()->back()->with('message','Record Saved');
    }




    public function add_flightlog(Request $request){

        $flight = new Flight();
        $flight->aircraft_no= $request->input('aircraft');
        $flight->flight_no= $request->input('flight_no');
        $flight->from= $request->input('from');
        $flight->to= $request->input('to');
        $flight->flight_duration= $request->input('flight_duration');

        $flight->save();
        session()->flash('message', 'Record Saved!!!');
       
        return redirect()->back()->with('message','Record Saved');
    }

    public function record_flight(){
        
        return view('engineer.flight');
    }


    public function flights(){
        $flights = DB::table('flights')->paginate(10);
        return view('engineer.flight_log')->with('flights',$flights);
    }

    public function record_maintenance(){
        return view('engineer.maintenance');
    }

    public function add_maintenance(Request $request){
        $maintenance = new MaintenanceLog();
        $maintenance->aircraft_no= $request->input('aircraft');
        $maintenance->checks= $request->input('checks');
        $maintenance->man_hours= $request->input('man_hours');

        $maintenance->save();
        session()->flash('message', 'Record Saved!!!');
       
        return redirect()->back()->with('message','Record Saved');
    }

    public function maintenance(){
        $maintenance_logs = DB::table('maintenance_logs')->paginate(10);
        return view('engineer.maintenance_log')->with('maintenance_logs',$maintenance_logs);
    }



    

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function a_dashboard(){
        $users = DB::table('users')->where('role','Engineer')->paginate(10);
        return view('admin.dashboard')->with('users',$users);
    }

    public function unlock_account(Request $request,$id){
        DB::table('users')->where('id',$id)->update(['banned_till'=>null]);
        return redirect()->back();
    }

    public function lock_account(Request $request,$id){
        DB::table('users')->where('id',$id)->update(['banned_till'=>0]);
        return redirect()->back();
    }

    public function delete_account(Request $request,$id){
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back();
    }

}

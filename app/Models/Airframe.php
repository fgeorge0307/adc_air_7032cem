<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airframe extends Model
{
    use HasFactory;
    protected $table = "airframes";
    protected $primarykey = "airframe_id";
    // public function maintenance_logs(){
    //     return $this->hasMany(MaintenanceLog::class);
    // }
}

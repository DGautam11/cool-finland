<?php

namespace App\Models;

use App\Models\Status;
use App\Models\TransportMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['date','estimated_time_of_arrival','transport_method_id','no_of_containers_or_trucks','status_id','customer_id'];

    public function status(){
        return $this->hasMany(Status::class);
    }

    public function transportMethods() {
        return $this->hasMany(TransportMethod::class);
    }

    public function customers() {
        return $this->hasMany(Appointment::class);
    }
}

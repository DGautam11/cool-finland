<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = ['customer_name','customer_address','customer_mail','customer_phone'];

    public function appointment(){
        return $this->hasMany(Appointment::class);
    }
}

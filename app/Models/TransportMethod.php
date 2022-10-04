<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportMethod extends Model
{
    use HasFactory;

    protected $fillable = ['method','weight'];

    public function appointment(){
        
        return $this->belongsTo(Appointment::class);
    }
}

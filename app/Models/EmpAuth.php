<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EmpAuth extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'username',
        'password'
    ];

    public function employee(){
        
        return $this->belongsTo(Employee::class);
    }
}

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

    public function generateUserName($name){
        $username = Str::lower(Str::slug($name));
        if(User::where('username', '=', $username)->exists()){
            $uniqueUserName = $username.'-'.Str::lower(Str::random(4));
            $username = $this->generateUserName($uniqueUserName);
        }
        return $username;
    }

    

    protected $hidden = [
        'username',
        'password'
    ];

    public function employee(){
        
        return $this->belongsTo(Employee::class);
    }
}

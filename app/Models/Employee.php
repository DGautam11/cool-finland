<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_name',
        'emp_address',
        'emp_email',
        'emp_phone'
    ];

    /**
     * Get the authenciation details associated with the Employee
     * 
     */

    public function empAuth()
    {
        return $this->hasOne(EmpAuth::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        $this->roles()->save($role);
    }

    public function permissions(){
        
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }
}

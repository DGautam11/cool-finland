<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {

        /** 
        Customer::factory(10)->create();
        Employee::factory(5)->create();

        
        for ($i = 1; $i < 6; $i++) {

            DB::table('emp_auths')->insert([
                'username' => 'EMP'.Str::random(5),
                $password = Hash::make('')
                'password' => Hash::make('password'),
                'employee_id' => $i,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')

        
       
        ]);
    }

    DB::table('roles')->insert([

    ]);

    DB::table('permissions')->insert([

    ]);

    DB::table('permission_role')->insert([

    ]);

    DB::table('employee_role')->insert([

    ]);

    DB::table('status')->insert([
        'status'=>'booked',
        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
    ]);

    DB::table('status')->insert([
        'status'=>'cancelled',
        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
    ]);

    DB::table('status')->insert([
        'status'=>'completed',
        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
    ]);

    DB::table('transport_methods')->insert([
        'method'=>'container',
        'weight'=> 2,
        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
    ]);

    DB::table('transport_methods')->insert([
        'method'=>'truck',
        'weight'=> 10,
        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
    ]);

    **/

    Appointment::factory(5)->create();
    
}
}
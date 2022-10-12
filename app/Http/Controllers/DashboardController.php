<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $totalWeight = $this->totalAppointmentWeightForToday();
        $numberOfAppointmentForToday = $this->countTotalNumberOfAppointmentsToday();
        return view('dashboard',[
            'weight'=>$totalWeight,
            'appointmentsCount' => $numberOfAppointmentForToday,
        ]);
    }

    private function countTotalNumberOfAppointmentsToday(){

        $numberOfAppointmentForToday = Appointment::where([['date', Carbon::today()->toDateString()],['status_id', 1]])->count();

        return $numberOfAppointmentForToday;


    }

    private function totalAppointmentWeightForToday(){

        $totalWeight = 0;
        $appointments = Appointment::with(['TransportMethod'])
                ->where([['date', Carbon::today()->toDateString()],['status_id', 1]])
                ->get();
       
        foreach($appointments as $appointment){

            $quantity = $appointment['no_of_containers_or_trucks'];
            $methodweight = $appointment['transportMethod']['weight'];

            $weight = $quantity * $methodweight;
            $totalWeight = $totalWeight + $weight;

        }

        return $totalWeight;



    }

}

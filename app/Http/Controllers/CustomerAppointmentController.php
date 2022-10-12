<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerAppointmentController extends Controller
{
    public function index(Customer $customer){
        $allstatus = Status::where('status','!=','active')->get();
        $appointments = $customer->appointment()->with(['customer','status','TransportMethod'])
                                                ->whereRelation('status','status','=','active')
                                                ->get()
                                                ->sortBy('date');

        $activeAppointmentsCount = $appointments->count();
        $completedAppointmentsCount = $this->countCompletedAppointments($customer);
        $cancelledAppointmentsCount = $this->countCancelledAppointments($customer);

        return view ('customer.appointments.index',[
            'customer'=>$customer,
            'appointments'=>$appointments,
            'activeAppointmentsCount'=>$activeAppointmentsCount,
            'completedAppointmentsCount'=>$completedAppointmentsCount,
            'cancelledAppointmentsCount'=>$cancelledAppointmentsCount,
            'allstatus'=>$allstatus
        ]);
    }

    private function countCompletedAppointments($customer){
        $completedAppointmentsCount = $customer->appointment()->whereRelation('status','status','=','completed')->count();
        return $completedAppointmentsCount;
    }

    private function countCancelledAppointments( $customer){
        $cancelledAppointmentsCount = $customer->appointment()->whereRelation('status','status','=','cancelled')->count();
        return $cancelledAppointmentsCount;
    }


}

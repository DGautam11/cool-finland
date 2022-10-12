<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Status;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\TransportMethod;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class AppointmentController extends Controller
{

    protected $minDate;
    protected $maxDate;


    
   

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {  

        $allstatus = Status::where('status','!=','active')->get();
        // Retrieve appointments with status booked.
        $appointments = Appointment::orderBy('date')->with(['customer','status','TransportMethod'])
                                    ->whereRelation('status','status','=','active')
                                    ->paginate(10);
                                    


        

        return view('appointment.index',[
            'appointments'=>$appointments,
            'allstatus' => $allstatus,
            'minDate'=>Carbon::today()->toDateString(),
            'maxDate'=>Carbon::today()->addDays(15)->toDateString()
        ]);
    }

    public function create()
    
    {
        $availableCapacity = $this->getAvailableWeightByDate();

        $customers = Customer::get(['id','customer_name']);
        $transportMethods = TransportMethod::get(['id','method','weight']);
        return view ('appointment.create',[
            'transportMethods'=>$transportMethods,
            'customers'=>$customers,
            'minDate'=>Carbon::today()->addDays(1)->toDateString(),
            'maxDate'=>Carbon::today()->addDays(16)->toDateString()
        ]);
    }


    public function store(Request $request){

        $this->validate($request,[
            'customer'=>'required',
            'appointmentdate'=>'required',
            'estimatedTimeofArrival' => 'required',
            'transportMethod'=>'required',
            'quantity'=>'required'
        ]);


        

        Appointment::create([

            'date'=>$request->appointmentdate,
            'estimated_time_of_arrival'=>$request->estimatedTimeofArrival,
            'transport_method_id'=>$request->transportMethod,
            'status_id'=>1,
            'no_of_containers_or_trucks'=>$request->quantity,
            'customer_id'=>$request->customer


        ]);

        return redirect()->route('appointments')->with('message','Reservation has been created'); 



        

    }

    public function searchAppointmentsByDate(Request $request){

           $date = $request->input('search-date');
           $allstatus = Status::where('status','!=','active')->get();

            $appointments= Appointment::orderBy('date')->with(['customer','status','TransportMethod'])
                    ->whereRelation('status','status','=','active')
                    ->where('date',$date)
                    ->paginate(5);

            return view('appointment.search',[
                'appointments'=>$appointments,
                'allstatus' => $allstatus,
                'searchDate'=>$date,
                'minDate'=>Carbon::today()->toDateString(),
                'maxDate'=>Carbon::today()->addDays(15)->toDateString()
            ]);

   

    }
    public function searchAppointmentsByStatus(Request $request){

        $status = $request->input('search-status');
        
        $appointments= Appointment::orderBy('date')->with(['customer','status','TransportMethod'])
                    ->whereRelation('status','id','=',$status)
                    ->paginate(5);

                    return view('appointment.search',[
                        'appointments'=>$appointments,
                        'searchDate'=>'',
                        'minDate'=>Carbon::today()->toDateString(),
                        'maxDate'=>Carbon::today()->addDays(15)->toDateString()
                    ]);


    }

    public function getAvailableWeightByDate(){


        $minDate=Carbon::today()->addDays(1)->toDateString();
        $maxDate=Carbon::today()->addDays(16)->toDateString();

        $totalWeight = 0;
        $totalCapacity = 50;
        $availableCapacity = collect([]);


        $appointments = Appointment::with(['TransportMethod'])
                    ->whereRelation('status','status','=','active')
                    ->whereBetween('date',[$minDate,$maxDate])
                    ->get();


                    foreach($appointments as $appointment){
                        $quantity = $appointment['no_of_containers_or_trucks'];
                        $methodweight = $appointment['transportMethod']['weight'];
            
                        $weight = $quantity * $methodweight;
                        $totalWeight = $totalWeight + $weight;
                        $availableWeight = $totalCapacity - $totalWeight;

                        $date = $appointment['date'];

                        $availableCapacity->push(['date'=>$date,'availableweight'=>$availableWeight]);
                    }

                    return $availableCapacity;
        

    }

    public function searchAppointmentByDateAndStatus(Request $request){
        
    }

    public function updateStatus(Request $request,$id){

        $appointment = Appointment::find($id);
        $appointment->status_id = $request->status;
        $appointment->save();

        return redirect()->back()->with('message', 'The status for reservation has been updated');
    }

    
   



    

    
  
    
}

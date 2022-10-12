@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
    <form id="search-form" class="search-form form-group" method="post" action="{{ route('searchByDate') }}"  >
        @csrf
         <label for="search date">Search: </label>
        <input type="date" name="search-date"  value = {{ $searchDate }} min="{{ $minDate }}" max="{{ $maxDate }}" required onchange="event.preventDefault();
        document.getElementById('search-form').submit(); "/>
        <input type="submit" style="visibility: hidden;" />
    </form>
        </div>
        <div>
            <a href="{{ route('createAppointment') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> New Appointment</a>
        </div>
    </div>

    @if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @if($appointments->count())
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Date</th>
                <th scope="col">Weight</th>
                <th scope="col">Method</th>
                <th scope="col">Status</th>
                    
                
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <th scope="row"><b><a href="{{ route('customers.appointments',$appointment->customer) }}">{{ $appointment->customer->customer_name }}</a></b></th>
                    <td>{{ $appointment->date }}</td>

                   


                    <td>{{ $appointment->no_of_containers_or_trucks * $appointment->transportMethod->weight }} tons</td>

                    
                        
                   
                        
                    
                    <td>{{ $appointment->transportMethod->method }}</td>

                    @if ($appointment->status->status == 'active')

                    <td>
                        <div class="active">{{ $appointment->status->status }}</div>
                    </td>
                    <td>
                        <form action="{{ route('updateStatus',$appointment->id) }}" method="POST" id = "update-status">
                            @csrf
                            @method('PATCH')
                            <select name="status" id="status" onchange="this.form.submit()">

                                <option selected disabled>Change status</option></option>
                                @foreach ( $allstatus as $status )

                              

                                <option  style="text-transform:capitalize" value="{{ $status->id }}">{{ $status->status }}</option>
                                    
                                @endforeach
                               
                            </select>
                        </form>

                    </td>
                <td>
                    <a href=" " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Edit </a>

                </td>
                        
                    @elseif ($appointment->status->status == 'completed')

                    <td>

                    <div class="completed">{{ $appointment->status->status }}</div>

                    </td>

                    @else

                    <td>

                    <div class="cancelled">{{ $appointment->status->status }}</div>

                    </td>

                    @endif



                    

                </tr>
            @endforeach
           
        </tbody>
    </table>
    @else
    <p>There are no appointments </p>
 @endif

 <div class="pagination">

     {{ $appointments->links() }} 

 </div>

</div>

@endsection
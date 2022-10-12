@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-sm-flex justify-content-between mb-5">
    <div class="tausta mb-3">
        <br>
        <h2>{{ $customer->customer_name }}</h2>
        <p>
          {{ $customer->customer_address }} <br> 
          {{ $customer->customer_phone }} <br> 
          {{ $customer->customer_mail }} <br>
        </p>
      </div>
      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Active Appointments</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $activeAppointmentsCount }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      Completed Appointments</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $completedAppointmentsCount }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                    Cancelled Appointments</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $cancelledAppointmentsCount }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
      

<div>
    @if($appointments->count())
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Weight</th>
                <th scope="col">Method</th>
                <th scope="col">Status</th>
                <th scope="col">Edit Appointments</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->date }}</td>

                    <td>{{ $appointment->no_of_containers_or_trucks * $appointment->transportMethod->weight }} tons</td>

                        
                    
                    <td>{{ $appointment->transportMethod->method }}</td>

                    <td>
                        <div class="active">{{ $appointment->status->status }}</div>
                    </td>
                    <td>
                        <form action="updateStatus" method="POST" id = "update-status">
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

                </tr>
            @endforeach
           
        </tbody>
    </table>
</div>
    @else
    <p>There are no appointments </p>
 @endif

</div>
</div>
@endsection
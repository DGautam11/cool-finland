@extends('layouts.app')

@section('content')

<div class="container reserv-form">
  <div class="d-flex justify-content-between mb-3">
    <h1>Create Appointment for Customer</h1>
    
    <a href="{{ route('createCustomer') }}" class="nav-link link-btn btn-sm btn btn-primary">Add Customer</a>

  </div>
    
    
    <br>
    <div class="form-pos">


      <div class="res-inputs">

        

        <div class="mb-3 company-name">

          <form method="POST" action="{{ route('storeAppointments') }}">
            @csrf
          <label for="cars">Customer:</label>

          <select name="customer" id="customer">
            @foreach ($customers as $customer )

            <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
              
            @endforeach
          
          </select>
          @error('customer')

          <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
          </div>
          
      @enderror

        </div>
        
        <div class="mb-3">

          <label for="start">Date:</label>

        <input type="date" id="date" name="appointmentdate"
              min="{{ $minDate }}" max="{{ $maxDate }}" value="{{ old('da') }}">

        </div>

        @error('date')

          <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
          </div>
          
      @enderror

        <div class="mb-3">

          <label for="estimatedTimeOfArrival">Choose estimated time of arrival:</label>

          <input type="time" id="appt" name="estimatedTimeofArrival"
                     min="09:00" max="18:00" value="">
              
          <small>Can be delivered from 9am to 6pm</small>

        </div>

        @error('estimatedTimeOfArrival')

          <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
          </div>
          
      @enderror

        

        <div class=" mb-3 radio-btns">
          <label for = "radio ">Select Transport Method:</label>
          @foreach ($transportMethods as $transportMethod )

          <div class="form-check radio1">
            <input class="form-check-input" type="radio" name="transportMethod" id="flexRadioDefault" value="{{ $transportMethod->id }}">
            <label class="form-check-label" for="flexRadioDefault">
              {{ $transportMethod->method }}
            </label>
          </div>
            
          @endforeach
        </div>
          


        <div class="mb-3 weight-form">
          <label for="quantity" class="form-label">No of containers/trucks</label><br>
          <input type="number" id="quantity" name="quantity" min="1" max="10" value=""><br><br>
          
        </div>

        @error('quantity')

        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        
    @enderror

        
        <div class="mb-3">
          <label for="weight" class="form-label">Calculated weight</label><br>
          <input type="text" id="weight" name="weight" value=" 100 tons" min="1" max="10" disabled><br><br>
          
        </div>


        <input type="submit" class="btn btn-primary"></input>
      </div>

    </form>

      @endsection
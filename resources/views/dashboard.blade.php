
@extends('layouts.app')

@section('content')
<p>This is a dashboard page </p>
<p>Your details </p>


{{ Auth::user()->employee->emp_name }}

@can('change_status')

<li>Change Status </li>
    
@endcan


@endsection

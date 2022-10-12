@extends('layouts.app')

@section('content')

<div class="container">

    @if($customers->count())
<table class="table">
    <thead>
        <tr>
            <th scope="col">Customer Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Edit </th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <th scope="row"><b>{{ $customer->customer_name }}</b></th>
                <td>{{ $customer->customer_mail }}</td>

               
                <td>{{ $customer->customer_address }}</td>
                <td>{{ $customer->customer_phone }}</td>

                <td><a href=" " class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Edit </a></td>

               
            </tr>
        @endforeach
       
    </tbody>
</table>

@else
<p>There are no customers yet </p>
@endif

<div class="pagination">

    {{ $customers->links() }} 

</div>


</div>

@endsection
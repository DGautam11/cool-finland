<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees Management</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css'); }}">
</head>
<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Employees Management</div>
        </div>

    </div>

    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Employees</div>
            <div>
                <a href="{{ route ('employees.create')}}" class="btn btn-primary">Create</a>
            </div>
        </div>


        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                @if($employees->count())
                <table class="table table-striped">
                    @foreach ($employees as $employee)

                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>{{$employee->emp_name}}</td>
                        <td>{{$employee->emp_email}}</td>
                        <td>{{$employee->emp_address}}</td>
                        <td>{{$employee->emp_phone}}</td>      
                        <td>
                            <a href="{{url('employees/'.$employee->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{route ('employees.destroy', $employee)}}">
                            @csrf
                            @method('DELETE') 
                            
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('Are you sure you want to delete this Employee? ')">Delete</button>
                            </form>
                            
                        </td>
                    </tr>
                        
                    @endforeach
                    
                </table>
                @else
                <p>Theres no data</p>
                 @endif
            </div>
        </div>
    </div>
</body>
</html>
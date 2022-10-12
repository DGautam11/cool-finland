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
            <div class="h4">Edit Employee</div>
            <div>
                <a href="{{ route ('employees.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route ('employees.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="emp_name" class="form-label">Name</label>
                        <input type="text" name="emp_name" id="emp_name" placeholder="Enter Name" class="form-control @error ('emp_name') is-invalid @enderror" value="{{old ('emp_name',$employee->emp_name)}}">
                    
                        @error('emp_name')
                          <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                        
                    </div>

                    <div class="mb-3">
                        <label for="emp_email" class="form-label">Email</label>
                        <input type="text" name="emp_email" id="emp_email" placeholder="Enter Email" class="form-control @error ('emp_email') is-invalid @enderror" value="{{old ('email',$employee->emp_email)}}">
                        @error('emp_email')
                          <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="emp_address" class="form-label">Address</label>
                        <textarea name="emp_address" id="emp_address" cols="30" rows="4" placeholder="Enter Address" class="form-control">{{old ('emp_address', $employee->emp_address)}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="emp_phone" class="form-label">Phone</label>
                        <textarea name="emp_phone" id="emp_phone" cols="30" rows="4" placeholder="Enter Phone number" class="form-control">{{old ('emp_phone',$employee->emp_phone)}}</textarea>
                    </div>

                    


                
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Employee</button>
        </form>
    </div>
</body>
</html>
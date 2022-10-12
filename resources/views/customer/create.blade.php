@extends('layouts.app')

@section('content')

<div class="container">

    <div class="flex justify-center">

        <div class="w-1/3 bg-white p-6 rounded-lg">

            <form action="{{ route('saveCustomer') }}" method= "post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Customer name" 
                    class="@error('name')
                        
                    border-red-500 @enderror" value = "{{ old('name') }}">

                    @error('name')

                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="sr-only">Address</label>
                    <input type="text" name="address" id="address" placeholder="Address" 
                    class=" @error('address')
                        
                    border-red-500 @enderror" value = "{{ old('address') }}">

                    @error('address')

                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Contact EMail</label>
                    <input type="email" name="email" id="email" placeholder="Customer Email" 
                    class=" @error('email')
                        
                    border-red-500 @enderror" value = "{{ old('email') }}">

                    @error('email')

                        <div class="text-red-500 mt-2 text-sm">
                            
                            {{ $message }}

                        </div>
                        
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="phone" class="sr-only">Contact Phone:</label>
                    <input type="tel" name="phone" id="phone" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"
                    class=" @error('phone')
                        
                    border-red-500 @enderror" value = "">

                    @error('phone')

                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>


            </form>

        </div>

    </div>
</div>

@endsection 
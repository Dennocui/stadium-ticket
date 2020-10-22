@extends('layouts.app')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>Account Settings</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100-0">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-3">
                    <div class="contact-content mb-100">
                        <!-- Title -->
                        <div class="contact-title mb-50">
                            <h5>Account Info</h5>
                        </div>

                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-30">
                                <span class="icon-users"></span>
                            </div>
                        <p>Username: {{$user->username}}</p>
                        </div>
                        <!-- Single Contact Info -->
                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-30">
                                <span class="icon-mail"></span>
                            </div>
                            <p>E-mail: {{$user->email}}</p>
                        </div>

                        <div class="single-contact-info d-flex align-items-center">
                            <div class="icon mr-30">
                                <span class="icon-padlock-1"></span>
                            </div>
                            <p>Status: {{$user->privilage}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
    </section>
    <!-- ##### Contact Area End ##### -->
	<section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Edit Settings</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{ route("user.update", $user->id) }}" method="post">
                                @csrf
                                {{ method_field('PUT') }}
							<div class="form-group">
							<label for="FirstName">First Name</label>
                            <input value="{{$user->fname}}" required type="text" class="form-control" id="FirstName" placeholder="First Name"  @error('FirstName') is-invalid @enderror name="FirstName" value="{{ old('FirstName') }}" required autocomplete="FirstName" autofocus>
                                
                                @if(Session::has('errors'))  
                                @if(Session::get('errors')->has('FirstName'))  
                                       <div class="alert alert-danger"> {{ Session::get('errors')->first('FirstName') }}</div>
                                @endif
                                @endif

                        </div>
						  <div class="form-group">
							<label for="LastName">Last Name</label>
							<input value="{{$user->lname}}" required type="text" class="form-control" id="LastName" placeholder="Last Name" @error('LastName') is-invalid @enderror name="LastName" value="{{ old('LastName') }}" required autocomplete="LastName" autofocus>
                        
                                @if(Session::has('errors'))   
                                  @if(Session::get('errors')->has('LastName'))   
                                       <div class="alert alert-danger"> {{ Session::get('errors')->first('LastName') }}</div>
                                @endif
                                @endif
                        </div>
						  					
                                   <div class="form-group">
                                    <label for="Password" >Password</label>
                                    <input required type="password" class="form-control" id="Password" placeholder="Password" @error('Password') is-invalid @enderror name="Password" value="{{ old('Password') }}" required autocomplete="Password" autofocus>
                                            @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('Password'))   
                
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('Password') }}</div>
                                    @endif
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="Password_confirmation" >Confirm Password</label>
                                    <input required type="password" class="form-control" id="Password_confirmation" placeholder="Confirm Password" name="Password_confirmation" autocomplete="Password" autofocus>
                                
                                </div>
								 <div class="form-group">
								<label for="Address">Address</label>
                                <input value="{{$user->address}}" type="text" class="form-control" id="Address" placeholder="Address" @error('Address') is-invalid @enderror name="Address" value="{{ old('Address') }}" required autocomplete="Address" autofocus>
                                
                               @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('Address'))   
                
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('Address') }}</div>
                                    @endif
                                    @endif
							  </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="City">City</label>
                                    <input value="{{$user->city}}" type="text" class="form-control" id="City" placeholder="City" @error('City') is-invalid @enderror name="City" value="{{ old('City') }}" required autocomplete="City" autofocus>
                                     @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('City'))   
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('City') }}</div>
                                    @endif
                                    @endif
                                </div>
                                <div class="form-group"> <!-- Date input -->
                                        <label class="control-label" for="BirthDate">BirthDate</label>
                                        <input value="{{$user->Bdate}}" required type="date"class="form-control" id="BirthDate" name="BirthDate" placeholder="MM/DD/YYY" @error('BirthDate') is-invalid @enderror name="BirthDate" value="{{ old('BirthDate') }}" required autocomplete="BirthDate" autofocus>
                                         @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('BirthDate'))   
                
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('BirthDate') }}</div>
                                    @endif
                                    @endif
                                    </div>
                                    
                                    <div class="form-group col-md-2">
                                    <label for="Gender" required>Gender</label>
                                    
                                    <select value ="{{$user->Gender}}" id="Gender" class="form-control" @error('Gender') is-invalid @enderror name="Gender" value="{{ old('Gender') }}" required autocomplete="Gender" autofocus>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                      @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('Gender'))   
                
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('Gender') }}</div>
                                    @endif
                                    @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn oneMusic-btn mt-30">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <!-- ##### Contact Area Start ##### -->
    

    @endsection
    
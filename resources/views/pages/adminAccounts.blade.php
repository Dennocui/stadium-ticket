@extends('layouts.app')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>All Accounts</h2>
            @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
            @endif
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <!-- ##### Contact Area End ##### -->
	<section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Accounts</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                           <div class="container edittable">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Username</th>
            <th scope="col">E-mail</th>
            <th scope="col">Current Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                      <tr>
                      <th scope="row">{{$user->username}}</th>
                        <td>{{$user->email}}</td>
                        <td>{{$user->privilage}}</td>
                        <td>
                    <form action="{{ route('Admin.manage',$user->id) }}" method="post">
                    @csrf
                   {{ method_field('PUT') }}

                        <div class="form-group">
                    <select class="form-control" id="sel1" @error('Privilage') is-invalid @enderror name="Privilage" value="{{ old('Privilage') }}" required autocomplete="Privilage" autofocus>
                        <option>customer</option>
                        <option>manager</option>
                        <option>admin</option>
                    </select>
                    </div> 
                    
                    <button type="submit" name='action' value="confirm" class="btn btn-success">Confirm</button>
                    <button type="submit" name='action' value="delete" class="btn btn-danger">Delete</button>
                </form>
                        
                     </td>
                      </tr>
            @endforeach


                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <!-- ##### Contact Area Start ##### -->
    

    @endsection
    
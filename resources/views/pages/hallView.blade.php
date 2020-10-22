@extends('layouts.app')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>All Venues</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <!-- ##### Contact Area End ##### -->
	<section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="login-content">
                    
                        <!-- Login Form -->
                        <div class="login-form">
                           <div class="container edittable">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Venue</th>
            <th scope="col">Number of Rows</th>
            <th scope="col">Number of Seats</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($halls as $hall)
                      <tr>
                      <th scope="row">{{$hall->id}}</th>
                        <td>{{$hall->no_rows}}</td>
                        <td>{{$hall->no_Seats}}</td>  
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
    
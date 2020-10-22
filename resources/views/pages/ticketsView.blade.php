@extends('layouts.app')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('img/bg-img/breadcumb3.png')}});">
        <div class="bradcumbContent">
            <h2>Reserved Tickets</h2>
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
                        <h3>Tickets</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                           <div class="container edittable">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Event Name</th>
            <th scope="col">Event Date</th>
            <th scope="col">Duration</th>
            <th scope="col">Venue</th>
            <th scope="col">Seats</th>
            <th scope="col">Cancel</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $values)
                      <tr>
                      <th scope="row">{{$values[1]}}</th>
                        <td>{{$values[2]}}</td>
                        <td>{{$values[3]}}</td>
                        <td>{{$values[4]}}</td>
                        <td>{{$values[0]}}</td>
                        <td>
                    <form action="{{ route('ticket.destroy',$values[5]) }}" method="post">
                    @csrf
                   {{ method_field('DELETE')}}
                    
                    <button type="submit" name='action' value="delete" class="btn btn-danger">Cancel</button>
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
    
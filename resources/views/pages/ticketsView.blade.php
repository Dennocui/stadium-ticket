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
@if(Gate::allows('isAdmin'))
<div class="row">
  <div class="col-12">
      <table class="table table-bordered">
      <thead>
          <tr>
          <th scope="col">Customer</th>
          <th scope="col">Email</th>
          <th scope="col">Tickets</th>
          <th scope="col">Amount</th>
          
          <th scope="col">Cancel</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($reservations as $r)
                      <tr>
                      <th scope="row">{{$r->event->name}}</th>
                      <td>{{ $r->event->event_Date }}</td>
                      <td>{{ $r->event->event_duration}}</td>
                      <td>{{ $r->event->hall->id }}</td>
                      
                  <form action="#" method="post">
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

@else 
<div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Event Name</th>
            <th scope="col">Event Date</th>
            <th scope="col">Duration</th>
            <th scope="col">Venue</th>
            <th scope="col">Tickets</th>
            <th scope="col">Amount</th>
            <th scope="col">Status</th>
            <th scope="col">Cancel</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reservations as $r)
                      <tr>
                      <th scope="row">{{$r->event->name}}</th>
                        <td>{{ $r->event->event_Date }}</td>
                        <td>{{ $r->event->event_duration}}</td>
                        <td>{{ $r->event->hall->id }}</td>
                        <td>{{ $r->units }}</td>
                        <td>KSH {{ $r->amount }}</td>

                        <td>
                          @if ($r->event->open == 0)
                          Open
                          @else
                          closed
                          @endif
                         </td>
                        <td>
                    <form action="#" method="post">
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
@endif
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <!-- ##### Contact Area Start ##### -->
    
    @endsection
    
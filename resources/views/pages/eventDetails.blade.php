@extends('layouts.app')
@section('content')


    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.png') }});">
        <div class="bradcumbContent">
            <h2>Event Details</h2>
             @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
            @endif
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">

                    <!-- Single Post Start -->
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <div class="blog-post-thumb mt-30">
                            <a href="#"><img src="{{ asset('storage/'. $event->image) }}" alt=""></a>
                            <!-- Post Date -->
                            <div class="post-date">
                            <span>{{\Carbon\Carbon::parse($event->event_Date)->format('d')}}</span>
                                <span>{{\Carbon\Carbon::parse($event->event_Date)->format('M Y') }}</span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                        <a href="#" class="post-title">Event Name: {{$event->name}}</a>
                        <ul>
                            <li>Start Time: {{\Carbon\Carbon::parse($event->event_Date)->toTimeString()}}</li>
									<li>Duration: {{$event->event_duration}} Hours</li>
                                    <li>Venue: {{$event->hall_id}}</li>
                                    <li>Price: KSH {{$event->price}}</li>
                        </ul>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                
                            </div>
                            <!-- Post Excerpt -->
                            <h4>Description</h4>
                            <p>{{$event->descrition}}</p>
                        </div>
                    </div>

@if(Gate::allows('isAdmin'))

<div class="row">
  <div class="col-12">
    <div class="d-flex justify-content-end mb-4">


    
<a class="btn btn-primary" href="{{ route('pdfview',['download'=>'pdf', 'id' => $event->id ]) }}">Download PDF</a>
    
    </div>

      <table class="table table-bordered">
      <thead>
          <tr>
          <th scope="col">Customer</th>
          <th scope="col">Email</th>
          <th scope="col">Tickets</th>
          <th scope="col">Amount</th>
          
          
          </tr>
      </thead>
      <tbody>
          @foreach ($tickets as $r)
          {{-- @if( $r->event_id == 1 ) --}}
                      <tr>
                      <th scope="row">{{$r->user->fname}} {{$r->user->lname}}</th>
                      <td>{{ $r->user->email }}</td>
                      <td>{{ $r->units}} Units</td>
                      <td>{{ $r->amount }}</td>
                      
                      
                      </tr>
            {{-- @endif --}}
          @endforeach


                                  </tbody>
                              </table>
                              </div>
                          </div>
@endif




                   
            

                   
                    

                    <!-- Pagination -->
                    <div class="oneMusic-pagination-area wow fadeInUp" data-wow-delay="300ms">
                        <nav>
                        </nav>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="blog-sidebar-area">

                        <!-- Widget Area -->
                        

                        <!-- Widget Area -->
                        @if(Gate::allows('isAdmin'))
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Settings</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li>
                                    
                                        <a class="btn btn-outline-primary" href="/event/{{$event->id}}/edit">Edit</a>
                                    </li>
                                <li><a href="{{$event->id}}/destroy">Cancel Event</a></li>
                                <li>Reserved Seats: {{$reserved_tickets ?? ''}}</li>
                                <li>Total Seats: {{$total ?? ''}}</li>
                                </ul>
                            </div>
                        </div>
                        @else
                        <h4>Buy tickets</h4>
                        {{--
                             /requestpay 
                            {{ route('ticket.store') }}
                            
                            --}}
                        <form action=" {{ route('ticket.store') }}" method="post">
                            @csrf

                            <input required type="text" id="customer_id" name="customer_id" value="{{ Auth::user()->id }}" hidden>
                            <input required type="text" id="Event_id" name="Event_id" value="{{$event->id}}" hidden>
                            <input required type="text" id="price" value="{{$event->price}}" oninput="calculate()" hidden>

                            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Units</label>
                            <input required type="text" class="form-control" id="units" placeholder="Units" @error('units') is-invalid @enderror name="units" value="{{ old('units') }}" required autocomplete="units" autofocus oninput="calculate()">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Amount</label>
                            <input required type="text" class="form-control" id="amount" onkeypress='validate(event)'  placeholder="Total" @error('amount') is-invalid @enderror name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus readonly>
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">phone to send push STK</label>
                            <input required type="text" class="form-control" id="phonenumber" onkeypress='validate(event)' name="phonenumber" placeholder="254..." maxlength="11" minlength="10" required>
                          </div>

                          <button type="submit" class="btn oneMusic-btn mt-30 hide" >Buy</button>
                        </form>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    @endsection
    
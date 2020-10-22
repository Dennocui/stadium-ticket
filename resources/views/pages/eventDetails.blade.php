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
                        <a href="#" class="post-title">{{$event->name}}</a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                
                            </div>
                            <!-- Post Excerpt -->
                            <p>{{$event->descrition}}</p>
                        </div>
                    </div>

                   
                    

                    <!-- Pagination -->
                    <div class="oneMusic-pagination-area wow fadeInUp" data-wow-delay="300ms">
                        <nav>
                        </nav>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="blog-sidebar-area">

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Information</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li>Price: 100 L.E.</li>
									<li>Start Time: {{\Carbon\Carbon::parse($event->event_Date)->toTimeString()}}</li>
									<li>Duration: {{$event->event_duration}} Hours</li>
                                    <li>Venue: {{$event->hall_id}}</li>
                                 @if(Gate::allows('isCustomer'))
                                <li>
                                    
                                    <a class="btn btn-outline-primary" href="/ticket/{{$event->id}}">Get a Ticket</a>
                                </li>
                                @else
                                <li>
                                    
                                    <a class="btn btn-outline-primary" href="/event/{{$event->id}}/edit">Edit</a>
                                </li>
                                @endif
                                </ul>
                            </div>
                        </div>

                        <!-- Widget Area -->
                        @if(Gate::allows('isManager'))
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Settings</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                <li><a href="{{$event->id}}/destroy">Cancel Event</a></li>
                                <li>Reserved Seats: {{$reserved_tickets}}</li>
                                <li>Total Seats: {{$total}}</li>
                                </ul>
                            </div>
                        </div>

                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    @endsection
    
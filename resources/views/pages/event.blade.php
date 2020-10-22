
    @extends('layouts.app')
    @section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.png') }});">
        <div class="bradcumbContent">
            <h2>Available Events</h2>
            @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
            @endif
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container">
            <div class="row">
                
                @foreach ($events as $event)
                   <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src= "{{ asset('storage/'. $event->image) }}" alt="">
                        </div>
                        <div class="event-text">
                            <h4>{{$event->name}}</h4>
                            <div class="event-meta-data">
                                {{\Carbon\Carbon::parse($event->event_Date)->toDateString()}}
                            </div>
                            <a href="event/{{$event->id}}" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endsection
    
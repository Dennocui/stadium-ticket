@extends('layouts.app')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>Edit Event</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
 <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Event</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            
                            <form action="{{ route('event.update', $event->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
							<div class="form-group">
							<label for="EventName">Event Name</label>
							<input required type="text" value="{{$event->name}}" class="form-control" id="EventName" placeholder="Event Name" @error('EventName') is-invalid @enderror name="EventName" value="{{ old('EventName') }}" required autocomplete="EventName" autofocus>
                           
                                @if(Session::has('errors'))  
                                @if(Session::get('errors')->has('EventName'))  
                                       <div class="alert alert-danger"> {{ Session::get('errors')->first('EventName') }}</div>
                                @endif
                                @endif
                        </div>
						 <div class="form-group">
							<label for="EventDescription">Event Description</label>
							<textarea class="form-control" value="{{$event->descrition}}" style = "height:150px;" id="EventDescription" rows="20"  @error('EventDescription') is-invalid @enderror name="EventDescription" value="{{ old('EventDescription') }}" required autocomplete="EventDescription" autofocus> {{$event->descrition}}</textarea>
                                @if(Session::has('errors'))  
                                @if(Session::get('errors')->has('EventDescription'))  
                                       <div class="alert alert-danger"> {{ Session::get('errors')->first('EventDescription') }}</div>
                                @endif
                                @endif
                        </div>
						 <div class="form-row">    
                            <div class="form-group col-md-3"> <!-- Date input -->
                                        <label class="control-label" for="EventDate">Event Date</label>
                                        <input required type="date" value="{{ $event->event_Date }}" class="form-control" id="EventDate" name="EventDate" placeholder="YYY/MM/DD" @error('EventDate') is-invalid @enderror name="EventDate" value="{{ old('EventDate') }}" required autocomplete="EventDate" autofocus>
                                         @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('EventDate'))   
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('EventDate') }}</div>
                                    @endif
                                    @endif
                            </div>

                            <div class="form-group col-md-4"> <!-- Date input -->
                                        <label class="control-label" for="EventStartTime">Event Start Time (Hours)</label>
                                        <input required type="time"class="form-control" id="EventStartTime" name="EventStartTime" @error('EventStartTime') is-invalid @enderror name="EventStartTime" value="{{ old('EventStartTime') }}" required autocomplete="EventStartTime" autofocus>
                                         @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('EventStartTime'))   
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('EventStartTime') }}</div>
                                    @endif
                                    @endif
                            </div>

                            <div class="form-group col-md-3"> <!-- Date input -->
                                        <label class="control-label" for="EventDuration">Event Duration (Hours)</label>
                                        <input required type="time"class="form-control" id="EventDuration" name="EventDuration" @error('EventDuration') is-invalid @enderror name="EventDuration" value="{{ old('EventDuration') }}" required autocomplete="EventDuration" autofocus>
                                         @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('EventDuration'))   
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('EventDuration') }}</div>
                                    @endif
                                    @endif
                            </div>

                            <div class="form-group col-md-2">
                                <div class="hide">
                                    <label for="Hall">Venue</label>
                                    <select id="Hall" class="form-control" @error('hall_id') is-invalid @enderror name="hall_id" value="{{ old('hall_id') }}" required autocomplete="hall_id" autofocus>
                                        <option value=""></option>
                                    </select>
                                      @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('hall_id'))   
                
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('hall_id') }}</div>
                                    @endif
                                    @endif
                                </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="EventName">Price</label>
                                        <input required type="text" class="form-control" id="price" placeholder="Price" @error('price') is-invalid @enderror name="price" value="{{$event->price}}" required autocomplete="price" autofocus>
                                       
                                            @if(Session::has('errors'))  
                                            @if(Session::get('errors')->has('price'))  
                                                   <div class="alert alert-danger"> {{ Session::get('errors')->first('price') }}</div>
                                            @endif
                                            @endif
                                    </div>
                                </div>
                                
                            </div>    
                        
                            <div class="form-group">
                            <a href="#"><img src="{{ asset('storage/'. $event->image) }}" alt="" width="500" height="600"></a>
                            </div>
                            <div class="form-group">
                                
                                
                                     <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" @error('CoverImage') is-invalid @enderror name="CoverImage" value="{{ old('CoverImage') }}" required autocomplete="CoverImage" autofocus>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Event Cover Image</label>
                                    </div>
                                     @if(Session::has('errors'))
                                    @if(Session::get('errors')->has('CoverImage'))   
                
                                                <div class="alert alert-danger"> {{ Session::get('errors')->first('CoverImage') }}</div>
                                    @endif
                                    @endif
                                </div>
                                <a href="{{ url()->previous() }}"  class="btn oneMusic-btn mt-30 hide" >Back</a>
                            
                                <button type="submit" class="btn oneMusic-btn mt-30 hide">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->
    @endsection
    
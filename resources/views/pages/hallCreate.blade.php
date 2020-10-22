@extends('layouts.app')
@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <h2>Create a Venue</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
 <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Venue Information</h3>
                        <!-- Login Form -->

                         <div class="login-form">
                            <form action="{{ route('hall.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Number of Rows</label>
							        <input required type="number" class="form-control" id="exampleFormControlInput1" min="5" step="1" max="400" name="Rows" placeholder="Number of Rows" @error('Rows') is-invalid @enderror name="Rows" value="{{ old('Rows') }}" required autocomplete="Rows" autofocus>
                                     @if(Session::has('errors'))  
                                    @if(Session::get('errors')->has('Rows'))  
                                        <div class="alert alert-danger"> {{ Session::get('errors')->first('Rows') }}</div>
                                    @endif
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Number of Columns</label>
							        <input required type="number" class="form-control" id="exampleFormControlInput1" min="5" step="1" max="400" name="Columns" placeholder="Number of Columns" @error('Columns') is-invalid @enderror name="Columns" value="{{ old('Columns') }}" required autocomplete="Columns" autofocus>
                                    @if(Session::has('errors'))  
                                    @if(Session::get('errors')->has('Columns'))  
                                        <div class="alert alert-danger"> {{ Session::get('errors')->first('Columns') }}</div>
                                    @endif
                                    @endif
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->

    @endsection
    
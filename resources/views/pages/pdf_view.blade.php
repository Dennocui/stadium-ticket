@extends('layouts.app')
@section('content')


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
        @foreach ($data as $r)
                    <tr>
                    <th scope="row">{{$r->user->fname}} {{$r->user->lname}}</th>
                    <td>{{ $r->user->email }}</td>
                    <td>{{ $r->units}}</td>
                    <td>{{ $r->amount }}</td>
                    
                    </tr>
        @endforeach


                                </tbody>
                            </table>


@endsection
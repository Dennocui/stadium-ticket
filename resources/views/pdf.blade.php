
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Title -->
    <title>Stadium Ticketing</title>


    <!-- Stylesheet -->
    {{-- <link rel="stylesheet" href="{{asset('style.css')}}"> --}}

</head>

<body>
    <h3>Event List</h3>
    <br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
        <th scope="col">Customer</th>
        <th scope="col">Email</th>
        <th scope="col">Tickets</th>
        <th scope="col">Amount</th>
        <th></th>
        
        
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $r)
        {{-- @if ( $r->event_id == 4) --}}

                    <tr>
                    <td>{{ $r->id }}</td>
                    <th scope="row">{{$r->user->fname}} {{$r->user->lname}}</th>
                    <td>{{ $r->user->email }}</td>
                    <td>{{ $r->units}}</td>
                    <td>{{ $r->amount }}</td>
                    <td></td>
                    
                    </tr>
        {{-- @endif --}}
        @endforeach


                                </tbody>
                            </table>



                        </body>


                        </html>
                        

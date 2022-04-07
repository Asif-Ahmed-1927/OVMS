@extends('dashboard.dashboardlayout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<div class="container-fluid top-container">


    <div class="container">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>All Work List</title>
        </head>

        <body>
            <center>
                @if (session('msg'))
                <h4 class="text-center text-success">{{ session('msg') }}</h4>
                @endif

                <h3 class="p-2">All Work List</h3>

                <table class="table table-hover table-bordered border-info" border="1" style="width: 100%" id="myTable">
                    <div class="justify-content-center">

                        <tr class="table-info">
                            <th class="text-uppercase">Id</th>
                            <th class="text-uppercase">Work Id</th>
                            <th class="text-uppercase">User Id</th>
                            <th class="text-uppercase">Volunteer Id</th>
                            <th class="text-uppercase">Work Details</th>
                            <th class="text-uppercase">Status</th>
                            <th class="text-uppercase">Start Time</th>
                            <th class="text-uppercase">End Time</th>

                        </tr>
                    </div>
                    @foreach($list as $key => $lists)

                    @php

                    $data=$lists->details;
                    @endphp
                    <tr class="">
                        <td>{{ $lists->id }}</td>
                        <td class="text-uppercase">{{ $lists->work_id }}</td>
                        <td class="text-uppercase">{{ $lists->user_id }}</td>
                        <td class="text-uppercase">{{ $lists->volunteer_id }}</td>
                        <td class="text-uppercase"> {!! $data !!}</td>
                        <td class="text-uppercase">{{ $lists->status }}</td>
                        <td class="text-uppercase">{{ $lists->created_at }}</td>
                        <td class="text-uppercase">{{ $lists->expired_at }}</td>


                        @endforeach

                        </section>
                </table>
            </center>
        </body>
    </div>
</div>

</html>
@endsection
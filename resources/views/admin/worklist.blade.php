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
                <form action="{{route('admin.worklistview')}}" method="get">

                    <div class="d-grid gap-2 col-6">
                        <input class="m-2 border border-info border-2 rounded-pill" type="text" name="" id="myInput"
                            onkeyup="searchFun()" placeholder="search via Work ID , Work details , Date">
                    </div>

                    <table class="table table-hover table-bordered border-info" border="1" style="width: 100%"
                        id="myTable">
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
                                <th class="text-uppercase">Action</th>
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


                            <td>

                                <div class="pt-2">

                                    <form action="{{route('admin.workdelete',$lists->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>

                            </td>
                            @endforeach

                            </section>
                    </table>


                </form>

            </center>

        </body>
    </div>
</div>

</html>
@endsection

<script>
    const searchFun =() =>{
    let filter = document.getElementById('myInput').value.toUpperCase();
    let myTable = document.getElementById('myTable');
    let tr = myTable.getElementsByTagName('tr');
    
    for (let i = 0; i<tr.length; i++) { let td=tr[i].getElementsByTagName('td')[1]; if(td) { let textvlaue=td.textContent ||
        td.innerHTML; if(textvlaue.toUpperCase().indexOf(filter)> -1){
        tr[i].style.display = '';
    
        }else{
        let td2= tr[i].getElementsByTagName('td')[4];
    
        if(td2) {
    
        let textvlaue = td2.textContent || td2.innerHTML;
        if(textvlaue.toUpperCase().indexOf(filter) > -1){
        tr[i].style.display = '';
    
        }else{
        let td3= tr[i].getElementsByTagName('td')[6];
    
        if(td3) {
        let textvlaue = td3.textContent || td3.innerHTML;
        if(textvlaue.toUpperCase().indexOf(filter) > -1){
        tr[i].style.display = '';
    
        }else{
        tr[i].style.display = 'none';
        }
        }
        }
        }
    
        }
    
        }
        }
        }
</script>
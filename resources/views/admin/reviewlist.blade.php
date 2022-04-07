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
            <title>All Review List</title>
        </head>

        <body>
            <center>
                @if (session('msg'))
                <h4 class="text-center text-success">{{ session('msg') }}</h4>
                @endif

                <h3 class="p-3">All Review List</h3>
                <form action="{{route('admin.reviewlistview')}}" method="get">

                    <div class="d-grid gap-2 col-6">
                        <input class="m-2 border border-info border-2 rounded-pill" type="text" name="" id="myInput"
                            onkeyup="searchFun()" placeholder="search via Work ID,Username , Email">
                    </div>

                    <table class="table table-hover table-bordered border-info" border="1" style="width: 100%"
                        id="myTable">
                        <div class="justify-content-center">

                            <tr class="table-info">
                                <th class="text-uppercase">Id</th>
                                <th class="text-uppercase">Work Id</th>
                                <th class="text-uppercase">User Id</th>
                                <th class="text-uppercase">User Name</th>
                                <th class="text-uppercase">User Email</th>
                                <th class="text-uppercase">Volunteer Id</th>
                                <th class="text-uppercase">Review Details</th>
                                <th class="text-uppercase">Rating</th>
                                <th class="text-uppercase">Date Time</th>
                                <th class="text-uppercase">Action</th>
                            </tr>
                        </div>

                        @foreach($list as $key => $lists)

                        <tr class="">
                            <td>{{ $lists->id }}</td>
                            <td class="text-uppercase">{{ $lists->work_id }}</td>
                            <td class="text-uppercase">{{ $lists->u_Id }}</td>
                            <td class="text-uppercase">{{ $lists->u_name }}</td>
                            <td class="text-uppercase">{{ $lists->u_email }}</td>
                            <td class="text-uppercase">{{ $lists->v_Id }}</td>
                            <td class="text-uppercase">{{ $lists->details}}</td>
                            <td class="text-uppercase">{{ $lists->rating }}</td>
                            <td class="text-uppercase">{{ $lists->created_at }}</td>



                            <td>

                                <div class="pt-2">

                                    <form action="{{route('admin.reviewdelete',$lists->id)}}" method="post">
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
    let td2= tr[i].getElementsByTagName('td')[3];

    if(td2) {

    let textvlaue = td2.textContent || td2.innerHTML;
    if(textvlaue.toUpperCase().indexOf(filter) > -1){
    tr[i].style.display = '';

    }else{
    let td3= tr[i].getElementsByTagName('td')[4];

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
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
            <title>All User List</title>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        </head>

        <body>
            <center>
                @if (session('msg'))
                <h4 class="text-center text-success">{{ session('msg') }}</h4>
                @endif

                <h3 class="p-3">All User List</h3>


                <form action="{{route('admin.userlistview')}}" method="get">

                    <div class="d-grid gap-2 col-6">
                        <input class="m-2 border border-info border-2 rounded-pill" type="text" name="" id="myInput"
                            onkeyup="searchFun()" placeholder="search via user name , Email">
                    </div>

                    <table id="myTable" class="table table-hover table-bordered border-info" border="1"
                        style="width: 100%">
                        <div class="justify-content-center">

                            <tr class="table-info">
                                <th class="text-uppercase">Id</th>
                                <th class="text-uppercase">Username</th>
                                <th class="text-uppercase">First Name</th>
                                <th class="text-uppercase">Last Name</th>
                                <th class="text-uppercase">Email</th>
                                <th class="text-uppercase">Phone</th>
                                <th class="text-uppercase">Address</th>
                                <th class="text-uppercase">National ID</th>
                                <th class="text-uppercase">Gender</th>
                                <th class="text-uppercase">Date of Birth</th>
                                <th class="text-uppercase">User Type</th>
                                <th class="text-uppercase">Action</th>
                            </tr>
                        </div>

                        @foreach($list as $key => $lists)
                        <tr class="">

                            <td>{{ $lists->id }}</td>
                            <td class="text-uppercase">{{ $lists->username }}</td>
                            <td class="text-uppercase">{{ $lists->first_name }}</td>
                            <td class="text-uppercase">{{ $lists->last_name }}</td>
                            <td>{{ $lists->email }}</td>
                            <td>{{ $lists->phone}}</td>
                            <td class="text-uppercase">{{ $lists->address }}</td>
                            <td>{{ $lists->national_id }}</td>
                            <td class="text-uppercase">{{ $lists->gender }}</td>
                            <td>{{ $lists->date_of_birth }}</td>
                            <td class="text-uppercase">{{ $lists->usertype }}</td>


                            <td>
                                <div>

                                    <a class="btn btn-primary" href="{{ route('admin.edit', $lists->id) }}">Edit</a>
                                </div>
                                <div class="pt-2">

                                    <form action="{{route('admin.delete',$lists->id)}}" method="post">
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
<br><br>
@endsection

<script>
    const searchFun =() =>{
                        let filter = document.getElementById('myInput').value.toUpperCase();
                        let myTable = document.getElementById('myTable');
                        let tr = myTable.getElementsByTagName('tr');

                        for (let i = 0; i<tr.length; i++) {
                        let td= tr[i].getElementsByTagName('td')[1];
                        if(td) {
                            
                            let textvlaue = td.textContent || td.innerHTML;
                            if(textvlaue.toUpperCase().indexOf(filter) > -1){
                                tr[i].style.display = '';
                                
                            }else{
                                    let td2= tr[i].getElementsByTagName('td')[4];

                                    if(td2) {
                                        
                                        let textvlaue = td2.textContent || td2.innerHTML;
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
   
</script>
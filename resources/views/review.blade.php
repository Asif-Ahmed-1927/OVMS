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
            <title>All User Review List</title>
        </head>

        <body>
            <center>
                @if (session('msg'))
                <h4 class="text-center text-success">{{ session('msg') }}</h4>
                @endif

                <h3 class="p-3">All Review List</h3>
                <form action="{{route('allreview')}}" method="get">

                    {{-- <div class="d-grid gap-2 col-6">
                        <input class="m-2 border border-info border-2 rounded-pill" type="text" name="" id="myInput"
                            onkeyup="searchFun()" placeholder="search via name">
                    </div> --}}

                    <table class="table table-hover table-bordered border-info" border="1" style="width: 100%"
                        id="myTable">
                        <div class="justify-content-center">

                            <tr class="table-info">
                                <th class="text-uppercase">Id</th>
                                <th class="text-uppercase">User Name</th>
                                <th class="text-uppercase">Review Details</th>
                                <th class="text-uppercase">Rating</th>
                                <th class="text-uppercase">Date Time</th>
                            </tr>
                        </div>

                        @foreach($review as $key => $lists)

                        <tr class="">
                            <td>{{ $lists->id }}</td>
                            <td class="text-uppercase">{{ $lists->u_name }}</td>
                            <td class="text-uppercase">{{ $lists->details}}</td>
                            <td class="text-uppercase">{{ $lists->rating }}</td>
                            <td class="text-uppercase">{{ $lists->created_at }}</td>

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

                        for (let i = 0; i<tr.length; i++) {
                        let td= tr[i].getElementsByTagName('td')[1];
                            if(td) {
                                
                                let textvlaue = td.textContent || td.innerHTML;
                                if(textvlaue.toUpperCase().indexOf(filter) > -1){
                                    tr[i].style.display = '';

                                }else{
                                    tr[i].style.display = 'none';
                                }
                            }
                          
                        }

                     }
   
</script>
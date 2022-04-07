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
            <title>All Payment List</title>
        </head>

        <body>
            <center>
                @if (session('msg'))
                <h4 class="text-center text-success">{{ session('msg') }}</h4>
                @endif

                <h3 class="p-3">All Payment List</h3>
                <form action="{{route('admin.paymentlistview')}}" method="get">

                    <div class="d-grid gap-2 col-6">
                        <input class="m-2 border border-info border-2 rounded-pill" type="text" name="" id="myInput"
                            onkeyup="searchFun()" placeholder="search via Work ID , Payment type , Ammount">
                    </div>

                    <table id="myTable" class="table table-hover table-bordered border-info" border="1"
                        style="width: 100%">
                        <div class="justify-content-center">

                            <tr class="table-info">
                                {{-- <th class="text-uppercase">Id</th> --}}
                                <th class="text-uppercase">Payment Id</th>
                                <th class="text-uppercase">Work Id</th>
                                <th class="text-uppercase">User Id</th>
                                {{-- <th class="text-uppercase">User Name</th> --}}
                                <th class="text-uppercase">Volunteer Id</th>
                                <th class="text-uppercase">Payment Type</th>
                                <th class="text-uppercase">Amount</th>
                                <th class="text-uppercase">Status</th>
                                <th class="text-uppercase">Card Name</th>
                                <th class="text-uppercase">Card Number</th>
                                <th class="text-uppercase">Expire</th>
                                <th class="text-uppercase">CVV</th>
                                <th class="text-uppercase">Time</th>
                                <th class="text-uppercase">Action</th>
                            </tr>
                        </div>
                        @foreach($list as $key => $lists)

                        <tr class="">
                            <td>{{ $lists->id }}</td>
                            <td class="text-uppercase">{{ $lists->work_id }}</td>
                            <td class="text-uppercase">{{ $lists->u_id }}</td>
                            {{-- <td class="text-uppercase">{{ $lists->username }}</td> --}}
                            <td class="text-uppercase">{{ $lists->v_id }}</td>
                            <td class="text-uppercase">{{ $lists->payment_type }}</td>
                            <td class="text-uppercase">{{ $lists->price }}</td>
                            <td class="text-uppercase">{{ $lists->status}}</td>
                            <td class="text-uppercase">{{ $lists->card_name }}</td>
                            <td class="text-uppercase">{{ $lists->card_number }}</td>
                            <td class="text-uppercase">{{ $lists->expire }}</td>
                            <td class="text-uppercase">{{ $lists->cvv }}</td>
                            <td class="text-uppercase">{{ $lists->created_at }}</td>



                            <td>

                                <div class="pt-2">

                                    <form action="{{route('admin.paymentdelete',$lists->id)}}" method="post">
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
                                    let td3= tr[i].getElementsByTagName('td')[5];

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
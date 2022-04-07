<div class="container-fluid top-containerr">
    <center>
        @if (session('msg'))
        <h4 class="text-center text-success">{{ session('msg') }}</h4>

        @endif

        <div class="mb-5">
            {{-- <h1>{{session('usertype')}}</h1> --}}
            <h1>Admin Dashboard</h1>
        </div>
        <a class="btn btn-outline-primary mb-3" href="{{route('admin.userlistview')}}">All Users list</a><br>
        <a class="btn btn-outline-primary mb-3" href="{{route('admin.worklistview')}}">All Work list</a><br>
        <a class="btn btn-outline-primary mb-3" href="{{route('admin.reviewlistview')}}">Review list</a><br>
        <a class="btn btn-outline-primary mb-3" href="{{route('admin.paymentlistview')}}">All Payment list</a><br>

    </center>

    <br><br><br><br><br><br><br><br><br>
</div>
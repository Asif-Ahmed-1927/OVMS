<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">OVMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (session('username'))
                <li class="nav-item">

                    <a class="nav-link btn btn-outline-secondary fw-bold text-uppercase " aria-current="page"
                        href="{{ route('dashboard') }}"> <img class="avatar mx-2"
                            src="{{ asset('assets/images/users/user' . session('userid') . '.jpg') }}" alt="" srcset="">
                        <span class="mx-1">{{ session('username') }}</span> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('user.edit') }}">Profile-Settings</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('payment.payment') }}">Payment</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('review.review') }}">Review</a>
                </li> --}}

                @if(session('usertype')=='User')

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('worklist') }}">Work list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('paymentstatus') }}">Work payment
                        status</a>
                </li>

                @endif

                @if(session('usertype')=='Volunteer')

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('reviewlistuser') }}">Review list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('worklistvolunteer') }}">Completed
                        Work list</a>
                </li>
                @endif

                @endif


                @if (!session('username'))
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/#developerInfo">Developer Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/#advantagesInfo">Advantages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/#facility">Facility</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('allreview') }}">Review</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
                @endif
            </ul>
            <div class="d-flex">
                @if (!session('username'))

                @if (request()->routeIs('allreview'))
                <input class="form-control me-2" type="text" onkeyup="searchFun()" id="myInput"
                    placeholder="Search Name" aria-label="Search">
                @endif

                <a href="{{ route('login') }}">
                    <button class="btn btn-outline-primary mx-2">Login</button>
                </a>
                <a href="{{ route('registration') }}">
                    <button class="btn btn-outline-primary mx-2">Registration</button>
                </a>

                @else
                <a href="{{ route('logout') }}">
                    <button class="btn btn-outline-dark mx-2">Logout</button>
                </a>
                @endif
                {{-- color --}}
                <a>
                    <input class="outline-success mx-2" id="colorpicker" type="color" value="#edfafd"
                        onclick="changecolor();" class="form-control form-control-color" title="Choose your color" />

                </a>
                <a>

                    <label class="btn btn-outline-dark ">Theme</label>
                </a>
                {{-- color --}}

            </div>
        </div>
    </div>
</nav>

<script>
    let colorpicker = document.getElementById('colorpicker');

 setInterval(()=>{
    let color = colorpicker.value;
    document.body.style.backgroundColor = color;
    //document.footer-color.style.backgroundColor = color;
   // document.card.style.backgroundColor = color;
    //document.navbar.bg-light.bootstrap.backgroundColor = color;
    }, 10);
</script>
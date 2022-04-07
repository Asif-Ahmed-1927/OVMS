@extends('layout')
@section('content')
<div class="container top-container">

    <link rel="stylesheet" href="{{ asset('assets/css/payment.css') }}" />
    <form novalidate class="w-75 m-auto" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5 px-5">
            <div class="mb-4">

                <h2 class="d-flex justify-content-center">Confirm and Pay</h2>
                <h4 class="d-flex justify-content-center">Work Details : {{$details->details}}</h4><br>
                <span class="badge bg-primary text-wrap fs-6">Please make the payment, Thank You
                    Sir.</span>

            </div>
            <div class="col-md-4 d-flex justify-content-between">
                <div>

                    <span>You have to pay </span>
                    <div class="d-flex flex-row align-items-end">
                        <div class="mb-4 ">
                            <h1 class="mb-0 yellow">৳{{$amount}}</h1>
                            <input type="hidden" name="amount" value="{{$amount}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="collapse" id="collapseExample6">

                        <div class="card p-3">
                            <h6 class="text-uppercase">Payment details </h6>
                            <div class="inputbox mt-3">
                                <input type="text" name="card_name" class="form-control" required="" />
                                <span>Name on card</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2">
                                        <input type="number" name="card_number" class="form-control" required="" />
                                        <i class="fa fa-credit-card"></i>
                                        <span>Card Number</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-row">
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="text" name="expire" class="form-control" required="" />
                                            <span>Expiry</span>
                                        </div>
                                        <div class="inputbox mt-3 mr-2">
                                            <input type="text" name="cvv" class="form-control" required="" />
                                            <span>CVV</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="collapse" id="collapseExample5">
                        <h3></h3>
                    </div> --}}

                    <div>
                        <input type="radio" id="cash_payment" name="payment_type" value="cash_payment"
                            onclick="maintainCollapse()">
                        <!-- data-bs-toggle="collapse" href="#collapseExample" aria-controls="collapseExample" -->
                        <!-- aria-expanded="false" -->
                        <label class="ms-1" for="cash_payment">Cash Payment</label>

                        <input class="ms-3" type="radio" id="online_payment" name="payment_type" value="online_payment"
                            data-bs-toggle="collapse" href="#collapseExample6" aria-controls="collapseExample6"
                            aria-expanded="false">
                        <label class="ms-1" for="online_payment">Online Payment</label><br>

                    </div>

                    <div class=" m-4 d-flex justify-content-around">
                        <span></span>
                        <button type="submit" class="btn btn-primary px-5 ms-5 ">Pay</button>

                    </div>
                </div>

            </div>
        </div>
    </form>

    <script>
        function maintainCollapse()
        {
            let collapse = document.getElementById('collapseExample6');
           try {
               collapse.classList.remove("show");
           } catch (error) {
               
           }
        }
    </script>

</div>

@endsection
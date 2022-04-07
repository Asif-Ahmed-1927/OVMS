@extends('layout')
@section('content')

<script src="https://use.fontawesome.com/a6f0361695.js"></script>
<div class="container top-container">

    <link rel="stylesheet" href="{{ asset('assets/css/review.css') }}" />
    <h2 id="fh2">WE APPRECIATE YOUR REVIEW!</h2>
    <h6 id="fh6">Your review will help us to improve our volunteer services, and customer services.</h6>

    <form class="w-75 m-auto" method="post" action="{{route('review.store')}}">
        @csrf
        <div class="">


            <div class="pinfo">Your personal info</div>

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input disabled="disabled" name="u_name" class="form-control text-uppercase" type="text"
                            value="{{ $user->first_name." ".$user->last_name }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input disabled="disabled" name="u_email" type="text" class="form-control "
                            value="{{$user->email}}">
                    </div>
                </div>
            </div>
            <div class="pinfo">Rate our overall services.</div>


            {{-- <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-star"></i></span>
                        <select class="form-control" name="rating" id="rate">
                            <option value="1star">1</option>
                            <option value="2stars">2</option>
                            <option value="3stars">3</option>
                            <option value="4stars">4</option>
                            <option value="5stars">5</option>
                        </select>

                    </div>
                </div>
            </div> --}}
            <div class="rating-css">

                <div class="star-icon">
                    <input value="1star" type="radio" name="rating" id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input value="2star" type="radio" name="rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input value="3star" type="radio" name="rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input value="4star" type="radio" name="rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input value="5star" type="radio" name="rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
            </div>
            <div class="pinfo">Write your feedback.</div>


            <div class="form-group">
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                        <textarea name="details" class="form-control" id="review" rows="3"></textarea>

                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
    </form>
</div>
<br><br><br><br>
@endsection
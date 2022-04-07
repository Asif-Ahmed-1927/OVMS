@extends('dashboard.dashboardlayout')

@section('content')

<div class="container-fluid top-container">

    <div class="container rounded mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" height="150px" src="{{ asset('assets/images/users/user' . $list->id . '.jpg') }}">
                    {{-- @include('dashboard.uploadModal') --}}
                    <br>
                    <form method="post" action="{{url('/admin/edit/update/' . $list->id )}}" class="mx-3 loginForm">
                        @csrf
                        <h4><span class="font-weight-bold">{{ $list->username }}</span></h4>
                        <span class="text-black-50">{{ $list->email }}</span><span> </span>
                </div>
            </div>

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Edit</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="first name"
                                value="{{ (old('first_name') ? old('first_name') : $list->first_name) }}">
                            @error('first_name')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6"><label class="labels">Last Name</label>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ (old('last_name') ? old('last_name') : $list->last_name) }}"
                                placeholder="last name">
                            @error('last_name')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="enter username"
                                value="{{ (old('username') ? old('username') : $list->username ) }}">
                            @error('username')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12"><label class="labels">Email Address</label>
                            <input type="text" name="email" class="form-control" placeholder="enter email"
                                value="{{ (old('email') ? old('email') : $list->email ) }}">
                            @error('email')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12"><label class="labels">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="enter password"
                                value="{{ (old('password') ? old('password') : $list->password ) }}">
                            @error('password')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12"><label class="labels">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="enter phone"
                                value="{{ (old('phone') ? old('phone') : $list->phone) }}">
                            @error('phone')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12"><label class="labels">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="enter address"
                                value="{{ (old('address') ? old('address') : $list->address) }}">
                            @error('address')
                            <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12"><label class="labels">Gender</label>
                            <input type="text" name="gender" class="form-control" placeholder="enter gender"
                                value="{{ (old('gender') ? old('gender') : $list->gender) }}">
                            @error('gender')
                            <br><span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDate_of_birth1" class="form-label">Date of birth</label>
                        <input type="date" name="date_of_birth" class="form-control" value="{{ $list->date_of_birth }}"
                            id="exampleInputDate_of_birth1">
                        @error('date_of_birth')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputNational_id1" class="form-label">NID</label>
                        <input type="number" name="national_id" class="form-control" value="{{ $list->national_id }}"
                            id="exampleInputNational_id1">
                        @error('national_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputNational_id1" class="form-label">User Type</label>
                        <select class="form-select" name="usertype" required id="">
                            <option value="User" @if($list->usertype =='User') selected @endif>User</option>
                            <option value="Volunteer" @if($list->usertype =='Volunteer') selected @endif>Volunteer
                            </option>
                        </select>
                        @error('usertype')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update
                            Profile</button></div>
                </div>
            </div>

            </form>

        </div>
    </div>
</div>
@endsection
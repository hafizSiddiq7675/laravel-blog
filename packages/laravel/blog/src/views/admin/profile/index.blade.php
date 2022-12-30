@extends('admin.dashboard.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Profile</h4>
            <p class="card-description">
            Update your profile
            </p>
            <form class="forms-sample" action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @if (\Session::has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-primary alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success ! </strong> {!! \Session::get('success') !!}
                                @php
                                    Session::forget('success')
                                @endphp
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="{{ $user->name }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputName1" placeholder="Email" value="{{ $user->email }}">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">New Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputName1" placeholder="New Password" value="">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputName1" placeholder="Confirm Password" value="">
                        </div>
                    </div>
                </div>





            <button type="submit" class="btn btn-primary mr-2">Update</button>

            </form>
        </div>
        </div>
    </div>

@endsection

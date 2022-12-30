@extends('blog::admin.dashboard.app')
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Settings</h4>
            <p class="card-description">
            Website Logo
            </p>
            <form class="forms-sample" action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @if (\Session::has('success'))
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="alert alert-primary alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success ! </strong> {!! \Session::get('success') !!}
                                @php
                                    Session::forget('success')
                                @endphp
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12 mb-4">
                        <div >
                            @if(isset($setting))
                                <img style="height: 100px; width: 100px;" class="img-fluid" src="{{ asset($setting->logo) }}" alt="">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="43.001" height="31.353"
                                    viewBox="0 0 43.001 31.353">
                                    <path id="Path_138_-_Outline" data-name="Path 138 - Outline"
                                        d="M-8790.64-414.945h-27.652a7.688,7.688,0,0,1-7.681-7.678v-16a7.688,7.688,0,0,1,7.681-7.678h.729a1.116,1.116,0,0,1,1.113,1.116,1.116,1.116,0,0,1-1.113,1.116h-.729a5.454,5.454,0,0,0-5.449,5.447v16a5.454,5.454,0,0,0,5.449,5.447h27.652a5.414,5.414,0,0,0,3.241-1.065,1.094,1.094,0,0,1,.66-.219,1.126,1.126,0,0,1,.9.45,1.118,1.118,0,0,1-.231,1.561A7.626,7.626,0,0,1-8790.64-414.945Zm5.65-3.214a1.115,1.115,0,0,1-.566-.153l0,0a1.128,1.128,0,0,1-.39-1.524,5.464,5.464,0,0,0,.75-2.771v-16a5.441,5.441,0,0,0-5.418-5.451h-24.171a1.116,1.116,0,0,1-1.113-1.116,1.116,1.116,0,0,1,1.113-1.116h24.171a7.673,7.673,0,0,1,7.646,7.683v16a7.729,7.729,0,0,1-1.059,3.9A1.109,1.109,0,0,1-8784.989-418.159Zm-23.36-4.7a2.1,2.1,0,0,1-1.023-.27,2.066,2.066,0,0,1-1.061-1.816v-.811a1.113,1.113,0,0,1,1.111-1.111,1.114,1.114,0,0,1,1.114,1.111v.56l9-5.426-9-5.426v7.7a1.115,1.115,0,0,1-1.114,1.114,1.114,1.114,0,0,1-1.111-1.114V-436.3a2.065,2.065,0,0,1,1.058-1.815,2.1,2.1,0,0,1,1.026-.272,2.1,2.1,0,0,1,1.074.3l9.413,5.68a2.062,2.062,0,0,1,1.008,1.784,2.069,2.069,0,0,1-1.008,1.784l-9.412,5.677A2.068,2.068,0,0,1-8808.35-422.859Z"
                                        transform="translate(8825.973 446.298)" fill="#4c3ff2"></path>
                                </svg>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="custom-file ">
                            <input type="file" name="logo" class="custom-file-input" id="inputGroupFile01">
                           <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                           @if ($errors->has('logo'))
                            <span class="text-danger">{{ $errors->first('logo') }}</span>
                            @endif
                        </div>

                    </div>
                </div>





            <button type="submit" class="btn btn-primary mr-2">Update</button>

            </form>
        </div>
        </div>
    </div>

@endsection

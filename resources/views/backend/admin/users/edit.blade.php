@extends('backend.layouts.app')

@section('title', 'Update User')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">{{ __('Update User') }}</h6>
                        <a class="btn btn-outline-primary float-end" href="{{ route('admin.users.index') }}"
                           >{{ __('All User') }}</a>

                        </div>
                        <hr>
                        <form class="forms-sample" method="POST" action="{{ route('admin.users.update', $user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Name') }}"
                                                autocomplete="off" name="name" value="{{ $user->name }}" required="" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('E-mail Address') }}</label>
                                            <input type="email" class="form-control"
                                                placeholder="{{ __('E-mail Address') }}" autocomplete="off" name="email"
                                                value="{{ $user->email }}" required="" />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">{{ __('Phone') }}</label>
                                            <input type="text" class="form-control" placeholder="{{ __('Phone') }}"
                                                autocomplete="off" name="phone" value="{{ $user->phone }}" required="" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">{{ __('Address') }}</label>
                                            <textarea class="form-control" placeholder="{{ __('Address') }}"
                                                autocomplete="off" name="address"
                                                rows="5" />{{ $user->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card" style="margin-top: 28px">
                                        <div class="card-body">
                                            <center>
                                                <img src="{{ asset($user->photo) }}" id="user-photo"
                                                    style="width: 100px; height: 100px ">
                                                <p class="card-text mb-3" style="color: red">
                                                    {{ __('Photo Max Size 100px') }}</p>
                                                <input type="file" name="photo" onchange="readPicture(this)">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <center>
                                        <button type="reset" class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                        <button type="submit" class="btn btn-outline-primary">{{ __('Update') }}</button>
                                    </center>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        function readPicture(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#user-photo')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

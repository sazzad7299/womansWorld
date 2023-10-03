<form class="forms-sample" method="POST" action="{{ route('admin.webinfo.update',$webinfo->id) }}" enctype="multipart/form-data">
    @csrf @method("PUT")
    <div class="row">
        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">{{ __('Website Name') }}</label>
                    <input type="text" class="form-control" placeholder="{{ __('Name') }}" autocomplete="off"
                        name="name" value="{{ old('name',$webinfo->name) }}" required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('Sub Title') }}</label>
                    <input type="test" class="form-control" placeholder="{{ __('Sub Title') }}" autocomplete="off"
                        name="title" value="{{ old('title',$webinfo->title) }}" required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('E-mail Address') }}</label>
                    <input type="email" class="form-control" placeholder="{{ __('E-mail Address') }}"
                        autocomplete="off" name="email" value="{{ old('email',$webinfo->email) }}" required="" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('Phone') }}</label>
                    <input type="text" class="form-control" placeholder="{{ __('Phone') }}" autocomplete="off"
                        name="number" value="{{ old('number',$webinfo->number) }}" required="" />
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">{{ __('About') }}</label>
                    <textarea name="about" id="" cols="30" rows="10" class="form-control">{{old('about',$webinfo->about)}}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">{{ __('Address') }}</label>
                    <textarea name="address" id="" cols="30" rows="10" class="form-control">{{old('address',$webinfo->address)}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <label class="form-label">{{ __('Logo') }}</label>
                    <center>
                        <img src="{{asset($webinfo->logo)}}" id="user-photo" width="100px">
                        <p class="card-text mb-3" style="color: red">{{ __('Logo Max Size 1M') }}</p>
                        <input type="file" name="logo" onchange="readPicture(this)">
                    </center>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <label class="form-label">{{ __('Favicon') }}</label>
                    <center>
                        <img src="{{asset($webinfo->icon)}}" id="user-photo" width="100px">
                        <p class="card-text mb-3" style="color: red">{{ __('Favicon Max Size 120X120(px)') }}</p>
                        <input type="file" name="icon" onchange="readPicture(this)">
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <center>
                <button type="reset" class="btn btn-outline-danger">{{ __('Reset') }}</button>
                <button type="submit" class="btn btn-outline-primary">{{ __('Save') }}</button>
            </center>
        </div>
    </div>
</form>

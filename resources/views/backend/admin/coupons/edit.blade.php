<form class="forms-sample" method="POST" action="{{ route('admin.coupons.update',$item->id) }}" enctype="multipart/form-data">
    @csrf @method("PUT")
    <div class="row col-md-12 mb-3">
        <div class="form-group col-md-3">
            <label class="form-label">{{ __('Title') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('Title') }}" autocomplete="off" name="title"
                value="{{ old('title',$item->title) }}" required="" id="title" />
        </div>
        <div class="form-group col-md-3">
            <label class="form-label">{{ __('Code') }}</label>
            <input type="text" class="form-control" placeholder="{{ __('Code') }}" autocomplete="off"
                name="code" value="{{ old('code',$item->code) }}" required="" id="code" />
        </div>
        <div class="form-group col-md-3">
            <label class="form-label">{{ __('Discount Type') }}</label>
            <select class="form-select" data-width="100%" name="amount_type">
                <option value=""> Select Type</option>
                <option value="1" {{$item->amount_type ==1 ?'selected':''}}>{{ __('Reguler') }}</option>
                <option value="2" {{$item->amount_type ==2 ?'selected':''}}>{{ __('Percent') }}</option>

            </select>
        </div>
        <div class="form-group col-md-3">
            <label class="form-label">{{ __('Amount') }}</label>
            <input type="number" class="form-control" placeholder="{{ __('Amount') }}" autocomplete="off"
                name="amount" value="{{ old('amount',$item->amount) }}" required="" id="amount" />
        </div>
        <div class="form-group col-md-3">
            <label class="form-label">{{ __('Expires Date') }}</label>
            <input type="date" class="form-control" placeholder="{{ __('Expires Date') }}" autocomplete="off"
                name="expires_at" value="{{ old('expires_at',$item->expires_at) }}" required="" id="expires_at" />
        </div>

        <div class="form-group col-md-3">
            <label class="form-label">{{ __('Type') }}</label>
            <select class="form-select" data-width="100%" name="type">
                <option value=""> Select Type</option>
                <option value="1" {{$item->type ==1 ?'selected':''}}>Flat</option>
                <option value="2" {{$item->type ==2 ?'selected':''}}>Category</option>
                <option value="3" {{$item->type ==3 ?'selected':''}}>Brand</option>
                <option value="4" {{$item->type ==4 ?'selected':''}}>Products</option>

            </select>
        </div>
        <div class="form-group col-md-3">
            <label class="form-label">{{ __('Limit') }}</label>
            <input type="number" class="form-control" placeholder="{{ __('Limit') }}" autocomplete="off"
                name="limit" value="{{ old('limit',$item->limit) }}" required="" id="limit" />
        </div>
        <div class="form-group col-md-3">
            <label class="form-label">{{ __('Status') }}</label>
            <select class="form-select" data-width="100%" name="status" id="status">
                <option value="">{{ __('Status') }}</option>
                @foreach (getStatus() as $status)
                    <option value="{{ $status['value'] }}" {{$item->status == $status['value'] ?'selected':''}}>{{ $status['label'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">

    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <center>
                <button type="reset" class="btn btn-outline-danger">{{ __('Reset') }}</button>
                <button type="submit" class="btn btn-outline-primary">{{ __('update') }}</button>
            </center>
        </div>
    </div>
</form>

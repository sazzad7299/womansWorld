<div class="modal-header">
    <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('Edit Payment Options') }}
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="forms-sample" method="POST" action="{{ route('admin.payoptions.update',$payoption->id) }}">
        @csrf @method('PUT')
        <div class="row col-md-12 mb-3">
            <div class="form-group col-md-3">
                <label class="form-label">{{ __('Name') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Name') }}"
                    autocomplete="off" name="name" value="{{ old('name',$payoption->name) }}" required=""
                    id="name" />
            </div>
            <div class="form-group col-md-3">
                <label class="form-label">{{ __('Type') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Type') }}"
                    autocomplete="off" name="type" value="{{ old('type',$payoption->type) }}" />
            </div>
            <div class="form-group col-md-3">
                <label class="form-label">{{ __('Account No:') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Acount No:') }}"
                    autocomplete="off" name="account" value="{{ old('account',$payoption->account) }}" />
            </div>
            <div class="form-group col-md-3">
                <label class="form-label">{{ __('Status') }}</label>
                <select class="form-select" data-width="100%" name="status" id="status">
                    <option value="">{{ __('Status') }}</option>
                    @foreach (getStatus() as $status)
                        <option value="{{ $status['value'] }}" {{$payoption->status == $status['value'] ? "selected": ''}}>{{ $status['label'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <center>
                    <button type="reset"
                        class="btn btn-outline-danger">{{ __('Reset') }}</button>
                    <button type="submit"
                        class="btn btn-outline-primary">{{ __('Save') }}</button>
                </center>
            </div>
        </div>
    </form>
</div>


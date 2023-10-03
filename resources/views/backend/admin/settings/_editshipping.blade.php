<div class="modal-header">
    <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('Edit Shipping Options') }}
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="forms-sample" method="POST" action="{{ route('admin.shippingoption.update',$item->id) }}">
        @csrf @method('PUT')
        <div class="row col-md-12 mb-3">
            <div class="form-group col-md-3">
                <label class="form-label">{{ __('Name') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('title') }}"
                    autocomplete="off" name="title" value="{{ old('title',$item->title) }}" required=""
                    id="name" />
            </div>
            <div class="form-group col-md-3">
                <label class="form-label">{{ __('Details') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Details') }}"
                    autocomplete="off" name="details" value="{{ old('type',$item->details) }}" />
            </div>
            <div class="form-group col-md-3">
                <label class="form-label">{{ __('Cost') }}:</label>
                <input type="text" class="form-control" placeholder="{{ __('Cost') }}:"
                    autocomplete="off" name="cost" value="{{ old('account',$item->cost) }}" />
            </div>
            <div class="form-group col-md-3">
                <label class="form-label">{{ __('Status') }}</label>
                <select class="form-select" data-width="100%" name="status" id="status">
                    <option value="">{{ __('Status') }}</option>
                    @foreach (getStatus() as $status)
                        <option value="{{ $status['value'] }}" {{$item->status == $status['value'] ? "selected": ''}}>{{ $status['label'] }}</option>
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


@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <i data-feather="alert-circle"></i>
            {{ $error }}
        </div>
    @endforeach
@endif

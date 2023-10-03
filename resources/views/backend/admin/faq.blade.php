@extends('backend.layouts.app')

@section('title', 'FAQ')
@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        @include('includes.error')
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">{{ __('FAQ') }}</h6>
                        <a class="btn btn-outline-primary float-end" data-toggle="modal" data-target="#create" href=""
                            >{{ __('New FAQ') }}</a>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">{{ __('Sl') }}</th>
                                        <th width="20%">{{ __('Question') }}</th>
                                        <th width="60%">{{ __('Answer') }}</th>
                                        <th width="10%">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->question }}</td>
                                            <td>{{ $item->answer }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                    data-target="#edit" data-toggle="tooltip" data-placement="top"
                                                    title="Edit" data-id="{{ $item->id }}"
                                                    data-question="{{ $item->question }}" data-answer="{{ $item->answer }}"><i
                                                        data-feather="edit"></i></a>

                                                <a href="" class="btn btn-sm btn-outline-danger" data-toggle="tooltip"
                                                    data-placement="top" title="Delete"
                                                    onclick="if(confirm('Are You Sure To Delete?')){ event.preventDefault(); getElementById('delete-form-{{ $item->id }}').submit(); } else { event.preventDefault(); }"><i
                                                        data-feather="x-square"></i></a>
                                                <form action="{{ route('admin.faqs.destroy', [$item->id]) }}"
                                                    method="post" style="display: none;"
                                                    id="delete-form-{{ $item->id }}">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
                            aria-hidden="true" id="create">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">{{ __('New FAQ') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST"
                                            action="{{ route('admin.faqs.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label class="form-label">{{ __('Question') }}</label>
                                                <input type="text" class="form-control" placeholder="{{ __('Question') }}"
                                                    autocomplete="off" name="question" value="{{ old('question') }}"
                                                    required="" />
                                            </div>
                                            <div class="row mb-3">
                                                <label class="form-label">{{ __('Answer') }}</label>
                                                <textarea class="form-control" placeholder="{{ __('Answer') }}"
                                                autocomplete="off" name="answer"
                                                rows="5" required="" />{{ old('answer') }}</textarea>
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
                                </div>
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
                            aria-hidden="true" id="edit">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">
                                            {{ __('Update FAQ') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="POST" action="#" enctype="multipart/form-data"
                                            id="edit-form">
                                            @csrf
                                            @method('PUT')
                                            <div class="row mb-3">
                                                <label class="form-label">{{ __('Question') }}</label>
                                                <input type="text" class="form-control" placeholder="{{ __('Question') }}"
                                                    autocomplete="off" name="question" value="{{ old('question') }}" required=""
                                                    id="question" />
                                                <input type="hidden" name="id" id="id">
                                            </div>
                                            <div class="row mb-3">
                                                <label class="form-label">{{ __('Answer') }}</label>
                                                <textarea class="form-control" placeholder="{{ __('Answer') }}"
                                                autocomplete="off" name="answer"
                                                rows="5" required="" id="answer"/>{{ old('answer') }}</textarea>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <center>
                                                        <button type="reset"
                                                            class="btn btn-outline-danger">{{ __('Reset') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-outline-primary">{{ __('Update') }}</button>
                                                    </center>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('#edit').on("show.bs.modal", function(event) {
            let e = $(event.relatedTarget);
            let id = e.data('id');
            let question = e.data('question');
            let answer = e.data('answer');
            let action = '{{ URL::to('admin/faqs/update') }}';

            $("#edit-form").attr('action', action);
            $("#id").val(id);
            $("#question").val(question);
            $("#answer").val(answer);
        });
    </script>
@endsection

@extends('dashboard.layouts.master')

@section('title') {{__('salesman_expenses.plural')}} @endsection

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.expenses') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('salesman_expenses.index') }}">{{ __('salesman_expenses.plural') }}</a></span>
                @if($salesman_expense!=null)
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$salesman_expense->name}}</span>
                @endif
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $salesman_expense!=null ? __('salesman_expenses.actions.edit') : __('salesman_expenses.actions.create') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{$salesman_expense!=null ? route('salesman_expenses.update', $salesman_expense->id) : route('salesman_expenses.store')}}" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        @if($salesman_expense!=null) @method('PUT') @endif
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('salesman_expenses.attributes.salesman') }} <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="salesman_id" required="">
                                        <option></option>
                                        @foreach($salesmen as $salesman)
                                            <option value="{{$salesman->id}}" {{($salesman_expense!=null && $salesman_expense->salesman_id==$salesman->id) || (old('salesman_id') == $salesman->id) ? 'selected' : ''}}> {{ $salesman->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('salesman_expenses.attributes.category_id') }} <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="category_id" required="">
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{($salesman_expense!=null && $salesman_expense->category_id==$category->id) || (old('category_id') == $category->id) ? 'selected' : ''}}> {{ $category->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('salesman_expenses.attributes.title') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="title" placeholder="{{ __('salesman_expenses.attributes.title') }}" value="{{$salesman_expense!=null ? $salesman_expense->title : old('title')}}" required="" type="text">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('salesman_expenses.attributes.description') }}</label>
                                    <textarea class="form-control" name="description" placeholder="{{ __('salesman_expenses.attributes.description') }}"
                                              rows="5">{{$salesman_expense!=null ? $salesman_expense->description : old('description')}}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('salesman_expenses.attributes.value') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="value" placeholder="{{ __('salesman_expenses.attributes.value') }}" value="{{$salesman_expense!=null ? $salesman_expense->value : old('value')}}" required="" type="number">
                                </div>
                            </div>

                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">{{ $salesman_expense!=null ? __('salesman_expenses.actions.edit') : __('salesman_expenses.actions.save') }}</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection

@section('js')
    <!--Internal  Select2 js -->
    <script src="{{URL::asset('dashboard/assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal  Parsley.min js -->
    <script src="{{URL::asset('dashboard/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
    <!-- Internal Form-validation js -->
    <script src="{{URL::asset('dashboard/assets/js/form-validation.js')}}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
@endsection

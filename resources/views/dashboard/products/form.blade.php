@extends('dashboard.layouts.master')

@section('title') {{__('products.plural')}} @endsection

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{URL::asset('dashboard/assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.application') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('products.index') }}">{{ __('products.plural') }}</a></span>
                @if($product!=null)
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$product->getTranslation('title', app()->getLocale())}}</span>
                @endif
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $product!=null ? __('products.actions.edit') : __('products.actions.create') }}</span>
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
                    <form method="post" action="{{$product!=null ? route('products.update', $product->id) : route('products.store')}}" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        @if($product!=null) @method('PUT') @endif
                        <div class="row row-sm">

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('products.attributes.title') }} <span class="tx-danger">*</span></label>
                                    <div class="example">
										<div class="panel panel-primary tabs-style-1">
                                            <div class=" tab-menu-heading">
                                                <div class="tabs-menu1">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs main-nav-line">
                                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                            <li class="nav-item"><a href="#tab-title-{{ $localeCode }}" class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab">{{ $properties['native'] }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                                <div class="tab-content">
                                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                        <div class="tab-pane {{$loop->first ? 'active' : ''}}" id="tab-title-{{ $localeCode }}">
                                                            <input class="form-control" name="title[{{ $localeCode }}]" placeholder="{{ __('products.attributes.title') }}" value="{{$product!=null ? $product->getTranslation('title', $localeCode) : old('title[$localeCode]')}}" type="text" required>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('products.attributes.description') }}</label>
                                    <div class="example">
										<div class="panel panel-primary tabs-style-1">
                                            <div class=" tab-menu-heading">
                                                <div class="tabs-menu1">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs main-nav-line">
                                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                            <li class="nav-item"><a href="#tab-description-{{ $localeCode }}" class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab">{{ $properties['native'] }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                                <div class="tab-content">
                                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                        <div class="tab-pane {{$loop->first ? 'active' : ''}}" id="tab-description-{{ $localeCode }}">
                                                            <textarea class="form-control" name="description[{{ $localeCode }}]" placeholder="{{ __('products.attributes.description') }}"
                                                            rows="5">{{$product!=null ? $product->getTranslation('description', $localeCode) : old('description[$localeCode]')}}</textarea>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('products.attributes.cash_price') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="cash_price" placeholder="{{ __('products.attributes.cash_price') }}" value="{{$product!=null ? $product->cash_price : old('cash_price')}}" required="" type="number" step=".01">
                                </div>
                            </div>

                            <div class="col-12 d-none">
                                <div class="form-group">
                                    <label class="form-label">{{ __('products.attributes.quantity') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="quantity" placeholder="{{ __('products.attributes.quantity') }}" value="{{$product!=null ? $product->quantity : old('quantity', 0)}}" required="" type="number">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('products.attributes.image') }} <span class="tx-danger">*</span></label>
                                    <input type="file" name="image" class="dropify" data-default-file="{{$product!=null ? $product->getImage() : ''}}" data-height="200" />
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('products.attributes.status') }} <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-no-search" name="status" require="">
                                        @foreach(App\Enums\ProductStatusEnum::options() as $key=>$value)
                                            <option value="{{$key}}" {{$product!=null && $product->status->value==$key ? 'selected' : ''}}> {{ $value }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">{{ $product!=null ? __('products.actions.edit') : __('products.actions.save') }}</button></div>
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
    <!-- Internal Input tags js-->
    <script src="{{URL::asset('dashboard/assets/plugins/inputtags/inputtags.js')}}"></script>
@endsection

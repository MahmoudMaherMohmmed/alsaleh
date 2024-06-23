@extends('dashboard.layouts.master')

@section('title') {{__('customers.plural')}} @endsection

@section('css')
    <!--- Internal Select2 css-->
    <link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.users') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('customers.index') }}">{{ __('customers.plural') }}</a></span>
                @if($customer!=null)
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$customer->name}}</span>
                @endif
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $customer!=null ? __('customers.actions.edit') : __('customers.actions.create') }}</span>
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
                    <form method="post" action="{{$customer!=null ? route('customers.update', $customer->id) : route('customers.store')}}" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        @if($customer!=null) @method('PUT') @endif
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('car_salesmen.attributes.salesman') }} <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="salesman_id" required="" {{$customer!=null ? 'disabled' : ''}}>
                                        <option></option>
                                        @foreach($salesmen as $salesman)
                                            <option value="{{$salesman->id}}" {{($customer!=null && $customer->salesman_id==$salesman->id) || (old('salesman_id') == $salesman->id) ? 'selected' : ''}}> {{ $salesman->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('customers.attributes.name') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name" placeholder="{{ __('customers.attributes.name') }}" value="{{$customer!=null ? $customer->name : old('name')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('customers.attributes.phone') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="phone" placeholder="{{ __('customers.attributes.phone') }}" value="{{$customer!=null ? $customer->phone : old('phone')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('customers.attributes.phone_2') }}</label>
                                    <input class="form-control" name="phone_2" placeholder="{{ __('customers.attributes.phone_2') }}" value="{{$customer!=null ? $customer->phone_2 : old('phone_2')}}" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('areas.singular') }} <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="area_id" required="">
                                        <option></option>
                                        @foreach($areas as $area)
                                            <option value="{{$area->id}}" {{($customer!=null && $customer->area_id==$area->id) || (old('area_id') == $area->id)? 'selected' : ''}}> {{ $area->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('customers.attributes.address') }} <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="address" placeholder="{{ __('customers.attributes.address') }}"
                                              rows="5">{{$customer!=null ? $customer->address : old('address')}}</textarea>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('customers.attributes.lat') }}</label>
                                    <input class="form-control" name="lat" placeholder="{{ __('customers.attributes.lat') }}" value="{{$customer!=null ? $customer->lat : old('lat')}}" type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('customers.attributes.lng') }}</label>
                                    <input class="form-control" name="lng" placeholder="{{ __('customers.attributes.lng') }}" value="{{$customer!=null ? $customer->lng : old('lng')}}" type="text">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('customers.attributes.status') }} <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-no-search" name="status" required="">
                                        @foreach(App\Enums\CustomerStatusEnum::options() as $key=>$value)
                                            <option value="{{$key}}" {{$customer!=null && $customer->status->value==$key ? 'selected' : ''}}> {{ $value }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">{{ $customer!=null ? __('customers.actions.edit') : __('customers.actions.save') }}</button></div>
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

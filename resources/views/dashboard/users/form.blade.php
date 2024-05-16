@extends('dashboard.layouts.master')

@section('title') {{__('admins.plural')}} @endsection

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
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('users.index') }}">{{ __('admins.plural') }}</a></span>
                @if($user!=null)
                    <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$user->name}}</span>
                @endif
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $user!=null ? __('admins.actions.edit') : __('admins.actions.create') }}</span>
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
                    <form method="post" action="{{$user!=null ? route('users.update', $user->id) : route('users.store')}}" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        @if($user!=null) @method('PUT') @endif
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('admins.attributes.name') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="name" placeholder="{{ __('admins.attributes.name') }}" value="{{$user!=null ? $user->name : old('name')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('admins.attributes.email') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="email" placeholder="{{ __('admins.attributes.email') }}" value="{{$user!=null ? $user->email : old('email')}}" required="" type="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('admins.attributes.phone') }} <span class="tx-danger">*</span></label>
                                    <input class="form-control" name="phone" placeholder="{{ __('admins.attributes.phone') }}" value="{{$user!=null ? $user->phone : old('phone')}}" required="" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('admins.attributes.password') }} @if($user==null)<span class="tx-danger">*</span>@endif</label>
                                    <input class="form-control" name="password" placeholder="{{ __('admins.attributes.password') }}" {{$user== null ? 'required' : ''}} type="password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('admins.attributes.password_confirmation') }} @if($user==null)<span class="tx-danger">*</span>@endif</label>
                                    <input class="form-control" name="password_confirmation" placeholder="{{ __('admins.attributes.password_confirmation') }}" {{$user== null ? 'required' : ''}} type="password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('admins.attributes.avatar') }} <span class="tx-danger">*</span></label>
                                    <input type="file" name="image" class="dropify" data-default-file="{{$user!=null ? $user->getAvatar() : ''}}" data-height="200" />
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('admins.attributes.status') }} <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-no-search" name="status" require="">
                                        @foreach(App\Enums\UserStatusEnum::options() as $key=>$value)
                                            <option value="{{$key}}" {{$user!=null && $user->status->value==$key ? 'selected' : ''}}> {{ $value }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12"><button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">{{ $user!=null ? __('admins.actions.edit') : __('admins.actions.save') }}</button></div>
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
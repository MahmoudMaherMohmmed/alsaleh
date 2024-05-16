@extends('dashboard.layouts.master')

@section('title') {{__('settings.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.application') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('settings.index') }}">{{ __('settings.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $setting->getTranslation('title', app()->getLocale()) }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.id') }}</th>
                                    <td>{{$setting->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.title') }}</th>
                                    <td>{{$setting->getTranslation('title', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.description') }}</th>
                                    <td>{{$setting->getTranslation('description', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.whatsapp_number') }}</th>
                                    <td>{{$setting->whatsapp_number}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.calling_number') }}</th>
                                    <td>{{$setting->calling_number}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.info_email') }}</th>
                                    <td>{{$setting->info_email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.support_email') }}</th>
                                    <td>{{$setting->support_email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.created_at') }}</th>
                                    <td>{{$setting->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.attributes.image') }}</th>
                                    <td> <img class="brround" height="200px" width="200px" src="{{$setting->getImage()}}"> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('settings.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.settings.partials.actions.edit')
                                        {{--@include('dashboard.settings.partials.actions.delete')--}}
                                    </td>
                                    {{--@include('dashboard.settings.partials.models.delete')--}}
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection

@section('js') @endsection

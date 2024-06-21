@extends('dashboard.layouts.master')

@section('title') {{__('areas.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.application') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('areas.index') }}">{{ __('areas.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $area->getTranslation('title', app()->getLocale()) }}</span>
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
            <div class="aread">
                <div class="aread-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <tbody>
                                <tr>
                                    <th scope="row">{{ __('areas.attributes.id') }}</th>
                                    <td>{{$area->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('areas.attributes.title') }}</th>
                                    <td>{{$area->getTranslation('title', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('areas.attributes.description') }}</th>
                                    <td>{{$area->getTranslation('description', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('areas.attributes.status') }}</th>
                                    <td> <span class="badge {{$area->status->color()}}">{{$area->status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('areas.attributes.created_at') }}</th>
                                    <td>{{$area->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('areas.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.areas.partials.actions.edit')
                                        @include('dashboard.areas.partials.actions.delete')
                                    </td>
                                    @include('dashboard.areas.partials.models.delete')
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

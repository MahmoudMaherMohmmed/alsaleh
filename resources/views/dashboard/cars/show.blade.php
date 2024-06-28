@extends('dashboard.layouts.master')

@section('title') {{__('cars.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.application') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('cars.index') }}">{{ __('cars.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $car->getTranslation('title', app()->getLocale()) }}</span>
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
                                    <th scope="row">{{ __('cars.attributes.id') }}</th>
                                    <td>{{$car->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('cars.attributes.title') }}</th>
                                    <td>{{$car->getTranslation('title', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('cars.attributes.description') }}</th>
                                    <td>{{$car->getTranslation('description', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('cars.attributes.chassis_number') }}</th>
                                    <td>{{$car->chassis_number}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('cars.attributes.license_number') }}</th>
                                    <td>{{$car->license_number}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('cars.attributes.status') }}</th>
                                    <td> <span class="badge {{$car->status->color()}}">{{$car->status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('cars.attributes.created_at') }}</th>
                                    <td>{{$car->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('cars.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.cars.partials.actions.products')
                                        @include('dashboard.cars.partials.actions.edit')
                                        @include('dashboard.cars.partials.actions.delete')
                                    </td>
                                    @include('dashboard.cars.partials.models.delete')
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

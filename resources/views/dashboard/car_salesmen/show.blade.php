@extends('dashboard.layouts.master')

@section('title') {{__('car_salesmen.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('sales.plural') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('car_salesmen.index') }}">{{ __('car_salesmen.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$car_salesman->car->title}}</span>
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
                                    <th scope="row">{{ __('car_salesmen.attributes.id') }}</th>
                                    <td>{{$car_salesman->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('car_salesmen.attributes.car') }}</th>
                                    <td>{{$car_salesman->car->title}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('car_salesmen.attributes.salesman') }}</th>
                                    <td>{{$car_salesman->salesman->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('car_salesmen.attributes.salesman_assistant') }}</th>
                                    <td>{{$car_salesman->salesman_assistant->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('car_salesmen.attributes.start_date') }}</th>
                                    <td>{{$car_salesman->start_date}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('car_salesmen.attributes.end_date') }}</th>
                                    <td>{{$car_salesman->end_date}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('car_salesmen.attributes.created_at') }}</th>
                                    <td>{{$car_salesman->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('car_salesmen.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.car_salesmen.partials.actions.edit')
                                        @include('dashboard.car_salesmen.partials.actions.delete')
                                    </td>
                                    @include('dashboard.car_salesmen.partials.models.delete')
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

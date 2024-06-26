@extends('dashboard.layouts.master')

@section('title') {{__('salesmen.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.users') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('salesmen.index') }}">{{ __('salesmen.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$salesman->name}}</span>
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
                                    <th scope="row">{{ __('salesmen.attributes.id') }}</th>
                                    <td>{{$salesman->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.attributes.name') }}</th>
                                    <td>{{$salesman->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.attributes.email') }}</th>
                                    <td>{{$salesman->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.attributes.phone') }}</th>
                                    <td>{{$salesman->phone}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.attributes.report_filters_status') }}</th>
                                    <td> <span class="badge {{$salesman->report_filters_status->color()}}">{{$salesman->report_filters_status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.attributes.status') }}</th>
                                    <td> <span class="badge {{$salesman->status->color()}}">{{$salesman->status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.attributes.created_at') }}</th>
                                    <td>{{$salesman->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.attributes.avatar') }}</th>
                                    <td> <img class="brround" height="200px" width="200px" src="{{$salesman->getAvatar()}}"> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.salesmen.partials.actions.edit')
                                        @include('dashboard.salesmen.partials.actions.delete')
                                    </td>
                                    @include('dashboard.salesmen.partials.models.delete')
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

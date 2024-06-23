@extends('dashboard.layouts.master')

@section('title') {{__('customers.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.users') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('customers.index') }}">{{ __('customers.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$customer->name}}</span>
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
                                    <th scope="row">{{ __('customers.attributes.id') }}</th>
                                    <td>{{$customer->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.reference_id') }}</th>
                                    <td>{{$customer->reference_id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesmen.singular') }}</th>
                                    <td>
                                        <a href="{{ route('salesmen.show', $customer->salesman) }}" target="_blank">{{$customer->salesman->name}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.name') }}</th>
                                    <td>{{$customer->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.phone') }}</th>
                                    <td>{{$customer->phone}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.phone_2') }}</th>
                                    <td>{{$customer->phone_2}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('areas.singular') }}</th>
                                    <td>
                                        <a href="{{ route('areas.show', $customer->area) }}" target="_blank">{{$customer->area->title}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.address') }}</th>
                                    <td>{{$customer->address}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.lat') }}</th>
                                    <td>{{$customer->lat}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.lng') }}</th>
                                    <td>{{$customer->lng}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.status') }}</th>
                                    <td> <span class="badge {{$customer->status->color()}}">{{$customer->status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.attributes.created_at') }}</th>
                                    <td>{{$customer->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('customers.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.customers.partials.actions.edit')
                                        @include('dashboard.customers.partials.actions.delete')
                                    </td>
                                    @include('dashboard.customers.partials.models.delete')
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

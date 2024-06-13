@extends('dashboard.layouts.master')

@section('title') {{__('sales.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('sales.plural') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('sales.index') }}">{{ __('sales.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$sale->customer->name}} - {{ $sale->product->getTranslation('title', app()->getLocale()) }}</span>
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
                                    <th scope="row">{{ __('sales.attributes.id') }}</th>
                                    <td>{{$sale->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.customer_id') }}</th>
                                    <td><a href="{{ route('customers.show', $sale->customer) }}" target="_blank">{{$sale->customer->name}}</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.product_id') }}</th>
                                    <td>
                                        <a href="{{ route('products.show', $sale->product) }}" target="_blank">
                                            {{$sale->product->getTranslation('title', app()->getLocale())}}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.date') }}</th>
                                    <td>{{$sale->date}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.type') }}</th>
                                    <td> <span class="badge {{$sale->type->color()}}">{{$sale->type->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.price') }}</th>
                                    <td>{{$sale->price}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.car_id') }}</th>
                                    <td>
                                        <a href="{{ route('cars.show', $sale->car) }}" target="_blank">
                                            {{$sale->car->getTranslation('title', app()->getLocale())}}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.salesman_id') }}</th>
                                    <td><a href="{{ route('salesmen.show', $sale->salesman) }}" target="_blank">{{$sale->salesman->name}}</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.salesman_profit_percentage') }}</th>
                                    <td>{{$sale->salesman_profit_percentage}} %</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.salesman_profit') }}</th>
                                    <td>{{$sale->salesman_profit}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.salesman_assistant_id') }}</th>
                                    <td><a href="{{ route('salesmen.show', $sale->salesman_assistant) }}" target="_blank">{{$sale->salesman_assistant->name}}</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.salesman_assistant_profit_percentage') }}</th>
                                    <td>{{$sale->salesman_assistant_profit_percentage}} %</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.salesman_assistant_profit') }}</th>
                                    <td>{{$sale->salesman_assistant_profit}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.status') }}</th>
                                    <td> <span class="badge {{$sale->status->color()}}">{{$sale->status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('sales.attributes.created_at') }}</th>
                                    <td>{{$sale->created_at->diffForHumans()}}</td>
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

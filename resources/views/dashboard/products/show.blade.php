@extends('dashboard.layouts.master')

@section('title') {{__('products.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.application') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('products.index') }}">{{ __('products.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $product->getTranslation('title', app()->getLocale()) }}</span>
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
                                    <th scope="row">{{ __('products.attributes.id') }}</th>
                                    <td>{{$product->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.attributes.title') }}</th>
                                    <td>{{$product->getTranslation('title', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.attributes.description') }}</th>
                                    <td>{{$product->getTranslation('description', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.attributes.cash_price') }}</th>
                                    <td>{{$product->cash_price}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.attributes.installment_price') }}</th>
                                    <td>{{$product->installments()->sum('value')}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.attributes.installments_count') }}</th>
                                    <td>{{$product->installments()->count()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.attributes.status') }}</th>
                                    <td> <span class="badge {{$product->status->color()}}">{{$product->status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.attributes.image') }}</th>
                                    <td> <img class="brround" height="200px" width="200px" src="{{$product->getImage()}}"> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.attributes.created_at') }}</th>
                                    <td>{{$product->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('products.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.products.partials.actions.edit')
                                        @include('dashboard.products.partials.actions.installments')
                                        @include('dashboard.products.partials.actions.delete')
                                    </td>
                                    @include('dashboard.products.partials.models.delete')
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

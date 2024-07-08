@extends('dashboard.layouts.master')

@section('title') {{__('expense_categories.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.expenses') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('expense_categories.index') }}">{{ __('expense_categories.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ $expense_category->getTranslation('title', app()->getLocale()) }}</span>
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
                                    <th scope="row">{{ __('expense_categories.attributes.id') }}</th>
                                    <td>{{$expense_category->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('expense_categories.attributes.title') }}</th>
                                    <td>{{$expense_category->getTranslation('title', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('expense_categories.attributes.description') }}</th>
                                    <td>{{$expense_category->getTranslation('description', app()->getLocale())}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('expense_categories.attributes.type') }}</th>
                                    <td> <span class="badge {{$expense_category->type->color()}}">{{$expense_category->type->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('expense_categories.attributes.status') }}</th>
                                    <td> <span class="badge {{$expense_category->status->color()}}">{{$expense_category->status->trans()}}</span> </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('expense_categories.attributes.created_at') }}</th>
                                    <td>{{$expense_category->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('expense_categories.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.expenses.categories.partials.actions.edit')
                                        @include('dashboard.expenses.categories.partials.actions.delete')
                                    </td>
                                    @include('dashboard.expenses.categories.partials.models.delete')
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

@extends('dashboard.layouts.master')

@section('title') {{__('salesman_expenses.plural')}} @endsection

@section('css') @endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.expenses') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('salesman_expenses.index') }}">{{ __('salesman_expenses.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$salesman_expense->salesman->name}} - {{$salesman_expense->title}}</span>
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
                                    <th scope="row">{{ __('salesman_expenses.attributes.id') }}</th>
                                    <td>{{$salesman_expense->id}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesman_expenses.attributes.salesman') }}</th>
                                    <td><a href="{{ route('salesmen.show', $salesman_expense->salesman) }}" target="_blank">{{$salesman_expense->salesman->name}}</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesman_expenses.attributes.category_id') }}</th>
                                    <td>
                                        <a href="{{ route('expense_categories.show', $salesman_expense->category) }}" target="_blank">
                                            {{$salesman_expense->category->getTranslation('title', app()->getLocale())}}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesman_expenses.attributes.title') }}</th>
                                    <td>{{$salesman_expense->title}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesman_expenses.attributes.description') }}</th>
                                    <td>{{$salesman_expense->description}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesman_expenses.attributes.value') }}</th>
                                    <td>{{$salesman_expense->value}} {{__('dashboard.usd')}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesman_expenses.attributes.created_at') }}</th>
                                    <td>{{$salesman_expense->created_at->diffForHumans()}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('salesman_expenses.actions.actions') }}</th>
                                    <td>
                                        @include('dashboard.expenses.salesman.partials.actions.edit')
                                        @include('dashboard.expenses.salesman.partials.actions.delete')
                                    </td>
                                    @include('dashboard.expenses.salesman.partials.models.delete')
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

@extends('dashboard.layouts.master')

@section('title') {{__('salesman_expenses.plural')}} @endsection

@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.expenses') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('salesman_expenses.plural') }}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            @include('dashboard.expenses.salesman.partials.actions.create')
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
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('salesman_expenses.attributes.id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('salesman_expenses.attributes.salesman_id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('salesman_expenses.attributes.category_id') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('salesman_expenses.attributes.title') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('salesman_expenses.attributes.value') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('salesman_expenses.attributes.created_at') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('salesman_expenses.actions.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salesman_expenses as $salesman_expense)
                                    <tr>
                                        <td>{{$salesman_expense->id}}</td>
                                        <td>
                                            <a href="{{ route('salesmen.show', $salesman_expense->salesman) }}" target="_blank">{{$salesman_expense->salesman->name}}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('expense_categories.show', $salesman_expense->category) }}" target="_blank">
                                                {{$salesman_expense->category->getTranslation('title', app()->getLocale())}}
                                            </a>
                                        </td>
                                        <td>{{$salesman_expense->title}}</td>
                                        <td>{{$salesman_expense->value}} {{__('dashboard.usd')}}</td>
                                        <td>{{$salesman_expense->created_at}}</td>
                                        <td>
                                            @include('dashboard.expenses.salesman.partials.actions.show')
                                            @include('dashboard.expenses.salesman.partials.actions.edit')
                                            @include('dashboard.expenses.salesman.partials.actions.delete')
                                        </td>
                                    </tr>

                                    @include('dashboard.expenses.salesman.partials.models.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection

@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('dashboard/assets/js/table-data.js')}}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('dashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('dashboard/assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('dashboard/assets/js/modal.js')}}"></script>
@endsection

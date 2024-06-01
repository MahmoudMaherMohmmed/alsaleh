@extends('dashboard.layouts.master')

@section('title') {{__('car_salesmen.plural')}} @endsection

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
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.application') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('car_salesmen.plural') }}</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            @include('dashboard.car_salesmen.partials.actions.create')
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
                                    <th class="wd-15p border-bottom-0">{{ __('car_salesmen.attributes.id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('car_salesmen.attributes.car') }}</th>
                                    <th class="wd-20p border-bottom-0">{{ __('car_salesmen.attributes.salesman') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('car_salesmen.attributes.salesman_assistant') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('car_salesmen.attributes.start_date') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('car_salesmen.attributes.end_date') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('car_salesmen.attributes.created_at') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('car_salesmen.actions.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($car_salesmen as $car_salesman)
                                    <tr>
                                        <td>{{$car_salesman->id}}</td>
                                        <td>{{$car_salesman->car->title}}</td>
                                        <td>{{$car_salesman->salesman->name}}</td>
                                        <td>{{$car_salesman->salesman_assistant->name}}</td>
                                        <td>{{$car_salesman->start_date}}</td>
                                        <td>{{$car_salesman->end_date}}</td>
                                        <td>{{$car_salesman->created_at->diffForHumans()}}</td>
                                        <td>
                                            @include('dashboard.car_salesmen.partials.actions.show')
                                            @include('dashboard.car_salesmen.partials.actions.edit')
                                            @include('dashboard.car_salesmen.partials.actions.delete')
                                        </td>
                                    </tr>

                                    @include('dashboard.car_salesmen.partials.models.delete')
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

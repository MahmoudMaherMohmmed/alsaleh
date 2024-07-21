@extends('dashboard.layouts.master')

@section('title') {{__('warehouse_trackings.plural')}} @endsection

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
                <h4 class="content-title mb-0 my-auto">{{ __('warehouses.plural') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('warehouses.index') }}">{{ __('warehouses.actions.list') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('warehouse_trackings.plural') }}</span>
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
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">{{ __('warehouse_trackings.attributes.user') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('warehouse_trackings.attributes.product') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('warehouse_trackings.attributes.quantity') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('warehouse_trackings.attributes.type') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('warehouse_trackings.attributes.created_at') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warehouse_tracking_products as $warehouse_tracking_product)
                                <tr>
                                    <td>
                                        <a href="{{ route('users.show', $warehouse_tracking_product->user) }}" target="_blank">
                                            {{$warehouse_tracking_product->user->name}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $warehouse_tracking_product->product) }}" target="_blank">
                                            {{$warehouse_tracking_product->product->getTranslation('title', app()->getLocale())}}
                                        </a>
                                    </td>
                                    <td>{{$warehouse_tracking_product->quantity}}</td>
                                    <td>
                                        <span class="badge {{$warehouse_tracking_product->type->color()}}">{{$warehouse_tracking_product->type->trans()}}</span>
                                    </td>
                                    <td style="direction: ltr;">{{$warehouse_tracking_product->created_at}}</td>
                                </tr>
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
@endsection

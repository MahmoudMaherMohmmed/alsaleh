@extends('dashboard.layouts.master')

@section('title') {{__('car_product_trackings.plural')}} @endsection

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
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('cars.index') }}">{{ __('cars.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('cars.show', $car) }}">{{ $car->getTranslation('title', app()->getLocale()) }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ <a href="{{ route('cars.products', $car) }}">{{ __('products.plural') }}</a></span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('car_product_trackings.plural') }}</span>
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
                                <th class="wd-15p border-bottom-0">{{ __('car_product_trackings.attributes.user') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('car_product_trackings.attributes.car') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('car_product_trackings.attributes.product') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('car_product_trackings.attributes.quantity') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('car_product_trackings.attributes.type') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('car_product_trackings.attributes.created_at') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($car_products_trackings as $car_product_tracking)
                                <tr>
                                    <td>
                                        <a href="{{ route('users.show', $car_product_tracking->trackingable->id) }}" target="_blank">
                                            {{$car_product_tracking->trackingable->name}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('cars.show', $car_product_tracking->car) }}" target="_blank">
                                            {{$car_product_tracking->car->getTranslation('title', app()->getLocale())}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $car_product_tracking->product) }}" target="_blank">
                                            {{$car_product_tracking->product->getTranslation('title', app()->getLocale())}}
                                        </a>
                                    </td>
                                    <td>{{$car_product_tracking->quantity}}</td>
                                    <td>
                                        <span class="badge {{$car_product_tracking->type->color()}}">{{$car_product_tracking->type->trans()}}</span>
                                    </td>
                                    <td style="direction: ltr;">{{$car_product_tracking->created_at}}</td>
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

@extends('dashboard.layouts.master')

@section('title') {{__('sales.plural')}} @endsection

@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

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

    @if($sale->type == App\Enums\SaleTypeEnum::INSTALLMENT)
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
                                <th class="wd-15p border-bottom-0">{{ __('sale_installments.attributes.id') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('sale_installments.attributes.title') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('sale_installments.attributes.value') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('sale_installments.attributes.due_date') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('sale_installments.attributes.status') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('sale_installments.actions.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sale->installments as $sale_installment)
                                <tr>
                                    <td>{{$sale_installment->id}}</td>
                                    <td>{{$sale_installment->getTranslation('title', app()->getLocale())}}</td>
                                    <td>{{$sale_installment->value}}</td>
                                    <td>{{$sale_installment->due_date}}</td>
                                    <td>
                                        <span class="badge {{$sale_installment->status->color()}}">{{$sale_installment->status->trans()}}</span>
                                    </td>
                                    <td>
{{--                                        @include('dashboard.sale_installments.partials.actions.edit')--}}
{{--                                        @include('dashboard.sale_installments.partials.actions.delete')--}}
                                    </td>
                                </tr>

{{--                                @include('dashboard.sale_installments.partials.models.edit')--}}
{{--                                @include('dashboard.sale_installments.partials.models.delete')--}}
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
    @endif
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

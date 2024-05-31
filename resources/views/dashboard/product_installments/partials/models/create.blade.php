<div class="modal" id="product-installment-create-model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <p>@lang('product_installments.actions.create')</p><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('product_installments.store')}}" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" value="{{$product->id}}">

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">{{ __('product_installments.attributes.title') }} <span class="tx-danger">*</span></label>
                            <div class="example">
                                <div class="panel panel-primary tabs-style-1">
                                    <div class=" tab-menu-heading">
                                        <div class="tabs-menu1">
                                            <!-- Tabs -->
                                            <ul class="nav panel-tabs main-nav-line">
                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                    <li class="nav-item"><a href="#tab-title-{{ $localeCode }}" class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab">{{ $properties['native'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                        <div class="tab-content">
                                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <div class="tab-pane {{$loop->first ? 'active' : ''}}" id="tab-title-{{ $localeCode }}">
                                                    <input class="form-control" name="title[{{ $localeCode }}]" placeholder="{{ __('product_installments.attributes.title') }}" type="text" required>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">{{ __('product_installments.attributes.value') }} <span class="tx-danger">*</span></label>
                            <input class="form-control" name="value" placeholder="{{ __('product_installments.attributes.value') }}" required="" type="number" step=".01">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">{{ __('product_installments.attributes.status') }} <span class="tx-danger">*</span></label>
                            <select class="form-control select2-no-search" name="status" require="">
                                @foreach(App\Enums\ProductInstallmentStatusEnum::options() as $key=>$value)
                                    <option value="{{$key}}"> {{ $value }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="button" class="btn ripple btn-secondary" data-dismiss="modal">
                        @lang('product_installments.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn ripple btn-primary">
                        @lang('product_installments.actions.save')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="damaged-model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <p>@lang('warehouses.actions.damaged')</p><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('warehouses.damaged')}}" method="POST">
                    @csrf

                    <div class="col-12">
                        <div class="form-group">
                            <label
                                class="form-label">{{ __('warehouses.attributes.product') }}
                                <span class="tx-danger">*</span></label>
                            <select class="form-control" name="product_id" required="">
                                <option selected disabled hidden>{{__('products.select')}}</option>
                                @foreach($warehouse_products as $warehouse_product)
                                    <option value="{{$warehouse_product->product->id}}"> {{ $warehouse_product->product->getTranslation('title', app()->getLocale()) }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">{{ __('warehouses.attributes.quantity') }} <span class="tx-danger">*</span></label>
                            <input class="form-control" name="quantity" placeholder="{{ __('warehouses.attributes.quantity') }}" required="" type="number">
                        </div>
                    </div>

                    <button type="button" class="btn ripple btn-secondary" data-dismiss="modal">
                        @lang('warehouses.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn ripple btn-primary">
                        @lang('warehouses.actions.save')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

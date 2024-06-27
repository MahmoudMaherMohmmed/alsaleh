<div class="modal" id="add-car-product-model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <p>@lang('car_products.actions.create')</p><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{route('car_products.store')}}" method="POST">
                    @csrf

                    <input type="hidden" name="car_id" value="{{$car->id}}">

                    <div class="col-12">
                        <div class="form-group">
                            <label
                                class="form-label">{{ __('car_products.attributes.product') }}
                                <span class="tx-danger">*</span></label>
                            <select class="form-control" name="product_id" required="">
                                <option selected disabled hidden>{{__('products.select')}}</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}"> {{ $product->title }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">{{ __('car_products.attributes.quantity') }} <span class="tx-danger">*</span></label>
                            <input class="form-control" name="quantity" placeholder="{{ __('car_products.attributes.quantity') }}" required="" type="number">
                        </div>
                    </div>

                    <button type="button" class="btn ripple btn-secondary" data-dismiss="modal">
                        @lang('car_products.dialogs.delete.cancel')
                    </button>
                    <button type="submit" class="btn ripple btn-primary">
                        @lang('car_products.actions.save')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

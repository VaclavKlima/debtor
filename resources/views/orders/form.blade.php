@props([
'users' => [],
'orderId' => null,
])
<div class="row" x-data="orderForm" x-init="order.id = @js($orderId)">
    <template x-for="validationError in validationErrors" :key="validationError">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible p-2" role="alert">
                <button type="button" class="btn-close pb-1" data-bs-dismiss="alert" aria-label="Close"></button>
                <p class="mb-0 " x-text="validationError"></p>
            </div>
        </div>
    </template>

    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
                <x-form.text name="title" :title="trans('validation.attributes.title')" x-model="order.title"/>
            </div>
            <div class="col-md-6">
                <x-form.search-select name="user_id" :title="trans('orders.order_owner')" :options="$users"/>
            </div>

        </div>
        <hr>

        <template x-for="item in order.order_items">
            <div class="row mt-2">
                <div class="col-md-3">
                    <x-form.text :placeholder="trans('validation.attributes.name')" x-model="item.name"/>
                </div>
                <div class="col-md-3">
                    <x-form.select :options="$users" x-model="item.user_id"/>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="number" min="1" class="form-control" placeholder="Quantity" x-model="item.quantity">
                        <span class="input-group-text">
                            <i class="fa fa-times"></i>
                        </span>
                        <input type="number" class="form-control" placeholder="Price" x-model="item.price" step="2">
                        <span class="input-group-text">
                            CZK
                        </span>
                        <span class="input-group-text ">
                            <strong>=</strong>
                        </span>
                        <input type="number" class="form-control" x-model.lazy="item.total_price" step="2">
                        <span class="input-group-text">
                            CZK
                        </span>
                        <button type="button" class="btn btn-alt-danger" :disabled="order.order_items.length <= 1" x-on:click="removeOrderItem(item)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>

                </div>
                <div class="col-md-12">
                    <hr class="my-0">
                </div>
            </div>
        </template>

        <div class="row">
            <div class="col-md-12 d-flex justify-content-end mt-2">
                <div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <strong>
                                @lang('orders.total_price'):
                            </strong>
                        </span>
                        <input type="number" class="form-control" step="2" x-model.lazy="order.total_price">
                        <span class="input-group-text">
                            <strong>CZK</strong>
                        </span>
                        <button class="btn btn-alt-success" x-on:click="addOrderItem()">
                            <i class="fa fa-square-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <x-form.file :title="trans('orders.order_receipt')" name="image" x-on:input="saveImage" accept="image/*"/>
                <hr>
            </div>
            <div x-show="order.image_url" class="col-md-12">
                <img :src="order.image_url" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <div class="col-md-12 text-end">
        <button type="button" class="btn btn-alt-success" x-on:click="saveOrder">
            <i class="fa fa-save"></i>
        @lang('orders.save_order')
    </div>
</div>

<div id="products_invoice_data" data_url="{{route('functions.products_invoice_data',['invoice'=>$invoice->id])}}"></div>

<form class="mb-0" id="productForm" name="template-contactform" action="{{route('functions.store_invoice_product', ['invoice'=>$invoice->id])}}" method="POST">
    @csrf

    <div class="row">
        
        <div class="col-md-4 form-group">
            <div class="white-section">
                <label>Products:</label>
                <select class="selectpicker" id="product_select" name="product_select" data-live-search="true" title="Select Product" data-show-subtext="true">
                    @foreach ($products as $product)
                        <option value="{{$product->id}}" data-subtext="{{$product->Price}}" data-price="{{$product->Price}}">{{$product->Name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4 form-group">
            <label for="price">Price <small>*</small></label>
            <input type="number" name="price" id="price" value="" class="sm-form-control" readonly/>
        </div>

        <div class="col-md-4 form-group">
            <label for="price">Quantity <small>*</small></label>
            <input type="number" name="quantity" id="quantity" value="" class="sm-form-control" min="1" step="1"/>
        </div>
        
        <div class="col-md-4 form-group mt-2">
            <button class="btn_save_product button button-3d button-rounded button-green mt-4"><i class="icon-save2"></i> Add</button>
        </div>



        <div class="w-100"></div>

        <div class="col-12 form-group d-none">
            <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
        </div>
    </div>
    <input type="hidden" name="prefix" value="template-contactform-">
</form>
@isset($invoice)
    <x-modal>
        @slot('title')
            Edit Invoice
        @endslot
        @slot('content')
        <div id="basic">
            <form class="mb-0" id="DynamicForm" name="template-contactform" action="{{route('functions.update_invoice', ['invoice'=>$invoice->id])}}" method="POST">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group">
                        <div class="white-section">
                            <label>Clients:</label>
                            <select class="selectpicker" id="client" name="client" data-live-search="true" title="Select Client">
                                @foreach ($clients as $client)
                                    <option value="{{$client->id}}" data-subtext="">{{$client->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                    <div class="col-md-6 bottommargin-sm">
                        <label for="">Date &amp; Time Picker</label>
                        <div class="form-group">
                            <div class="input-group text-start" data-target-input="nearest" data-target=".datetimepicker">
                                <input type="text" id="date" name="date" class="form-control datetimepicker-input datetimepicker" data-target=".datetimepicker" placeholder="DD-MM-YYYY 00:00 AM/PM" value="{{\Carbon\Carbon::create($invoice->Date)->format('m/d/Y G:i A')}}"/>
                                <div class="input-group-text" data-target=".datetimepicker" data-toggle="datetimepicker"><i class="icon-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#client').val({{$invoice->client->id}});
                        $('#client').selectpicker('refresh');
                    </script>

                    <div class="w-100"></div>

                    <div class="col-12 form-group d-none">
                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                    </div>
                </div>
                <input type="hidden" name="prefix" value="template-contactform-">
                <div class="col-12 form-group">
                    <button class="btn_update button button-3d button-rounded button-green"><i class="icon-save2"></i> Update</button>
                </div>
            </form>
        </div>
        <div id="product_data">

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
        </div>
        <div id="product_table_div">
            <table id="product_invoice_table" class="table table-striped table-bordered cart" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="cart-product-remove">Options</th>
                        <th class="cart-product-name">Product</th>
                        <th class="cart-product-price">Unit Price</th>
                        <th class="cart-product-quantity">Quantity</th>
                        <th class="cart-product-subtotal">Total</th>
                    </tr>
                </thead>
                <tbody>
        
                </tbody>
            </table>
        </div>
        @endslot

    </x-modal>

@else
<x-modal>
    @slot('title')
        Add Invoice
    @endslot
    @slot('content')
    <div id="basic">
        <form class="mb-0" id="DynamicForm" name="template-contactform" action="{{route('functions.store_invoice')}}" method="POST">
            @csrf
            <div class="form-process">
                <div class="css3-spinner">
                    <div class="css3-spinner-scaler"></div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6 form-group">
                    <div class="white-section">
                        <label>Clients:</label>
                        <select class="selectpicker" id="client" name="client" data-live-search="true" title="Select Client">
                            @foreach ($clients as $client)
                                <option value="{{$client->id}}" data-subtext="">{{$client->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 bottommargin-sm">
                    <label for="">Date &amp; Time Picker</label>
                    <div class="form-group">
                        <div class="input-group text-start" data-target-input="nearest" data-target=".datetimepicker">
                            <input type="text" id="date" name="date" class="form-control datetimepicker-input datetimepicker" data-target=".datetimepicker" placeholder="DD-MM-YYYY 00:00 AM/PM"/>
                            <div class="input-group-text" data-target=".datetimepicker" data-toggle="datetimepicker"><i class="icon-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="w-100"></div>

                <div class="col-12 form-group d-none">
                    <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                </div>
            </div>
            <input type="hidden" name="prefix" value="template-contactform-">
        </form>
    </div>
    <div id="product_data"></div>
    <div id="product_table_div">
        <table id="product_invoice_table" class="table table-striped table-bordered cart" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="cart-product-remove">Options</th>
                    <th class="cart-product-name">Product</th>
                    <th class="cart-product-price">Unit Price</th>
                    <th class="cart-product-quantity">Quantity</th>
                    <th class="cart-product-subtotal">Total</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    @endslot
    @slot('footer')
    <div class="col-12 form-group">
        <button class="btn_save button button-3d button-rounded button-green"><i class="icon-save2"></i> Save</button>
        <button class="button button-3d button-rounded button-red" id="btn_close" data-bs-dismiss="modal"><i class="icon-thumbs-down21"></i> Cancel</button>
    </div>
    @endslot
</x-modal>
@endisset

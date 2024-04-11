<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\InvoiceDetails;
use App\Models\Clients;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoices::select('id','Date','ClientId');
        return DataTables::eloquent($invoices)
            ->addColumn('Client',function($invoices){
                return $invoices->Client->Name;
            })
            ->addColumn('options',function($invoices){
                return
                "
                <button type='submit' class='btn btn-warning btn_edit' data-toggle='tooltip' title='Editar' data-original-title='Editar' get_url='". route('functions.edit_invoice', ['invoice'=>$invoices->id]) ."'><i class='icon-line-edit-2'></i> Edit</button>
                <button type='submit' class='btn btn-danger btn_delete' data-toggle='tooltip' title='Eliminar' data-original-title='Eliminar' delete_url='". route('functions.delete_invoice', ['invoice'=>$invoices->id]) ."'><i class='icon-trash2'></i> Delete</button>
                ";
            })
            ->rawColumns(['options'])
            ->make(true);
    }

    /**
     * Display a listing of the products of the invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function products_invoice_data(Invoices $invoice)
    {
        $invoice_details = InvoiceDetails::Select('id','InvoiceId','ProductId','Price','Quantity','Amount')->where('InvoiceId',$invoice->id);

        return DataTables::eloquent($invoice_details)
            ->addColumn('Product',function($invoice_details){
                return $invoice_details->products->first()->Name;
            })
            ->addColumn('Price',function($invoice_details){
                return $invoice_details->products->first()->Price;
            })
            ->addColumn('Options',function($invoice_details){
                return
                "
                <a class='remove btn_remove_product' title='Remove this item' delete_url='".route('functions.destroy_invoice_product',["invoice_product"=>$invoice_details->id])."'><i class='icon-trash2'></i></a>
                ";
            })
            ->rawColumns(['Options'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = view('invoices.form', ['clients'=>Clients::all()])->render();
        return response()->json([
            "status"=>"successful",
            "view"=>$view
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client'=>'required',
            'date'=>'required'
        ]);
        $date = Carbon::createFromFormat('m/d/Y G:i A', $request->date)->toDateTimeString();

        $invoice = new Invoices([
            'ClientId'=>$request->client,
            'Date'=>$date
        ]);

        $invoice->save();

        // return response()->json($invoice, 201);

        $products_view = view('invoices.products', ["invoice"=>$invoice, "products"=>Products::all()])->render();
        return response()->json([
            "status"=>"successful",
            "invoice"=>$invoice,
            "products_view"=>$products_view
            ],201);

    }
    /**
     * Store a new product in the invoice previously created
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_invoice_product(Request $request, Invoices $invoice)
    {
        // validate if the product is already in the invoice if the product already exists just update the quantity

        $details = InvoiceDetails::where('InvoiceId',$invoice->id)->where('ProductId',$request->product_select)->get();

        if($details->isEmpty()){
            $invoice_details = new InvoiceDetails([
                'InvoiceId' => $invoice->id,
                'ProductId' => $request->product_select,
                'Price' => $request->price,
                'Quantity' => $request->quantity
            ]);
        $invoice_details->save();

        }else{
            $details->first()->Quantity += $request->quantity;
            $details->first()->save();
        }

        return response()->json("null",204);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoices $invoice)
    {
        $view = view('invoices.form', ['invoice'=>$invoice, 'clients'=>Clients::all(), 'products'=>Products::all()])->render();
        return response()->json([
            "status"=>"successful",
            "view"=>$view
            ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices $invoice)
    {
        $validatedData = $request->validate([
            'client'=>'required',
            'date'=>'required'
        ]);

        $date = Carbon::createFromFormat('m/d/Y G:i A', $request->date)->toDateTimeString();
        $invoice->clientid=$request->client;
        $invoice->date=$date;
        $invoice->save();
        return response()->json($invoice,200);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoice)
    {
        $invoice->delete();
        return response()->json(null,204);
    }
    /**
     * Remove the product from the invoice details.
     *
     * @param  \App\Models\InvoiceDetails  $InvoicesDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy_invoice_product(InvoiceDetails $invoice_product)
    {
        $invoice_product->delete();
        return response()->json(null,204);
    }
}

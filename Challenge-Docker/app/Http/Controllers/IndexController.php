<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function clients_view(){
        return view('clients.index', ['page_title'=>'Clients']);
    }

    public function products_view(){
        return view('products.index', ['page_title'=>'Products']);
    }

    public function invoices_view(){
        return view('invoices.index', ['page_title'=>'Invoices']);
    }
}

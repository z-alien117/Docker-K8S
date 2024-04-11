<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InvoiceDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['InvoiceId','ProductId','Price','Quantity','Amount'];

    public function products(){
        return $this->hasMany(Products::class, 'id', 'ProductId');
    }
    public function invoice(){
        return $this->hasMany(Invoices::class, 'id', 'InvoiceId');
    }

}
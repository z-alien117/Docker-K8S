<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Invoices extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['ClientId','Date'];

    public function Client(){
        return $this->belongsTo(Clients::class, 'ClientId', 'id');
    }

    public function Details(){
        return $this->hasMany(InvoiceDetails::class, 'InvoiceId', 'id');
    }
}

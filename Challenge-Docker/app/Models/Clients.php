<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Clients extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['name'];

    public function invoices(){
        return $this->hasMany(Invoices::class, 'ClientId', 'id');
    }
}

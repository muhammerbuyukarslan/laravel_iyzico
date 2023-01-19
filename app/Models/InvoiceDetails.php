<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceDetails extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey ="invoice_details_id";

    protected $fillable = [
        'invoice_details_id',
        'invoice_id',
        'product_id',
        'quantity',
        'unit_price',
        'total',
    ];
}

<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = ['sale_invoice_id', 'price', 'quantity', 'product_id', 'total'];
    public function invoice()
    {
        return $this->belongsTo(SaleInvoice::class , 'sale_invoice_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

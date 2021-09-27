<?php

namespace App\Models;

use App\Models\PurchaseInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;
    
    protected $fillable = ['purchase_invoice_id', 'price', 'quantity', 'product_id', 'total'];
    public function invoice()
    {
        return $this->belongsTo(PurchaseInvoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
       $this->data['totalUsers'     ]        = User::count('id');
       $this->data['totalProducts'  ]        = Product::count('id');
       $this->data['totalSales'     ]        = SaleItem::sum('total');
    $this->data['totalPurchase'  ]           = PurchaseItem::sum('total');
       $this->data['totalReceipts'  ]        = Receipt::sum('amount');
       $this->data['totalPayments'  ]        = Payment::sum('amount');
       $this->data['totalStocks'  ]          =  PurchaseItem::sum('quantity') - SaleItem::sum('quantity') ;
        return view('home', $this->data);
    }
}

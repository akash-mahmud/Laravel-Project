<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    public function __construct(){

        parent::__construct();
        $this->data ['main_menu'] = 'Reports';
        $this->data ['sub_menu'] = 'Sales';
    }
    public function index(Request $request){

       $this->data ['start_date'] = $request ->get('start_date', date('Y-m-d'));
       $this->data ['end_date'] = $request ->get('end_date', date('Y-m-d'));

         $this->data['sales']= SaleItem::select('products.title','sale_items.quantity','sale_items.price','sale_items.total','sale_invoices.challan_no', 'sale_invoices.date')
                                        ->join('products','products.id','=' , 'sale_items.product_id')
                                        ->join('sale_invoices','sale_invoices.id','=' , 'sale_items.sale_invoice_id')
                                        ->whereBetween('sale_invoices.date',  [ $this->data ['start_date'] , $this->data ['end_date']] )
                                        ->get();
        return view('reports.sales', $this->data);
    }
}

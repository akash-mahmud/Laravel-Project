<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\PurchaseItem;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use App\Models\PurchaseInvoice;
use Illuminate\Support\Facades\Auth;
class UserPurchaseController extends Controller
{
    public function __construct()
    {

        $this->data['tab_menu'] = 'purchase';
    }

    public function index($id)
    {

        $this->data['user'] = User::findOrfail($id);

        return view('users.purchase.purchase', $this->data);
    }

    public function createInvoice(InvoiceRequest $request, $user_id)
    {

      $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        $invoice = PurchaseInvoice::create($formData);

        return redirect(route('user.purchase.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice->id]));

    }

    public function invoice($user_id, $invoice_id)
    {
       
        $this->data['user'] = User::findOrFail($user_id);
        $this->data['invoice'] = PurchaseInvoice::findOrFail($invoice_id);
        $this->data['totalPayable'] = $this ->data['invoice']->items()->sum('total');
        $this->data['totalPaid'] = $this ->data['invoice']->payments()->sum('amount') ;
        $this->data['products'] = Product::arrayForSelect();

        return view('users.purchase.invoice', $this->data);

    }

    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {
    
        $formdata = $request->all();

        $formdata['purchase_invoice_id'] = $invoice_id;

        if (PurchaseItem::create($formdata)) {

            Session::flash('message', ' Sale item added   Successfully');

        };

        return redirect(route('user.purchase.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id]));
    }

    public function destroyItem($user_id, $invoice_id, $item_id)
    {

        if (PurchaseItem::destroy($item_id)) {

            Session::flash('message', ' Purchase item deleted   Successfully');
        };
        return redirect(route('user.purchase.invoice_details', ['id' => $user_id, 'invoice_id' => $invoice_id]));
    }

    public function destroy($user_id, $invoice_id)
    {

        if (PurchaseItem::destroy($invoice_id)) {

            Session::flash('message', ' Invoice deleted   Successfully');

        };

        return redirect(route('user.purchase', ['id' => $user_id]));
    }
}

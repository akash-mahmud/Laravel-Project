<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceProductRequest;
use App\Http\Requests\InvoiceRequest;
use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
// use App\Models\SaleItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserSalesController extends Controller
{
    public function __construct()
    {

        $this->data['tab_menu'] = 'sales';
    }

    public function index($id)
    {

        $this->data['user'] = User::findOrfail($id);

        return view('users.sales.sale', $this->data);
    }

    public function createInvoice(InvoiceRequest $request, $user_id)
    {

        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        $invoice = SaleInvoice::create($formData);

        return redirect(route('user.sales.invoices.add_item', ['id' => $user_id, 'invoice_id' => $invoice->id]));

    }

    public function invoice($user_id, $invoice_id)
    {

        $this->data['user'] = User::findOrFail($user_id);
        $this->data['invoice'] = SaleInvoice::findOrFail($invoice_id);
        $this->data['products'] = Product::arrayForSelect();

        return view('users.sales.invoice', $this->data);

    }

    public function addItem(InvoiceProductRequest $request, $user_id, $invoice_id)
    {

        $formdata = $request->all();

        $formdata['sale_invoice_id'] = $invoice_id;

        if (SaleItem::create($formdata)) {

            Session::flash('message', ' Sale item added   Successfully');

        };

        return redirect(route('user.sales.invoices.add_item', ['id' => $user_id, 'invoice_id' => $invoice_id]));
    }

    public function destroyItem($user_id, $invoice_id, $item_id)
    {

        if (SaleItem::destroy($item_id)) {

            Session::flash('message', ' Sale item deleted   Successfully');
        };
        return redirect(route('user.sales.invoices.add_item', ['id' => $user_id, 'invoice_id' => $invoice_id]));
    }

    public function destroy($user_id, $invoice_id)
    {

        if (SaleInvoice::destroy($invoice_id)) {

            Session::flash('message', ' Invoice deleted   Successfully');

        };

        return redirect(route('user.sales', ['id' => $user_id]));
    }
}

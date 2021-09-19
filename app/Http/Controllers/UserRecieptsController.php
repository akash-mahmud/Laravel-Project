<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserRecieptsController extends Controller
{
    public function __construct()
    {

        $this->data['tab_menu'] = 'receipt';
    }

    public function index($id)
    {

        $this->data['user'] = User::findOrfail($id);

        return view('users.receipt.receipt', $this->data);
    }

    public function store(ReceiptRequest $request, $user_id, $invoice_id = null)
    {

        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();
        if ($invoice_id) {
            $formData['sale_invoice_id'] = $invoice_id;
        }
        if (Receipt::create($formData)) {

            Session::flash('message', ' Receipt  Successfully');

        }

        if ($invoice_id) {
            return redirect(route('user.sales.invoices.add_item', ['id' => $user_id, 'invoice_id' => $invoice_id]));
        } else {

            return redirect(route('user.receipt', ['id' => $user_id]));
        }

    }

    public function destroy($user_id, $receipt_id)
    {

        if (Receipt::destroy($receipt_id)) {

            Session::flash('message', ' receipt  deleted');

        };

        return redirect(route('user.receipt', ['id' => $user_id]));
    }
}

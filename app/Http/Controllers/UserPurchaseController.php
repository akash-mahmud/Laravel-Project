<?php

namespace App\Http\Controllers;

use App\Models\User;

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
}

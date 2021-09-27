<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'amount', 'note', 'user_id', 'admin_id','purchase_invoice_id'];

    public function admin()
    {

        return $this->belongsTo(Admin::class);
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }
}

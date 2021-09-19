<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Receipt;
use App\Models\SaleInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payments()
    {

        return $this->hasMany(Payment::class);
    }

    public function receipts()
    {

        return $this->hasMany(Receipt::class);
    }

    public function sales()
    {

        return $this->hasMany(SaleInvoice::class);
    }
}

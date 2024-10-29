<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeePayment extends Model
{
    use HasFactory;
protected $table="fee_payments";
    protected $fillable=[
            'user_id',
            'amount_paid',
            'payment_method',
            'payment_ref_no',
            'date_paid',
    ];
}

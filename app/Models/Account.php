<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
       'holder_name',
       'account_no',
       'ifsc_code',
       'bank_name',
       'upi'

    ];
}

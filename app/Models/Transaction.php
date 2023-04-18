<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable =[
        'id', 'created_at', 'updated_at', 'currency','token', 'amount', 'status','email','country_code','invoice_number'
    ];
}

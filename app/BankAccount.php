<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'account',
        'balance',
        'currency'
    ];
    
    protected $table = 'bank_account';
}

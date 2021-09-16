<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionAccount extends Model
{
    protected $fillable = [
        'value',
        'type_operation',
        'currency',
        'number_account'
    ];


    protected $table = 'transaction';

}

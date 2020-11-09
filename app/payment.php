<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $table = 'payment';
    protected $fillable = [
                    'TransactionType',
                    'TransID',
                    'TransTime',
                    'TransAmount',
                    'BusinessShortCode',
                    'BillRefNumber',
                    'InvoiceNumber',
                    'MSISDN',
                    'FirstName',
                    'MiddleName',
                    'LastName',
                    'OrgAccountBalance',
    ];
}

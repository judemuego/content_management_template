<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'id',
        'customer_id',
        'customer_name',
        'address1_description',
        'address1_line1',
        'address1_line2',
        'address2_description',
        'address2_line1',
        'address2_line2',
        'address3_description',
        'address3_line1',
        'address3_line2',
        'contact_person',
        'position',
        'contact_no',
        'email_address',
        'tin_no',
        'company_business_style',
    ];
}

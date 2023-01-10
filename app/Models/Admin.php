<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;


class Admin extends Authenticable
{
    use HasFactory;
    protected $guard = 'admin';

    public function vendor_personal(){
        return $this->belongsTo('App\Models\Vendor' , 'vendor_id');

    }

    public function vendor_business(){
        return $this->belongsTo('App\Models\VendorsBusinessDetail' , 'vendor_id');
        
    }
    public function vendor_bank(){
        return $this->belongsTo('App\Models\VendorsBankDetail' , 'vendor_id');
        
    }

}
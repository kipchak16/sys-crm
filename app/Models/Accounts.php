<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{


    protected $table = 'accounts';



    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

}


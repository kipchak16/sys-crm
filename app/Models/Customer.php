<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function accounts()
    {
        return $this->hasMany(Account::class, 'user_id');
    }

    public function index()
    {
        $customers = customer::get();
        return view('customers.index', compact('customers'));
    }

    public function dutys()
    {
        return $this->hasMany(Duty::class, 'customer_id');
    }
}

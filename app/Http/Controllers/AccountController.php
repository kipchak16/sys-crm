<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Customer;
use App\Models\Dutys;
use http\Client;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function AccountCreate(){
        return view('accounts.accounts_add');
    }

    public  function Store(Request $request){
        $accounts= new Accounts();
        $accounts->account_name=$request->account_name;
        $accounts->account_nickname=$request->account_nickname;
        $accounts->password=$request->password;
        $accounts->user_id=$request->user_id;
        $accounts->comment=$request->comment;
        $accounts->save();

        return redirect()->back();
    }

    public function Name(){
        $customer= customer::get();

        return view('accounts.Add',compact('customer'));
    }


    public function List(){
        $accounts = Accounts::get();
        return view('accounts.List',compact('accounts'));
    }

    public function delete($id){
        $accounts=Accounts::findorFail($id)->forceDelete();
        return redirect()->back();
    }

    public function edit($id){
        $accounts=Accounts::findorFail($id);
        $customer=customer::all();
        return view('accounts.Edit',compact('accounts',"customer"));
    }

    public  function update(Request $request, $id){
        $accounts= Accounts::FindorFail($id);
        $accounts->account_name=$request->account_name;
        $accounts->account_nickname=$request->account_nickname;
        $accounts->password=$request->password;
        $accounts->user_id=$request->user_id;
        $accounts->comment=$request->comment;
        $accounts->save();

        return redirect()->route('accounts.List')->with('success', 'Başarıyla Güncellendi');
    }

}

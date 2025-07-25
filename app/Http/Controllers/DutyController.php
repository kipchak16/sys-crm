<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Dutys;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class DutyController extends Controller
{

    public function create()
    {
        $users = User::all();
        $customers = Customer::all();

        return view('Dutys.New', compact('users', 'customers'));
    }

    public function MyDutyList()
    {
        $dutys = Dutys::where("user_id",auth()->id())->get();

        return view('Dutys.dutyList' , compact('dutys'));
    }



    public function form($id=0)//eğer id değeri gönderilirse düzenleme modunda çalışacak ama gönderilmezse yani 0 olursa o zaman yeni kayıt modunda çalışacak
    {
        $entry = new Dutys();
        if($id>0)
        {
            $entry = Dutys::find($id);
        }
        $categories = Category::all();
        $users = User::all();
        $customers = Customer::all();

        $dutys = Dutys::all();

        return view("Dutys.new",compact("entry","dutys","users","customers","categories"));
    }


    public  function store(Request $request){

        $this->validate($request, [
            "name" => "required",
            "comment" => "required",
            "date" => "required",
            "user_id" => "required",
            "customer_id" => "required",
            "category_id" => "required",
            "image.*" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120",
            "document.*" => "nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt|max:5120"
        ]);

            $dutys = $request->id
                ?Dutys::findOrFail($request->id)
                : new Dutys();

        $dutys->name=$request->name;
        $dutys->comment=$request->comment;
        $dutys->date=$request->date;
        $dutys->user_id=$request->user_id;
        $dutys->customer_id=$request->customer_id;
        $dutys->category_id=$request->category_id;
        $dutys->value=$request->value;
        $dutys->point=$request->point;
        $dutys->created_by = auth()->id();
        $dutys->status = 'Yapılmadı';

        if($request->hasFile("image")) {
            foreach($request->file("image") as $imageFile){
                $dutys->addMedia($imageFile)->toMediaCollection('duty_img');
            }
        }

        if($request->hasFile("document")) {
            foreach($request->file("document") as $docs){
                $dutys->addMedia($docs)->toMediaCollection('duty_docs');
            }
        }

        $dutys->save();


        if($dutys->exists){
            $dutys->created_by = auth()->id();
            $dutys->status= "Yapılmadı";
        }

        return redirect()->route('Duty.MyDutys')
            ->with("message_type", "success")
            ->with("message", $request->id ? "Görev Güncellendi." : "Görev Oluşturuldu.");
    }

    public function updateCheckbox(Request $request)
    {
        $duty = Dutys::find($request->id);
        if (!$duty) {
            return response()->json(['success' => false]);
        }

        $field = $request->field;
        $allowed = ['c', 's', 'k', 'm', 'a']; // sadece bu alanlara izin ver
        if (!in_array($field, $allowed)) {
            return response()->json(['success' => false]);
        }

        $duty->$field = $request->checked ? true : false;

        // ✅ Sıralamaya göre status'u güncelle
        $priority = ['a', 'm', 'k', 's', 'c']; // Öncelik sırası (en önemlisi başta)
        $stages = [
            'c' => 'Yapıldı',
            's' => 'Sorumlu Onayladı',
            'k' => 'Koordinatör Onayladı',
            'm' => 'Müşteri Beklemede',
            'a' => 'Arşivlendi',
        ];

        $newStatus = 'Yapılmadı';
        foreach ($priority as $key) {
            if ($duty->$key) {
                $newStatus = $stages[$key];
                break;
            }
        }

        $duty->status = $newStatus;
        $duty->save();

        return response()->json([
            'success' => true,
            'status' => $newStatus, // ✅ JS tarafında kullanacağız
        ]);
    }

    public function delete($id)
    {
        $dutydelete = \App\Models\Dutys::find($id);

        if (!$dutydelete) {
            return redirect()
                ->back()
                ->with("mesaj", "Kayıt bulunamadı.")
                ->with("mesaj_tur", "danger");
        }

        $dutydelete->delete();
        $dutydelete->clearMediaCollection('duty_img');
        $dutydelete->clearMediaCollection('duty_docs');

        return redirect()
            ->route("Duty.MyDutys") // veya listeleme sayfan
            ->with("mesaj", "Kayıt Silindi")
            ->with("mesaj_tur", "success");
    }

    public function edit($id=0)//eğer id değeri gönderilirse düzenleme modunda çalışacak ama gönderilmezse yani 0 olursa o zaman yeni kayıt modunda çalışacak
    {
        $entry = new Dutys();
        if($id>0)
        {
            $entry = Dutys::find($id);
        }

        $dutys = Dutys::all();

        return view("Duty.edit.form",compact("entry","dutys"));
    }

    public function view($id)
    {
        $dutyview=\App\Models\Dutys::find($id);

        return view("Dutys.dutyView",compact("dutyview"));
    }



}


//<td>Verilen Kişi: {{ $duty->assignedUser->name }}</td>
//<td>Oluşturan: {{ $duty->createdByUser->name }}</td>

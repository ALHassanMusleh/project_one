<?php

namespace App\Http\Controllers;

use App\models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function getoffers()
    {
        return Offer::select('id','name')->get();
    }

//    public function store()
//    {
//        Offer::create([
//            'name' => 'offer2',
//            'price' => '300',
//            'details' => 'offer3 details'
//        ]);
//    }


     public function create()
     {
         return view('offers.create');
     }


     public function store(Request $request)
     {
         //validate data  before insert to database


         $rules = $this->getRules();
         $messages = $this->getMessages();

         $validator = Validator::make($request->all() ,$rules,$messages);

         if($validator->fails()){  //في حال فشل الفاليديت
             return redirect()->back()->withErrors($validator)->withInputs($request->all());  //اعملي رجوع للصفحة ويكون معاه الايرور والانبت

         }

         //insert

         Offer::create([
             'name' => $request->name,
             'price' => $request->price,
             'details' => $request->details,
         ]);

         return redirect()->back()->with(['success' =>'تم إضافة العرض بنجاح']);


     }


     protected function getMessages()
     {     // للغات  trans زي __
         return $messages =[
             'name.required' => trans('messages.offer name required'), //عشان تعدد اللغات اسم الملف واسم الرسالة الي في الملف حسب الغة
             'name.unique' => __('messages.offer name must be unique'),
             'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
             'price.required' => 'السعر العرض مطلوب',
             'details.required' => 'التفاصيل مطلوب',

         ];
     }

    protected function getRules()
    {
        return $rules=[
            'name' => 'required|max:100|unique:offers,name',  //لا يتعدى 100 حرف   unique:offers,name لا يتكرر في الجدول الي اسمه والحقل الي اسمه
            'price' => 'required|numeric', // بنفعش يكتب فيهااسمه
            'details' => 'required',
        ];

    }


}

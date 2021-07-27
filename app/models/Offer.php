<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table='offers';  // عشان يشوف الجدول لو اسمه متغير


    protected $fillable=['name','price','details','created_at','updated_at'];  //الي موجدود هيتخزن في قاعدة البيانات

    protected $hidden=['created_at','updated_at'];  //الي موجودين داخلها مش هيرجعوو معاك


    // public $timestamps=false;  //مش هيحط الوقت تلقائي
}

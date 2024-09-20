<?php

namespace App\Http\Controllers;
use App\Models\Writer;
use App\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // جلب قائمة المؤلفين من قاعدة البيانات
        $writers = Writer::all();

        // جلب قائمة الأنواع من قاعدة البيانات
        $categories = Category::all();

        // تمرير قائمة المؤلفين والأنواع إلى العرض
        return view('home',compact('writers', 'categories'));
    }
}

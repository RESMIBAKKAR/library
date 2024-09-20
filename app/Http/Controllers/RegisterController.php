<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\UserSubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $subscriptionPlans=SubscriptionPlan::all();
        return view('auth.register', compact('subscriptionPlans'));
    }
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'role_id'=>'exists:roles,id',
            'subscription_plan_id' => 'required|exists:subscription_plans,id'
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // قم بتشفير كلمة المرور
        ]);

        // إنشاء الاشتراك للمستخدم الجديد
        UserSubscriptionPlan::create([
            'user_id' => $user->id, // هنا نستخدم $user->id
            'subscription_plan_id' => $validatedData['subscription_plan_id'],
            'start_date' => now(),
            'end_date' => now()->addDays(SubscriptionPlan::find($validatedData['subscription_plan_id'])->duration),
            'status' => 'active',
        ]);




        Auth::login($user);

        return redirect()->route('home')->with('success', 'تم إنشاء الحساب والاشتراك بنجاح.');
    }
}


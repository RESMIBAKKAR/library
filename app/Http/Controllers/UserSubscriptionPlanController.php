<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSubscriptionPlan;
use App\Models\SubscriptionPlan;


class UserSubscriptionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = UserSubscriptionPlan::all();
        return view('user_subscription_plans.index', compact('plans'));
    }

}

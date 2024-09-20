<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;


class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::all();
        return view('subscription_plans.index', compact('plans'));
    }

    public function create()
    {
        return view('subscription_plans.create');
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        SubscriptionPlan::create($validatedData);
        return redirect()->route('subscription_plans.index')->with('success', 'Plan created successfully.');
    }

    public function edit(SubscriptionPlan $subscriptionPlan)
    {
        return view('subscription_plans.edit', compact('subscriptionPlan'));
    }

    public function update(Request $request, SubscriptionPlan $subscriptionPlan)
    {
        $validatedData=$request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        $subscriptionPlan->update($validatedData);
        return redirect()->route('subscription_plans.index')->with('success', 'Plan updated successfully.');
    }

    public function destroy(SubscriptionPlan $subscriptionPlan)
    {
        $subscriptionPlan->delete();
        return redirect()->route('subscription_plans.index')->with('success', 'Plan deleted successfully.');
    }
}



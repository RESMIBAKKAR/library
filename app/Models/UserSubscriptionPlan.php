<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscriptionPlan extends Model
{
    use HasFactory;
    protected $table = 'users_subscription_plans';
    protected $fillable = ['status','end_date','start_date','subscription_plan_id','user_id'];

    public function user(){

        return $this->belongsTo(User::class);
}
public function subscriptionPlan(){

    return $this->belongsTo(SubscriptionPlan::class);
}
protected $attributes = [
    'status' => 'active',
];

}

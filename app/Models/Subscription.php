<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id',
        'subscriptions_type',
        'status',
        'start_date',
        'end_date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

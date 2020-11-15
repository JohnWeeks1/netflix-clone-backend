<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Subscription;

class Plan extends Model
{
    protected $fillable = [
        'title', 'identifier', 'stripe_id',
    ];

    /**
     * A plan belongs to a subscription,
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'name', 'identifier');
    }
}

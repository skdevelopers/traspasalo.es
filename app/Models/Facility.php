<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'business_id',
        'rent',
        'duration_months',
        'property_price',
        'pending_mortgage',
        'state_conditions',
        'rent_supplies',
        'state_supplies',
    ];


    protected $casts = [
        'rent_supplies' => 'array',
    ];

    // A facility belongs to a business
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['business_id', 'make_and_model', 'year', 'km'];

    // A vehicle belongs to a business
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

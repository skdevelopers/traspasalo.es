<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FfAndE extends Model
{
    use HasFactory;

    protected $fillable = ['business_id', 'price_new', 'pending_payments', 'year'];

    // Define the relationship with the Business model
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

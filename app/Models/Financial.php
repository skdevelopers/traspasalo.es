<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $fillable = ['business_id', 'gross_revenue', 'ebitda', 'asking_price', 'ff_and_e', 'inventory', 'established'];

    // A financial record belongs to a business
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

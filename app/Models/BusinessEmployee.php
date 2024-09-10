<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessEmployee extends Model
{
    protected $fillable = ['business_id', 'number_of_employees', 'employee_cost'];

    // A business employee record belongs to a business
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

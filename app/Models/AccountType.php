<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'monthly_price',
        'yearly_price',
        'monthly_description',
        'yearly_description',
    ];

    public function getPrice($billingCycle = 'monthly')
    {
        return $billingCycle === 'yearly' ? $this->yearly_price : $this->monthly_price;
    }

    public function getDescription($billingCycle = 'monthly')
    {
        $description = $billingCycle === 'yearly' ? $this->yearly_description : $this->monthly_description;

        // Ensure the description is an array
        return is_string($description) ? json_decode($description, true) : (array) $description;
    }



    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}

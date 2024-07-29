<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AccountType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'monthly_price', 'yearly_price', 'descriptions'];

    protected $casts = [
        'descriptions' => 'array',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'chart_of_account_id',
        'account_number',
        'parent_account_number',
        'name',
        'group',
        'enabled',
        'parent_id',
    ];

    // Define relationships if necessary
    public function chartOfAccount(): BelongsTo
    {
        return $this->belongsTo(ChartOfAccount::class);
    }

    public function parentAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    public function childAccounts(): HasMany
    {
        return $this->hasMany(Account::class, 'parent_id');
    }
    public function transactions(): MorphMany
    {
        return $this->morphMany(TransactionDetail::class, 'entryable');
    }
}

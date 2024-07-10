<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JournalEntry extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'reference', 'type', 'user_id', 'transaction_date'];

    public function details(): HasMany
    {
        return $this->hasMany(JournalEntryDetail::class);
    }
}

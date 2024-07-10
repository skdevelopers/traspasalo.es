<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class JournalEntryDetail extends Model
{
    use HasFactory;

    protected $fillable = ['journal_entry_id', 'entryable_id', 'entryable_type', 'account_id', 'type', 'total_amount'];

    public function entryable(): MorphTo
    {
        return $this->morphTo();
    }
}

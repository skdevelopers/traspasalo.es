<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payable extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['amount', 'supplier_id', 'payment_made'];

    public function supplier()
    {
        return $this->belongsTo(Payable::class);
    }
}

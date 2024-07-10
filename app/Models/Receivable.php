<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receivable extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['amount', 'customer_id', 'payment_received'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}

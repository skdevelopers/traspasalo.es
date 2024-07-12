<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesService extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'featureable_id'];

    public function featureable()
    {
        return $this->morphTo();
    }
}

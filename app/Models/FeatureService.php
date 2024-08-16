<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeatureService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','icon_class'];

    public function businesses()
    {
        return $this->morphedByMany(Business::class, 'featureable');
    }
}


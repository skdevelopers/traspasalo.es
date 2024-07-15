<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;



class Business extends Model implements HasMedia
{
    use HasFactory,SoftDeletes, InteractsWithMedia;

    //relation with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function featuresServices()
    {
        return $this->belongsTo(FeaturesService::class);
    }

    /**
     * Register media collections.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default');
    }

    /**
     * Get all the product's media files.
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }
}

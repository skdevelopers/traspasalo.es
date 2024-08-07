<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Enums\Fit; 
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Business extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'category_id', 'subcategory_id', 'business_title', 'description', 'check_in', 'check_out',
        'age_restriction', 'pets_permission', 'location', 'user_id', 'status', 'qr_code_path'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($business) {
            //s  $business->generateQrCode();
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function features()
    {
        return $this->morphToMany(FeatureService::class, 'featureable');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useDisk('public_images');

        $this->addMediaCollection('qr_codes')
            ->useDisk('public_qrcodes');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('resized')
             ->fit(Fit::Crop, 800, 600)
            ->optimize()
            ->nonQueued(); // You can remove this if you want the conversion to be queued
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'subcategory_id');
    }

    public function generateQrCode()
    {
        $qrCodeContent = QrCode::format('png')
            ->size(config('qrcode.size', 200))
            ->margin(config('qrcode.margin', 10))
            ->errorCorrection(config('qrcode.error_correction', 'L'))
            ->generate(route('business.show', $this->id));

        $qrCodePath = 'qrcodes/business_' . $this->id . '.png';
        $absoluteQrCodePath = storage_path('app/public/' . $qrCodePath);

        // Ensure the directory exists
        if (!file_exists(dirname($absoluteQrCodePath))) {
            mkdir(dirname($absoluteQrCodePath), 0755, true);
        }

        // Save the QR code to the specified path
        file_put_contents($absoluteQrCodePath, $qrCodeContent);

        // Save the QR code path to the database
        $this->update(['qr_code_path' => $qrCodePath]);

        // Add the media file to the collection, avoiding duplicate save
        $this->addMedia($absoluteQrCodePath)
            ->preservingOriginal()
            ->toMediaCollection('qr_codes');
    }

    public function getImageUrl()
    {
        $media = $this->getFirstMedia('images');
       // dd($media);
        if ($media) {
            $imageUrl = $media->getPathRelativeToRoot('resized');
            $imageUrl= asset('/storage/images/'. $imageUrl);
        } else {
            $imageUrl = 'https://via.placeholder.com/150';
        }

      //  echo 'Generated Image URL: ' . $imageUrl . '<br>'; // Print URL for debugging
        return $imageUrl;
    }


    public function getQrCodeUrl()
    {
        $media = $this->getFirstMedia('qr_codes');
        return $media ? asset('storage/qrcodes/' . $media->file_name) : null;
    }
}

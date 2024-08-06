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
        $this->addMediaCollection('default')
            ->useDisk('public');
        $this->addMediaCollection('qr_codes')
            ->useDisk('public');
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
        Storage::disk('public')->put($qrCodePath, $qrCodeContent);

        // Log the paths for debugging
       // \Log::info('QR Code Path: ' . $qrCodePath);

        // Save the QR code path to the database
        $this->update(['qr_code_path' => $qrCodePath]);

        $this->addMedia(storage_path('app/public/' . $qrCodePath))
        ->preservingOriginal()
        ->toMediaCollection('qr_codes');
    }
}

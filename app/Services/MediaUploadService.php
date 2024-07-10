<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Spatie\Image\Image as SpatieImage;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaUploadService
{
    public function uploadAndAttachMedia($file, $model): array
    {
        // Validate file type
        $validator = Validator::make(['file' => $file], [
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp,svg'],
        ]);

        if ($validator->fails()) {
            return ['success' => false, 'message' => $validator->errors()->first()];
        }

        // Optimize image before uploading
        if (in_array($file->getClientOriginalExtension(), ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
            $file = $this->optimizeImage($file);
        }

        // Upload and attach media
        try {
            $media = $model->addMedia($file)->toMediaCollection();
            return ['success' => true, 'media' => $media];
        } catch (FileDoesNotExist | FileIsTooBig $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    protected function optimizeImage($file)
    {
        // Define maximum dimensions for the optimized image
        $maxWidth = 1200;
        $maxHeight = 800;

        // Create a temporary file path
        $tempPath = tempnam(sys_get_temp_dir(), 'optimized_');

        // Optimize the image using Spatie Image
        SpatieImage::load($file->getPathname())
            ->width($maxWidth)
            ->height($maxHeight)
            ->save($tempPath);

        // Return the optimized image file
        return new UploadedFile($tempPath, $file->getClientOriginalName(), $file->getClientMimeType(), null, true);
    }

    public function deleteMedia($mediaId)
    {
        $media = Media::findOrFail($mediaId);
        return $media->delete();
    }
}

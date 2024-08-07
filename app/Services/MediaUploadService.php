<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Spatie\Image\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaUploadService
{
    public function uploadAndAttachMedia($file, $model, $collection = 'images'): array
    {
        // Validate file type
        $validator = Validator::make(['file' => $file], [
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp,svg'],
        ]);

        if ($validator->fails()) {
            return ['success' => false, 'message' => $validator->errors()->first()];
        }

        // Resize and optimize image before uploading
        $file = $this->resizeAndOptimizeImage($file);

        // Upload and attach media
        try {
            $media = $model->addMedia($file)->toMediaCollection($collection);
            return ['success' => true, 'media' => $media];
        } catch (FileDoesNotExist | FileIsTooBig $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    protected function resizeAndOptimizeImage($file)
    {
        // Define the target dimensions
        $targetWidth = 800; // Example width
        $targetHeight = 600; // Example height

        // Create a temporary path
        $tempPath = tempnam(sys_get_temp_dir(), 'resized_') . '.' . $file->getClientOriginalExtension();

        // Resize and optimize the image using Spatie Image
        Image::load($file->getPathname())
            ->width($targetWidth)
            ->height($targetHeight)
            ->optimize()
            ->save($tempPath);

        // Return the optimized image file as an UploadedFile instance
        return new UploadedFile($tempPath, $file->getClientOriginalName(), $file->getClientMimeType(), null, true);
    }

    public function deleteMedia($mediaId)
    {
        $media = Media::findOrFail($mediaId);
        return $media->delete();
    }
}

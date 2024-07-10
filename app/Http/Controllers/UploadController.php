<?php

namespace App\Http\Controllers;

use App\Services\MediaUploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    private MediaUploadService $mediaUploadService;

    public function __construct(MediaUploadService $mediaUploadService)
    {
        $this->mediaUploadService = $mediaUploadService;
    }

    /**
     * Handle media upload.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
        ]);

        $modelClass = $request->input('model_type');
        $model = $modelClass::findOrFail($request->input('model_id'));

        $result = $this->mediaUploadService->uploadAndAttachMedia($request->file('file'), $model);

        if ($result['success']) {
            return response()->json(['media_id' => $result['media']->id, 'path' => $result['media']->getUrl()], 200);
        } else {
            return response()->json(['error' => $result['message']], 400);
        }
    }

    /**
     * Handle media deletion.
     *
     * @param int $mediaId
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($mediaId)
    {
        try {
            $this->mediaUploadService->deleteMedia($mediaId);
            return response()->json(['message' => 'File deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}

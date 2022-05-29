<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Article;
use App\Models\Image;
use App\Repositories\ImageRepository;
use App\Services\FileUploaderService;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    private ImageRepository $imageRepository;
    private FileUploaderService $uploader;

    public function __construct(ImageRepository $imageRepository, FileUploaderService $uploader)
    {
        $this->imageRepository = $imageRepository;
        $this->uploader = $uploader;
    }

    public function store(StoreImageRequest $request, Article $article): JsonResponse
    {
        $file = $this->uploader->saveUpload($request->file('image'));

        $input['url'] = $file;
        $input['article_id'] = (int)$article->id;
        $input['user_id'] = (int)$request->user()->id;

        if ($file) {
            $image = $this->imageRepository->create($input);
        }

        return response()->json($image);
    }

    public function destroy(Image $image): JsonResponse
    {
        if ($this->uploader->deleteFile($image)) $this->imageRepository->delete($image->id);

        return response()->json($image);
    }
}

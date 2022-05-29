<?php

namespace App\Listeners;

use App\Services\FileUploaderService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\App;

class ArticleDeleteListener
{
    /**
     * @throws BindingResolutionException
     */
    public function handle($event)
    {
        $fus = App::make(FileUploaderService::class);

        foreach ($event->article->images as $image) {
            $fus->deleteFile($image);
            $image->delete();
        }
        $event->article->comments()->delete();
    }
}

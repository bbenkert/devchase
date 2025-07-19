<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Spatie\ImageOptimizer\OptimizerChain;

class OptimizeUploadedImage implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        if (isset($event->file) && $event->file instanceof TemporaryUploadedFile) {
            $this->optimizeImage($event->file);
        }
    }

    /**
     * Optimize the uploaded image.
     */
    protected function optimizeImage(TemporaryUploadedFile $file): void
    {
        if (!$this->isImageFile($file)) {
            return;
        }

        try {
            $filePath = $file->getRealPath();
            
            $optimizerChain = app(OptimizerChain::class);
            $optimizerChain->optimize($filePath);
            
        } catch (\Exception $e) {
            // Log the error but don't fail the upload
            logger()->warning('Image optimization failed: ' . $e->getMessage());
        }
    }

    /**
     * Check if the file is an image.
     */
    protected function isImageFile(TemporaryUploadedFile $file): bool
    {
        $mimeType = $file->getMimeType();
        
        return in_array($mimeType, [
            'image/jpeg',
            'image/png',
            'image/webp',
            'image/gif',
        ]);
    }
}

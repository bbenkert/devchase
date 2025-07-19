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
        // Add more defensive checks
        if (!isset($event->file) || 
            !($event->file instanceof TemporaryUploadedFile) ||
            !$event->file->exists()) {
            return;
        }

        $this->optimizeImage($event->file);
    }

    /**
     * Optimize the uploaded image.
     */
    protected function optimizeImage(TemporaryUploadedFile $file): void
    {
        // Additional safety checks
        if (!$file->exists() || !$this->isImageFile($file)) {
            return;
        }

        try {
            $filePath = $file->getRealPath();
            
            // Ensure file path exists and is readable
            if (!$filePath || !file_exists($filePath) || !is_readable($filePath)) {
                return;
            }
            
            $optimizerChain = app(OptimizerChain::class);
            $optimizerChain->optimize($filePath);
            
        } catch (\Exception $e) {
            // Log the error but don't fail the upload
            logger()->warning('Image optimization failed: ' . $e->getMessage(), [
                'file_path' => $filePath ?? 'unknown',
                'file_name' => $file->getClientOriginalName() ?? 'unknown'
            ]);
        }
    }

    /**
     * Check if the file is an image.
     */
    protected function isImageFile(TemporaryUploadedFile $file): bool
    {
        try {
            $mimeType = $file->getMimeType();
            
            return $mimeType && in_array($mimeType, [
                'image/jpeg',
                'image/png',
                'image/webp',
                'image/gif',
            ]);
        } catch (\Exception $e) {
            // If we can't determine the mime type, assume it's not an image
            logger()->warning('Could not determine mime type for uploaded file: ' . $e->getMessage());
            return false;
        }
    }
}

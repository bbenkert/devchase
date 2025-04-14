<?php
namespace App\Observers;

use App\Models\Project;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\Storage;

class ProjectObserver
{
    public function saved(Project $project): void
    {
        if (!$project->screenshot) {
            return;
        }

        $filePath = storage_path('app/public/' . $project->screenshot);

        // Only optimize PNG files
        if (file_exists($filePath) && mime_content_type($filePath) === 'image/png') {
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($filePath);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Queue;
use App\Jobs\GenerateSitemap;
use App\Models\ChildcareCenter;
use App\Models\Kindergarten;
use App\Models\AcademyInfo;
use App\Models\PublicServiceInfo;


class SitemapController extends Controller
{
    public function index()
    {
        $models = [
            ChildcareCenter::class,
            Kindergarten::class,
            AcademyInfo::class,
            PublicServiceInfo::class
        ];
    
        foreach ($models as $model) {
            $totalDataCount = $model::count();
            $chunkSize = 2000;
    
            for ($i = 0; $i < $totalDataCount; $i += $chunkSize) {
                $fileCount = ($i / $chunkSize) + 1;
                Queue::push(new GenerateSitemap($model, $fileCount, $i, $chunkSize));
            }
        }
    
        return response()->json(['message' => 'Sitemap generation started.']);
    }
    
}

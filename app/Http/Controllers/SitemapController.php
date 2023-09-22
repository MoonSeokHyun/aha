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
        $totalDataCount = ChildcareCenter::count();
        $chunkSize = 2000;  // Or any reasonable size to prevent timeout
    
        for ($i = 0; $i < $totalDataCount; $i += $chunkSize) {
            $fileCount = ($i / $chunkSize) + 1;
            Queue::push(new GenerateSitemap($fileCount, $i, $chunkSize));
        }
    
        return response()->json(['message' => 'Sitemap generation started.']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ChildcareCenter;
use App\Models\Kindergarten;
use App\Models\AcademyInfo;
use App\Models\PublicServiceInfo;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemapIndex = [];
        $fileCount = 1;
        $chunkSize = 20000;
    
        // 어린이집 정보 추가
        $this->processData(ChildcareCenter::query(), 'childcare', $chunkSize, $sitemapIndex, $fileCount);
    
        // 유치원 정보 추가
        $this->processData(Kindergarten::query(), 'kindergartens', $chunkSize, $sitemapIndex, $fileCount);
    
        // 학원 정보 추가
        $this->processData(AcademyInfo::query(), 'academy_info', $chunkSize, $sitemapIndex, $fileCount);
    
        // PublicServiceInfo 정보 추가 (새로 추가된 부분)
        $this->processData(PublicServiceInfo::query(), 'public-service-info', $chunkSize, $sitemapIndex, $fileCount); // PublicServiceInfo 모델을 여기에 추가
    
        // 중복 제거
        $sitemapIndex = array_unique($sitemapIndex);
    
        // Write sitemap index
        $sitemapIndexXml = view('sitemap_index', ['sitemaps' => $sitemapIndex])->render();
        $filePath = public_path('sitemap_index.xml');
        file_put_contents($filePath, $sitemapIndexXml);
    
        return response()->file($filePath);
    }

    private function processData($query, $pathSegment, $chunkSize, &$sitemapIndex, &$fileCount)
    {
        $count = 0;
        $urls = [];

        $query->chunk($chunkSize, function ($items) use (&$count, &$urls, &$fileCount, &$sitemapIndex, $pathSegment) {
            foreach ($items as $item) {
                $count++;
                $lastmod = $item->updated_at ? $item->updated_at->toAtomString() : now()->toAtomString();
                $urls[] = [
                    'loc' => 'https://rangkingedu.shop/' . $pathSegment . '/' . $item->id,
                    'lastmod' => $lastmod,
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];

                if ($count >= 50000) {
                    $this->writeSitemap($urls, $fileCount);
                    $sitemapIndex[] = url("sitemap{$fileCount}.xml.gz");
                    $urls = [];
                    $count = 0;
                    $fileCount++;
                }
            }
        });

        // If there are remaining URLs that haven't been written, write them
        if ($count > 0) {
            $this->writeSitemap($urls, $fileCount);
            $sitemapIndex[] = url("sitemap{$fileCount}.xml.gz");
            $fileCount++;
        }
    }

    private function writeSitemap($urls, $fileCount)
    {
        $sitemap = view('sitemap', ['urls' => $urls])->render();
        $compressed = gzencode($sitemap, 9);
        $filePath = public_path("sitemap{$fileCount}.xml.gz");

        file_put_contents($filePath, $compressed);
    }
}

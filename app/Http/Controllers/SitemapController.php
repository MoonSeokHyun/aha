<?php

namespace App\Http\Controllers;

use App\Models\ChildcareCenter;
use App\Models\Kindergarten;
use App\Models\AcademyInfo;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemapIndex = [];
        $fileCount = 1;
        $chunkSize = 20000;

        $this->processData(ChildcareCenter::query(), 'childcare', $chunkSize, $sitemapIndex, $fileCount);
        $this->processData(Kindergarten::query(), 'kindergartens', $chunkSize, $sitemapIndex, $fileCount);
        $this->processData(AcademyInfo::query(), 'academy_info', $chunkSize, $sitemapIndex, $fileCount);

        $sitemapIndex = array_values(array_unique($sitemapIndex)); // 중복 제거 및 재색인

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

        if ($count > 0) {
            $this->writeSitemap($urls, $fileCount);
            $sitemapIndex[] = url("sitemap{$fileCount}.xml.gz");
            $fileCount++;
        }
    }

    private function writeSitemap($urls, $fileCount)
    {
        $xmlHeader = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap = view('sitemap', ['urls' => $urls])->render();
        $compressed = gzencode("{$xmlHeader}\n{$sitemap}", 9);
        $filePath = public_path("sitemap{$fileCount}.xml.gz");

        file_put_contents($filePath, $compressed);
    }
}

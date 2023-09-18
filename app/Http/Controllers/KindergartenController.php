<?php

namespace App\Http\Controllers;

use App\Models\ChildcareCenter;
use App\Models\Kindergarten;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [];
        $sitemapIndex = [];
        $count = 0;
        $fileCount = 1;

        // 어린이집 정보 추가
        $childCares = ChildcareCenter::all();
        foreach ($childCares as $childCare) {
            $count++;
            $urls[] = [
                'loc' => url('/childcare/' . $childCare->id),
                'lastmod' => $childCare->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ];

            if ($count >= 50000) {
                $this->writeSitemap($urls, $fileCount);
                $sitemapIndex[] = url("sitemap{$fileCount}.xml.gz");
                $urls = [];
                $count = 0;
                $fileCount++;
            }
        }

        // 유치원 정보 추가
        $kindergartens = Kindergarten::all();
        foreach ($kindergartens as $kindergarten) {
            $count++;
            $urls[] = [
                'loc' => url('/kindergartens/' . $kindergarten->id),
                'lastmod' => $kindergarten->updated_at->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ];

            if ($count >= 50000) {
                $this->writeSitemap($urls, $fileCount);
                $sitemapIndex[] = url("sitemap{$fileCount}.xml.gz");
                $urls = [];
                $count = 0;
                $fileCount++;
            }
        }

        if ($count > 0) {
            $this->writeSitemap($urls, $fileCount);
            $sitemapIndex[] = url("sitemap{$fileCount}.xml.gz");
        }

        // Write sitemap index
        $sitemapIndexXml = view('sitemap_index', ['sitemaps' => $sitemapIndex])->render();
        $filePath = public_path('sitemap_index.xml');
        file_put_contents($filePath, $sitemapIndexXml);

        return response()->file($filePath);
    }

    private function writeSitemap($urls, $fileCount)
    {
        $sitemap = view('sitemap', ['urls' => $urls])->render();
        $compressed = gzencode($sitemap, 9);
        $filePath = public_path("sitemap{$fileCount}.xml.gz");
        file_put_contents($filePath, $compressed);
    }
}

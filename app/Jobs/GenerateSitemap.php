<?php

// GenerateSitemap.php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\ChildcareCenter;

class GenerateSitemap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fileCount;
    protected $offset;
    protected $limit;

    public function __construct($fileCount, $offset, $limit)
    {
        $this->fileCount = $fileCount;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public function handle()
    {
        $sitemapIndex = [];
        $query = ChildcareCenter::query()->offset($this->offset)->limit($this->limit);
        $this->processData($query, 'childcare', $sitemapIndex, $this->fileCount);

        // Your logic for saving the sitemap index
    }

    private function processData($query, $pathSegment, &$sitemapIndex, $fileCount)
    {
        $urls = [];
        $query->each(function ($item) use (&$urls, $pathSegment, $fileCount, &$sitemapIndex) {
            $filePath = public_path("sitemap{$fileCount}.xml.gz");

            if (file_exists($filePath)) {
                return;
            }

            $lastmod = $item->updated_at ? $item->updated_at->toAtomString() : now()->toAtomString();
            $urls[] = [
                'loc' => 'https://rangkingedu.shop/' . $pathSegment . '/' . $item->id,
                'lastmod' => $lastmod,
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        });

        $this->writeSitemap($urls, $fileCount);
        $sitemapIndex[] = url("sitemap{$fileCount}.xml.gz");
    }

    private function writeSitemap($urls, $fileCount)
    {
        $sitemap = view('sitemap', ['urls' => $urls])->render();
        $compressed = gzencode($sitemap, 9);
        $filePath = public_path("sitemap{$fileCount}.xml.gz");
        file_put_contents($filePath, $compressed);
    }
}

// In your controller or command, where you dispatch the job
$totalDataCount = ChildcareCenter::count();
$chunkSize = 2000;  // Or any reasonable size to prevent timeout

for ($i = 0; $i < $totalDataCount; $i += $chunkSize) {
    $fileCount = ($i / $chunkSize) + 1;
    dispatch(new GenerateSitemap($fileCount, $i, $chunkSize));
}

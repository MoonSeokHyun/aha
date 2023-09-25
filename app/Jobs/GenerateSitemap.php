<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class GenerateSitemap implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $model;
    protected $fileCount;
    protected $offset;
    protected $limit;

    public function __construct($model, $fileCount, $offset, $limit)
    {
        $this->model = $model;
        $this->fileCount = $fileCount;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public function handle()
    {
        $query = $this->model::query()->offset($this->offset)->limit($this->limit);
        $pathSegment = strtolower(class_basename($this->model));

        $sitemapIndex = Cache::get('sitemapIndex', []);
        $this->processData($query, $pathSegment, $sitemapIndex, $this->fileCount);

        Cache::forever('sitemapIndex', $sitemapIndex);
    }

    private function processData($query, $pathSegment, &$sitemapIndex, $fileCount)
    {
        $urls = [];
        $query->each(function ($item) use (&$urls, $pathSegment) {
            $urls[] = [
                'loc' => 'https://rangkingedu.shop/' . $pathSegment . '/' . $item->id,
                'lastmod' => $item->updated_at ? $item->updated_at->toAtomString() : now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        });

        $this->writeSitemap($urls, $fileCount);
        $sitemapIndex[] = 'https://rangkingedu.shop/sitemap' . $fileCount . '.xml.gz';
    }

    private function writeSitemap($urls, $fileCount)
    {
        $sitemap = view('sitemap', ['urls' => $urls])->render();
        $compressed = gzencode($sitemap, 9);
        $filePath = public_path("sitemap{$fileCount}.xml.gz");
        file_put_contents($filePath, $compressed);
    }
}

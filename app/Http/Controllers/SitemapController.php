namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
        $sitemapIndex = [];
        $query = $this->model::query()->offset($this->offset)->limit($this->limit);
        $pathSegment = strtolower(class_basename($this->model));
        $this->processData($query, $pathSegment, $sitemapIndex, $this->fileCount);

        $sitemapIndexXml = view('sitemap_index', ['sitemaps' => $sitemapIndex])->render();
        $filePath = public_path('sitemap_index.xml');
        file_put_contents($filePath, $sitemapIndexXml);
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

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($sitemaps as $sitemap)
        <sitemap>
            <loc>{{ $sitemap }}</loc>
            <lastmod>{{ now()->toAtomString() }}</lastmod>
        </sitemap>
    @endforeach
</sitemapindex>

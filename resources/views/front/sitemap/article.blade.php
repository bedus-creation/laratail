<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach ($articles as $item)
    <url>
        <loc>{{$item->link()}}</loc>
        <image:image>
            <image:loc>{{url('/img/logo.png')}}</image:loc>
            <image:caption>Laratail Logo</image:caption>
        </image:image>
        <changefreq>yearly</changefreq>
        <lastmod>{{$item->updated_at->format('Y-m-d\TH:i:s+05:00')}}</lastmod>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>

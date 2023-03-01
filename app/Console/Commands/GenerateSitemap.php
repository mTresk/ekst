<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate the sitemap.';

    public function handle()
    {
        $url = config('sitemap.crawl_url');
        $path = 'public/sitemap.xml';
        SitemapGenerator::create($url)->writeToFile($path);
    }
}

<?php

use GuzzleHttp\RequestOptions;
use Spatie\Sitemap\Crawler\Profile;

return [

    /*
     * These options will be passed to GuzzleHttp\Client when it is created.
     * For in-depth information on all options see the Guzzle docs:
     *
     * http://docs.guzzlephp.org/en/stable/request-options.html
     */
    'guzzle_options' => [

        /*
         * Whether or not cookies are used in a request.
         */
        RequestOptions::COOKIES => true,

        /*
         * The number of seconds to wait while trying to connect to a server.
         * Use 0 to wait indefinitely.
         */
        RequestOptions::CONNECT_TIMEOUT => 10,

        /*
         * The timeout of the request in seconds. Use 0 to wait indefinitely.
         */
        RequestOptions::TIMEOUT => 10,

        /*
         * Describes the redirect behavior of a request.
         */
        RequestOptions::ALLOW_REDIRECTS => false,
    ],

    /*
     * The sitemap generator can execute JavaScript on each page so it will
     * discover links that are generated by your JS scripts. This feature
     * is powered by headless Chrome.
     */
    'execute_javascript' => false,

    /*
     * The package will make an educated guess as to where Google Chrome is installed.
     * You can also manually pass its location here.
     */
    'chrome_binary_path' => null,

    /*
     * The sitemap generator uses a CrawlProfile implementation to determine
     * which urls should be crawled for the sitemap.
     */
    'crawl_profile' => Profile::class,

    'crawl_url' => env('CRAWL_URL', 'https://ekst.ru'),

];

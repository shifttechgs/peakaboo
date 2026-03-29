<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Data\MockData;

class SitemapController extends Controller
{
    public function index()
    {
        $programs = collect(MockData::programs());

        $urls = [
            // Core pages — highest priority
            ['loc' => route('home'),        'changefreq' => 'weekly',  'priority' => '1.0', 'lastmod' => date('Y-m-d')],
            ['loc' => route('programs'),    'changefreq' => 'monthly', 'priority' => '0.9', 'lastmod' => date('Y-m-d')],
            ['loc' => route('fees'),        'changefreq' => 'monthly', 'priority' => '0.9', 'lastmod' => date('Y-m-d')],
            ['loc' => route('about'),       'changefreq' => 'monthly', 'priority' => '0.8', 'lastmod' => date('Y-m-d')],
            ['loc' => route('faq'),         'changefreq' => 'monthly', 'priority' => '0.8', 'lastmod' => date('Y-m-d')],
            ['loc' => route('book-tour'),   'changefreq' => 'weekly',  'priority' => '0.9', 'lastmod' => date('Y-m-d')],
            ['loc' => route('enrol.index'), 'changefreq' => 'weekly',  'priority' => '0.9', 'lastmod' => date('Y-m-d')],
            ['loc' => route('contact'),     'changefreq' => 'monthly', 'priority' => '0.7', 'lastmod' => date('Y-m-d')],
            ['loc' => route('gallery'),     'changefreq' => 'monthly', 'priority' => '0.6', 'lastmod' => date('Y-m-d')],
        ];

        // Individual programme pages
        foreach ($programs as $program) {
            $urls[] = [
                'loc'        => route('program.detail', $program['id']),
                'changefreq' => 'monthly',
                'priority'   => '0.8',
                'lastmod'    => date('Y-m-d'),
            ];
        }

        return response()->view('public.sitemap', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }
}


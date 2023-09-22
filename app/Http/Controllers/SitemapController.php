<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Queue;
use App\Jobs\GenerateSitemap;

class SitemapController extends Controller
{
    public function index()
    {
        // Sitemap 생성 작업을 Queue에 추가
        Queue::push(new GenerateSitemap());

        // 응답 메시지 반환
        return response()->json(['message' => 'Sitemap generation started.']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ChildcareCenter;  // 모델 사용, 필요에 따라 변경해주세요.
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $childCares = ChildcareCenter::all();  // 데이터베이스에서 어린이집 정보를 모두 가져옵니다.
        $urls = [];
    
        foreach ($childCares as $childCare) {
            // 여기에 추가
            if ($childCare->updated_at === null) {
                $lastmod = now()->toAtomString();  // 현재 시간을 사용
            } else {
                $lastmod = $childCare->updated_at->toAtomString();
            }
    
            $urls[] = [
                'loc' => url('/childcare/' . $childCare->id),
                'lastmod' => $lastmod,
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ];
        }
    
        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }
}

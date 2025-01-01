<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CPIController extends Controller
{
    public function index()
    {
        // API URL
        $apiUrl = 'http://profitlens_python:8000/indicators/cpi/jp';

        // APIからデータを取得
        $response = Http::get($apiUrl);

        if ($response->failed()) {
            return view('cpi.index', ['error' => 'CPIデータの取得に失敗しました。']);
        }

        // JSONレスポンスをデコード
        $data = $response->json();

        // CPIデータ部分を取得
        $cpiData = $data[1]; // 2番目の配列がCPIデータ

        // 最新のCPI値と直前のCPI値を取得
        $latestCPI = reset($cpiData); // 最新のデータ（配列の最初）
        $previousCPI = $cpiData[1];  // 直前のデータ（2番目）

        // 増減率を計算
        $changeRate = (($latestCPI['value'] - $previousCPI['value']) / $previousCPI['value']) * 100;

        // コメントを生成
        $comment = $changeRate > 0
            ? 'インフレ傾向にあります。投資環境に注意が必要です。'
            : 'デフレ傾向にあります。経済状況の安定性を確認してください。';

        return view('cpi.index', [
            'cpiData' => $cpiData,
            'latestCPI' => $latestCPI,
            'changeRate' => $changeRate,
            'comment' => $comment,
        ]);
    }
}

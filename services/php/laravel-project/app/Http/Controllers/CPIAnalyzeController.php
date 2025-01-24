<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CPIAnalyzeController extends Controller
{
    public function analyze()
    {
        // API URL（アナライズ用エンドポイント）
        $apiUrl = 'http://profitlens_python:8000/api/cpi/analysis';

        // APIからデータを取得
        $response = Http::get($apiUrl);

        if ($response->failed()) {
            return view('cpi.analyze', ['error' => 'CPI分析データの取得に失敗しました。']);
        }

        // JSONレスポンスをデコード
        $data = $response->json();

        // データのチェック
        if (!isset($data['average']) || !isset($data['growth_rate'])) {
            return view('cpi.analyze', ['error' => 'CPI分析データが不足しています。']);
        }

        // 平均値と増加率データ
        $averageCPI = $data['average'];
        $growthRates = $data['growth_rate']; // 年ごとの成長率

        // コメントを生成（例: 平均が一定値を超えた場合のアドバイス）
        $comment = $averageCPI > 100
            ? 'CPIの平均値が高い水準です。物価上昇リスクを考慮してください。'
            : 'CPIの平均値が安定しています。投資環境に好影響です。';

        return view('cpi.analyze', [
            'averageCPI' => $averageCPI,
            'growthRates' => $growthRates,
            'comment' => $comment,
        ]);
    }
}

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPI分析</title>
</head>

<body>
    <h1>CPI分析結果</h1>

    @if (isset($error))
    <p style="color: red;">{{ $error }}</p>
    @else
    <p><strong>CPI平均値:</strong> {{ $averageCPI }}</p>
    <h2>年ごとの成長率:</h2>
    <ul>
        @foreach ($growthRates as $year => $rate)
        <li>{{ $year }}: {{ $rate }}%</li>
        @endforeach
    </ul>
    <p><strong>コメント:</strong> {{ $comment }}</p>
    @endif
</body>

</html>
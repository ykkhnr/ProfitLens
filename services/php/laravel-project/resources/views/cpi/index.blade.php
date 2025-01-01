<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPI情報</title>
</head>
<body>
    <h1>日本の消費者物価指数 (CPI)</h1>

    @if (isset($error))
        <p style="color: red;">{{ $error }}</p>
    @else
        <table border="1">
            <tr>
                <th>年</th>
                <th>CPI値</th>
            </tr>
            @foreach ($cpiData as $item)
                <tr>
                    <td>{{ $item['date'] }}</td>
                    <td>{{ $item['value'] }}</td>
                </tr>
            @endforeach
        </table>

        <h2>最新のCPI変化率: {{ round($changeRate, 2) }}%</h2>
        <p><strong>コメント:</strong> {{ $comment }}</p>
    @endif
</body>
</html>

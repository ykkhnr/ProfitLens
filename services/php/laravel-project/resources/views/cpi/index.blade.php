<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CPI Data</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9fafb;
            color: #374151;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #1f2937;
        }
        .cpi-data {
            margin-bottom: 20px;
        }
        .cpi-item {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
        }
        .cpi-item:last-child {
            border-bottom: none;
        }
        .cpi-year {
            font-weight: 500;
        }
        .cpi-value {
            font-weight: 700;
            color: #16a34a;
        }
        .analysis {
            margin-top: 20px;
            padding: 15px;
            background-color: #f3f4f6;
            border-left: 4px solid #16a34a;
        }
        .error {
            color: #dc2626;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">CPI Data for Japan</h1>

        @if (isset($error))
            <p class="error">{{ $error }}</p>
        @else
            <div class="cpi-data">
                <h2>Recent CPI Values</h2>
                @foreach ($cpiData as $cpi)
                    <div class="cpi-item">
                        <span class="cpi-year">{{ $cpi['year'] }}:</span>
                        <span class="cpi-value">{{ number_format($cpi['value'], 2) }}</span>
                    </div>
                @endforeach
            </div>

            <div class="analysis">
                <h3>Analysis</h3>
                <p>Latest CPI Value: <strong>{{ number_format($latestCPI['value'], 2) }}</strong></p>
                <p>Change Rate: <strong>{{ number_format($changeRate, 2) }}%</strong></p>
                <p>{{ $comment }}</p>
            </div>
        @endif
    </div>
</body>
</html>

from cpi.services import get_cpi_data_service

def analyze_cpi_data():
    # データを取得（仮に日本のデータを使用）
    data = get_cpi_data_service("JP", 2010, 2023)
    values = [item['value'] for item in data['cpi_values']]

    # 平均値と増加率を計算
    average = sum(values) / len(values)
    growth_rate = [
        round((values[i] - values[i - 1]) / values[i - 1] * 100, 2)
        for i in range(1, len(values))
    ]

    return {"average": average, "growth_rate": growth_rate}

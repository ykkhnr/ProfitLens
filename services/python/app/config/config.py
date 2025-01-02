import os

class Config:
    # World Bank API URL
    CPI_API_BASE_URL = "https://api.worldbank.org/v2"
    FORMAT = "json"

    # 環境変数からAPIキーを取得（必要に応じて）
    API_KEY = os.getenv("API_KEY", "your_default_api_key")

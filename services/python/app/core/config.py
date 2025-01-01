import os

class Settings:
    API_KEY = os.getenv("API_KEY", "your_default_api_key")
    BASE_URL = "https://api.worldbank.org/v2"

settings = Settings()

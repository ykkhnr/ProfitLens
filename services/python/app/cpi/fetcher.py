import requests
from config.config import Config

def fetch_cpi_data(country_code, start_year, end_year):
    url = f"{Config.CPI_API_BASE_URL}/country/{country_code}/indicator/FP.CPI.TOTL"
    params = {"date": f"{start_year}:{end_year}", "format": Config.FORMAT}
    response = requests.get(url, params=params)
    response.raise_for_status()
    return response.json()

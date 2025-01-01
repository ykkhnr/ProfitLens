from fastapi import APIRouter, HTTPException
from core.utils import fetch_from_api

router = APIRouter()

@router.get("/cpi/{country_code}")
def get_cpi(country_code: str):
    """
    消費者物価指数（CPI）を取得
    """
    data = fetch_from_api(f"https://api.worldbank.org/v2/country/{country_code}/indicator/FP.CPI.TOTL?format=json")
    if not data:
        raise HTTPException(status_code=404, detail="CPI data not found")
    return data

@router.get("/unemployment/{country_code}")
def get_unemployment_rate(country_code: str):
    """
    失業率を取得
    """
    data = fetch_from_api(f"https://api.worldbank.org/v2/country/{country_code}/indicator/SL.UEM.TOTL.ZS?format=json")
    if not data:
        raise HTTPException(status_code=404, detail="Unemployment data not found")
    return data

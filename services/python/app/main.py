from fastapi import FastAPI
from api import indicators

app = FastAPI()

# 各APIルーターを登録
app.include_router(indicators.router, prefix="/indicators", tags=["Indicators"])

if __name__ == "__main__":
    import uvicorn
    uvicorn.run(app, host="0.0.0.0", port=8000)
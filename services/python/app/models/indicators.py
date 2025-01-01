from pydantic import BaseModel

class Indicator(BaseModel):
    country: str
    value: float
    date: str

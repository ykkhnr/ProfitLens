import requests

def fetch_from_api(url: str):
    """
    外部APIからデータを取得する汎用関数
    """
    response = requests.get(url)
    if response.status_code == 200:
        return response.json()
    return None

from cpi.fetcher import fetch_cpi_data

CACHED_CPI_DATA = {}

def get_cpi_data_service(country, start_year, end_year):
    cache_key = f"{country}-{start_year}-{end_year}"
    if cache_key in CACHED_CPI_DATA:
        return CACHED_CPI_DATA[cache_key]

    raw_data = fetch_cpi_data(country, start_year, end_year)
    cpi_values = [
        {"year": record["date"], "value": record["value"]}
        for record in raw_data[1] if record["value"] is not None
    ]

    result = {"country": country, "cpi_values": cpi_values}
    CACHED_CPI_DATA[cache_key] = result
    return result

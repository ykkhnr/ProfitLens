from flask import Blueprint, jsonify, request
from cpi.services import get_cpi_data_service
from cpi.analysis import analyze_cpi_data

cpi_blueprint = Blueprint('cpi', __name__)

@cpi_blueprint.route('/', methods=['GET'])
def get_cpi_data():
    country = request.args.get('country', 'JP')
    start_year = int(request.args.get('start_year', 2010))
    end_year = int(request.args.get('end_year', 2023))
    data = get_cpi_data_service(country, start_year, end_year)
    return jsonify(data)

@cpi_blueprint.route('/analysis', methods=['GET'])
def analyze_cpi():
    analysis_result = analyze_cpi_data()
    return jsonify(analysis_result)

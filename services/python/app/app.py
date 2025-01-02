from flask import Flask
from cpi.routes import cpi_blueprint

app = Flask(__name__)

# Blueprintを登録
app.register_blueprint(cpi_blueprint, url_prefix='/api/cpi')

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=8000)

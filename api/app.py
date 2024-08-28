from flask import Flask, request, jsonify
from models import db, Vehicle
from config import Config

app = Flask(__name__)
app.config.from_object(Config)
db.init_app(app)

@app.before_first_request
def create_tables():
    db.create_all()

# Create a new vehicle
@app.route('/vehicles', methods=['POST'])
def create_vehicle():
    data = request.get_json()
    new_vehicle = Vehicle(
        make=data['make'],
        model=data['model'],
        year=data['year'],
        price=data['price']
    )
    db.session.add(new_vehicle)
    db.session.commit()
    return jsonify({'id': new_vehicle.id}), 201

# Read all vehicles
@app.route('/vehicles', methods=['GET'])
def get_vehicles():
    vehicles = Vehicle.query.all()
    output = []
    for vehicle in vehicles:
        vehicle_data = {
            'id': vehicle.id,
            'make': vehicle.make,
            'model': vehicle.model,
            'year': vehicle.year,
            'price': vehicle.price
        }
        output.append(vehicle_data)
    return jsonify({'vehicles': output})

# Read a single vehicle
@app.route('/vehicles/<int:id>', methods=['GET'])
def get_vehicle(id):
    vehicle = Vehicle.query.get(id)
    if vehicle:
        vehicle_data = {
            'id': vehicle.id,
            'make': vehicle.make,
            'model': vehicle.model,
            'year': vehicle.year,
            'price': vehicle.price
        }
        return jsonify(vehicle_data)
    else:
        return jsonify({'message': 'Vehicle not found'}), 404

# Update a vehicle
@app.route('/vehicles/<int:id>', methods=['PUT'])
def update_vehicle(id):
    data = request.get_json()
    vehicle = Vehicle.query.get(id)
    if vehicle:
        vehicle.make = data['make']
        vehicle.model = data['model']
        vehicle.year = data['year']
        vehicle.price = data['price']
        db.session.commit()
        return jsonify({'message': 'Vehicle updated'})
    else:
        return jsonify({'message': 'Vehicle not found'}), 404

# Delete a vehicle
@app.route('/vehicles/<int:id>', methods=['DELETE'])
def delete_vehicle(id):
    vehicle = Vehicle.query.get(id)
    if vehicle:
        db.session.delete(vehicle)
        db.session.commit()
        return jsonify({'message': 'Vehicle deleted'})
    else:
        return jsonify({'message': 'Vehicle not found'}), 404

if __name__ == '__main__':
    app.run(debug=True)

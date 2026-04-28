CREATE DATABASE IF NOT EXISTS location;
USE location;

-- ----------------------------
-- Table: client
-- ----------------------------
CREATE TABLE client (
 id_client INT NOT NULL AUTO_INCREMENT,
 last_name VARCHAR(100),
 first_name VARCHAR(100),
 email VARCHAR(150),
 phone VARCHAR(20),
 adress VARCHAR(255),
 city VARCHAR(100),
 postal_code INT,
 date_of_birth DATE,
 driving_licence VARCHAR(50),
 password VARCHAR(255),
 PRIMARY KEY (id_client)
) ENGINE=InnoDB;
-- ----------------------------
-- Table: vehicle
-- ----------------------------
CREATE TABLE vehicle (
  id_vehicle INT AUTO_INCREMENT NOT NULL,
  brand VARCHAR(50) NOT NULL,
  model VARCHAR(50) NOT NULL,
  color VARCHAR(50) NOT NULL,
  gearbox VARCHAR(50) NOT NULL,
  mileage FLOAT NOT NULL,
  description TEXT NOT NULL,
  registration_plate VARCHAR(20) NOT NULL,
  fuel_type VARCHAR(255) NOT NULL,
  price FLOAT NOT NULL,
  PRIMARY KEY (id_vehicle)
) ENGINE=InnoDB;

-- ----------------------------
-- Table: reservation
-- ----------------------------
CREATE TABLE reservation (
  id_reservation INT AUTO_INCREMENT NOT NULL,
  start_date DATETIME NOT NULL,
  end_date DATETIME NOT NULL,
  reservation_date DATETIME NOT NULL,
  number_days INT NOT NULL,
  total_prices FLOAT NOT NULL,
  id_client INT NOT NULL,
  id_vehicle INT NOT NULL,
  PRIMARY KEY (id_reservation),
  FOREIGN KEY (id_client) REFERENCES client(id_client),
  FOREIGN KEY (id_vehicle) REFERENCES vehicle(id_vehicle)
) ENGINE=InnoDB;
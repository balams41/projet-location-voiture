- ----------------------------------------------------------
-- Script MYSQL pour mcd 
-- ----------------------------------------------------------


-- ----------------------------
-- Table: client
-- ----------------------------
CREATE TABLE client (
  id_client INT NOT NULL,
  last_name VARCHAR(150) NOT NULL,
  first_name VARCHAR(150) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(15) NOT NULL,
  adress VARCHAR(100) NOT NULL,
  city VARCHAR(50) NOT NULL,
  postal_code INT NOT NULL,
  date_of_birth DATE NOT NULL,
  driving_licence VARCHAR(50) NOT NULL,
  CONSTRAINT client_PK PRIMARY KEY (id_client)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: vehicle
-- ----------------------------
CREATE TABLE vehicle (
  id_vehicle INT NOT NULL,
  brand VARCHAR(50) NOT NULL,
  model VARCHAR(50) NOT NULL,
  color VARCHAR(50) NOT NULL,
  gearbox VARCHAR(50) NOT NULL,
  mileage FLOAT NOT NULL,
  description TEXT NOT NULL,
  registration_plate VARCHAR(20) NOT NULL,
  fuel_type VARCHAR(255) NOT NULL,
  price FLOAT NOT NULL,
  CONSTRAINT vehicle_PK PRIMARY KEY (id_vehicle)
)ENGINE=InnoDB;


-- ----------------------------
-- Table: reservation
-- ----------------------------
CREATE TABLE reservation (
  id_reservation INT NOT NULL,
  start_date DATETIME NOT NULL,
  end_date DATETIME NOT NULL,
  reservation_date DATETIME NOT NULL,
  number_days INT NOT NULL,
  total_prices FLOAT NOT NULL,
  id_client INT NOT NULL,
  id_vehicle INT NOT NULL,
  CONSTRAINT reservation_PK PRIMARY KEY (id_reservation),
  CONSTRAINT reservation_id_client_FK FOREIGN KEY (id_client) REFERENCES client (id_client),
  CONSTRAINT reservation_id_vehicle_FK FOREIGN KEY (id_vehicle) REFERENCES vehicle (id_vehicle)
)ENGINE=InnoDB;


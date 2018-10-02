CREATE DATABASE IF NOT EXISTS rentCarDataBase;

CREATE TABLE client (
    id int(255) auto_increment not null,
    name varchar(255),
    lastName varchar(255),
    bithDay datetime,
    address varchar(500),
    email varchar(255),
    telephone varchar(100),
    observations text,
    CONSTRAINT pkClient PRIMARY KEY(id)
)ENGINE = InnoDb;


CREATE TABLE vehicle(
    id  int(255) auto_increment not null,
    vehicleType varchar(2),
    vehicleGroup varchar(100),
    vehicleBrand varchar(255),
    vehicleModel varchar(255),
    vehicleSeats int(2),
    vehicleDoors int(2),
    vehicleTransmission varchar(100),
    vehicleFuel varchar(100),
    vehicleImage varchar(255),
    vehiclePricePerDay double(255,2),
    vehicleObservations text,
    CONSTRAINT pkVehicle PRIMARY KEY(id)
) ENGINE = InnoDb;


CREATE TABLE reservation (
    id int(255) auto_increment not null,
    vehicleId int(255) not null,
    clientId int(255) not null,
    pickUpDate datetime,
    dropOffDate datetime,
    reservationNumber varchar(100),
    totalAmount double(255,2),
    observations text,
    CONSTRAINT pkReservation PRIMARY KEY(id),
    CONSTRAINT fkReservationVehicle FOREIGN KEY(vehicleId) REFERENCES vehicle(id),
    CONSTRAINT fkReservationClient FOREIGN KEY(clientId) REFERENCES client(id)
)ENGINE = InnoDb;


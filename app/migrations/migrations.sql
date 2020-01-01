CREATE TABLE hangars(
   id serial PRIMARY KEY,
   name VARCHAR UNIQUE NOT NULL,
   created_at TIMESTAMP NOT NULL,
   updated_at TIMESTAMP
);
CREATE UNIQUE INDEX hangars_name_idx ON hangars (name);

CREATE TABLE aircraft(
   id serial PRIMARY KEY,
   name VARCHAR UNIQUE NOT NULL,
   created_at TIMESTAMP NOT NULL,
   updated_at TIMESTAMP
);
CREATE UNIQUE INDEX aircraft_name_idx ON aircraft (name);

CREATE TABLE hangar_aircrafts(
	hangar_id int,
	aircraft_type_id int,
	amount int
);
CREATE INDEX hangar_aircrafts_hangar_id_idx ON hangar_aircrafts (hangar_id);

INSERT INTO hangars (name, created_at, updated_at) VALUES ('Aeroprakt', now(), now());
INSERT INTO aircraft(name, created_at, updated_at) VALUES('Aeroprakt A-24', now(), now());
INSERT INTO aircraft(name, created_at, updated_at) VALUES('Curtiss NC-4', now(), now());
INSERT INTO aircraft(name, created_at, updated_at) VALUES('Boeing 747', now(), now());

INSERT INTO hangar_aircrafts(hangar_id, aircraft_type_id, amount) 
SELECT hangars.id, aircraft.id, 5
	FROM hangars 
	JOIN aircraft ON aircraft.name = 'Aeroprakt A-24'
WHERE hangars.name = 'Aeroprakt';

INSERT INTO hangar_aircrafts(hangar_id, aircraft_type_id, amount) 
SELECT hangars.id, aircraft.id, 3
	FROM hangars 
	JOIN aircraft ON aircraft.name = 'Curtiss NC-4'
WHERE hangars.name = 'Aeroprakt';

INSERT INTO hangar_aircrafts(hangar_id, aircraft_type_id, amount) 
SELECT hangars.id, aircraft.id, 2
	FROM hangars 
	JOIN aircraft ON aircraft.name = 'Boeing 747'
WHERE hangars.name = 'Aeroprakt';
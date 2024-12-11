CREATE SCHEMA IF NOT EXISTS `LocationMusique` DEFAULT CHARACTER SET utf8 ;
USE `LocationMusique`;

-- --------------------------------------------------
-- Table `LocationMusique`.`Clients`
-- --------------------------------------------------
CREATE TABLE Clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(45) NOT NULL,
    address VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- --------------------------------------------------
-- Table `LocationMusique`.`Instrument`
-- --------------------------------------------------
CREATE TABLE Instrument (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    type VARCHAR(50),
    price_per_day INT NOT NULL, 
    availability BOOLEAN NOT NULL DEFAULT TRUE,
    PRIMARY KEY (id)
);

-- --------------------------------------------------
-- Table `LocationMusique`.`Rental`
-- --------------------------------------------------
CREATE TABLE Rental (
    id INT NOT NULL AUTO_INCREMENT,
    client_id INT NOT NULL,
    instrument_id INT NOT NULL,
    rental_duration INT NOT NULL, -- Durée de location en jours 
    rental_cost INT NOT NULL,     
    rental_date DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (client_id) REFERENCES Client(id),
    FOREIGN KEY (instrument_id) REFERENCES Instrument(id)
);

-- --------------------------------------------------
-- Table `LocationMusique`.`Paiement`
-- --------------------------------------------------
CREATE TABLE Paiement (
    id INT NOT NULL AUTO_INCREMENT,
    rental_id INT NOT NULL,      
    amount INT NOT NULL,         
    payment_date DATE NOT NULL,  
    payment_method VARCHAR(50),  
    PRIMARY KEY (id),
    FOREIGN KEY (rental_id) REFERENCES Rental(id)
);

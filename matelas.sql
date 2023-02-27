CREATE DATABASE literie3000;
USE literie3000;

CREATE TABLE matelas (
    id TINYINT AUTO_INCREMENT NOT NULL,
    brand VARCHAR(50),
    name VARCHAR(150),
    dimensions VARCHAR(30),
    image VARCHAR(150),
    price DEC,
    discount DEC
);

INSERT INTO matelas (brand,name,dimensions,image, price, discount) VALUES 
("EPEDA", "Matelas Transition", "90x190", "https://media.auchan.fr/0765a5af-ff80-4eae-8d28-13da5df2ae04_1200x1200/B2CD/", 759.00, 529.00),
("DREAMWAY", "Matelas Stan", "90x190", "https://cdn.manomano.com/matelas-90x190cm-epaisseur-16-cm-luxe-matelas-memoire-de-forme-pour-adulte-enfant-7-zones-de-confort-mousse-memoire-adaptative-90x190x16cm-T-28057121-76952784_1.jpg", 809.00, 709.00),
("BULTEX", "Matelas Teamasse", "140x190", "https://cdn.manomano.com/matelas-140x190cm-epaisseur-28-cm-luxe-matelas-memoire-de-forme-pour-adulte-enfant-7-zones-de-confort-mousse-memoire-adaptative-140x190x28cm-T-27959303-73025248_1.jpg", 759.00, 529.00),
("EPEDA", "Matelas Coup de Boule", "160x200", "https://cdn.shopify.com/s/files/1/0586/0327/4378/products/BES-1.jpg?v=1672737060&width=1920", 1019.00, 509.00);




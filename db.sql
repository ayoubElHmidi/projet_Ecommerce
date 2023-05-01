create DATABASE projet_ecommerce;
use projet_ecommerce;
create table categories (
    idCat int primary key auto_increment ,
    nomCat VARCHAR(100),
    descriptionCat text ,
    photoCat varchar(100)
);
CREATE table produits(
    idPro int primary key auto_increment, 
    nomPro varchar(100),
    descriptionPro text ,
    photo varchar(100),    
    prixPro decimal(10.2), 
    qtePro int ,  
    idCat int,  
    Foreign Key (idCat) REFERENCES categories(idCat)
);
create table users(
    id int primary key auto_increment,
    name varchat (100),
    email VARCHAR(100),
    email_verified_at timestamp null ,
    password varchar(100)
);

create Table panies(
    idPanie int PRIMARY key auto_increment,
    id int,
    idPro int,
    qteV decimal(10.2),
    prixTTC DECIMAL(10.2),
    Foreign Key (id) REFERENCES users(id),
    Foreign Key (idPro) REFERENCES produits(idPro)
);
create table commandes(
    idCom int primary key auto_increment,
    id int,
    idPanie int,
    dateCom DATE  ,
    Foreign Key (id) REFERENCES users(id),
    Foreign Key (idPanie) REFERENCES panies(idPanie)
);
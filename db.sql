create DATABASE projet_ecommerce;
use projet_ecommerce;
    create table users(
        id int primary key auto_increment,
        name varchar (100),
        email VARCHAR(100),
        email_verified_at timestamp null ,
        is_admin boolean default 0,
        password varchar(100)
    );
    create table categories (
        idCat int primary key auto_increment ,
        nomCat VARCHAR(100),
        descriptionCat text ,
        photoCat varchar(100)
    );
INSERT INTO categories VALUES (1,"Femmes ",' Cette catégorie comprend tous les vêtements pour les femmes, tels que des robes, des jupes, des blouses, des t-shirts, des pantalons, des shorts, des vestes, des manteaux, des pulls, des sweats, des chaussures, des accessoires','cat1.jpg');
INSERT INTO categories VALUES (2,"Hommes",' Cette catégorie comprend tous les vêtements pour les hommes, tels que des chemises, des polos, des t-shirts, des pantalons, des shorts, des costumes, des vestes, des manteaux, des pulls, des sweats, des chaussures, des accessoires','cat2.jpg');
INSERT INTO categories VALUES (3,"Enfants ",' Cette catégorie comprend tous les vêtements pour les enfants, tels que des t-shirts, des pantalons, des shorts, des robes, des jupes, des vestes, des manteaux, des pulls, des sweats, des chaussures, des accessoires,','cat3.jpg');
INSERT INTO categories VALUES (4,"Vêtements de sport","Cette catégorie comprend tous les vêtements de sport pour hommes, femmes et enfants, tels que des t-shirts, des shorts, des leggings, des vestes de sport, des pantalons de jogging, des survêtements, des chaussures de sport, Ces vêtements sont spécialement conçus pour être portés pendant l'exercice physique et offrent souvent des fonctionnalités supplémentaires, telles que des tissus respirants et extensibles",'cat4.jpg');
INSERT INTO categories VALUES (5,"Accessoires ",'Cette catégorie comprend tous les accessoires pour hommes, femmes et enfants, tels que des sacs, des portefeuilles, des chapeaux, des bijoux, des écharpes, des ceintures, des lunettes de soleil, des montres, des gants','cat5.jpg');
INSERT INTO categories VALUES (6,"Chaussures ",' Cette catégorie comprend tous les types de chaussures pour hommes, femmes et enfants, telles que des chaussures de sport, des bottes, des bottines, des escarpins, des sandales, des chaussures de ville','cat6.jpg');

=======
create table users(
    id int primary key auto_increment,
    name varchar(100),
    email VARCHAR(100),
    email_verified_at timestamp null ,
    is_admin boolean default 0,
    password varchar(100)
);
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

select * from produits where idCat = 1
$produits = DB::table('produits')
                ->where('idCat', '=', '$idCat')
                ->get();


$produits = DB::table('produits')->get();
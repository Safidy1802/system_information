drop database takalo;
create database takalo;
use takalo;

create table user(
    iduser int primary key auto_increment,
    nom varchar(250),
    prenom varchar(250),
    email varchar(250),
    mdp varchar(250),
    dtn date,
    genre varchar(250),
    isadmin int
);

insert into user values(null,"ADMIN","admin","admin@gmail.com","qwerty",'2003-04-19',"homme",1);
insert into user values(null,"Ony","Tsiory","tsiory@gmail.com","veloma",'2003-07-23',"femme",0);
insert into user values(null,"isabelle","fifalina","alain@gmail.com","non",'1999-12-23',"femme",0);

create table categorie(
    idcategorie int primary key auto_increment,
    nom varchar(250)
);

create table objet(
    idobjet int primary key auto_increment,
    nom varchar(250),
    description varchar(250),
    prix double,
    iduser int,
    foreign key (iduser) references user(iduser)
    
);
insert into objet values(null,"bague","joli",1000,1);
insert into objet values(null,"pc","classe",500,1);
insert into objet values(null,"ipods","joli",1501,1);
insert into objet values(null,"telephone","joli",120,1);
insert into objet values(null,"chemise","super",300,1);
insert into objet values(null,"tourne_vis","joli",456,1);
insert into objet values(null,"cahier","joli",78,1);
insert into objet values(null,"tronsoneuse","joli",1000,1);
insert into objet values(null,"ecouteur","joli",1563,1);
insert into objet values(null,"pantalon","joli",4,1);
insert into objet values(null,"asus","cva be",1564,1);
insert into objet values(null,"stylo","joli",1,1);
insert into objet values(null,"sechecheveu","joli",1235,1);

insert into objet values(null,"bague2","beau",1000,2);
insert into objet values(null,"pc2","classe",500,2);
insert into objet values(null,"ipods2","beau",1501,2);
insert into objet values(null,"telephone2","beau",120,2);
insert into objet values(null,"chemise2","super",300,2);
insert into objet values(null,"tourne_vis2","beau",456,2);
insert into objet values(null,"cahier2","beau",78,2);
insert into objet values(null,"tronsoneuse2","beau",1000,2);
insert into objet values(null,"ecouteur2","beau",1563,2);
insert into objet values(null,"pantalon2","beau",4,2);
insert into objet values(null,"asus2","beau",1564,2);
insert into objet values(null,"stylo2","beau",1,2);
insert into objet values(null,"sechecheveu2","beau",1235,2);

insert into objet values(null,"asus","cva be",1564,3);
insert into objet values(null,"stylo","joli",1,3);
insert into objet values(null,"sechecheveu","joli",1235,3);

create table objetcategorie(
    idobjetcategorie int primary key auto_increment,
    idobjet int not null,
    foreign key (idobjet) references objet(idobjet),
    idcategorie int not null,
    foreign key (idcategorie) references categorie(idcategorie)
);

create table photo(
    idphoto int primary key auto_increment,
    idobjet int,
    path varchar(250),
    foreign key (idobjet) references objet(idobjet)
);

insert into photo values(null,1,"bague.jpg");
insert into photo values(null,2,"pc.jpeg");
insert into photo values(null,3,"ipods.jpg");
insert into photo values(null,4,"telephone.jpg");
insert into photo values(null,5,"chemise.jpeg");
insert into photo values(null,6,"tourne_vis.jpg");
insert into photo values(null,7,"cahier.jpg");
insert into photo values(null,8,"tronsoneuse.jpg");
insert into photo values(null,9,"ecouteur.jpg");
insert into photo values(null,10,"patalon.jpg");
insert into photo values(null,11,"asus.jpg");
insert into photo values(null,12,"stylo.jpg");
insert into photo values(null,13,"sechecheveu.jpg");

insert into photo values(null,14,"bague.jpg");
insert into photo values(null,15,"pc.jpeg");
insert into photo values(null,16,"ipods.jpg");
insert into photo values(null,17,"telephone.jpg");
insert into photo values(null,18,"chemise.jpeg");
insert into photo values(null,19,"tourne_vis.jpg");
insert into photo values(null,20,"cahier.jpg");
insert into photo values(null,21,"tronsoneuse.jpg");
insert into photo values(null,22,"ecouteur.jpg");
insert into photo values(null,23,"patalon.jpg");
insert into photo values(null,24,"asus.jpg");
insert into photo values(null,25,"stylo.jpg");
insert into photo values(null,26,"sechecheveu.jpg");

insert into photo values(null,27,"asus.jpg");
insert into photo values(null,28,"stylo.jpg");
insert into photo values(null,29,"sechecheveu.jpg");


create table demande(
    iddemande int primary key auto_increment,
    datedemande datetime,
    idmpangataka int not null,
    foreign key (idmpangataka) references user(iduser),
    idangatahana int not null,
    foreign key (idangatahana) references user(iduser),
    idobjmpangataka int not null,
    foreign key (idobjmpangataka) references objet(idobjet),
    idobjangatahana int not null,
    foreign key (idobjangatahana) references objet(idobjet),
    etatdemande varchar(250)
);

create table echange(
    idechange int primary key auto_increment,
    dateechange datetime,
    idproprio int not null,
    idobjet int not null,
    idnouveauproprio int not null
);


insert into categorie values(null,"vetement");
insert into categorie values(null,"technologie");
insert into categorie values(null,"bijou");
insert into categorie values(null,"music");
insert into categorie values(null,"utilitaire");
insert into categorie values(null,"outil");



insert into objetcategorie values(null,1,3);
insert into objetcategorie values(null,2,2);
insert into objetcategorie values(null,5,1);
insert into objetcategorie values(null,3,2);
insert into objetcategorie values(null,4,2);
insert into objetcategorie values(null,6,6);
insert into objetcategorie values(null,7,5);
insert into objetcategorie values(null,8,6);
insert into objetcategorie values(null,9,4);
insert into objetcategorie values(null,10,1);
insert into objetcategorie values(null,11,2);
insert into objetcategorie values(null,12,5);
insert into objetcategorie values(null,13,5);

insert into objetcategorie values(null,14,3);
insert into objetcategorie values(null,15,2);
insert into objetcategorie values(null,18,1);
insert into objetcategorie values(null,16,2);
insert into objetcategorie values(null,17,2);
insert into objetcategorie values(null,19,6);
insert into objetcategorie values(null,20,5);
insert into objetcategorie values(null,21,6);
insert into objetcategorie values(null,22,4);
insert into objetcategorie values(null,23,1);
insert into objetcategorie values(null,24,2);
insert into objetcategorie values(null,25,5);
insert into objetcategorie values(null,26,5);


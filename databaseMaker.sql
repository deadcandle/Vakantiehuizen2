
drop database vakantiehuizen;
create database vakantiehuizen;
use vakantiehuizen;

create table teksten (
	id int auto_increment,
    pagina varchar(255),
    titel varchar(255),
    tekst varchar(255),
    primary key (id)
);

create table huizen (
	id int auto_increment,
    huis varchar(255),
    personen int(6),
    omschrijving varchar(255),
    prijs float(6),
    primary key (id)
);

-- opdracht 14: afbeeldingen voor de huizen
create table afbeeldingen (
	huis_id int,
    id int auto_increment,
    afbeelding varchar(255),
    primary key (id),
    foreign key (huis_id) references huizen (id)
);


-- inserts:

-- paginas:
insert into teksten (pagina, titel, tekst) values ("index", "de titel Homepagina", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nam eaque, corporis nostrum quo qui similique quidem culpa explicabo maiores laboriosam dolore alias eveniet, facilis consequatur tempore esse distinctio repudiandae.");
insert into teksten (pagina, titel, tekst) values ("huizen", "de titel Huizen", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nam eaque, corporis nostrum quo qui similique quidem culpa explicabo maiores laboriosam dolore alias eveniet, facilis consequatur tempore esse distinctio repudiandae.");
insert into teksten (pagina, titel, tekst) values ("contact", "de titel Contact", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nam eaque, corporis nostrum quo qui similique quidem culpa explicabo maiores laboriosam dolore alias eveniet, facilis consequatur tempore esse distinctio repudiandae.");

-- Voeg de huizen toe
insert into huizen (huis, personen, omschrijving, prijs) values ("Plaats1", 8, "Dit is een huis omschrijving", 95.00);
insert into huizen (huis, personen, omschrijving, prijs) values ("Plaats2", 12, "Dit is een huis omschrijving", 120.00);
insert into huizen (huis, personen, omschrijving, prijs) values ("Plaats3", 10, "Dit is een huis omschrijving", 110.50);
insert into huizen (huis, personen, omschrijving, prijs) values ("Plaats4", 16, "Dit is een huis omschrijving (dit huis lijd aan te veel armoede, er zijn dus geen fotos van.", 135.95);

-- afbeeldingen voor de huizen (slechts 3 soorten)
insert into afbeeldingen (huis_id, afbeelding) values (1, "huis1.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (2, "huis2.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (3, "armoedehuis.jpg");

insert into afbeeldingen (huis_id, afbeelding) values (1, "huis1.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (2, "armoedehuis.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (3, "armoedehuis.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (1, "huis1.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (2, "foto.png");
insert into afbeeldingen (huis_id, afbeelding) values (3, "huis2.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (1, "huis1.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (2, "huis2.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (3, "huis1.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (1, "foto.png");
insert into afbeeldingen (huis_id, afbeelding) values (2, "foto.png");
insert into afbeeldingen (huis_id, afbeelding) values (3, "huis1.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (1, "huis1.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (2, "huis2.jpg");
insert into afbeeldingen (huis_id, afbeelding) values (3, "armoedehuis.jpg");




-- (TEST) selecteer huisen en de fotos met mySQL JOIN
select a.afbeelding, h.huis from afbeeldingen a inner join huizen h on a.huis_id = h.id;

-- dit wordt de nieuwe sql om huizen te selecteren want afbeelding is vereist
select h.id, h.huis, h.personen, h.omschrijving, h.prijs, a.afbeelding from afbeeldingen a right outer join huizen h on a.huis_id = h.id  ;






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
	id int(6) auto_increment,
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

create table accounts (
	account_id int auto_increment,
    account_user varchar(24),
    account_pass varchar(255),
    account_date datetime default current_timestamp,
    primary key (account_id)
);


-- inserts:

-- admin account:
insert into accounts (account_user, account_pass) values ("admin", "$2y$10$Hl6S5b1A2i50qcPFfukL2uvFLgjNjSr5QfC8ray/SM5oh7luml5DW");

-- paginas:
insert into teksten (pagina, titel, tekst) values ("index", "de titel Homepagina", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nam eaque, corporis nostrum quo qui similique quidem culpa explicabo maiores laboriosam dolore alias eveniet, facilis consequatur tempore esse distinctio repudiandae.");
insert into teksten (pagina, titel, tekst) values ("huizen", "de titel Huizen", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nam eaque, corporis nostrum quo qui similique quidem culpa explicabo maiores laboriosam dolore alias eveniet, facilis consequatur tempore esse distinctio repudiandae.");
insert into teksten (pagina, titel, tekst) values ("contact", "de titel Contact", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nam eaque, corporis nostrum quo qui similique quidem culpa explicabo maiores laboriosam dolore alias eveniet, facilis consequatur tempore esse distinctio repudiandae.");





-- (TEST) selecteer huisen en de fotos met mySQL JOIN
select a.afbeelding, h.huis from afbeeldingen a inner join huizen h on a.huis_id = h.id;

-- dit wordt de nieuwe sql om huizen te selecteren want afbeelding is vereist
select h.id, h.huis, h.personen, h.omschrijving, h.prijs, a.afbeelding from afbeeldingen a right outer join huizen h on a.huis_id = h.id  ;





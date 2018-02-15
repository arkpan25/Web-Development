drop table Book_Authors;
drop table book;
drop table Authors;

create table if not exists
book(
	Book_id int,
	title varchar(255),
	year year,
	price float,
	category varchar(255),
	primary key(Book_id)
);


create table if not exists
	Authors(
		Author_id int,
		Author_Name varchar(255) not null,
		primary key(Author_id)
	);



create table if not exists
	Book_Authors(
		Book_id int,
		Author_id int,
		primary key(Book_id, Author_id),
		foreign key(Author_id) references Authors(Author_id),
		foreign key(Book_id) references Book(Book_id)
	);


insert into book(Book_id, title, year, price, category)
	values(1, "Everyday Italian", 2005, 30.00, "cooking");
insert into book(Book_id, title, year, price, category)
	values(2, "Harry Potter", 2005, 29.99, "children");
insert into book(Book_id, title, year, price, category)
	values(3, "XQuery Kick Start", 2003, 49.99, "web");

insert into Authors(Author_id, Author_Name)
	values(1, "Giada De Laurentiis");
insert into Authors(Author_id, Author_Name)
	values(2, "J K. Rowling");
insert into Authors(Author_id, Author_Name)
	values(3, "James McGovern");
insert into Authors(Author_id, Author_Name)
	values(4, "Per Bothner");
insert into Authors(Author_id, Author_Name)
	values(5, "Kurt Cagle");
insert into Authors(Author_id, Author_Name)
	values(6, "James Linn");
insert into Authors(Author_id, Author_Name)
	values(7, "Vaidyanathan Nagarajan");


insert into Book_Authors(Book_id, Author_id)
	values(1, 1);
insert into Book_Authors(Book_id, Author_id)
	values(2, 2);
insert into Book_Authors(Book_id, Author_id)
	values(3, 3);
insert into Book_Authors(Book_id, Author_id)
	values(3, 4);
insert into Book_Authors(Book_id, Author_id)
	values(3, 5);
insert into Book_Authors(Book_id, Author_id)
	values(3, 6);
insert into Book_Authors(Book_id, Author_id)
	values(3, 7);
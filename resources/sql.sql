CREATE TABLE public.books (
    id SERIAL NOT NULL primary key,
    name character varying(255) NOT NULL,
    author character varying(255) NOT NULL,
    year integer NOT NULL,
    isbrn character varying(255) NOT NULL
);

insert into public.books (name, author, year, isbrn) values
('test1', 'author1', 1985, '123-321'),
('test2', 'author1', 1986, '123-321');


CREATE TYPE covertype AS ENUM ('hard','soft');

CREATE TABLE public.notebooks (
    id SERIAL NOT NULL primary key,
    manufacture character varying(255) NOT NULL,
    vendor character varying(255) NOT NULL,
    covertype covertype NOT NULL
);

insert into public.notebooks (manufacture, vendor, covertype) values
('manu1', 'vendor3', 'hard'),
('manu1', 'vendor4', 'soft');


CREATE TABLE public.pens (
    id SERIAL NOT NULL primary key,
    manufacture character varying(255) NOT NULL,
    vendor character varying(255) NOT NULL,
    color character varying(255) NOT NULL
);

insert into public.pens (manufacture, vendor, color) values
('manu1', 'vendor3', 'red'),
('manu1', 'vendor4', 'black');


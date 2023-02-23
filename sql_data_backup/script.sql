create table public.schools
(
    id      serial
        constraint schools_pk
            primary key
        unique,
    address varchar not null,
    name    varchar not null
);

alter table public.schools
    owner to dbuser;

create table public.details
(
    id          integer default nextval('detail_id_seq'::regclass) not null
        constraint detail_pk
            primary key
        constraint detail_id_key
            unique,
    birthday    date                                               not null,
    name        varchar                                            not null,
    surname     varchar                                            not null,
    id_school   integer                                            not null
        constraint details_schools_id_fk
            references public.schools
            on update cascade on delete cascade,
    avatar_path varchar                                            not null
);

alter table public.details
    owner to dbuser;

create table public.users
(
    id        serial
        constraint users_pk
            primary key
        unique,
    pesel     varchar(11)           not null,
    password  varchar               not null,
    id_role   integer               not null,
    id_detail integer               not null
        constraint users_detail_id_fk
            references public.details
            on update cascade on delete cascade,
    is_logged boolean default false not null
);

alter table public.users
    owner to dbuser;

create table public.roles
(
    id   serial
        primary key
        unique,
    name varchar not null
);

alter table public.roles
    owner to dbuser;

create table public.classes
(
    id        serial
        constraint classes_pk
            primary key
        unique,
    id_tutor  integer not null
        constraint classes_users_id_fk
            references public.users
            on update cascade on delete cascade,
    name      varchar not null,
    id_school integer not null
        constraint classes_schools_id_fk
            references public.schools
);

alter table public.classes
    owner to dbuser;

create table public.users_classes
(
    id_user  integer not null
        constraint users_classes_users_id_fk
            references public.users
            on update cascade on delete cascade,
    id_class integer not null
        constraint users_classes_classes_id_fk
            references public.classes
            on update cascade on delete cascade
);

alter table public.users_classes
    owner to dbuser;

create table public.subjects
(
    id         serial
        primary key
        unique,
    id_class   integer not null
        constraint subjects_classes_id_fk
            references public.classes
            on update cascade on delete cascade,
    id_teacher integer not null
        constraint subjects_users_id_fk
            references public.users
            on update cascade on delete cascade,
    name       varchar not null
);

alter table public.subjects
    owner to dbuser;

create table public.grades
(
    id            serial
        primary key
        unique,
    id_student    integer                 not null
        constraint grades_users_id_fk
            references public.users
            on update cascade on delete cascade,
    id_subject    integer                 not null
        constraint grades_subjects_id_fk
            references public.subjects
            on update cascade on delete cascade,
    grade         real                    not null,
    date_of_issue timestamp default now() not null
);

alter table public.grades
    owner to dbuser;



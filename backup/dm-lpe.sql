CREATE TABLE users {
    id serial NOT NULL,
    email text NOT NULL,
    username text NOT NULL,
    password text NOT NULL,
    lastlogin_time text NOT NULL,
    enabled bool NOT NULL DEFAULT TRUE,
    deleted bool NOT NULL DEFAULT FALSE
}

CREATE TABLE tokens {
    id serial NOT NULL,
    id_user integer NOT NULL,
    hash text NOT NULL,
    add_time text NOT NULL
}

CREATE TABLE sections {
    id serial NOT NULL,
    add_time text NOT NULL,
    content text,
    variables text,
    ordering INTEGER NOT NULL,
    draft bool NOT NULL DEFAULT TRUE,
    enabled bool NOT NULL DEFAULT TRUE,
    deleted bool NOT NULL DEFAULT FALSE
}

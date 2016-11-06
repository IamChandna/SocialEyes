--DROP TABLE jaipal.chat;

CREATE TABLE jaipal.chat
(
  chatid bigserial NOT NULL,
  convid bigserial NOT NULL,
  uid bigserial NOT NULL,
  msg text,
  "time" time without time zone
)
WITH (
  OIDS=FALSE
);
ALTER TABLE jaipal.chat
  OWNER TO postgres;
--DROP TABLE jaipal.comments;

CREATE TABLE jaipal.comments
(
  commentid bigserial NOT NULL,
  uid bigint,
  content text,
  likes bigint[] DEFAULT '{}'::bigint[],
  CONSTRAINT comments_pkey PRIMARY KEY (commentid)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE jaipal.comments
  OWNER TO postgres;
--DROP TABLE jaipal.conversation;

CREATE TABLE jaipal.conversation
(
  convid bigserial NOT NULL,
  u1 bigserial NOT NULL,
  u2 bigserial NOT NULL
)
WITH (
  OIDS=FALSE
);
ALTER TABLE jaipal.conversation
  OWNER TO postgres;
--DROP TABLE jaipal.gallery;

CREATE TABLE jaipal.gallery
(
  picid bigint NOT NULL,
  uid bigint,
  link text,
  CONSTRAINT gallery_pkey PRIMARY KEY (picid)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE jaipal.gallery
  OWNER TO postgres;
--DROP TABLE jaipal.status;

CREATE TABLE jaipal.status
(
  statusid bigserial NOT NULL,
  uid bigint,
  content text,
  picid bigint,
  "time" time with time zone,
  category text[] DEFAULT '{}'::bigint[],
  likes bigint[] DEFAULT '{}'::bigint[],
  comments bigint[] DEFAULT '{}'::bigint[],
  CONSTRAINT status_pkey PRIMARY KEY (statusid)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE jaipal.status
  OWNER TO postgres;

--DROP TABLE jaipal.users;

CREATE TABLE jaipal.users
(
  uid bigserial NOT NULL,
  uname text,
  password text,
  emailid text,
  dob date,
  sex character(1),
  phone bigint,
  friendlist bigint[] DEFAULT '{}'::bigint[],
  nation text,
  hobbies text,
  profilepicid bigint NOT NULL DEFAULT 1,
  coverpicid bigint NOT NULL DEFAULT 2,
  CONSTRAINT users_pkey PRIMARY KEY (uid),
  CONSTRAINT users_emailid_key UNIQUE (emailid),
  CONSTRAINT users_phone_key UNIQUE (phone)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE jaipal.users
  OWNER TO postgres;

INSERT INTO jaipal.gallery(
            picid, uid, link)
    VALUES (1, 1, '../uploads/defaultPropic.png'),
    (2, 1, '../uploads/deafultCover.jpg');

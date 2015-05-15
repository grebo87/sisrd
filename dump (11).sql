--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: Usuarios; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE "Usuarios" (
    id integer NOT NULL,
    created_at timestamp without time zone NOT NULL,
    updated_at timestamp without time zone NOT NULL
);


ALTER TABLE public."Usuarios" OWNER TO grebo;

--
-- Name: Usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE "Usuarios_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Usuarios_id_seq" OWNER TO grebo;

--
-- Name: Usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE "Usuarios_id_seq" OWNED BY "Usuarios".id;


--
-- Name: departamentos; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE departamentos (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL
);


ALTER TABLE public.departamentos OWNER TO grebo;

--
-- Name: departamentos_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE departamentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamentos_id_seq OWNER TO grebo;

--
-- Name: departamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE departamentos_id_seq OWNED BY departamentos.id;


--
-- Name: docentes; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE docentes (
    id integer NOT NULL,
    primernombre character varying(255) NOT NULL,
    segundonombre character varying(255),
    primerapellido character varying(255) NOT NULL,
    segundoapellido character varying(255),
    cedula character varying(20) NOT NULL,
    cargo character varying(255) NOT NULL,
    dedicacion character varying(255) NOT NULL,
    categoria character varying(255) NOT NULL,
    condicion character varying(255) NOT NULL,
    fechaingreso date NOT NULL,
    status character varying(255) NOT NULL,
    observacion character varying(255),
    sede character varying(255) NOT NULL,
    departamento_id integer NOT NULL
);


ALTER TABLE public.docentes OWNER TO grebo;

--
-- Name: docentes_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE docentes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.docentes_id_seq OWNER TO grebo;

--
-- Name: docentes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE docentes_id_seq OWNED BY docentes.id;


--
-- Name: estadorelacion; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE estadorelacion (
    id integer NOT NULL,
    estado integer NOT NULL,
    departamento_id integer NOT NULL,
    relacion_id integer NOT NULL
);


ALTER TABLE public.estadorelacion OWNER TO grebo;

--
-- Name: estadorelacion_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE estadorelacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estadorelacion_id_seq OWNER TO grebo;

--
-- Name: estadorelacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE estadorelacion_id_seq OWNED BY estadorelacion.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE migrations (
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO grebo;

--
-- Name: postgrados; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE postgrados (
    id integer NOT NULL,
    postgrado character varying(255) NOT NULL,
    docente_id integer NOT NULL
);


ALTER TABLE public.postgrados OWNER TO grebo;

--
-- Name: postgrados_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE postgrados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.postgrados_id_seq OWNER TO grebo;

--
-- Name: postgrados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE postgrados_id_seq OWNED BY postgrados.id;


--
-- Name: pregrados; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE pregrados (
    id integer NOT NULL,
    pregrado character varying(255) NOT NULL,
    docente_id integer NOT NULL
);


ALTER TABLE public.pregrados OWNER TO grebo;

--
-- Name: pregrados_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE pregrados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pregrados_id_seq OWNER TO grebo;

--
-- Name: pregrados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE pregrados_id_seq OWNED BY pregrados.id;


--
-- Name: relacion; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE relacion (
    id integer NOT NULL,
    lapso character varying(5) NOT NULL,
    fechalapso character varying(5) NOT NULL,
    trimestre character varying(5) NOT NULL,
    fechatrimestre character varying(5) NOT NULL,
    estado character varying(10) NOT NULL,
    fechainicio date NOT NULL,
    fechafinal date NOT NULL
);


ALTER TABLE public.relacion OWNER TO grebo;

--
-- Name: relacion_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE relacion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.relacion_id_seq OWNER TO grebo;

--
-- Name: relacion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE relacion_id_seq OWNED BY relacion.id;


--
-- Name: relaciondocente; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE relaciondocente (
    id integer NOT NULL,
    horasacademicas integer NOT NULL,
    horasadministrativas integer NOT NULL,
    totalhoras integer NOT NULL,
    observacion character varying(255) NOT NULL,
    sede character varying(255) NOT NULL,
    docente_id integer NOT NULL,
    relacion_id integer NOT NULL
);


ALTER TABLE public.relaciondocente OWNER TO grebo;

--
-- Name: relaciondocente_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE relaciondocente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.relaciondocente_id_seq OWNER TO grebo;

--
-- Name: relaciondocente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE relaciondocente_id_seq OWNED BY relaciondocente.id;


--
-- Name: saberdocente; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE saberdocente (
    id integer NOT NULL,
    sabere_id integer NOT NULL,
    numerosecciones integer NOT NULL,
    docente_id integer NOT NULL,
    relaciondocente_id integer NOT NULL
);


ALTER TABLE public.saberdocente OWNER TO grebo;

--
-- Name: saberdocente_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE saberdocente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.saberdocente_id_seq OWNER TO grebo;

--
-- Name: saberdocente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE saberdocente_id_seq OWNED BY saberdocente.id;


--
-- Name: saberes; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE saberes (
    id integer NOT NULL,
    unidad character varying(255) NOT NULL,
    horassemanales character varying(255) NOT NULL,
    carrera character varying(255) NOT NULL,
    codigo character varying(255) NOT NULL,
    departamento_id integer NOT NULL
);


ALTER TABLE public.saberes OWNER TO grebo;

--
-- Name: saberes_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE saberes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.saberes_id_seq OWNER TO grebo;

--
-- Name: saberes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE saberes_id_seq OWNED BY saberes.id;


--
-- Name: sedes; Type: TABLE; Schema: public; Owner: grebo; Tablespace: 
--

CREATE TABLE sedes (
    id integer NOT NULL,
    nombre character varying(255) NOT NULL
);


ALTER TABLE public.sedes OWNER TO grebo;

--
-- Name: sedes_id_seq; Type: SEQUENCE; Schema: public; Owner: grebo
--

CREATE SEQUENCE sedes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sedes_id_seq OWNER TO grebo;

--
-- Name: sedes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: grebo
--

ALTER SEQUENCE sedes_id_seq OWNED BY sedes.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY "Usuarios" ALTER COLUMN id SET DEFAULT nextval('"Usuarios_id_seq"'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY departamentos ALTER COLUMN id SET DEFAULT nextval('departamentos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY docentes ALTER COLUMN id SET DEFAULT nextval('docentes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY estadorelacion ALTER COLUMN id SET DEFAULT nextval('estadorelacion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY postgrados ALTER COLUMN id SET DEFAULT nextval('postgrados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY pregrados ALTER COLUMN id SET DEFAULT nextval('pregrados_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY relacion ALTER COLUMN id SET DEFAULT nextval('relacion_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY relaciondocente ALTER COLUMN id SET DEFAULT nextval('relaciondocente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY saberdocente ALTER COLUMN id SET DEFAULT nextval('saberdocente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY saberes ALTER COLUMN id SET DEFAULT nextval('saberes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY sedes ALTER COLUMN id SET DEFAULT nextval('sedes_id_seq'::regclass);


--
-- Data for Name: Usuarios; Type: TABLE DATA; Schema: public; Owner: grebo
--



--
-- Name: Usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('"Usuarios_id_seq"', 1, false);


--
-- Data for Name: departamentos; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO departamentos VALUES (1, 'INFORMATICA');
INSERT INTO departamentos VALUES (3, 'TURISMO');


--
-- Name: departamentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('departamentos_id_seq', 3, true);


--
-- Data for Name: docentes; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO docentes VALUES (1, 'A', 'A', 'A', 'A', '123123123', 'DOCENTE', 'Dedicacion Exclusiva', 'Instructor', 'Auxiliar Docente Ordinario', '2009-10-29', 'Activo', '', 'MUNICIPALIZACION CAJIGAL', 1);


--
-- Name: docentes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('docentes_id_seq', 1, true);


--
-- Data for Name: estadorelacion; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO estadorelacion VALUES (2, 2, 3, 1);
INSERT INTO estadorelacion VALUES (1, 1, 1, 1);


--
-- Name: estadorelacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('estadorelacion_id_seq', 2, true);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO migrations VALUES ('2014_10_05_002431_create_Departamentos_table', 1);
INSERT INTO migrations VALUES ('2014_10_08_035720_create_Relacion_table', 1);
INSERT INTO migrations VALUES ('2014_11_03_163405_create_Usuarios_table', 1);
INSERT INTO migrations VALUES ('2014_11_04_234039_create_docentes_table', 1);
INSERT INTO migrations VALUES ('2014_11_05_002133_create_Sedes_table', 1);
INSERT INTO migrations VALUES ('2014_11_05_230220_create_Pregrados_table', 1);
INSERT INTO migrations VALUES ('2014_11_05_230744_create_Postgrados_table', 1);
INSERT INTO migrations VALUES ('2014_11_07_185356_create_Saberes_table', 1);
INSERT INTO migrations VALUES ('2015_01_09_202011_create_RelacionDocente_table', 1);
INSERT INTO migrations VALUES ('2015_01_12_153719_create_estadorelacions_table', 1);
INSERT INTO migrations VALUES ('2015_1_09_181023_create_saberdocente', 1);


--
-- Data for Name: postgrados; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO postgrados VALUES (1, 'msc. informatica', 1);


--
-- Name: postgrados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('postgrados_id_seq', 1, true);


--
-- Data for Name: pregrados; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO pregrados VALUES (1, 'ING. INFORMATICA', 1);


--
-- Name: pregrados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('pregrados_id_seq', 1, true);


--
-- Data for Name: relacion; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO relacion VALUES (1, 'I', '2010', 'I', '2010', 'Activo', '2015-01-14', '2015-01-25');


--
-- Name: relacion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('relacion_id_seq', 1, true);


--
-- Data for Name: relaciondocente; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO relaciondocente VALUES (1, 8, 28, 36, '', 'MUNICIPALIZACION CAJIGAL', 1, 1);


--
-- Name: relaciondocente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('relaciondocente_id_seq', 1, true);


--
-- Data for Name: saberdocente; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO saberdocente VALUES (1, 1, 2, 1, 1);


--
-- Name: saberdocente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('saberdocente_id_seq', 1, true);


--
-- Data for Name: saberes; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO saberes VALUES (1, 'matamatica', '4', 'PNF', 'mataefdf', 1);


--
-- Name: saberes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('saberes_id_seq', 1, true);


--
-- Data for Name: sedes; Type: TABLE DATA; Schema: public; Owner: grebo
--

INSERT INTO sedes VALUES (1, 'MUNICIPALIZACION CAJIGAL');


--
-- Name: sedes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: grebo
--

SELECT pg_catalog.setval('sedes_id_seq', 1, true);


--
-- Name: Usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY "Usuarios"
    ADD CONSTRAINT "Usuarios_pkey" PRIMARY KEY (id);


--
-- Name: departamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT departamentos_pkey PRIMARY KEY (id);


--
-- Name: docentes_cedula_unique; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_cedula_unique UNIQUE (cedula);


--
-- Name: docentes_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_pkey PRIMARY KEY (id);


--
-- Name: estadorelacion_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY estadorelacion
    ADD CONSTRAINT estadorelacion_pkey PRIMARY KEY (id);


--
-- Name: postgrados_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY postgrados
    ADD CONSTRAINT postgrados_pkey PRIMARY KEY (id);


--
-- Name: pregrados_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY pregrados
    ADD CONSTRAINT pregrados_pkey PRIMARY KEY (id);


--
-- Name: relacion_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY relacion
    ADD CONSTRAINT relacion_pkey PRIMARY KEY (id);


--
-- Name: relaciondocente_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY relaciondocente
    ADD CONSTRAINT relaciondocente_pkey PRIMARY KEY (id);


--
-- Name: saberdocente_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY saberdocente
    ADD CONSTRAINT saberdocente_pkey PRIMARY KEY (id);


--
-- Name: saberes_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY saberes
    ADD CONSTRAINT saberes_pkey PRIMARY KEY (id);


--
-- Name: sedes_pkey; Type: CONSTRAINT; Schema: public; Owner: grebo; Tablespace: 
--

ALTER TABLE ONLY sedes
    ADD CONSTRAINT sedes_pkey PRIMARY KEY (id);


--
-- Name: docentes_departamento_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_departamento_id_foreign FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estadorelacion_departamento_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY estadorelacion
    ADD CONSTRAINT estadorelacion_departamento_id_foreign FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estadorelacion_relacion_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY estadorelacion
    ADD CONSTRAINT estadorelacion_relacion_id_foreign FOREIGN KEY (relacion_id) REFERENCES relacion(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: postgrados_docente_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY postgrados
    ADD CONSTRAINT postgrados_docente_id_foreign FOREIGN KEY (docente_id) REFERENCES docentes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pregrados_docente_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY pregrados
    ADD CONSTRAINT pregrados_docente_id_foreign FOREIGN KEY (docente_id) REFERENCES docentes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: relaciondocente_docente_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY relaciondocente
    ADD CONSTRAINT relaciondocente_docente_id_foreign FOREIGN KEY (docente_id) REFERENCES docentes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: relaciondocente_relacion_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY relaciondocente
    ADD CONSTRAINT relaciondocente_relacion_id_foreign FOREIGN KEY (relacion_id) REFERENCES relacion(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: saberdocente_docente_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY saberdocente
    ADD CONSTRAINT saberdocente_docente_id_foreign FOREIGN KEY (docente_id) REFERENCES docentes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: saberdocente_relaciondocente_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY saberdocente
    ADD CONSTRAINT saberdocente_relaciondocente_id_foreign FOREIGN KEY (relaciondocente_id) REFERENCES relaciondocente(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: saberdocente_sabere_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY saberdocente
    ADD CONSTRAINT saberdocente_sabere_id_foreign FOREIGN KEY (sabere_id) REFERENCES saberes(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: saberes_departamento_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: grebo
--

ALTER TABLE ONLY saberes
    ADD CONSTRAINT saberes_departamento_id_foreign FOREIGN KEY (departamento_id) REFERENCES departamentos(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--


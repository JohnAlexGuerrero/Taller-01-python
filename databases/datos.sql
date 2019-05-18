-- create databases ferreteria

CREATE TABLE unidades(
	codund CHARACTER(3)not null PRIMARY KEY,
    nomunidad varchar(30)not null UNIQUE
);

CREATE TABLE product(
	id_prod serial PRIMARY KEY,
    codigo_prod varchar(8)not null UNIQUE,
    nombre_prod varchar(60)NOT null UNIQUE,
    unidad_prod CHARACTER(3)not null REFERENCES unidades(codund),
    imagen_prod varchar(50)
);

CREATE TABLE inventario(
    item serial PRIMARY KEY,
    producto varchar(8)not null UNIQUE,
    stock_prod SMALLINT default 0,
    costo_prod Double DEFAULT 0.0,
    iva_prod SMALLINT,
    utilidad SMALLINT,
    costo_iva_prod Double DEFAULT 0,0,
    precio_venta_prod Double DEFAULT 0.0,
    total_cst_prod DOUBLE,
    bodega char(3)
);

create table categoria(
    codcatg SMALLINT PRIMARY KEY,
    nomcatg VARCHAR(30)not null UNIQUE,
    imagen varchar(50)
);

create table proveedor(
    id_prov VARCHAR(5) PRIMARY KEY,
    name_prov varchar(30)not null UNIQUE,
    nit_prov varchar(20)not null UNIQUE,
    ciudad_prov varchar(30),
    address_prov varchar(30),
    telefono_prov varchar(10),
    email_prov varchar(40),
    vendedor_prov varchar(40)not null,
    contacto_vend_prov varchar(10)not null
);

CREATE TABLE bodega(
    id_bodega char(3) not null PRIMARY KEY,
    address_bodega varchar(40)
);

create table in_producto(
    proveedor varchar(5)not null REFERENCES proveedor(id_prov),
    producto VARCHAR(5)not null REFERENCES productos(codigo_prod), 
    date_in_prod  date,
    cantidad SMALLINT,
    costo_sn_iva Double DEFAULT 0.0,
    iva varchar(15),
    costo_cn_iva Double DEFAULT 0.0,
    utilidad SMALLINT
    precio_vnt_prod DOUBLE,
    PRIMARY KEY (proveedor,producto)
);

CREATE TABLE type_factura(
    id_type_fact char(2)not null PRIMARY KEY,
    nom_type_fact varchar(10) not null UNIQUE
);

CREATE TABLE factura_distribuidor(
    number_fact varchar(30)not null PRIMARY KEY,
    proveedor varchar(5)not null REFERENCES proveedor(id_prov),
    type_fact char(2)not null REFERENCES type_factura(id_type_fact),
    fecha_fact date,
    fecha_fact_venc date,
    total_fact Double,
    dscto Double,
);

--fuction and procedure
--consultar productos
CREATE PROCEDURE consult_products()
	SELECT *FROM product;


--table unidades
INSERT INTO unidades(codund,nomunidad)VALUES('201','UND');
INSERT INTO unidades(codund,nomunidad)VALUES('202','BULTO');
INSERT INTO unidades(codund,nomunidad)VALUES('203','ROLLO');
INSERT INTO unidades(codund,nomunidad)VALUES('204','KILO');
INSERT INTO unidades(codund,nomunidad)VALUES('205','LIBRA');
INSERT INTO unidades(codund,nomunidad)VALUES('206','MTR');


-- create databases ferreteria

CREATE TABLE unidades(
	codund CHARACTER(3)not null PRIMARY KEY,
    nomunidad varchar(30)not null UNIQUE
);

CREATE TABLE productos(
	id_prod serial PRIMARY KEY,
    codigo_prod varchar(8)not null UNIQUE,
    nombre_prod varchar(60)NOT null UNIQUE,
    unidad_prod CHARACTER(3)not null REFERENCES unidades(codund),
    imagen_prod varchar(50)
);

CREATE TABLE inventario(
    producto varchar(60)NOT null PRIMARY KEY,
    stock_prod SMALLINT default 0,
    costo_prod Double DEFAULT 0.0,
    iva_prod SMALLINT,
    utilidad SMALLINT,
    costo_iva_prod Double DEFAULT 0.0,
    precio_venta_prod Double DEFAULT 0.0,
    total_cst_prod DOUBLE,
    bodega char(3)
);

create table proveedor(
    idproveedor VARCHAR(5) PRIMARY KEY,
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
    factura SMALLINT not null REFERENCES factura_distribuidor(id_factura),
    producto VARCHAR(8)not null REFERENCES productos(codigo_prod), 
    cantidad SMALLINT,
    precion_unit Double DEFAULT 0.0,
    iva SMALLINT,
    precio_iva_unit Double DEFAULT 0.0,
    PRIMARY KEY (proveedor,producto)
);

CREATE TABLE type_factura(
    id_type_fact char(2)not null PRIMARY KEY,
    nom_type_fact varchar(10) not null UNIQUE
);
--factura de proveedor
CREATE TABLE factura_distribuidor(
    id_factura serial PRIMARY key,
    number_fact varchar(30)not null UNIQUE,
    proveedor varchar(5)not null REFERENCES proveedor(idproveedor),
    fecha_fact date,
    fecha_fact_venc date,
    total_fact Double,
    estado enum('CANCELADO','PENDIENTE','VENCIDO','ABONADO') DEFAULT 'PENDIENTE'
);

--fuction and procedure
---consultar productos
CREATE PROCEDURE consult_products()
	SELECT *FROM productos;

--insertar productos nuevos
CREATE PROCEDURE add_new_product
(
    codigo varchar(8),producto varchar(60),und varchar(5),imagen varchar(50)
)
	
    INSERT INTO productos(codigo_prod,nombre_prod,unidad_prod,imagen_prod)
    VALUES(codigo,producto,und,imagen);
    
--insertar productos a inventario
CREATE PROCEDURE add_prod_inventary(new_product varchar(60))
INSERT INTO inventario(producto)
SELECT
nombre_prod FROM producto p
WHERE
p.nombre_prod=new_product

UPDATE inventario SET producto=(SELECT nombre_prod FROM productos)

insert into inventario(producto) select nombre_prod from productos p JOIN inventario i WHERE (i.producto=p.nombre_prod) AND i.producto != p.nombre_prod 

--table unidades
INSERT INTO unidades(codund,nomunidad)VALUES('201','UND');
INSERT INTO unidades(codund,nomunidad)VALUES('202','BULTO');
INSERT INTO unidades(codund,nomunidad)VALUES('203','ROLLO');
INSERT INTO unidades(codund,nomunidad)VALUES('204','KILO');
INSERT INTO unidades(codund,nomunidad)VALUES('205','LIBRA');
INSERT INTO unidades(codund,nomunidad)VALUES('206','MTR');


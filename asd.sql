--Tabla Titulo de Empleado

CREATE TABLE public.employees_title(
Emti_Id SERIAL, -- Id de la tabla
Emti_Name VARCHAR(50),--nombre del cargo
Emti_Description VARCHAR(200), --descripcion del cargo
CONSTRAINT nn_Emti_Name CHECK (Emti_Name IS NOT NULL), 
CONSTRAINT uc_Emti_Name UNIQUE (Emti_Name),
CONSTRAINT nn_Emti_Description CHECK (Emti_Description IS NOT NULL),
CONSTRAINT pk_employees_title PRIMARY KEY (Emti_Id)
);

SELECT * FROM public.employees_title;

INSERT INTO public.employees_title(emti_id, emti_name, emti_description)
VALUES (default, 'ADMINISTRADOR', 'ENCARGADO DE LA ORGANIZACIÓN, DIRECCIÓN Y CONTROL DE LA EMPRESA');

INSERT INTO public.employees_title(emti_id, emti_name, emti_description)
VALUES (default, 'VENDEDOR', 'NO HACE NADA');



--Tabla Usuario

CREATE TABLE public.access(
Acce_Document VARCHAR(20),
Acce_Name1 VARCHAR(30),--nombres
Acce_Name2 VARCHAR(30),
Acce_Lastname1 VARCHAR(30),--apellidos
Acce_Lastname2 VARCHAR(30),
Acce_Address VARCHAR(50),--direccion
Acce_Sex CHAR(1),--sexo
Acce_Telephone_Number VARCHAR(20),--numero de telefono
Acce_Email VARCHAR(30),
Acce_Password VARCHAR(250),
Acce_State CHAR(2),--estado del empleado 
Emti_Id INTEGER, --llave foranea de la tabla de cargo de empleado
CONSTRAINT ck_Acce_Sex CHECK (Acce_Sex IN ('M','F','I')),
CONSTRAINT nn_Acce_Sex CHECK (Acce_Sex IS NOT NULL),
CONSTRAINT nn_Acce_Document CHECK (Acce_Document IS NOT NULL),
CONSTRAINT nn_Acce_Name1 CHECK (Acce_Name1 IS NOT NULL),
CONSTRAINT nn_Acce_Lastname1 CHECK (Acce_Lastname1 IS NOT NULL),
CONSTRAINT nn_Acce_Telephone_Number CHECK (Acce_Telephone_Number IS NOT NULL),
CONSTRAINT nn_Acce_Email CHECK (Acce_Email IS NOT NULL),
CONSTRAINT nn_Acce_Password CHECK (Acce_Password IS NOT NULL),
CONSTRAINT nn_Acce_State CHECK (Acce_State IS NOT NULL),
CONSTRAINT fk_employees_title_access FOREIGN KEY (Emti_Id) 
REFERENCES public.employees_title (Emti_Id),
CONSTRAINT pk_access PRIMARY KEY (Acce_Document)
);

SELECT * FROM public.access;

INSERT INTO public.access(acce_document, acce_name1, acce_name2, acce_lastname1, 
acce_lastname2, acce_address, acce_sex, acce_telephone_number, acce_email, acce_password,
acce_state, emti_id)
VALUES ('1004945023', 'JOSE', 'LEONARDO', 'QUINTERO', 'LEON', 'CRA 16 # 6A - 63', 'M', '3183843124', 
		'jose@gmail.com', 'jose123','EA' ,1),
		('1193223063', 'ANDRES', 'FELIPE', 'GUAGLIANONI', '', 'CALLE 1 # 4-32', 'M', '3167863081', 
		'EXEMPLEADO@UFPSO.EDU.CO', 'ADMIN123','ED',2);

		
		
--Tabla Producto

CREATE TABLE public.produc(
Prod_Code_Plu VARCHAR(30),--Codigo plu
Prod_Description VARCHAR(200),--descripcion del producto
Prod_Available_Quantity INT,--cantidad disponible
Prod_Arrival_Price DECIMAL,--precio de llegada
Prod_Selling_Price DECIMAL,--precio de venta
prod_iva DECIMAL,-- precio del iva
CONSTRAINT nn_Prod_Code_Plu CHECK (Prod_Code_Plu IS NOT NULL),
CONSTRAINT nn_Prod_Description CHECK (Prod_Description IS NOT NULL),
CONSTRAINT nn_Prod_Arrival_Price CHECK (Prod_Arrival_Price IS NOT NULL),
CONSTRAINT nn_Prod_Selling_Price CHECK (Prod_Selling_Price IS NOT NULL),
CONSTRAINT nn_Prod_iva CHECK (Prod_iva IS NOT NULL),
CONSTRAINT pk_produc PRIMARY KEY (Prod_Code_Plu)
);

select * from public.produc;

INSERT INTO public.produc (prod_code_plu, prod_description,
prod_available_quantity, prod_arrival_price, prod_selling_price, prod_iva)
VALUES ('A11','ARROZ DIANA PREMIUM',7,2500,3000,1.19);
CREATE DATABASE supermarket;


USE supermarket;

CREATE TABLE Categorias(
    id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripccion VARCHAR(100) NOT NULL,
    imagen VARCHAR(100) NOT NULL
);


CREATE TABLE Empleados(
    id_empleado INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    celular VARCHAR(100) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    imagen VARCHAR(100) NOT NULL
);

drop table Clientes;
CREATE TABLE Clientes(
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    celular VARCHAR(100) NOT NULL,
    compañia VARCHAR(100) NOT NULL
);

CREATE TABLE Proveedores(
    id_proveedor INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    celular VARCHAR(100) NOT NULL,
    ciudad VARCHAR(100) NOT NULL
);

CREATE TABLE Productos(
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    id_categoria INT NOT NULL,
    precioUnitario INT NOT NULL,
    stock INT NOT NULL,
    unidadesPerdidas INT NOT NULL,
    descontinuado INT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES Categorias(id_categoria)
    );
CREATE TABLE Facturas(
    id_factura INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT NOT NULL,
    id_cliente INT NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id_empleado),
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente)
);

CREATE TABLE FacturaDetalle(
    id_factura INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    precioVenta INT NOT NULL,
    FOREIGN KEY (id_factura) REFERENCES Facturas(id_factura),
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto)
);

CREATE TABLE users(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    id_empleado INT,
    email VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(60) NOT NULL,
    FOREIGN KEY (id_empleado) REFERENCES Empleados(id_empleado)
);






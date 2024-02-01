# Proyecto de SOAP Cliente-Servidor

Este repositorio contiene los archivos relacionados con la conexión a la base de datos y servicios web en PHP. A continuación, se describe la función de cada archivo en el proyecto.

## Archivos del Proyecto

### 1. Conexion.php

En este archivo (`Conexion.php`), se gestiona la conexión a la base de datos. Aquí encontrarás el código necesario para establecer la conexión con la base de datos.

### 2. Usuario.php

En el archivo `Usuario.php`, se definen las funciones relacionadas con la manipulación de datos de usuarios en la base de datos. Esto incluye funciones para insertar y leer datos de usuarios.

### 3. Consumir.php

El archivo `Consumir.php` se encarga de consumir el servicio web para insertar datos. Contiene el código necesario para interactuar con el servicio y enviar datos a través de las peticiones correspondientes.

### 4. InsertCategoria.php

En el archivo `InsertCategoria.php`, se declaran los servicios SOAP relacionados con la categoría. Los servicios incluyen `InsertCategoriaService` y `LeerDatosService`, los cuales se utilizan para insertar datos de categorías y leer información de la bd.

## Instrucciones de Uso

A continuación, se proporcionan algunas instrucciones básicas para utilizar este proyecto:

1. Hay que hacer la instalación del nusoap
   ```bash
   composer require e-novative/nusoap

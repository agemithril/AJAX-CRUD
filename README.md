AJAX-CRUD - Gestor de Tareas
Un simple gestor de tareas con base de datos que utiliza AJAX, JS, PHP y HTML.

Configuración del Entorno:
Asegúrate de tener un servidor XAMPP o WAMPP instalado y en funcionamiento.

Configuración de la Base de Datos:
Crea una base de datos o utiliza una ya existente.

Ejecuta el siguiente script SQL para crear la tabla necesaria:

sql
Copy code
CREATE TABLE tbl_task (
    idTask INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(30) NOT NULL
);
En la carpeta php, modifica el código en conDb.php para reflejar la información de tu base de datos:
php
Copy code
$conn = mysqli_connect(
    "----Host",
    "---Usuario",
    "------Contrasena",
    "---Nombre de la base de datos"
);
Ejecución del Proyecto:
Desde tu servidor, ejecuta index.html.

Estructura de Archivos:
index.html
Carpeta "php" que contiene:
app.js
conDB.php
taskadd.php
task-delete.php
task-edit.php
tasklist.php
tasksearch.php
task-update.php

Ejemplo en Ejecución:
https://uworklife.000webhostapp.com/tasks.html

Notas Adicionales:
Asegúrate de que tu servidor web tenga los permisos adecuados para acceder y modificar la base de datos.
Puedes proporcionar instrucciones adicionales para cualquier configuración especial o problemas conocidos.
Recuerda personalizar la información según las necesidades específicas de tu proyecto. ¡Buena suerte con tu gestor de tareas!


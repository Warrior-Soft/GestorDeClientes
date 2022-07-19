
# Gestor de Clientes

Para poder utilizar la aplicación lo primero que debe 
hacer es importar los scripts de la base de datos de 
MySQL para cargar tanto al usuario admin, necesario para
iniciarse sesión en la app, y algunos datos de ejemplos previos.

Una vez cargado los scripts de MySQL deberá buscar
la carpeta de config y en esta configurar la constante
"DB","USER" Y "PASSWORD".

El Host y Url están diseñados para cambiar dinámicamente
en caso de cambiar de equipo.

En el caso de DB, USER y PASSWORD dependerá de su
configuración de su gestor de base de datos MySQL
donde Db será el nombre de la base de datos, User el
usuario de MySQL y Password la contraseña de acceso.

En la carpeta encontrara un archivo .sql donde estaran
los scripts para generar las tablas junto con los datos 
de prueba.

Una vez realizado lo anterior solo deberá iniciarse sesión con
el usuario "admin" y clave de acceso "admin" para usar la app.


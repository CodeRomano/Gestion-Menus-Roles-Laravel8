# Gesti贸n de Men煤s y Roles en Laravel 8 con Plantilla AdminLTE

<p align="center">
    <img src="/public/img/login.png" alt="Login App" width="400"/>
    <img src="/public/img/menu.png" alt="Menu App" width="800"/>
    <img src="/public/img/roles_1.png" alt="Roles App" width="800"/>
    <img src="/public/img/roles_2.png" alt="Roles App" width="800"/>
</p>

### Pre-requisitos 馃搵

Para clonar este repositorio, debes tener instalado un servidor Apache, PHP y MSQL (Wamp, Xampp, Mamp o Lamp) y los gerenciadores de dependencias para PHP (Composer) y para NodeJs (Npm).

Antes de comenzar verifica si tienes composer con cualquiera de los siguientes comandos en tu terminal.
```
composer --version 
composer -v
```
Si no lo tienes instalado lo pueden instalar siguiendo la documentaci贸n oficial en:  
https://getcomposer.org/doc/00-intro.md

Verifica tambien la version de NPM en la terminal con
```
npm --version
```
Si no lo tienes instalado lo pueden instalar siguiendo la documentaci贸n oficial en:  
https://www.npmjs.com/get-npm

Verifica las versiones de cada uno de ellos

Versi贸n PHP - 7.4.2  
Versi贸n Mysql - 5.7.26  
Versi贸n Composer - 1.10.1  
Versi贸n NPM - 7.0.10  

### Instalaci贸n 馃敡

_Sigue las siguientes instrucciones para clonar el repositorio_

_Clone el repositorio_

```
git clone https://github.com/CodeRomano/Gestion-Menus-Roles-Laravel8.git
```

_Instale todas las dependencias del Proyecto con_

```
composer install
```

_Como el proyecto tiene dependencias en JS instalelas con_

```
npm install
```

_Copie el Archivo .env.example en un archivo nuevo .env con_

```
cp .env.example .env
```
_Configure la base de datos y las demas variables de entorno en el archivo .env_

_Genere una nueva Key para el protecto con_

```
php artisan key:generate
```

_Corra las migraciones del proyecto con_

```
php artisan migrate
```

_Corra el proyecto con_

```
php artisan serve
```

_Si todo est谩 correcto puede acceder al proyecto en la direcci贸n http://localhost:8000_ 

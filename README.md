# Examen de Recuperación - Desarrollo Web
# JOSE ALEXANDER HERNANDEZ RAMIREZ 
## Consumo de API tipocambio_BANGUAT

Proyecto desarrollado en PHP + Laravel que consume la API oficial del Banco de Guatemala (BANGUAT) para obtener el tipo de cambio del dólar, mostrando y almacenando los datos mediante una base de datos en MySQL.

### Tecnologías Utilizadas:

* *Backend:* PHP+Laravel
* *Base de Datos:* Mysql
* *Frontend:* PHP+Laravel
* phpMyAdmin
* XAMPP
* Herd
  
### Instrucciones de Instalación:

1.  *Clonar el repositorio:*
    bash
    git clone [https://github.com/JoseAlexander1997/API_tipocambio_BANGUAT.git]
    cd API_tipocambio_BANGUAT
    

2.  *Instalar dependencias:*
    bash
    composer install
    

3.  *Crear el archivo de entorno .env*
   bash
   cp .env.example .env

   Configura la base de datos:
   env
   DB_DATABASE=nombre_bd
   DB_USERNAME=root
   DB_PASSWORD=

5.  *Generar clave de Laravel*
    bash
    php artisan key:generate
    

### Endpoint consumido:

https://www.banguat.gob.gt/variables/ws/tipocambio.asmx?op=TipoCambioDia
https://www.banguat.gob.gt/variables/ws/tipocambio.asmx?op=TipoCambioFechaInicial

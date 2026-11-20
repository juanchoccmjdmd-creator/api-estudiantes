# API de Registro de Estudiantes (Laravel + MySQL + Docker)

API REST desarrollada en Laravel para el registro y consulta de estudiantes, ejecutándose en contenedores aislados mediante Docker Compose.

## Requisitos previos
- Docker y Docker Compose instalados.

## Pasos de ejecución

1. **Clonar el repositorio o descomprimir el proyecto** y ubicarse en la carpeta raíz:
   ```bash
   cd api-estudiantes
   ```

## ¿Por qué DB_HOST debe ser db y no localhost?

En Docker cada contenedor funciona como una máquina independiente con su propia red interna, entonces si uno deja DB_HOST=localhost (o 127.0.0.1), Laravel va a buscar MySQL dentro del mismo contenedor de la aplicación (app), y obviamente va a fallar porque la base de datos está corriendo aparte.

Cuando usamos docker-compose.yml, Docker crea una red interna entre los servicios y monta un DNS propio. Por eso, al poner DB_HOST=db, Docker sabe exactamente a qué contenedor apuntar usando el nombre del servicio definido en el archivo de configuración, sin importar qué IP interna le haya asignado.
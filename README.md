🚀 Concesionaria REST API






API RESTful para consultar, filtrar, ordenar y actualizar motos de una concesionaria.
Todos los endpoints retornan datos en formato JSON.

📚 Índice

Base URL

Endpoints

Listar todas las motos

Filtrar por categoría

Ordenar motos

Filtrar + ordenar

Obtener moto por ID

Actualizar moto

Parámetros disponibles

🌐 Base URL
http://localhost/concesionaria-Rest/api/

📦 Endpoints
1️⃣ Listar todas las motos

GET /motos

📝 Descripción

Devuelve el listado completo de motos registradas en la base de datos.

📌 Ejemplo
GET http://localhost/concesionaria-Rest/api/motos

📥 Respuesta esperada (ejemplo)
[
  {
    "id": 1,
    "modelo": "XR 150",
    "precio": 1400000,
    "caracteristicas": "Enduro liviana",
    "id_tipo": 2,
    "categoria_nombre": "enduro"
  }
]

2️⃣ Filtrar motos por categoría

GET /motos?tipo={categoria}

📝 Descripción

Permite traer solo las motos pertenecientes a una categoría específica.

📌 Ejemplo
GET http://localhost/concesionaria-Rest/api/motos?tipo=enduro

3️⃣ Ordenar motos por un campo

GET /motos?orderBy={campo}&direction={ASC|DESC}

📝 Descripción

Ordena la lista de motos por cualquier campo válido:
precio, modelo, id_tipo, etc.

📌 Ejemplos
🔼 Orden ascendente
GET http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=ASC

🔽 Orden descendente
GET http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=DESC

4️⃣ Filtrar + ordenar

Se pueden combinar filtros y ordenamientos.

📌 Ejemplo

Traer solo motos enduro, ordenadas por precio descendente:

GET http://localhost/concesionaria-Rest/api/motos?tipo=enduro&orderBy=precio&direction=DESC

5️⃣ Obtener una moto por ID

GET /motos/{id}

📌 Ejemplo
GET http://localhost/concesionaria-Rest/api/motos/2

6️⃣ Actualizar una moto

PUT /motos/{id}

📝 Descripción

Actualiza los datos de una moto. Enviar el body como JSON.

📌 Ejemplo
PUT http://localhost/concesionaria-Rest/api/motos/2

📦 Body JSON
{
  "modelo": "XR 150 superActualizada",
  "precio": 343434,
  "caracteristicas": "bien superActualizada",
  "id_tipo": 2
}

📥 Respuesta esperada
{ "message": "Moto actualizada correctamente" }

⚙ Parámetros disponibles
Parámetro	Tipo	Descripción
tipo	string	Filtra motos por categoría
orderBy	string	Campo por el cual ordenar (precio, modelo, etc.)
direction	string	Dirección del orden (ASC o DESC)

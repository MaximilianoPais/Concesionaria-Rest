Concesionaria REST API

API RESTful para consultar, filtrar, ordenar y actualizar motos de una concesionaria.
Todos los endpoints devuelven datos en formato JSON.

Base URL
http://localhost/concesionaria-Rest/api/

Endpoints
1. Listar todas las motos

GET /motos

Descripción

Devuelve el listado completo de motos registradas en la base de datos.

Ejemplo
GET http://localhost/concesionaria-Rest/api/motos

Respuesta esperada (ejemplo)
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

2. Filtrar motos por categoría

GET /motos?tipo={categoria}

Descripción

Permite traer solo las motos pertenecientes a una categoría específica.

Ejemplo
GET http://localhost/concesionaria-Rest/api/motos?tipo=enduro

3. Ordenar motos por un campo (por ejemplo, precio)

GET /motos?orderBy={campo}&direction={ASC|DESC}

Descripción

Ordena el listado de motos por cualquier campo válido de la tabla (precio, modelo, id_tipo, etc.)

Ejemplo: Orden ascendente
GET http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=ASC

Ejemplo: Orden descendente
GET http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=DESC

4. Filtrar por categoría + ordenar
Descripción

Se pueden combinar filtros y ordenamientos en un mismo request.

Ejemplo

Traer solo motos enduro, ordenadas por precio descendente:

GET http://localhost/concesionaria-Rest/api/motos?tipo=enduro&orderBy=precio&direction=DESC

5. Obtener una moto por ID

GET /motos/{id}

Ejemplo
GET http://localhost/concesionaria-Rest/api/motos/2

6. Actualizar una moto

PUT /motos/{id}

Descripción

Modifica los datos de una moto existente.
Enviar el cuerpo en formato JSON.

Ejemplo
PUT http://localhost/concesionaria-Rest/api/motos/2

Body JSON
{
  "modelo": "XR 150 superActualizada",
  "precio": 343434,
  "caracteristicas": "bien superActualizada",
  "id_tipo": 2
}

Respuesta esperada
{
  "message": "Moto actualizada correctamente"
}

Parámetros disponibles
Parámetro	Tipo	Descripción
tipo	string	Filtra motos por categoría
orderBy	string	Campo por el cual ordenar (precio, modelo, etc.)
direction	string	Dirección del orden (ASC o DESC)

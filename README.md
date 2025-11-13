Concesionaria REST APi






API RESTful para consultar, filtrar, ordenar y actualizar motos de una concesionaria.
Todos los endpoints retornan datos en formato JSON.

Indice

Base URL

Endpoints

Listar todas las motos

Filtrar motos por categoria

Ordenar motos por un campo

Filtrar y ordenar

Obtener una moto por id

Actualizar una moto

Parametros disponibles

Base URL
http://localhost/concesionaria-Rest/api/

Endpoints
1. Listar todas las motos

GET /motos

Descripcion

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

2. Filtrar motos por categoria

GET /motos?tipo={categoria}

Descripcion

Permite traer solo las motos pertenecientes a una categoria especifica.

Ejemplo
GET http://localhost/concesionaria-Rest/api/motos?tipo=enduro

3. Ordenar motos por un campo

GET /motos?orderBy={campo}&direction={ASC|DESC}

Descripcion

Ordena la lista de motos por cualquier campo valido:
precio, modelo, id_tipo, etc.

Ejemplos
Orden ascendente
GET http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=ASC

Orden descendente
GET http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=DESC

4. Filtrar y ordenar

Se pueden combinar filtros y ordenamientos en un mismo request.

Ejemplo

Traer solo motos enduro, ordenadas por precio descendente:

GET http://localhost/concesionaria-Rest/api/motos?tipo=enduro&orderBy=precio&direction=DESC

5. Obtener una moto por id

GET /motos/{id}

Ejemplo
GET http://localhost/concesionaria-Rest/api/motos/2

6. Actualizar una moto

PUT /motos/{id}

Descripcion

Actualiza los datos de una moto. Enviar el body como JSON.

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
{ "message": "Moto actualizada correctamente" }

Parametros disponibles
Parametro	Tipo	Descripcion
tipo	string	Filtra motos por categoria
orderBy	string	Campo por el cual ordenar (precio, modelo, etc.)
direction	string	Direccion del orden (ASC o DESC)

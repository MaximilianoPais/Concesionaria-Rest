# Concesionaria-Rest

Se debe adjuntar documentación de los endpoints generados en el README.md del repositorio. 
Es decir, una descripción de cada endpoint, cómo se usan y ejemplos. Entender que esta documentación la va a leer 
otro desarrollador para entender cómo se consume la API.


Ordenar todas las motos con orden ascendente 
http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=ASC
Ordenar todas las motos con orden descendente 
http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=DESC
Actualizar una moto
http://localhost/concesionaria-Rest/api/motos/2
  y en el json
  {
    "modelo": "xr 150 superActualizada",
    "precio":343434,
    "caracteristicas": " bien superActualizada",
    "id_tipo":2
}
API Listar todas motos de tipo enduro
http://localhost/concesionaria-Rest/api/motos?tipo=enduro

API PARA ORDENAR MOTOS POR PRECIO DESCENTENTE 
http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=DESC

API para ordenar las motos de una categoria especifica con el precio descendente
http://localhost/concesionaria-Rest/api/motos?tipo=enduro&orderBy=precio&direction=DESC

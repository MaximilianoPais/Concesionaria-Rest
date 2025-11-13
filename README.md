# Concesionaria REST API

API RESTful para consultar, filtrar, ordenar y actualizar motos de una
concesionaria.\
Todos los endpoints devuelven datos en **formato JSON**.

------------------------------------------------------------------------

## 📚 Índice

-   📌 [Base URL](#base-url)\
-   🚀 [Endpoints](#endpoints)
    -   🏍️ [Listar todas las motos](#1-listar-todas-las-motos)\
    -   🎯 [Filtrar por categoría](#2-filtrar-motos-por-categoría)\
    -   🔽 [Ordenar motos](#3-ordenar-motos-por-un-campo)\
    -   🔍 [Filtrar + ordenar](#4-filtrar--ordenar)\
    -   🔎 [Obtener moto por ID](#5-obtener-una-moto-por-id)\
    -   ✏️ [Actualizar una moto](#6-actualizar-una-moto)\
-   ⚙️ [Parámetros disponibles](#parámetros-disponibles)

------------------------------------------------------------------------

## Base URL

    http://localhost/concesionaria-Rest/api/

------------------------------------------------------------------------

# Endpoints

------------------------------------------------------------------------

## 1. Listar todas las motos

**GET `/motos`**

### Descripción

Devuelve el listado completo de motos registradas.

### Ejemplo

    GET http://localhost/concesionaria-Rest/api/motos

### Respuesta

``` json
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
```

------------------------------------------------------------------------

## 2. Filtrar motos por categoría

**GET `/motos?tipo={categoria}`**

### Ejemplo

    GET http://localhost/concesionaria-Rest/api/motos?tipo=enduro

------------------------------------------------------------------------

## 3. Ordenar motos por un campo

**GET `/motos?orderBy={campo}&direction={ASC|DESC}`**

### Ejemplos

**Ascendente:**

    GET http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=ASC

**Descendente:**

    GET http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=DESC

------------------------------------------------------------------------

## 4. Filtrar + ordenar

### Ejemplo

    GET http://localhost/concesionaria-Rest/api/motos?tipo=enduro&orderBy=precio&direction=DESC

------------------------------------------------------------------------

## 5. Obtener una moto por ID

**GET `/motos/{id}`**

### Ejemplo

    GET http://localhost/concesionaria-Rest/api/motos/2

------------------------------------------------------------------------

## 6. Actualizar una moto

**PUT `/motos/{id}`**

### Body JSON

``` json
{
  "modelo": "XR 150 superActualizada",
  "precio": 343434,
  "caracteristicas": "bien superActualizada",
  "id_tipo": 2
}
```

### Respuesta

``` json
{ "message": "Moto actualizada correctamente" }
```

------------------------------------------------------------------------

## Parámetros disponibles

  -----------------------------------------------------------------------
  Parámetro     Tipo       Descripción
  ------------- ---------- ----------------------------------------------
  tipo          string     Filtra por categoría

  orderBy       string     Campo por el cual ordenar

  direction     string     Dirección del orden (`ASC` o `DESC`)
  -----------------------------------------------------------------------

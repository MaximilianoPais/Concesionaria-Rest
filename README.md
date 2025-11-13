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
        "id_moto": 1,
        "modelo": "Honda XR150L",
        "precio": "3200000.00",
        "caracteristicas": "Motor monocilíndrico 149cc, arranque eléctrico y a pedal, freno delantero a disco.",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9Do4iNgT5kb-Y7zC3KKNWy-X1ut8G0MHMiA&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 2,
        "modelo": "xr 150 superActualizada",
        "precio": "0.00",
        "caracteristicas": "343434",
        "id_tipo": 2,
        "imagen": "https://yamaha-mundoyamaha.com/wp-content/uploads/2023/08/xtz250_blanco.png",
        "categoria_nombre": "Calle"
    },
    {
        "id_moto": 4,
        "modelo": "Honda Tornado 250",
        "precio": "5200000.00",
        "caracteristicas": "Motor 249cc DOHC, refrigeración por aire, caja de 6 velocidades, gran rendimiento off-road.",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmOFehEopC65x2W-Ut-V9JhP9ImKIj9_xDhg&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 5,
        "modelo": "Yamaha YZF R3",
        "precio": "8500000.00",
        "caracteristicas": "Motor bicilíndrico 321cc, refrigeración líquida, 42 HP, frenos ABS, diseño deportivo.",
        "id_tipo": 4,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp7I1OPaVZsLhiqm1dtLN77G5A68mlQUNa_A&s",
        "categoria_nombre": "Deportiva"
    },
    {
        "id_moto": 6,
        "modelo": "Bajaj Rouser NS200",
        "precio": "4100000.00",
        "caracteristicas": "Motor 199.5cc, 6 velocidades, encendido digital, diseño naked con gran maniobrabilidad.",
        "id_tipo": 3,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzxOzvRbRZxBxdknqmbNkS7e3Z47m4iBMwoA&s",
        "categoria_nombre": "Naked"
    }
]
```

------------------------------------------------------------------------

## 2. Filtrar motos por categoría

**GET `/motos?tipo={categoria}`**

### Ejemplo

    GET http://localhost/concesionaria-Rest/api/motos?tipo=Enduro
### Respuesta
``` json
    [
    {
        "id_moto": 1,
        "modelo": "Honda XR150L",
        "precio": "3200000.00",
        "caracteristicas": "Motor monocilíndrico 149cc, arranque eléctrico y a pedal, freno delantero a disco.",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9Do4iNgT5kb-Y7zC3KKNWy-X1ut8G0MHMiA&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 4,
        "modelo": "Honda Tornado 250",
        "precio": "5200000.00",
        "caracteristicas": "Motor 249cc DOHC, refrigeración por aire, caja de 6 velocidades, gran rendimiento off-road.",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmOFehEopC65x2W-Ut-V9JhP9ImKIj9_xDhg&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 7,
        "modelo": "zanella 50 cc",
        "precio": "150000.00",
        "caracteristicas": "anda fuerte",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXiOE5CzsylEI0KW6ne2U5zGf8fpOczoLTeQ&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 13,
        "modelo": "Honda XR1450L",
        "precio": "4200000.00",
        "caracteristicas": null,
        "id_tipo": 1,
        "imagen": null,
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 14,
        "modelo": "Honda XR1450L",
        "precio": "4200000.00",
        "caracteristicas": "moto nueva ",
        "id_tipo": 1,
        "imagen": null,
        "categoria_nombre": "Enduro"
    }
]
```
------------------------------------------------------------------------

## 3. Ordenar motos por un campo

**GET `/motos?orderBy={campo}&direction={ASC|DESC}`**

### Ejemplos

**Ascendente:**
 ** GET ` http://localhost/concesionaria-Rest/api//motos?orderBy=precio&direction=ASC `**
### Respuesta
``` json
        [
    {
        "id_moto": 2,
        "modelo": "xr 150 superActualizada",
        "precio": "0.00",
        "caracteristicas": "343434",
        "id_tipo": 2,
        "imagen": "https://yamaha-mundoyamaha.com/wp-content/uploads/2023/08/xtz250_blanco.png",
        "categoria_nombre": "Calle"
    },
    {
        "id_moto": 7,
        "modelo": "zanella 50 cc",
        "precio": "150000.00",
        "caracteristicas": "anda fuerte",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXiOE5CzsylEI0KW6ne2U5zGf8fpOczoLTeQ&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 1,
        "modelo": "Honda XR150L",
        "precio": "3200000.00",
        "caracteristicas": "Motor monocilíndrico 149cc, arranque eléctrico y a pedal, freno delantero a disco.",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9Do4iNgT5kb-Y7zC3KKNWy-X1ut8G0MHMiA&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 6,
        "modelo": "Bajaj Rouser NS200",
        "precio": "4100000.00",
        "caracteristicas": "Motor 199.5cc, 6 velocidades, encendido digital, diseño naked con gran maniobrabilidad.",
        "id_tipo": 3,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzxOzvRbRZxBxdknqmbNkS7e3Z47m4iBMwoA&s",
        "categoria_nombre": "Naked"
    },
    {
        "id_moto": 13,
        "modelo": "Honda XR1450L",
        "precio": "4200000.00",
        "caracteristicas": null,
        "id_tipo": 1,
        "imagen": null,
        "categoria_nombre": "Enduro"
    }
]
    
```
------------------------------------------------------------------------
   
### **Descendente:**

**GET  `http://localhost/concesionaria-Rest/api/motos?orderBy=precio&direction=DESC `**

### Respuesta
``` json
[
    {
        "id_moto": 5,
        "modelo": "Yamaha YZF R3",
        "precio": "8500000.00",
        "caracteristicas": "Motor bicilíndrico 321cc, refrigeración líquida, 42 HP, frenos ABS, diseño deportivo.",
        "id_tipo": 4,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp7I1OPaVZsLhiqm1dtLN77G5A68mlQUNa_A&s",
        "categoria_nombre": "Deportiva"
    },
    {
        "id_moto": 4,
        "modelo": "Honda Tornado 250",
        "precio": "5200000.00",
        "caracteristicas": "Motor 249cc DOHC, refrigeración por aire, caja de 6 velocidades, gran rendimiento off-road.",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmOFehEopC65x2W-Ut-V9JhP9ImKIj9_xDhg&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 13,
        "modelo": "Honda XR1450L",
        "precio": "4200000.00",
        "caracteristicas": null,
        "id_tipo": 1,
        "imagen": null,
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 14,
        "modelo": "Honda XR1450L",
        "precio": "4200000.00",
        "caracteristicas": "moto nueva ",
        "id_tipo": 1,
        "imagen": null,
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 6,
        "modelo": "Bajaj Rouser NS200",
        "precio": "4100000.00",
        "caracteristicas": "Motor 199.5cc, 6 velocidades, encendido digital, diseño naked con gran maniobrabilidad.",
        "id_tipo": 3,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzxOzvRbRZxBxdknqmbNkS7e3Z47m4iBMwoA&s",
        "categoria_nombre": "Naked"
    }
]
    
``` 

------------------------------------------------------------------------

## 4. Filtrar + ordenar

### Ejemplo

   ** GET ` http://localhost/concesionaria-Rest/api/motos?tipo=enduro&orderBy=precio&direction=DESC `**
### Respuesta
``` json
    [
    {
        "id_moto": 4,
        "modelo": "Honda Tornado 250",
        "precio": "5200000.00",
        "caracteristicas": "Motor 249cc DOHC, refrigeración por aire, caja de 6 velocidades, gran rendimiento off-road.",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmOFehEopC65x2W-Ut-V9JhP9ImKIj9_xDhg&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 13,
        "modelo": "Honda XR1450L",
        "precio": "4200000.00",
        "caracteristicas": null,
        "id_tipo": 1,
        "imagen": null,
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 14,
        "modelo": "Honda XR1450L",
        "precio": "4200000.00",
        "caracteristicas": "moto nueva ",
        "id_tipo": 1,
        "imagen": null,
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 1,
        "modelo": "Honda XR150L",
        "precio": "3200000.00",
        "caracteristicas": "Motor monocilíndrico 149cc, arranque eléctrico y a pedal, freno delantero a disco.",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9Do4iNgT5kb-Y7zC3KKNWy-X1ut8G0MHMiA&s",
        "categoria_nombre": "Enduro"
    },
    {
        "id_moto": 7,
        "modelo": "zanella 50 cc",
        "precio": "150000.00",
        "caracteristicas": "anda fuerte",
        "id_tipo": 1,
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXiOE5CzsylEI0KW6ne2U5zGf8fpOczoLTeQ&s",
        "categoria_nombre": "Enduro"
    }
]
``` 

------------------------------------------------------------------------

## 5. Obtener una moto por ID

**GET `/motos/{id}`**

### Ejemplo

   ** GET `http://localhost/concesionaria-Rest/api/motos/2`**
   ### Respuesta
``` json
    {
    "id_moto": 2,
    "modelo": "xr 150 superActualizada",
    "precio": "0.00",
    "caracteristicas": "343434",
    "id_tipo": 2,
    "imagen": "https://yamaha-mundoyamaha.com/wp-content/uploads/2023/08/xtz250_blanco.png",
    "categoria_nombre": "Calle"
}
 ```

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

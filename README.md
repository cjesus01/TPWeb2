**TRABAJO API REST Ropa

***Detalles a tener en cuenta para empezar:

	Importar la base de datos y cambiar la rama

•	La API REST fue creada sobre la actual base de datos.

•	Cambiar hacia la rama ApiRest en el repositorio remoto GitHub

•	Importar desde PHPMyAdmin

**Bodys

**Para POST Y PUT 

*IMPORTANTE!!, la clave foránea del trabajo resulta ser id_tela.

***Tabla ropa:
{ 

"sexo": ‘……’, 

"talla": ’……’, 

"color": ‘……’, 

"prenda": ‘……’, 

"imagen_prenda": ‘……’,

 "id": ‘……’,
 
 "id_tela": ‘…..’ 
 
}




ejemplo:
{
"sexo":’Masculino’,

"talla": ‘L’,

"color": ‘Rojo’,

"prenda": ‘Remera’,

"imagen_prenda": ‘./imgs/clothing/6349da1ba6430.jpg’,

"id": 30,

"id_tela": 5

}

Tabla tela:
{
"tipo_de_tela": ‘…….’,

"descripcion": ‘…..’,

“lavado_de_tela”: ‘....’,

“temperatura_de_lavado”: ‘….’,

“imagen”: ‘….’,

“id_tela”: ‘…..’,

}
ejemplo:
{
 "tipo_de_tela": ‘Algodon’,
 
 "descripcion": ‘Es un material muy resistente. Se puede teñir y también blanquear sin problemas. Es una tela respirable. Es aislante, por eso nos puede abrigar en invierno’,
 
“lavado_de_tela”: ‘Se aconseja lavar a mano pero se puede lavar en el lavarropas’,

“temperatura_de_lavado”: ‘Se recomienda lavar con agua fría.’,

“imagen”: ‘./imgs/categories/6349e06e4c126.jpg’,

“id_tela”: 1

 }


Endpoints:

ENDPOINT METODO GET:

Clothing=

http://localhost/proyects/TPE-WebII/TPWeb2/api/Clothing/?page=’numero’&elementNumbers=’numero’&columna=’campo &orden=’orden’ &filtrar=’busqueda’
Este endpoint usando el metodo GET trae todos los elementos de las tablas de la base de datos. Ademas que se pueden pasar parámetros de=
Page y elementNumbers se tendrán que especificar obligatoriamente los dos parametros si no se traerán todos los elementos.
	page=Se especifica el numero de pagina que se quiere traer(Se tendrá que especificar obligatoriamente los dos parametros elementNumbers y page).
	elementNumbers= Se especifica la cantidad de elementos que se quiere traer por pagina (Se tendrá que especificar obligatoriamente los dos parametros elementNumbers y page).
columna= Se especifica la columna (de las tablas prenda y tela que se encuentran en la base de datos) con la cual se quiere trabajar.
orden= Se especifica (en la columna seleccionada o sino se especifica será por id) si se ordena ascendentemente o descendientemente (se utilizaran las palabras ascendente o descendiente).
filtrar= Permite filtrar los elementos de las columnas (de las tablas prenda y tela que se encuentran en la base de datos) según el campo que se especifique en 'columna' (se permite filtrar un campo a la vez). Se filtrará según lo que se ingrese en filtrar ('FILTRO'). El filtro traerá los elementos que empiecen con lo ingresado por filtrar(Si no se especifica el campo no permitirá que se filtre).

Si no se especifica ninguna se traerán todos los elementos de la tabla.
No es necesario darle un valor a cada parámetro(excepto en elementNumbers y page que  se tendrá que especificar obligatoriamente los dos parámetros y filtrar que se tiene que especificar la columna).
Ejemplos=

Especificar todos los campos=

http://localhost/proyects/TPE-WebII/TPWeb2/api/Clothing/?page=1&elementNumbers=2&columna=color&orden=ascendiente&filtrar=b

Solo elementNumbers y page=

http://localhost/proyects/TPE-WebII/TPWeb2/api/Clothing/?page=1&elementNumbers=2

Solo filtro y columna=

http://localhost/proyects/TPE-WebII/TPWeb2/api/Clothing/?page=1&elementNumbers=2&columna=color&filtrar=b

No se especifica nada=

http://localhost/proyects/TPE-WebII/TPWeb2/api/Clothing


Solo columna=

http://localhost/proyects/TPE-WebII/TPWeb2/api/Clothing/?page=1&elementNumbers=2&columna=color

Solo orden=

http://localhost/proyects/TPE-WebII/TPWeb2/api/Clothing/?page=1&elementNumbers=2&orden=ascendiente

Solo orden y columna=

http://localhost/proyects/TPE-WebII/TPWeb2/api/Clothing/?page=1&elementNumbers=2&columna=color&orden=ascendiente

(Si no se especifica el orden será automáticamente ascendiente y si no se especifica el campo será por id a excepción de filtrar).

http://localhost/proyecto/Ropa/TPWeb2/api/Clothing/:ID

Este endpoint te lleva a la función getCategories en la cual te trae todas las categorias de la tabla categorias. Ejemplo = api/Clothing/3

ENDPOINT METODOS POST:

Clothing=


http://localhost/proyecto/Ropa/TPWeb2/api/Clothing/

Este endpoint utilizando el metodo POST permite agregar un nuevo elemento en la tabla prenda. 

Categories=

http://localhost/proyecto/Ropa/TPWeb2/api/Categories/

Este endpoint utilizando el metodo POST permite agregar un nuevo elemento en la tabla tela.

 ENDPOINT METODO PUT:
 
Clothing=

http://localhost/proyecto/Ropa/TPWeb2/api/Clothing/:ID

Este endpoint utilizando el metodo PUT permite modificar un elemento de la tabla prenda indicado por su ID. Ejemplo= api/Clothing/5.

Categories=

http://localhost/proyecto/Ropa/TPWeb2/api/Categories/:ID

Este endpoint utilizando el metodo PUT permite modificar un elemento de la tabla tela indicado por su ID. Ejemplo= api/Categories/35.


•	ENDPOINT METODO DELETE:

Clothing=

http://localhost/proyecto/Ropa/TPWeb2/api/Clothing/:ID 

Este endpoint utilizando el metodo DELETE permite eliminar un elemento de la tabla prenda indicado por su ID. Ejemplo= api/Clothing/7.

Categories=

http://localhost/proyecto/Ropa/TPWeb2/api/Categories/:ID 

Este endpoint utilizando el metodo DELETE permite eliminar un elemento de la tabla tela indicado por su ID. Ejemplo= api/Categories/10.




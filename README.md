# TPWeb2
Explicación de endpoints

    api/Clothing, 'GET'= Este endpoint usando el metodo GET trae todos los elementos de las tablas de la base de datos.
     
    api/Clothing/?page="numero"&elementNumbers="numero", 'GET'= Este endpoint usando el metodo GET traera la cantidad de elementos que se especifiquen en elementNumbers
      de la página que se especifique en page(estos se encuentran ordenados ascendentemente por su ID). Ejemplo = 
      api/Clothing/?page=1&elementNumbers=3
    
    api/Clothing/:ID, 'GET'= Este endpoint usando el metodo GET trae el elemento especificado por su ID. Ejemplo = api/Clothing/3.
    
    api/Clothing, 'POST'= Este endpoint utilizando el metodo POST permite agregar un nuevo elemento en la tabla prenda.
    
    api/Clothing/:ID, 'DELETE'= Este endpoint utilizando el metodo DELETE permite eliminar un elemento de la tabla prenda indicado por su ID. Ejemplo= api/Clothing/3.
    
    api/Clothing/:ID, 'PUT'= Este endpoint utilizando el metodo PUT permite modificar un elemento de la tabla prenda indicado por su ID. Ejemplo= api/Clothing/3.
    
    api/Clothing/filtro/:CAMPO?filtrar='FILTRO', 'GET'= Este endpoint utilizando el metodo GET permite filtrar los elementos de las columnas (de las tablas prenda y tela que se encuentran en la base de datos) segun el campo que se especifique en ':CAMPO' (se permite filtrar un campo a la vez). Se filtrara según lo que se ingrese en filtrar ('FILTRO'). El filtro traera
      los elementos que empiecen con lo ingresado por filtrar.
      Ejemplo= api/Clothing/filtro/color?filtrar=a
      
    api/Clothing/:columna/:orden, 'GET'= Este endpoint utilizando el metodo GET permite, segun la columna que se especifique (de las tablas prenda y tela que se encuentran en la base de datos)
      en :columna, ordenar ascendentemente o descendentemente el campo especificado (en :orden se utilizara la palabras ascendente o descendente para ordenar los elementos).
      Ejemplo= api/Clothing/tipo_de_tela/ascendente
      
    api/Categories, 'POST'=  Este endpoint utilizando el metodo POST permite agregar un nuevo elemento en la tabla tela.
    
    api/Categories/:ID, 'DELETE'= Este endpoint utilizando el metodo DELETE permite eliminar un elemento de la tabla tela indicado por su ID. Ejemplo= api/Categories/3.
    
    api/Categories/:ID, 'PUT'=  Este endpoint utilizando el metodo PUT permite modificar un elemento de la tabla tela indicado por su ID. Ejemplo= api/Categories/3.


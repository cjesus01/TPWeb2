{include file='header.tpl'}
    <form method="get" action="Clothing/AddClothing">
        <label for="prenda">Agregar la prenda:</label>
        <input type="text" name="prenda">
        <label for="sexo">Agregar al sexo perteneciente:</label>
        <input type="text" name="sexo">
        <label for="color">Ingrese el color:</label>
        <input type="text" name="color">
        <label for="talla">Agregar la talla perteneciente:</label>
        <input type="text" name="talla">
        <label for="category">Seleccione la categoria para ver las diferentes prendas pertenecientes a esta:</label>
        <select name="category">
            <option value="1">Algodón</option>
            <option value="2">Poliéster</option>
            <option value="3">Seda</option>
            <option value="4">Lana</option>
            <option value="5">Lino</option>
            <option value="6">Cuerina</option>
            <option value="7">Lycra</option>
            <option value="8">Acetato</option>
        </select>
        <button type='submit'>Enviar</button>
    </form>
{include file='footer.tpl'}
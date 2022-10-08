{include file='header.tpl'}
    <form method="get" action="Clothing/UpdateClothing/{$id}">
        <label for="prenda">Ingrese la prenda:</label>
        <input type="text" name="prenda" value={$prenda}>
        <label for="sexo">Ingrese al sexo perteneciente:</label>
        <input type="text" name="sexo" value={$sexo}>
        <label for="color">Ingrese el color:</label>
        <input type="text" name="color" value={$color}>
        <label for="talla">Ingrese la talla perteneciente:</label>
        <input type="text" name="talla" value = {$talla}>
        <label for="category">Seleccione la categoria:</label>
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
{include file = 'header.tpl'}
    <form method="GET" action="Clothing/UpdateCategories/{$id}">

        <label for="descripcion">Ingrese su descripcion:</label>
        <input type="text" name="descripcion" value={$descripcion}> 

        <label for="lavado">Ingrese el tipo de lavado:</label>
        <input type="text" name="lavado" value={$lavado}>

        <label for="temperatura">Ingrese la temperatura de lavado:</label>
        <input type="text" name="temperatura" value={$temperatura}>

        <label for="categoria">Ingrese la categoria:</label>
        <select name="categoria"}>
            <option value="Algodón">Algodón</option>
            <option value="Poliéster">Poliéster</option>
            <option value="Seda">Seda</option>
            <option value="Lana">Lana</option>
            <option value="Lino">Lino</option>
            <option value="Cuerina">Cuerina</option>
            <option value="Lycra">Lycra</option>
            <option value="Acetato">Acetato</option>
        </select>

        <button type='submit'>Enviar</button>

    </form>
{include file = 'footer.tpl'}
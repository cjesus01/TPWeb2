{include file='header.tpl'}
        <p>La categoria elegida es: {$Clothing[0]->tipo_de_tela}.Las prendas pertenecientes a este tipo de tela son:</p>
        {foreach from=$Clothing item=$Clothes}
            <li>{$Clothes->prenda}</li>
    {/foreach}
    <button type='submit'><a href='Categories/Category'>Volver</a></button>
{include file='footer.tpl'}
{include file='header.tpl'}
    <p>La categoria elegida es: {$Clothing[0]->tipo_de_tela}. Las prendas pertenecientes a este tipo de tela son: </p>
    <div class="un_elemento">
        <ul>
        {foreach from=$Clothing item=$Clothes}
            <li><a href=Clothing/GetClothing/{$Clothes->id}>{$Clothes->prenda}</a></li>
        {/foreach}
        </ul>
    <button type='submit' class="boton_volver_cat"><a href='Categories/Category'>Volver</a></button>
    </div>
{include file='footer.tpl'}
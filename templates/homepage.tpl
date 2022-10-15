{include file= "header.tpl"}
<div class="homepage">
{if $auth}
    <h1>Bienvenido {$nombre}!!</h1>
    {else}
    <h1>Bienvenido!!</h1>
{/if}
    <h3>Nuestras principales telas</h3>
    <div class="homepage_img">
        {foreach from=$Categories item=$Category}
        <a href="Categories/filtercategoryform/{$Category->tipo_de_tela}"><img src="{$Category->imagen}" alt="error" class="img_categoria"></a>
        {/foreach}
    </div>
</div>
{include file= "footer.tpl"}
{include file= "header.tpl"}
{if $auth===true}
<h1>Bienvenido {$nombre}!!</h1>
{else}
<h1>Bienvenido!!</h1>
{/if}
{include file= "footer.tpl"}
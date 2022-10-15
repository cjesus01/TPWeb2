{include file= "header.tpl"}
{if $auth===true}
<div class="homepage">
    <h1>Bienvenido {$nombre}!!</h1>
    <h3>Nuestras principales telas</h3>
    <div class="homepage_imgs">
        <a href="http://localhost/proyecto/Ropa/TPWeb2/Categories/filtercategoryform?category=1"><img src="./imgs/categorie_inicio/algodon.jpg" alt="error" class="img_categoria"></a>
        <a href="http://localhost/proyecto/Ropa/TPWeb2/Categories/filtercategoryform?category=4"><img src="./imgs/categorie_inicio/lana.jpg" alt="error" class="img_categoria"></a>
        <a href="http://localhost/proyecto/Ropa/TPWeb2/Categories/filtercategoryform?category=2"><img src="./imgs/categorie_inicio/poliester.jpg" alt="error" class="img_categoria"></a>
        <a href="http://localhost/proyecto/Ropa/TPWeb2/Categories/filtercategoryform?category=3"><img src="./imgs/categorie_inicio/seda.jpg" alt="error" class="img_categoria"></a>
    </div>
</div>
{else}
<div class="homepage">
    <h1>Bienvenido!!</h1>
    <h3 class="acomodar_titulo">Nuestras principales telas</h3>
<div class="homepage_img">
    <img src="./imgs/categorie_inicio/algodon.jpg" alt="error" class="img_categorias_algodon">
    <img src="./imgs/categorie_inicio/lana.jpg" alt="error" class="img_categorias">
    <img src="./imgs/categorie_inicio/poliester.jpg" alt="error" class="img_categorias">
    <img src="./imgs/categorie_inicio/seda.jpg" alt="error" class="img_categorias_seda">
</div>
</div>    
{/if}
{include file= "footer.tpl"}
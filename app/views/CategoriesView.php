<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class CategoriesView{
    private $smarty;

    public function __construct(){
        $this->smarty= new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
    }
    
    public function ShowCategories($Categories,$Auth){
        $this->smarty->assign('categories',$Categories);
        $this->smarty->assign('auth',$Auth);
        $this->smarty->assign('Title','Categories');
        $this->smarty->display('./templates/categories.tpl');
    }
    public function ShowFormCategories($auth){
        $this->smarty->assign('Title', 'form');
        $this->smarty->assign('auth', $auth);
        $this->smarty->display('./templates/addformcategories.tpl');
    }
    public function ShowFormUpdate($id, $categoria, $descripcion, $lavado, $temperatura, $auth){
        $this->smarty->assign('Title', 'form');
        $this->smarty->assign('auth', $auth);
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('descripcion', $descripcion);
        $this->smarty->assign('lavado', $lavado);
        $this->smarty->assign('temperatura', $temperatura);
        $this->smarty->display('./templates/updatecategories.tpl');
    }
}

?>
<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class CategoriesView{
    private $smarty;

    public function __construct(){
        $this->smarty= new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
    }
    
    public function ShowCategories($Categories){
        $this->smarty->assign('categories',$Categories);
        $this->smarty->assign('Title','Categories');
        $this->smarty->display('./templates/categories.tpl');
    }
}

?>
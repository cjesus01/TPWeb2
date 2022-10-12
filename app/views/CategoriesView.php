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
    public function ShowFormCategories(){
        $this->smarty->assign('Title', 'form');
        $this->smarty->display('./templates/addformcategories.tpl');
    }
    public function ShowSuccess($message,$title){
        $this->smarty->assign('Title',$title);
        $this->smarty->assign('message', $message);
        $this->smarty->assign('return', 'Categories/Category');
        $this->smarty->display('./templates/showsuccess.tpl');
    }
    public function ShowError($message){
        $this->smarty->assign('Title','Error');
        $this->smarty->assign('message', $message);
        $this->smarty->display('./templates/error.tpl');
    }
    public function ShowFormUpdate($id, $categoria, $descripcion, $lavado, $temperatura, $categories){
        $this->smarty->assign('Title', 'form');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('categories', $categoria);
        $this->smarty->assign('descripcion', $descripcion);
        $this->smarty->assign('lavado', $lavado);
        $this->smarty->assign('temperatura', $temperatura);
        $this->smarty->assign('categories',$categories);
        $this->smarty->display('./templates/updatecategories.tpl');
    }
}

?>
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
    public function ShowFormCategories(){
        $this->smarty->assign('Title', 'form');
        $this->smarty->display('./templates/addformcategories.tpl');
    }
    public function ShowSuccess($message,$title){
        $this->smarty->assign('Title',$title);
        $this->smarty->assign('message', $message);
        $this->smarty->assign('return', 'Clothing/GetClothing');
        $this->smarty->display('./templates/showsuccess.tpl');
    }
    public function ShowError($message){
        $this->smarty->assign('message', $message);
        $this->smarty->display('./templates/error.tpl');
    }
}

?>
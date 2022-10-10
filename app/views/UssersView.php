<?php
    require_once './libs/smarty-master/libs/Smarty.class.php';
    class UssersView{
        private $smarty;
        public function __construct(){
            $this->smarty= new Smarty();
            $this->smarty->assign('BASE_URL', BASE_URL);
        }
        public function ShowFormLogin(){
            $this->smarty->assign('Title','Login');
            $this->smarty->display('./templates/formlogin.tpl');
        }
        public function ShowFormRegister(){
            $this->smarty->assign('Title','Register');
            $this->smarty->display('./templates/formregister.tpl');
        }
    }
?>
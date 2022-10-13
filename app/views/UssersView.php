<?php
    require_once './libs/smarty-master/libs/Smarty.class.php';
    class UssersView{
        private $smarty;
        public function __construct(){
            $this->smarty= new Smarty();
            $this->smarty->assign('BASE_URL', BASE_URL);
        }
        public function ShowFormLogin($auth,$message =NULL){
            $this->smarty->assign('Title','Login');
            $this->smarty->assign('message',$message);
            $this->smarty->assign('auth',$auth);
            $this->smarty->display('./templates/formlogin.tpl');
        }
        public function ShowFormRegister($auth){
            $this->smarty->assign('Title','Register');
            $this->smarty->assign('auth',$auth);
            $this->smarty->display('./templates/formregister.tpl');
        }
        public function ShowSuccess($message,$title,$auth){
            $this->smarty->assign('Title',$title);
            $this->smarty->assign('message', $message);
            $this->smarty->assign('return', 'Login');
            $this->smarty->assign('auth',$auth);
            $this->smarty->display('./templates/showsuccess.tpl');
        }
        public function ShowError($message,$auth){
            $this->smarty->assign('Title','Error');
            $this->smarty->assign('message', $message);
            $this->smarty->assign('auth',$auth);
            $this->smarty->display('./templates/error.tpl');
        }
        public function Homepage($auth,$nombre=NULL){
            $this->smarty->assign('Title','Homepage');
            $this->smarty->assign('nombre',$nombre);
            $this->smarty->assign('auth',$auth);
            $this->smarty->display('./templates/homepage.tpl');
        }
    }
?>
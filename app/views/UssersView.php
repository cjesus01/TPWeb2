<?php
    require_once './libs/smarty-master/libs/Smarty.class.php';
    class UssersView{
        private $smarty;
        public function __construct(){
            $this->smarty= new Smarty();
            $this->smarty->assign('BASE_URL', BASE_URL);
        }
        public function ShowFormLogin($message =''){
            $this->smarty->assign('Title','Login');
            $this->smarty->assign('message',$message);
            $this->smarty->display('./templates/formlogin.tpl');
        }
        public function ShowFormRegister(){
            $this->smarty->assign('Title','Register');
            $this->smarty->display('./templates/formregister.tpl');
        }
        public function ShowSuccess($message,$title){
            $this->smarty->assign('Title',$title);
            $this->smarty->assign('message', $message);
            $this->smarty->assign('return', 'Login');
            $this->smarty->display('./templates/showsuccess.tpl');
        }
        public function ShowError($message){
            $this->smarty->assign('Title','Error');
            $this->smarty->assign('message', $message);
            $this->smarty->display('./templates/error.tpl');
        }
        public function Homepage($nombre){
            $this->smarty->assign('Title','Homepage');
            $this->smarty->assign('nombre',$nombre);
            $this->smarty->display('./templates/homepage.tpl');
        }
    }
?>
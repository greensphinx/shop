<?php

    class UserController
    {
        public function actionRegister()
        {
            require_once (ROOT.DS.'views'.DS.'user'.DS.'register.php');
            return true;
        }
    }
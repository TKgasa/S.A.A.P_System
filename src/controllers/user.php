<?php
class user extends ControllerBasex{

    protected function login()
    {
        $viewModel = new UserModel();
        $this->returnView($viewModel->login(),true);
    }
}
<?php

class home extends ControllerBasex
{
    protected function index()
    {
        $viewModel = new HomeModel();
        $this->returnView($viewModel->index(), true);

    }
    
}



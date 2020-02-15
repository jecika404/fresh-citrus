<?php
  class Pages extends Controller {
    public function __construct(){
      $this->itemModel = $this->model('Item');
    }
    
    public function index(){
      $items = $this->itemModel->getItems();
      $data = [
        'title' => 'Welcome',
        'items' => $items
      ];


      $this->view('pages/index', $data);
    }

  }
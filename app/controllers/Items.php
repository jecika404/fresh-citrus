<?php
  class Items extends Controller {
    public function __construct(){
        $this->itemModel = $this->model('Item');
    }
    
    public function index(){
      $items = $this->itemModel->getItems();

      $data = [
        'items' => $items
        
      ];

      $this->view('items/index', $data);
    }
  }
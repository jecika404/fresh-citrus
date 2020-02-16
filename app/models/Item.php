<?php
  class Item {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getItems() {
      $this->db->query("SELECT * FROM items");

      return $this->db->resultSet();
    
    }
}
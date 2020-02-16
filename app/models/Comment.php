<?php
    class Comment {
        private $db;

        public function __construct(){
          
          $this->db = new Database;
        }

        
        public function addComment($data) {
          $this->db->query('INSERT INTO comments (username, email, title, message) VALUES (:username, :email, :title, :message)');

          $this->db->bind(':email', $data['email']);
          $this->db->bind(':username', $data['username']);
          $this->db->bind(':title', $data['title']);
          $this->db->bind(':message', $data['message']);
         
          

          if($this->db->execute()) {
              return true;
          }else {
              return false;
          }
      }

      public function updateComment($data) {
        $this->db->query('UPDATE comments SET status = :status WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':status', $data['status']);

        if($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

      public function getComments() {
        $this->db->query("SELECT * FROM comments WHERE status = 'approved' ORDER BY created_at DESC");
  
        $results = $this->db->resultSet();

        return $results;
      
      }

      public function getCommentById($id) {
        $this->db->query('SELECT * FROM comments WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        return $row;
      }

      public function getCommentsForAdmin() {
        $this->db->query("SELECT * FROM comments ORDER BY created_at DESC");
  
        $results = $this->db->resultSet();

        return $results;
      
      }

        
    }
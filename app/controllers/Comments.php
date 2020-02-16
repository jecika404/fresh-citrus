<?php
  class Comments extends Controller {
    public function __construct(){
        $this->commentModel = $this->model('Comment');
        $this->userModel = $this->model('User');
    }
    
    public function index(){
        $comments = $this->commentModel->getComments();
        $commentsForAdmin = $this->commentModel->getCommentsForAdmin();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'comments' => $comments,
            'commentsForAdmin' => $commentsForAdmin,
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'title' => trim($_POST['title']),
            'message' => trim($_POST['message']),
            'username_err' => '',
            'email_err' => '',
            'message_err' => '',
            'title_err' => '',
        ];

        if(empty($data['email'])) {
            $data['email_err'] = 'Please enter email';
        }
        
        if(empty($data['username'])) {
            $data['username_err'] = 'Please enter username';
        }

        if(empty($data['title'])) {
          $data['title_err'] = 'Please enter title';
        }

        if(empty($data['message'])) {
          $data['message_err'] = 'Please enter message';
        }

        if(empty($data['email_err']) && empty($data['username_err']) && empty($data['message_err']) && empty($data['title_err'])) {
          if($this->commentModel->addComment($data)) {
              flash('comment_message', 'You just add a comment');
              redirect('comments/index');
          }else {
              die('Something went wrong');
          }
        }else {
          $this->view('comments/index', $data);
        }

        }else {
          $data = [
            'comments' => $comments,
            'commentsForAdmin' => $commentsForAdmin,
            'username' => '',
            'email' => '',
            'title' => '',
            'message' => '',
            'status' => '',
            'username_err' => '',
            'email_err' => '',
            'message_err' => '',
            'title_password_err' => '',
            
          ];
  
          $this->view('comments/index', $data);
        }
    }

    public function edit($id){

      if($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
          'id' => $id,
          'status' => trim($_POST['status']),
      ];

      if(empty($data['status'])) {
          $data['status_err'] = 'Please enter status';
      }
      

      if(empty($data['status_err'])) {
        if($this->commentModel->updateComment($data)) {
            flash('comment_message', 'Update');
            redirect('comments/index');
        }else {
            die('Something went wrong');
        }
      }else {
        $this->view('comments/edit', $data);
      }

      }else {
        $comment = $this->commentModel->getCommentById($id);

        $data = [
          'id' => $id,
          'status' => '',   
        ];

        $this->view('comments/edit', $data);
      }
  }

  }
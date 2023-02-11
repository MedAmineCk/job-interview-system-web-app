<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/Database.php';
  include_once '../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  
  $post = new Post($db);


  $status = $_GET['status'];
  $id_candidat = $_GET['id_candidat'];
  $result = $post->update($status, $id_candidat);

  // Update post
  if($post->update($status, $id_candidat)) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }


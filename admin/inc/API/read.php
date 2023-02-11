<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Blog post query
  $status = $_GET['status'];
  $result = $post->read($status);
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $posts_arr = array();
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id_candidat'=> $id_candidat,
        'cin'=> $cin,
        'nom'=> $nom,
        'prenom'=> $prenom,
        'telephone'=> $telephone,
        'email'=> $email,
        'statut'=> $statut,
        'date_added'=> $date_added
    );

      // Push to "data"
      array_push($posts_arr, $post_item);
      // array_push($posts_arr['data'], $post_item);
    }

    function utf8ize($d) {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = utf8ize($v);
            }
        } else if (is_string ($d)) {
            return utf8_encode($d);
        }
        return $d;
    }

    // Turn to JSON & output
    echo json_encode(utf8ize($posts_arr));

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }

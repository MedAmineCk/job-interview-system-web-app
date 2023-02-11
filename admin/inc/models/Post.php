<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'posts';

    // Post Properties
    public $id_candidat;
    public $cin;
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $statut;
    public $status;
    public $date_added;

    public $experience;
    public $duree_experience;
    public $fonction_experience;
    public $lieu_experience;
    public $connaissance;
    public $pourquoi_notoriety;

    public $countt;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Condidats
    public function read($status) {
      // Create query
      if($status == 'Delete'){
        $query = "SELECT
        id_candidat,
        cin,
        nom,
        prenom,
        telephone,
        email,
        statut,
        DATE_FORMAT(candidat_infos.date_added,'%d %M %Y %h:%i %p') as date_added
        FROM	
        candidat_infos WHERE statut LIKE '%$status%'";
      }else{
        $query = "SELECT
        id_candidat,
        cin,
        nom,
        prenom,
        telephone,
        email,
        statut,
        DATE_FORMAT(candidat_infos.date_added,'%d %M %Y %h:%i %p') as date_added
        FROM	
        candidat_infos WHERE statut LIKE '%$status%' and statut NOT IN ('Delete');";
      }
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Condidats
    public function getCount() {
      // Create query
      $query = "SELECT `statut`, COUNT(`statut`) AS countt FROM `candidat_infos` GROUP BY `statut`";
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }


    // Get questionaire
    public function readQs($id) {
      // Create query
      $query = "SELECT * FROM `questionnaire` WHERE `fk_id_candidat` = $id";
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get specific Condidat
    public function readCondida($id_candidat) {
      // Create query
      $query = "SELECT * FROM `candidat_infos` WHERE `statut` LIKE '%$status%'";
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Update Post
    public function update($status, $id_candidat) {
      // Create query
      $query = "UPDATE `candidat_infos` SET `statut` = '$status' WHERE `id_candidat` = $id_candidat";

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
     } 

    // Delete Post
    public function delete($id_candidat) {
      // Create query
      $query = "DELETE FROM `candidat_infos`  WHERE `id_candidat` = $id_candidat";
    
      // Prepare statement
      $stmt = $this->conn->prepare($query);
    
      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
      
      }
    
  }
<?php
use app\core\Database;

class User {
  private $db;

  public function __construct() {
    $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public function login($post) {
    $user = $this->queryUserLogin($post);
    if($user) {
      $_SESSION['user'] = $user;
    }
  }

  public function signup($post) {
    $this->insertUser($post);
  }

  private function queryUserLogin($data) {
    $query =  "SELECT * FROM user WHERE (username=:username OR email=:email) AND pass=:pass;";
    return $this->db->querySingle($query, $data);
  }

  // private function queryUserId($id) {
  //   $query =  "SELECT * FROM user WHERE id=?";
  //   return $this->db->querySingle($query, [$id]);
  // }

  // private function queryUsers() {
  //   $query =  "SELECT * FROM user;";
  //   return $this->queryAll($query);
  // }

  public function insertUser($data) {
    // ex.:
    // $data = [
    //   'fname' => 'admin',
    //   'lname' => 'admin',
    //   'username' => 'admin',
    //   'email' => 'admin@admin.com',
    //   'pass' => 'admin',
    //   'street' => 'admin street 123',
    // ];

    $query =  "INSERT INTO users(fname, lname, username, email, pass, street, is_admin) 
                VALUES(:fname, :lname, :username, :email, :pass, :street, 0);";
    return $this->db->prepareStmt($query, $data);
  }

  protected function updateUser($data) {
    // ex.:
    // $data = [
    //   'fname' => 'admin1',
    //   'lname' => 'admin1',
    //   'username' => 'admin123',
    //   'email' => 'admin@admin.com',
    //   'pass' => 'admin',
    //   'street' => 'admin street 123',
    //   'id' => 1,
    // ];

    $query =  "UPDATE user 
                SET fname=:fname, lname=:lname, username=:username, email=:email, pass=:pass, street=:street
                WHERE id=:id;";
    return $this->db->prepareStmt($query, $data)->rowCount();
  }
}
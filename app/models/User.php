<?php

use app\core\Database;

class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public function login($userInfo)
  {
    return $this->queryUserLogin($userInfo);
  }

  public function signup($userInfo)
  {
    $this->insertUser($userInfo);
  }

  private function queryUserLogin($data)
  {
    $query =  "SELECT * FROM users WHERE (username=:username OR email=:email) AND pass=:pass;";
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

  public function insertUser($data)
  {
    // ex.: look in signup controller

    $query =  "INSERT INTO users(fname, lname, username, email, pass, street, is_admin) 
                VALUES(:fname, :lname, :username, :email, :pass, :street, 0);";
    return $this->db->prepareStmt($query, $data);
  }

  protected function updateUser($data)
  {
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

    $query =  "UPDATE users 
                SET fname=:fname, lname=:lname, username=:username, email=:email, pass=:pass, street=:street
                WHERE user_id=:id;";
    return $this->db->prepareStmt($query, $data)->rowCount();
  }
}

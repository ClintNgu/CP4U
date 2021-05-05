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

  public function insertUser($data)
  {
    // ex.: look in signup controller
    $query =  "INSERT INTO users(fname, lname, username, email, pass, street, is_admin) 
                VALUES(:fname, :lname, :username, :email, :pass, :street, 0);";
    return $this->db->prepareStmt($query, $data);
  }

  public function getUserById($id)
  {
    $query = 'SELECT * FROM users WHERE user_id=?';
    return $this->db->querySingle($query, [$id]);
  }

  public function updateUser($data)
  {
    $query =  "UPDATE users 
                SET fname=:fname,
                lname=:lname,
                username=:username,
                email=:email,
                street=:street
                WHERE user_id=:id;";
    return $this->db->prepareStmt($query, $data)->rowCount();
  }

  public function deleteUser($user_id)
  {
    $query = 'DELETE FROM users WHERE user_id=?;';
    return $this->db->prepareStmt($query, [$user_id])->rowCount();
  }
}

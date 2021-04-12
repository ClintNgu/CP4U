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

  public function updateUserPassword($data)
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
                SET pass=:pass
                WHERE user_id=:id;";
    return $this->db->prepareStmt($query, $data)->rowCount();
  }

  public function deleteUser($user_id)
  {
    $query = 'DELETE FROM users WHERE user_id=?;';
    return $this->db->prepareStmt($query, [$user_id])->rowCount();
  }
}

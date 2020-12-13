<?php 
include_once('../config/connection.php');




Class User extends Connection {
  
  private $User_id;
  private $username;
  private $user_firtsname;
  private $user_lastname;
  private $user_email;
  private $user_role;
  private $user_password;
private $session;
private $time;



  public function getuser_password()
  {
      return $this->user_password;
  }
  
  
  public function setuser_password($user_password)
  {
      $this->user_password = $user_password;
  }


  public function getuser_role()
  {
      return $this->user_role;
  }
  
  
  public function setuser_role($user_role)
  {
      $this->user_role = $user_role;
  }
  



  public function getuser_email()
  {
      return $this->user_email;
  }
  
  
  public function setuser_email($user_email)
  {
      $this->user_email = $user_email;
  }
  
  public function getuser_lastname()
  {
      return $this->user_lastname;
  }
  
  
  public function setuser_lastname($user_lastname)
  {
      $this->user_lastname= $user_lastname;
  }
  
  public function getuser_firtsname()
  {
      return $this->user_firtsname;
  }
  
  
  public function setuser_firtsname($user_firtsname)
  {
      $this->user_firtsname= $user_firtsname;
  }


  public function getusername()
  {
      return $this->username;
  }
  
  
  public function setusername($username)
  {
      $this->username = $username;
  }



  public function getUser_id()
  {
      return $this->User_id;
  }
  
  
  public function setUser_id($User_id)
  {
      $this->User_id = $User_id;
  }




  public function showCategories(){
        try{
                
                $result = $this->sentence("SELECT * FROM users");
            
                return $result;
           } catch(Exception $e) {
              echo $e;
      }
  }

  

  public function showUserByUsername($username){
    try{
            
            $result = $this->sentence("SELECT * FROM users WHERE username = '$username'");
        
            return $result;
       } catch(Exception $e) {
          echo $e;
  }
}


  public function updateUserToAdmin(){
    try{
            
            $result = $this->sentence("UPDATE users SET user_role = 'admin' WHERE id =  $this->User_id");
        
            if ($result->rowCount() > 0)
                {
                    return "exito";
                }
                else
                {
                    return "fallo";
                }
       } catch(Exception $e) {
          echo $e;
  }
}

public function updateUserToSubscriber(){
  try{
          
          $result = $this->sentence("UPDATE users SET user_role = 'subscriber' WHERE id =$this->User_id");
      
          if ($result->rowCount() > 0)
                {
                    return "exito";
                }
                else
                {
                    return "fallo";
                }
     } catch(Exception $e) {
        echo $e;
}
}


public function deleteUser(){
  try{
          
          $result = $this->sentence("DELETE FROM users WHERE id = $this->User_id");
      
          if ($result->rowCount() > 0)
                {
                    return "exito";
                }
                else
                {
                    return "fallo";
                }
     } catch(Exception $e) {
        echo $e;
}
}


public function createUser()
{
    try {
        $result = $this->sentence("SET CHARACTER SET utf8");
        $result = $this->sentence("INSERT INTO users( user_firtsname, 
                                                      user_lastname,
                                                      user_email, 
                                                      username, 
                                                      user_password,
                                                      user_role)
                                VALUES( 
                                    '$this->user_firtsname',
                                    '$this->user_lastname',
                                    '$this->user_email',
                                    '$this->username',
                                    '$this->user_password',
                                    '$this->user_role')");
        if ($result->rowCount() > 0)
        {
            return "exito";
        }
        else
        {
            return "fallo";
        }
    } catch (Exception $e) {
        echo $e;
    }
}
public function updateUser()
{
    try {
        $result = $this->sentence("SET CHARACTER SET utf8");
        $result = $this->sentence("UPDATE users SET 
        user_firtsname =   '$this->user_firtsname',
        user_lastname =  '$this->user_lastname',
        user_email =    '$this->user_email',
        username =    '$this->username',
        user_password =  '$this->user_password'
        -- user_role  = '$this->user_role'     
        WHERE id = '$this->User_id'");
        if ($result->rowCount() > 0)
        {
            return "exito";
        }
        else
        {
            return "fallo";
        }
    } catch (Exception $e) {
        echo $e;
    }
}



public function showUserSession($session){
    try{
            
            $result = $this->sentence("SELECT * FROM users_online WHERE session = '$session'");
        
            return $result;
       } catch(Exception $e) {
          echo $e;
  }
}

public function createUserSession($session,$time){
    try{
            
            $result = $this->sentence("INSERT INTO users_online(session, time) VALUES('$session','$time')");
        
            if ($result->rowCount() > 0)
                {
                    return "exito";
                }
                else
                {
                    return "fallo";
                }
       } catch(Exception $e) {
          echo $e;
  }
}

public function updateUserSession($session,$time){
    try{
            
            $result = $this->sentence("UPDATE users_online SET time = '$time' WHERE session = '$session'");
        
            if ($result->rowCount() > 0)
                {
                    return "exito";
                }
                else
                {
                    return "fallo";
                }
       } catch(Exception $e) {
          echo $e;
  }
}



public function showUsersOnline($time_out){
    try{
            
            $result = $this->sentence("SELECT COUNT(id) FROM users_online WHERE time > '$time_out'");
        
            return $result;
       } catch(Exception $e) {
          echo $e;
  }
}

}
?>

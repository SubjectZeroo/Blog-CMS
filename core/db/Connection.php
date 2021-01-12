<?php
class Connection 
{

  public static function make($config) 
  {
    try {

      // return new PDO('mysql:host=localhost;dbname=todos', 'root', '');


      return new PDO (
        $config['connection'].';dbname='.$config['name'],
        $config['username'],
        $config['password'],
        $config['options']
      );

    } catch (PDOException $e) {

      die($e->getMessage());
    }
    
  }


  public function sentence($query)
  { 
    # creamos un stament preparado
    $stmt = $this->connection->prepare($query);
  
    if($stmt) 
    {	
      # ejecutamos el equery
      $stmt->execute();
      return $stmt;
    } 
    else
    {
      return self::get_error();
    }
  }

}
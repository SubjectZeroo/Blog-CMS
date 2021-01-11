<?php 
Class Connection {
  
  protected $hostname = "localhost";
  protected $dbusername = "root";
  protected $dbpassword = "";
  protected $dbname = "cms";

  public function __construct()
  {
    try{
      $this->connection = new PDO("mysql:host=$this->hostname; dbname=$this->dbname", $this->dbusername, $this->dbpassword);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOExeption $e){
      $this->connection = null;
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
#arrojamos el error
  public function get_error()
  {
    $this->connection->errorInfor();
  }
	# cerramos la db cuando el objeto es destruido.
  public function __destruct()
  {
    $this->connection = null;
  }
}


?>
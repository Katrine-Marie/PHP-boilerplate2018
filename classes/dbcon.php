<?php
require_once 'Config.php';
include 'Admin.php';

class DbCon{
    
    private $ObjConnection;
    
    // Constructor method, bliver altid eksekveret når der instatnieres et objekt af klassen
    function __construct() {
        if(Config::useLocal){
            $this->ObjConnection = new mysqli(Config::localHost, Config::localUser, Config::localPassword, Config::localDatabase);
        } else {
            $this->ObjConnection = new mysqli(Config::host, Config::user, Config::password, Config::database);
        }
        
        if($this->testDbConnection()){
            $this->ObjConnection->set_charset('utf8');
            return $this->ObjConnection;
        }
    }
    
    // Test om der er forbindelse ellers dø
    private function testDbConnection(){
        
        if($this->ObjConnection->connect_error){
            die('Der er en fejl i databaseforbindelsen '.$this->ObjConnection->connect_errno. ' '.$this->ObjConnection->connect_error);
        } else {
            return TRUE;
        }
    }
    
    public function query($sql){
        return $this->ObjConnection->query($sql);
    }
	
}
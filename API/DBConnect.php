<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/15/2018
 * Time: 10:24 PM
 */
class DBConnect
{
    private $con;
    public function __construct()
    {
    }

    function connect()
    {
        include_once dirname(__FILE__) . "/config.php";
        $this->con = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        if ($this->con->connect_error) {
            echo "Failed to connect with database" . $this->con->connect_error;
        }
        return $this->con;
    }
}
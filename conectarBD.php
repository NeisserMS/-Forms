<?php
class ConectarBD
{
    public static function mysql()
    {     
        $host = 'localhost';
        $dbnombre = 'prueba';
        $user = 'root';
        $password = '';
   
        try 
        {
            $dsn = "mysql:host=$host;dbnombre=$dbnombre";
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } 
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }        
    }
}
<?php
class Database
{
    private $user;
    private $host;
    private $pass;
    private $db;
    private $mySqli;
    public function __construct()
    {
        $this->user = "root";
        $this->host = "localhost";
        $this->pass = "";
        $this->db = "social";
    }

    public function getServerName()
    {
        return $this->host;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function establishConnection()
    {

        $this->mySqli = @new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->mySqli->connect_error) {
            throw new Exception("<p>Error: Could not connect to database.<br/>
                Please try again later.</p>", 1);
        }
        return $this->mySqli;
    }
    public function closeConnection()
    {
        $this->mySqli->close();
        // echo "<br> Database is closed";
    }
    public function query_exexute($sql)
    {
        $result = $this->mySqli->query($sql);
        if (!$result) {
            throw new Exception($this->mySqli->error);
        }
        return $result;
    }
    public function update_record($sql)
    {
        $result = $this->mySqli->query($sql);
        if (!$result) {
            throw new Exception($this->mySqli->error);
        }
        return $result;
    }
}
?>
<?php

Class Conexao {

    protected $host = "10.208.200.9";
    protected $user = "equipe6";
    protected $pswd = "ufam@06";
    protected $dbname = "1db012012";
    protected $con = null;

    function __construct() {
        
    }

//método construtor
#método que inicia conexao

    function open() {
        $this->con = @pg_connect("host=$this->host user = $this->user
        password = $this->pswd dbname = $this->dbname");
        return $this->con;
    }

#método que encerra a conexao

    function close() {
        @pg_close($this->con);
    }

#método verifica status da conexao

    function statusCon() {
        if (!$this->con) {
            echo "<h3>O sistema não está conectado à [$this->dbname] em [$this->host].</h3>";
            exit;
        } else {
            echo "<h3>O sistema está conectado à [$this->dbname] em [$this->host].</h3>";
        }
    }

}
?>
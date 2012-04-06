<?php

class Banco {
    private $host = "localhost";
    private $user = "equipe6";
    private $password = "ufam@06";
    private $dbname = "1db012012";
//    private $host = "localhost";
//    private $user = "postgres";
//    private $password = "postgres";
//    private $dbname = "postgres";
    protected $con = null;

    public function __construct() {}
#método que inicia conexao

    function open() {
        $this->con = pg_connect("host = $this->host user = $this->user password = $this->password dbname = $this->dbname");
        if (!$this->con) {
            echo 'Erro ao tentar obter conexão com o BD';
        } else {
            return $this->con;
        }
    }

#método que encerra a conexao

    function close() {
        pg_close($this->con);
    }
}
?>
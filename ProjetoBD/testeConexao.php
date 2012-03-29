<?php

class Banco {

    private $host = "localhost";
    private $user = "postgres";
    private $password = "postgres";
    private $dbname = "postgres";
//    private $host = "localhost";
//    private $user = "equipe6";
//    private $password = "ufam@06";
//    private $dbname = "1db012012";
    protected $con = null;

    function open() {
        $this->con = pg_connect("host = $this->host user = $this->user password = $this->password dbname = $this->dbname");
        echo "ai";
//        if (!$this->con) {
//            echo 'Erro ao tentar obter conexão com o BD';
//        } else {
//            return $this->con;
//        }
    }

    function close() {
        pg_close($this->con);
    }

    function statusCon() {
        if (!$this->con) {
            echo "<h3>O sistema não está conectado à [$this->dbname] em [$this->host].</h3>";
            exit;
        } else {
            echo "<h3>O sistema está conectado à [$this->dbname] em [$this->host].</h3>";
        }
    }

}
//echo phpinfo();
$con = new Banco();
$con->open();
$con->statusCon();
$sql = "INSERT INTO tbfabricantes06 (nome, nacionalidade) VALUES ('" . $this->getNome() . "', '" . $this->getNacionalidade() . "')";
$result = pg_query($sql);
$con->close();
if (!$result) {
    echo "false";
} else {
    echo "true";
}
?>
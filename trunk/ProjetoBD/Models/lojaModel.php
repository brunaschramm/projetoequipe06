<body>
<?php

class lojaModel {
    private $codigo;
    private $nome;
    private $email;
    private $endereco;

    public function __construct();

//        function __construct($nome, $email, $endereco) {
//            $this->nome = $nome;
//            $this->email = $email;
//            $this->endereco = $endereco;
//        }


    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getCodigo() {
        return $this->$codigo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function cadastrar() {
        echo getNome() . "\n" . getEmail() . "\n" . getEndereco();
        return true;
    }

}
$lojaModel = new lojaModel();
?>
</body>
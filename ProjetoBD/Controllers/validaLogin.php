<?php
$email = $_POST["email"];
$cpf = $_POST["cpf"];

if($cpf == "00691023255" && $email == "brunabas22@gmail.com"){
    Header("Location: ../Views/index.html");
} else {
    echo "Erro no Login";
}
//include_once("conecta.php");
//
//$minhaConexao = new Conexao();
//#chamada ao metodo open que abra a conexao
//$minhaConexao->open();
////CONECTA COM O BANCO DE DADOS
//
////RECEBE OS DADOS DO FORMULÁRIO
//$email = $_POST["email"];
//$cpf = $_POST["cpf"];
//
////VERIFICA
//$sql = pg_query($minhaConexao, 
//"SELECT * FROM tbusuario WHERE EMAIL = ''$email'' AND CPF = ''$cpf''") or die("ERRO NO COMANDO SQL");
//
////LINHAS AFETADAS PELA CONSULTA
//$row = pg_num_rows($sql);
//
////VERIFICA SE RETORNOU ALGO
//if ($row == 0)
//    echo "Usuário/Senha inválidos";
//
//else {
//
////PEGA OS DADOS
//    $codigo = pg_result($sql, 0, "CODIGO");
//    $cpf = mysql_result($sql, 0, "CPF");
//    $nome = mysql_result($sql, 0, "NOME");
//    $email = mysql_result($sql, 0, "EMAIL");
//    $apelido = mysql_result($sql, 0, "APELIDO");
//
////INICIALIZA A SESSÃO
//    session_start();
//
////GRAVA AS VARIÁVEIS NA SESSÃO
//    $_SESSION[codigo] = $codigo;
//    $_SESSION[cpf] = $cpf;
//    $_SESSION[nome] = $nome;
//    $_SESSION[email] = $email;
//    $_SESSION[apelido] = $apelido;
////REDIRECIONA PARA A PÁGINA QUE VAI EXIBIR OS PRODUTOS
//    Header("Location: ../Views/index.html");
//}; //FECHA ELSE
?> 


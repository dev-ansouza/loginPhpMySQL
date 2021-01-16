<?php
//Configurando o acesso a database..

//Nome do host
$host="localhost";

//Nome de usuário para acesso do db
$user="root";

//Senha para acesso do db
$password="";

//Nome da estrutura
$db="login";

//Definição da configuração da conexão
$mySql = mysqli_connect($host, $user, $password);

//Define o nome da database
mysqli_select_db($mySql, $db);

//Verifica se foi preenchido o email
if (isset($_POST['email'])) {

    //Define as variáveis $email e $pass
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    //Define a query a realizar a consulta no database
    $sql = "SELECT * FROM user WHERE email = '" . $email . "' AND pass = '" . $pass . "' limit 1";

    //Variável definida para armazenar e executar a query..
    $result = mysqli_query($mySql, $sql);

    //Verifica o numero de linhas retornadas, se for igual a uma linha..
    if (mysqli_num_rows($result) == 1) {

        echo "Usuário logado com sucesso!";
        exit();

    } else {

        echo "Email ou Senha incorreto!";
        exit();
    }
}
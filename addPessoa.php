<?php
require_once 'init.php';
// pega os dados do formuário
$Nome = isset($_POST['Nome']) ? $_POST['Nome'] : null;
$tipoid = isset($_POST['selectTipo']) ? $_POST['selectTipo'] : null;
$Idade = isset($_POST['Idade']) ? $_POST['Idade'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($Nome) || empty($tipoid) || empty($Idade))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO pessoas(Nome, tipoid, Idade) VALUES(:Nome, :tipoid, :Idade)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':Nome', $Nome);
$stmt->bindParam(':tipoid', $tipoid);
$stmt->bindParam('Idade', $Idade);

if ($stmt->execute())
{
    header('Location: msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>
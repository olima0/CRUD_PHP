<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, descricao FROM tipo ORDER BY descricao ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <title>Pessoas</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.html">Início</a>
      </nav>
      <div class="container">
        <div class="jumbotron">
            <p class="h3 text-center">Cadastro de Pessoas</p>
        </div>
        <form action="addPessoa.php" method="post">
            <div class="form-group">
                <label for="descricao">Nome: </label>
                <input type="text" class="form-control" name="Nome" id="Nome" required minlength="2" placeholder="Informe o nome da pessoa">
                <label for="descricao">Idade: </label>
                <input type="text" class="form-control" name="Idade" id="Idade" required minlength="1" placeholder="Informe a idade da pessoa">
            </div>
            <div class="form-group">
                <label for="selectTipo">Selecione o tipo de Pessoa</label>
                <select class="form-control" name="selectTipo" id="selectTipo" required>

                  <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

                        <option value=" <?php echo $dados['id'] ?> "> <?php echo $dados['descricao'] ?> </option>
                      
                  <?php endwhile; ?>

                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-danger" href="index.html">Cancelar</a>
              </div>
          </form>
    </div>
</body>
</html>
<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id, Nome, Idade FROM pessoas ORDER BY Nome, Idade ASC";
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
        <div class="container">
            <div class="jumbotron">
                <p class="h3 text-center">Tipos cadastrados</p>
            </div>
            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($tipo = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <th scope="row"><?php echo $tipo['id'] ?></th>
                        <td><?php echo $tipo['Nome'] ?></td>
                        <td><?php echo $tipo['Idade'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="deletePessoas.php?id=<?php echo $tipo['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            </table>
        </div>
</body>
</html>
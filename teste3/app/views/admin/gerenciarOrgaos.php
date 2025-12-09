<?php
// Se Opção A funcionou no navegador
$base_img_url = "/teste3/public/img/";
$base_url = "/teste3/app/controllers/AdminController.php";

// Se Opção B funcionou no navegador
// $base_img_url = "/public/img/";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar orgaos - Admin</title>
    <style>
        /* Estilos Comuns */
        /* ... */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #ff4500; 
            text-align: center;
            border-bottom: 2px solid #ffcc00; 
            padding-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        button, .btn {
            background-color: #ff4500;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        button:hover, .btn:hover {
            background-color: #cc3700;
        }

   
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: #ffcc00; 
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status-ativo { color: green; font-weight: bold; }
        .status-inativo { color: gray; }
        .estoque-baixo { color: #cc3700; font-weight: bold; }

    </style>

</head>
<body>
    <h1>Gerenciamento de Orgaos Cadastrados</h1>
    <a href="AdminController.php?action=adicionarView">Adicionar Novo Orgao</a>
    <hr>
    
    <?php if (empty($produtos)): ?>
        <p>Nenhum orgao cadastrado.</p>
    <?php else: ?>
        <table border="1" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th> 
                    <th>Imagem</th><th>Nome</th>
                    <th>Tipo Unidade</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo $produto['id']; ?></td>
                        <td>
                            <img src="<?php echo $base_img_url . $produto['imagem_url']; ?>" 
                                salt="<?php echo $produto['nome']; ?>" class="img-thumb">
                        </td>
                        <td><?php echo $produto['nome']; ?></td>
                        <td><?php echo $produto['tipo_unidade']; ?></td>
                        <td><?php echo $produto['telefone']; ?>
                        <td>
                            <a href="<?php echo $base_url; ?>?action=editarView&id=<?php echo $produto['id']; ?>" 
                            class="btn acao-btn btn-editar">Editar</a>
                            
                            <a href="<?php echo $base_url; ?>?action=deletar&id=<?php echo $produto['id']; ?>" 
                            class="btn acao-btn btn-deletar"
                            onclick="return confirm('Tem certeza que deseja deletar o produto <?php echo $produto['nome']; ?>?');">
                                Deletar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>
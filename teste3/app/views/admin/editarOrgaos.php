<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> Editar Orgao - Admin</title>
        <style>
        
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
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }

    </style>
    </head>
<body>
    <div class="container">
        <div class="admin-header">
            <h1>Editar Orgao: <?php echo $produto['nome']; ?></h1>
            <a href="AdminController.php?action=gerenciar" class="btn">Voltar para Gerenciamento</a>
        </div>
        
        <form action="AdminController.php?action=salvar" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
            
            <input type="hidden" name="imagem_url_existente" value="<?php echo $produto['imagem_url']; ?>">

            <label for="tipo_unidade">Tipo do Orgao:</label>
            <input type="text" id="tipo_unidade" name="tipo_unidade" value="<?php echo $produto['tipo_unidade']; ?>" required>

            <label for="nome">Nome do Orgao:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>" required>

            <label for="endereco">Endereco:</label>
            <textarea id="endereco" name="endereco" required><?php echo $produto['endereco']; ?></textarea>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo $produto['telefone']; ?>" required>

            <label>Imagem Atual:</label>
            <img src="/public/img/<?php echo $produto['imagem_url']; ?>" alt="Imagem Atual" style="max-width: 150px; display: block; margin-bottom: 15px;">

            <label for="imagem">Alterar Imagem (Selecione um novo arquivo para substituir):</label>
            <input type="file" id="imagem" name="imagem" accept="image/*"><br><br>

            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
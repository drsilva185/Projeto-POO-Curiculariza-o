<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Orgao de Seguranca - Admin</title>
        <style>

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5; /* Cinza claro suave */
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
            color: #ff4500; /* Ketchup */
            text-align: center;
            border-bottom: 2px solid #ffcc00; /* Mostarda */
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

        /* Estilos Específicos do Formulário */
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
            box-sizing: border-box; /* Garante que o padding não aumente o tamanho total */
        }
        textarea {
            resize: vertical;
        }

    </style>
</head>
<body>
   <h1>Adicionar Novo Orgao de Seguranca</h1>
    <a href="AdminController.php?action=gerenciar">Voltar para Gerenciamento</a>
    <hr>
    
    <form action="AdminController.php?action=salvar" method="POST" enctype="multipart/form-data">
        <label for="tipo_unidade">Tipo de Unidade:</label><br>
        <input type="text" id="tipo_unidade" name="tipo_unidade" required><br><br>

        <label for="nome">Nome:</label><br>
        <textarea id="nome" name="nome" required></textarea><br><br>

        <label for="endereco">Endereco:</label><br>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" required><br><br>
        
        <label for="imagem">Enviar Imagem do Produto:</label><br>
        <input type="file" id="imagem" name="imagem" accept="image/*" required><br><br>

        <button type="submit">Salvar Orgao</button>
    </form>
</body>
</html>
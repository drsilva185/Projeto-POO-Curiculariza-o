<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Orgaos de Segurança - Início</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
            text-align: center;
        }
        header {
            background-color: #e60c0cff; 
            color: #333;
            padding: 20px 0;
            border-bottom: 5px solid #000000ff;
        }
        h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .container {
            padding: 40px 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .buttons-group {
            margin-top: 30px;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.1em;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn-menu {
            background-color: #e6250cff;
            color: white;
            border: 2px solid #cc3700;
        }
        .btn-menu:hover {
            background-color: #cc3700;
            transform: scale(1.05);
        }
        .btn-admin {
            background-color: #333;
            color: #ffcc00;
            border: 2px solid #555;
        }
        .btn-admin:hover {
            background-color: #555;
            transform: scale(1.05);
        }
        footer {
            margin-top: 50px;
            padding: 10px 0;
            color: #999;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <header>
        <h1> Órgãos de segurança pública do Alto Tiete</h1>
    </header>

    <div class="container">
        <h2>Seja bem-vindo ao Sistema de listagem dos órgãos de segurança pública do alto tiete</h2>

        <div class="buttons-group">
            <a href="app/controllers/OrgaosController.php" class="btn btn-menu">
                Veja Todas as Unidades do Alto Tiete
            </a>
            
            <p style="margin-top: 30px;">— Área Restrita —</p>

            <a href="app/controllers/AdminController.php?action=gerenciar" class="btn btn-admin">
                Acesso do Administrador
            </a>
        </div>
    </div>

</body>
</html>
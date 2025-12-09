<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Orgaos Ja Cadastrados</title>
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
      
        header {
            background-color: #ffcc00; 
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .orgao-card {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #fff;
            transition: box-shadow 0.3s;
        }
        .orgao-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .orgao-info {
            flex-grow: 1;
            text-align: left;
            padding-left: 20px;
        }
        .orgao-info h2 {
            margin-top: 0;
            color: #333;
        }
        .orgao-card img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 4px;
            border: 2px solid #ffcc00;
            margin-left: 200px;
        }
        
    </style>
<body>
    <h1>Catálogo de Orgaos Cadastrados</h1>
    
    <?php if (empty($produtos)): ?>
        <p>Nenhum orgao cadastrado no momento.</p>
    <?php else: ?>
        <div class="orgao-container">
            <?php foreach ($produtos as $produto): ?>
                <div class="orgao-card">
                  <div><h2><strong>Nome: <?php echo $produto['nome']; ?>  </strong>
                  <p>Tipo de Unidade: <?php echo $produto['tipo_unidade']; ?><br></p> 
                  <p>Endereço: <?php echo $produto['endereco']; ?><br></p> 
                  <p>Telefone: <?php echo $produto['telefone']; ?><br></p> 
                  
                  <br> </h2></div>
                  
                  <div><img class="orgao-img" 
                    src="/teste3/public/img/<?php echo $produto['imagem_url']; ?>" 
                    alt="<?php echo $produto['nome']; ?>"><br></div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>
</html>
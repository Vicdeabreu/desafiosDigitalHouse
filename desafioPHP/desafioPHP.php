<?php
    include_once("config/variaveis.php");
    include_once("config/validacoes.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-7 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($produtos as $produto) {?>
                    <tr>
                        <td><?php echo $produtos["nome"];?> </td>
                        <td><?php echo $produtos["categoria"];?> </td>
                        <td><?php echo $produtos["precio"];?> </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>

        <!-- Comienza el formulario         -->
            <div class="col-4 p-4">
                <h1>Cadastrar Produto</h1>
                <div class="form-group">
                    Nome:<input type="text" class="form-control" name="nomeProduto" placeholder="Nome do Produto"/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Categorías</label>
                        <?php if(isset($categorias) && $categorias != []) {?>
                    <select class="form-control" id="exampleFormControlSelect1">
                            <?php foreach ($categorias as $categoria) {?>
                                <option value="<?php $categoria?>"><?php echo $categoria?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição do Produto</label>
                    <textarea class="form-control" name="descricaoProduto" rows="3"></textarea>
                </div>
                <div class="form-group">
                    Preço:<input type="text" class="form-control" name="precoProduto" placeholder="Preço do Produto"/>
                </div>
                <div class="form-group">
                    Foto do produto:<br> <input type="file" name="arquivoProduto" placeholder="Carregar Foto"> </>
                </div>
                <button class="btn btn-success">Enviar</button>               
            </div>
        </div>
    
    </main>
</body>
</html>
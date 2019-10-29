<?php
    include_once("config/variaveis.php");
    include_once("config/validacoes.php");

$nomeArquivo = "produto.json";

    function cadastrarProduto($nome, $categoria, $descricao, $quantidade, $preco, $img) {
    global $nomeArquivo;

    if (!file_exists($nomeArquivo)){
        $produtos = [];
    } else {
        $produtos = json_decode(file_get_contents($nomeArquivo), true);
    }
    
    $idProduto = count($produtos) +1;
    $nomeImagen = $_FILES['imagem']['name'];
    $tempName = $_FILES['imagem']['tmp_name'];
    $direccion = "img";
    $endImagem = $direccion."/".$nomeImagen;


    $produtos[] = ["id"=>$idProduto, 
                    "nome" => $nome,
                    "categoria" => $categoria,
                    "descricao" => $descricao,
                    "quantidade" => $quantidade,
                    "preco" => $preco,
                    "imagem" => $endImagem,
                    ];

    $json = json_encode($produtos);
    $deuCerto = file_put_contents($nomeArquivo, $json);

    if ($deuCerto) {
        if (move_uploaded_file($tempName, $endImagem)) {
            return "Salvo com sucesso";
        } else {
                return "Nao foi possivel salvar a imagem.";
        }
    } else {
        return "Nao foi possivel salvar.";
    }
}


    if ($_POST) {
        echo cadastrarProduto($_POST['nome'],$_POST['categoria'],$_POST['descricao'],$_POST['quantidade'],$_POST['preco'],$endImagem,);
    }


    //* Transformando produto cadastrado em array *//
$produtoCadastrado = json_decode(file_get_contents($nomeArquivo), true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                    <?php foreach($produtoCadastrado as $produto) {?>
                    <tr>
                        <td><strong><a href="sucesso.php?id= <?php echo $produto['id']; ?>"><?php echo $produto["nome"];?></a></strong></td>
                        <td><?php echo $produto["categoria"];?> </td>
                        <td><?php echo $produto["preco"];?> </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>

        <!-- Comienza el formulario         -->
            <div class="col-4 bg-light p-4">
                <h1>Cadastrar Produto</h1>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    Nome:<input type="text" class="form-control" name="nome" placeholder="Nome do Produto" required/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Categorías</label>
                        <?php if(isset($categorias) && $categorias != []) {?>
                    <select class="form-control" id="exampleFormControlSelect1" name="categoria" required>
                            <?php foreach ($categorias as $categoria) {?>
                                <option value="<?php echo $categoria?>"><?php echo $categoria?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição do Produto</label>
                    <textarea class="form-control areatexto"  name="descricao" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    Quantidade:<input type="number" class="form-control" name="quantidade" placeholder="Quantidade" required/>
                </div>
                <div class="form-group">
                    Preço:<input type="number" step="0.01" class="form-control" name="preco" placeholder="Preço do Produto" required/>
                </div>
                <div class="form-group">
                    Foto do produto:<br><input type="file" name="imagem" placeholder="Carregar Foto" required/>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>               
            </div>
        </form>
    </div>
    </main>
</body>
</html>
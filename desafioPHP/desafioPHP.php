<?php
    include_once("config/variaveis.php");
    include_once("config/validacoes.php");

    $arquivo = $_FILES["imagem"];
    if($_FILES){

    $nomeArquivo = $arquivo["name"];
    $tmpLocal = $arquivo["tmp_name"];
    $direccion = "uploads";
    $caminhoCompleto = $direccion."/".$nomeArquivo;

    if (!file_exists($direccion.$nomeArquivo)) {
        $deuCerto = move_uploaded_file($tmpLocal, $caminhoCompleto);
        if ($deuCerto){
            echo "Seu arquivo foi salvo.";
        } else {
            echo "Não foi possível salvar o arquivo.";
        }
    } else {
        echo "Já existe um arquivo com esse nome. Favor enviar outro arquivo.";
    }
}

$nomeArquivo = "produto.json";

    function cadastrarProduto($nome, $categoria, $descricao, $quantidade, $preco, $img) {
    global $nomeArquivo;

    if (!file_exists($nomeArquivo)){
        $produtos = [];
    } else {
        $produtos = json_decode(file_get_contents($nomeArquivo), true);
    }
    

    $nomeImagen = $img['name'];
    $tempName = $img['tmp_name'];
    $direccion = "img";
    $endImagem = $direccion."/".$nomeImagen;


    $produtos[] = ["nome" => $nome,
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
        echo cadastrarProduto($_POST["nome"],$_POST["categoria"],$_POST["descricao"],$_POST["quantidade"],$_POST['preco'],$_FILES['imagem'],);
    }


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
                    <?php foreach($produtos as $produto) {?>
                    <tr>
                        <td><?php echo $produto["nome"];?> </td>
                        <td><?php echo $produto["categoria"];?> </td>
                        <td><?php echo $produto["precio"];?> </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>

        <!-- Comienza el formulario         -->
            <div class="col-4 bg-light p-4">
                <h1>Cadastrar Produto</h1>
            <form action="sucesso.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    Nome:<input type="text" class="form-control" name="nome" placeholder="Nome do Produto" required/>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Categorías</label>
                        <?php if(isset($categorias) && $categorias != []) {?>
                    <select class="form-control" id="exampleFormControlSelect1" name="categoria" required>
                            <?php foreach ($categorias as $categoria) {?>
                                <option value="<?php $categoria?>"><?php echo $categoria?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição do Produto</label>
                    <textarea class="form-control areatexto"  name="descricao" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    Quantidade:<input type="text" class="form-control" name="quantidade" placeholder="Quantidade" required/>
                </div>
                <div class="form-group">
                    Preço:<input type="text" class="form-control" name="preco" placeholder="Preço do Produto" required/>
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
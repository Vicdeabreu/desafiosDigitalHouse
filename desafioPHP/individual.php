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
    $nomeImagen = $img['name'];
    $tempName = $img['tmp_name'];
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
    } 
}


    if ($_POST) {
        echo cadastrarProduto($_POST["nome"],$_POST["categoria"],$_POST["descricao"],$_POST["quantidade"],$_POST['preco'],$_FILES['imagem'],);
    }

$dadosProduto = json_decode(file_get_contents($nomeArquivo), true);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    } elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
    }else {
    echo "Voce deve passar um id!";
    exit;
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
</head>
<body>
    <main>
        <section class="container bg-light p-5">
             <a href="index.php"><button>&#8592 Voltar para lista de produtos</button></a>
                <div class="row">
                <?php if(isset($dadosProduto) && $dadosProduto !=[]) { ?>
                    <?php foreach($dadosProduto as $produto) { 
                        if ($_GET['id']== $produto['id']) { 
                        ?>
                    <div class="col-5 img-carrito"> 
                        <img src="<?php echo $produto['imagem']?>" alt="" width="95%"> 
                    </div>
                    <div class="col-7">
                    <h1><strong><?php echo $produto['nome']?></strong></h1>
                    <h2>Categoria</h2>
                    <p class="lead"><strong><?php echo $produto['categoria']?></strong></p>
                    <p><strong>Descricao do produto</strong></p>
                    <p class="lead"><?php echo $produto['descricao']?></p>
                    <div class="d-flex justify-content-between">
                        <p class="lead"><strong>Quantidade em estoque</strong></p>
                        <p class="lead"><?php echo $produto['quantidade'] ?></p>
                        <p><strong>Preco do produto. R$:</strong></p>
                        <div class="pr-5"> 
                        <p class="lead"><?php echo $produto['preco']?></p>   
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">Editar</button>
                        <button class="btn btn-danger" type="button">Excluir</button>
                    </div>  
                </div>s
                <?php  } ?>
                    <?php } ?>
                    </div>
                <?php } ?>
        </section>
        <br>
    </main>
</body>
</html>
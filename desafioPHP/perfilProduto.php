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
  <section class="container bg-light p-5">
    <a href="desafioPHP.php"><button>&#8592 Voltar para lista de produtos</button></a>
      <div class="row">
      <?php if(isset($dadosProduto) && $dadosProduto !=[]) { ?>
          <?php foreach($dadosProduto as $produto) { ?>
            <h1>E aí Vini. Aquí tem o seu produto :D!!! </h1>
            <br>
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
                <p class="lead">Quantidade em estoque</p>
                <p>Preco do produto. R$:</p>
                <div class="pr-5"> 
                <p class="lead"><?php echo $produto['preco']?></p>   
                </div>
            </div>
      </div>
          <?php } ?>
          </div>
      <?php } ?>
  </section>
</body>
</html>
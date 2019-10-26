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
        if (move_uploaded_file($tmpLocal, $caminhoCompleto)) {
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
</head>
<body>
    <main>
        <section class="container bg-light p-5">
            <button href="desafio.php">&#8592 Voltar para lista de produtos</button>
                <div class="row">
                <?php for($i=0; $i < count($dadosProduto); $i++) { 
                    if($i == count($dadosProduto) - 1) { 
                    <div class="col-5">echo ".$dadosProduto[$i]['imagem']."; 
                    </div>
                    <div class="col-7">
                    <h1>".$dadosProduto[$i]['nome']"</h1>
                    <p class="lead">".$dadosProduto[$i]['categoria']"</p>
                    <p>Camiseta</p>
                    <p class="lead">".$dadosProduto[$i]['descricao']"</p>
                    <p>Camiseta</p>
                    <div class="d-flex justify-content-between">
                        <div>
                        <p class="lead">Quantidade em estoque</p>
                        <p>Camiseta</p>
                        </div>
                        <div class="pr-5"> 
                        <p class="lead">".$dadosProduto[$i]['preco]</p>
                        <p>Camiseta</p>    
                        </div>
                    </div>
                </div>
        </section>
            }
        } ?>
    </main>
</body>
</html>
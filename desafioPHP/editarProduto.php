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
    echo cadastrarProduto($_POST['nome'],$_POST['categoria'],$_POST['descricao'],$_POST['quantidade'],$_POST['preco'],$endImagem);
}


//* Transformando produto cadastrado em array *//
$produtoCadastrado = json_decode(file_get_contents($nomeArquivo), true);

if(isset($_GET['id'])){
  $id = $_GET['id'];
  } elseif (isset($_POST['id'])) {
  $id = $_POST['id'];
  }else {
  echo "Voce deve passar um id do produto para poder editar-lo!";
  exit;
  }

//   if($_POST != []) {
//     $id = $_POST['id'];
//     $nomeED = $_POST['nome'];
//     $categoriaED = $_POST['categoria'];
//     $descricaoED = $_POST['descricao'];
//     $quantidadeED = $_POST['quantidade'];
//     $precoED = $_POST['preco'];
//     $imgED = $endImagem;

//    $produtoEditado[] = ["id"=$id,
//                         "nomeEditado" = $nomeED,
//                         "categoriaEditada" = $categoriaED,
//                         "descricaoEditada" = $descricaoED,
//                         "quantidadeEditada" = $quantidadeED,
//                         "precoEditado" = $precoED,
//                         "imagemEditada" = $imgED,
//                          ]
//    $json = json_encode($produtoEditado);
//    $edicaoCerta = file_put_contents($nomeArquivo, $json);

//     $produtoEditado = array_splice($produtoCadastrado, 'nome', 1, array("nomeEditado", "categoriaEditada", "descricaoEditada", "quantidadeEditada", "precoEditado"))
//     $json = json_encode($produtoEditado);
//     $edicaoCerta = file_get_contents($nomeArquivo, $json); 
// }   

// Varios intentos por modificar os items do json, convertindo eles em array, modifica-los e depois convertirlos de novo em json, mas imposível. Gostaría de aprender cómo é que se faz.
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar Producto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="container">
  <div class="row"> 
    <div class="col-8 bg-light p-4">
            <h1>Editar Produto</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                Nome:<input type="text" class="form-control" name="nomeEditado" placeholder="Nome do Produto" required/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Categorías</label>
                    <?php if(isset($categorias) && $categorias != []) {?>
                <select class="form-control" id="exampleFormControlSelect1" name="categoriaEditada" required>
                        <?php foreach ($categorias as $categoria) {?>
                            <option value="<?php echo $categoria?>"><?php echo $categoria?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição do Produto</label>
                <textarea class="form-control areatexto"  name="descricaoEditada" rows="3" required></textarea>
            </div>
            <div class="form-group">
                Quantidade:<input type="number" class="form-control" name="quantidadeEditada" placeholder="Quantidade" required/>
            </div>
            <div class="form-group">
                Preço:<input type="number" step="0.01" class="form-control" name="precoEditado" placeholder="Preço do Produto" required/>
            </div>
            <div class="form-group">
                Foto do produto:<br><input type="file" name="imagemEditada" placeholder="Carregar Foto" required/>
            </div>
            <div class="text-right">
                <button class="btn btn-primary" type="submit">Salvar Alterações</button>
            </div>               
        </div>
    </form>
  </div>
</section>  
</body>
</html>
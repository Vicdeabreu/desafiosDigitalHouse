<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="views/css/styles.css">
</head>
<body>
  <main class="container">
    <div class="row mt-5 justify-content-center">
      <div class="col-5">
        <img src="views/img/instagram-cel.jpg" alt="fake-instagram-victor" width="100%">
      </div>
      <div class="col-5">
        <img src="views/img/fakegram.jpg" width="100%" alt="fakegram-logo">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nomeusuario">Nome do Usuario</label>
              <input type="text" class="form-control" id="nomeusuario" name="username" placeholder="Ensira o nome do seu usuario">
          </div>
          <div class="form-group">
            <label for="">Senha</label>
            <input type="text" class="form-control" id="senha" name="senha" placeholder="Ensira sua senha">
          </div>
          <div class="d-flex justify-content-center">
            <button class="btn btn-primary">Iniciar Sessão</button>
          </div>
          <h4></h4>
          <p>Você não tem conta? <a href="formulario">Cadastre-se</p></a>
          <div class="d-flex justify-content-center mt-3">
            <p>Ainda não tem <strong>Fakegram</strong> no seu celular?</p>
          </div>
          <div class="d-flex justify-content-center mt-2">
            <p><strong>Descarrege o aplicativo</strong></p>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
</html>
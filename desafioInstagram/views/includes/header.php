<?php

    $usuario = isset($_SESSION["nomeUsuario"]) ? $_SESSION : [];

?>


<header>
    <nav class="navbar topo-instagran justify-content-center">
        <div class="col-lg-4 row">
        <?php  if(isset($usuario) && $usuario != []) { ?>
        <img style="border: 2px solid red;border-radius:25px" src="views<?php echo $usuario['img'] ?>" width="30" height="30" alt="<?php echo $usuario['nome'] ?>">
        <p class="d.flex ml-2"><strong><?php echo $usuario['nomeUsuario'] ?></strong></p>
        </div>
        <div class="col-lg-8 d-flex justify-content-between">
        <a class="navbar-brand ml-50" href="#"><img width="90" src="views/img/logo.png" alt="" srcset=""><img width="90" src="views/img/fakegram.jpg" alt="" srcset=""></a>
        <a href="logout"><button class="btn btn-primary">Logout</button></a>
        <?php } else {?>
            <a class="navbar-brand ml-50" href="#"><img width="90" src="views/img/logo.png" alt="" srcset="">Instagram</a>
        <?php } ?>
        </div>
    </nav>
</header>

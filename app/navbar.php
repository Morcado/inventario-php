<?php 
    if (isset($_POST['search'])) {
        $_SESSION['search'] = $_POST['search'];
        header("Location: search_results.php");
    }
 ?>
        <nav class=" navbar navbar-expand-lg navbar-expand-md navbar-dark fixed-top color-tema ">
            <!-- Logotipo -->
            <img src="images/crane100x100.png" height="50px">
            <button class="navbar-toggler mr-auto ml-3" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon outline"></span>
            </button>

            <h5 class="text-light">Origami</h5>

            <div class="ml-5 text-white">
                <h4 id="pageTitle"></h4>
            </div>


            <div class="collapse navbar-collapse justify-content-end " id="navbarNavAltMarkup">

                <?php if (isset($_SESSION['username'])){ ?>
                <!-- Barra de búsqueda -->
                <div class="row">
                    <form method="POST" action="" class="form-inline my-2 my-lg-0 ">
                        <div class="col-8">
                            <input class="form-control mr-sm-2 rounded-0" type="text" id="search" name="search" placeholder="Buscar" aria-label="Search">
                        </div>
                        <div class="col">
                            <button class="btn btn-success my-2 my-sm-0" id="btnSearch" type="submit" disabled="">Buscar</button>
                        </div>
                    </form>
                </div>
                <!-- Botones generales -->
                <div class="row">
                    <div class="col">
                            
                        <a class="nav-link text-light" href=""><?=$_SESSION['username']?></a>
                        <!-- <i class="fas fa-user text-light m-2"></i> -->
                        
                    </div>
                    <div class="col">
                        <a class="nav-link text-light" href="close.php">Salir</a>
                    </div>
                </div>
                <?php } else { ?>
                <div class="row">
                    <div class="col">
                        <a class="nav-link text-light" href="index.php">Iniciar sesión</a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- Imagen y login -->

        </nav>

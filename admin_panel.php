<?php
    require ("db_connect.php");
    require ("head.php");
    require ("header.php");
?>
    <section class="main container-fluid p-1 mt-1">
        <div class="row">
            <div class="col-md-6 text-center">
                <h1>Co chcesz zmienić?</h1>

                <ul class="list-unstyled">
                    <li class="h3"><a href="product_add.php">Dodać produkt</a></li>
                    <li class="h3"><a href="product_delete.php">Usunąć produkt</a></li>
                    <li class="h3"><a href="product_edit.php">Edytować produkt</a></li>
                    <li class="h3"><a href="promotion_edit.php">Zmienić produkt dnia</a></li>
                    <li class="h3"><a href="recommended_add.php">Dodać produkt do polecanych</a></li>
                    <li class="h3"><a href="recommended_del.php">Usunąć produkt z polecanych</a></li>
                </ul>
            </div>
           
            <div class="col-md-6 text-center">
            <?php
            if (isset($_SESSION['add_prod_success']) && $_SESSION['add_prod_success']==1){
                    echo <<<show
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt został pomyślnie dodany</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['add_prod_success']=0;
            }

            if (isset($_SESSION['add_prod_success']) && $_SESSION['add_prod_success']==-1){
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt nie został pomyślnie dodany</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['add_prod_success']=0;
            }

            if (isset($_SESSION['prod_del_success']) && $_SESSION['prod_del_success']==1){
                    echo <<<show
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt został pomyślnie usunięty</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['prod_del_success']=0;
            }

            if (isset($_SESSION['prod_del_success']) && $_SESSION['prod_del_success']==-1){
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt nie został pomyślnie usunięty</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['prod_del_success']=0;
            }

            if (isset($_SESSION['edit_prod_success']) && $_SESSION['edit_prod_success']==1){
                    echo <<<show
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt został pomyślnie edytowany</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['edit_prod_success']=0;
            }

            if (isset($_SESSION['edit_prod_success']) && $_SESSION['edit_prod_success']==-1){
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt nie został pomyślnie edytowany</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['edit_prod_success']=0;
            }

            if (isset($_SESSION['prom_mod_success']) && $_SESSION['prom_mod_success']==1){
                    echo <<<show
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt dnia został pomyślnie edytowany</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['prom_mod_success']=0;
            }

            if (isset($_SESSION['prom_mod_success']) && $_SESSION['prom_mod_success']==-1){
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt nie dnia został pomyślnie edytowany</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['prom_mod_success']=0;
            }

            if (isset($_SESSION['recommend_add_success']) && $_SESSION['recommend_add_success']==1){
                    echo <<<show
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt został pomyślnie dodany do polecanych</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['recommend_add_success']=0;
            }

            if (isset($_SESSION['recommend_add_success']) && $_SESSION['recommend_add_success']==-1){
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt nie został pomyślnie dodany do polecanych</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['recommend_add_success']=0;
            }

            if (isset($_SESSION['recommend_del_success']) && $_SESSION['recommend_del_success']==1){
                    echo <<<show
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt został pomyślnie usunięty z polecanych</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['recommend_del_success']=0;
            }

            if (isset($_SESSION['recommend_del_success']) && $_SESSION['recommend_del_success']==-1){
                    echo <<<show
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <p>Produkt nie został pomyślnie usunięty z polecanych</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    show;

                    $_SESSION['recommend_del_success']=0;
            }
            
            ?>
            </div>
        </div>
    </section>
<?php
    require ("footer.php");
?>
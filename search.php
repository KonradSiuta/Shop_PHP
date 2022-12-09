<?php
    require ("db_connect.php");

    if(isset($_GET['search'])){
        $fraza=mysqli_real_escape_string($connection, $_GET['search']);
            $search_zap=mysqli_query($connection,"SELECT * FROM produkty WHERE nazwa LIKE '%$fraza%' OR producent LIKE '%$fraza%'");
            $prod_zap=mysqli_query($connection,"SELECT DISTINCT producent FROM produkty WHERE nazwa LIKE '%$fraza%' OR producent LIKE '%$fraza%'");
        } else if (isset ($_GET['kat'])) {
            $search_zap=mysqli_query($connection,"SELECT * FROM produkty WHERE id_kategorii=".$_GET['kat']);
            $prod_zap=mysqli_query($connection,"SELECT DISTINCT producent FROM produkty WHERE id_kategorii=".$_GET['kat']);
        } else {
            $fraza=null;
            $search_zap=mysqli_query($connection,"SELECT * FROM produkty");
            $prod_zap=mysqli_query($connection,"SELECT DISTINCT producent FROM produkty");
        }

    require ("head.php");
    require ("header.php");
    require ("navbar.php");

?>

<section class="main container-fluid p-1 mt-1">
    <div class="row p-1 m-1">
        <div class="col-12 text-center d-flex flex-column p-1">
            <div id="search_area" class="p-2">
                <h3>Wyszukiwanie</h3>
                <form  action="search.php" method="get">
                    <label for="search_expression"></label>
                    <input id="search_expression" class="form-control" type="text" name="search" value placeholder="Napisz, czego szukasz">
                    <input id="search_btn" class="btn mt-2" type="submit" value="Szukaj">
                </form>
            </div>

            <div class="row">
            <?php
              while ($cos=mysqli_fetch_array($search_zap)) {
                $search_nr_kat=$cos['nr_katalogowy'];
                $search_producent=$cos['producent'];
                $search_nazwa=$cos['nazwa'];
                $search_cena=$cos['cena'];
                $search_zdj=$cos['zdjecie'];
                        
                echo <<<show
                  <div class="polecane_prod col-sm-12 col-md-6 col-lg-4 border-top border-bottom my-1 py-1">
                    <a href="product.php?it=$search_nr_kat">
                    <img class="polecane_zdj mt-1" src="$search_zdj" alt="$search_zdj">
                      <div>
                        <h5>$search_producent $search_nazwa</h5>
                        <p>$search_cena zł</p>
                      </div>
                    </a>

                    <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="nr_kat" value="$search_nr_kat">
                    <button type="submit" class="btn btn-success"><i class="bi bi-cart-fill"></i>Dodaj do koszyka</button>
                </form>
                  </div>
                show; 
                }
            ?>
            </div>
        </div>
    </div>
</section>

<?php
require ("footer.php");
?>
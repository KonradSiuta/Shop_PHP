<?php
    require("db_connect.php");
    require("head.php");
    require("header.php");

    $produkty_zap=mysqli_query($connection,'SELECT * FROM produkty');
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
                <h1>Usuwanie produktu</h1>

                <form action="prod_del_exec.php" method="post">
                    <label class="form-label">Wybierz produkt</label>
                    <select class="form-select" id="prod_name" name="prod_nr_kat">
                    <?php
                    while($opcja=mysqli_fetch_array($produkty_zap)){
                        $nr_kat=$opcja['nr_katalogowy'];
                        $producent=$opcja['producent'];
                        $nazwa=$opcja['nazwa'];
                        echo "<option value=\"$nr_kat\">$nr_kat $producent $nazwa</option>";
                    }
                    ?>
                    </select>
    
                    <input type="reset" class="btn btn-warning mt-2" value="Wyczyść formularz">
                    <button class="btn btn-success mt-2" type="submit">Usuń produkt</button>
                </form>
            </div>
        </div>
    </section>
<?php
    require("footer.php");
?>
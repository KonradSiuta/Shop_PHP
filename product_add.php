<?php
    require("db_connect.php");
    require("head.php");
    require("header.php");

    $kategorie_zap=mysqli_query($connection,'SELECT * FROM kategorie');
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
                <h1>Dodawanie produktu</h1>

                <form action="product_add_exec.php" method="post">
                    <label class="form-label">Wybierz kategorię</label>
                    <select class="form-select" id="prod_kategoria" name="prod_kategoria">
                    <?php
                    while($opcja=mysqli_fetch_array($kategorie_zap)){
                        $kat_nazwa=$opcja['nazwa_kategorii'];
                        $kat_id=$opcja['id_kategorii'];
                        echo "<option value=\"$kat_id\">($kat_id) $kat_nazwa</option>";
                    }
                    ?>
                    </select>
                    <label for="prod_producent" class="form-label mt-1">Podaj producenta</label>
                    <input type="text" name="prod_producent" id="prod_producent" class="form-control" required>
                    <label for="prod_nazwa" class="form-label mt-1">Podaj nazwę produktu</label>
                    <input type="text" name="prod_nazwa" id="prod_nazwa" class="form-control" required>
                    <label for="prod_opis" class="form-label mt-1">Dodaj opis produktu</label>
                    <textarea name="prod_opis" id="prod_opis" class="form-control" required></textarea>
                    <label for="prod_cena" class="form-label mt-1">Podaj cenę produktu</label>
                    <input type="text" name="prod_cena" id="prod_cena" class="form-control" required>
                    <label for="prod_zdj" class="form-label mt-1">Podaj ścieżkę do zdjęcia</label>
                    <input type="text" name="prod_zdj" id="prod_zdj" class="form-control" required>
                    <input type="reset" class="btn btn-warning mt-2" value="Wyczyść formularz">
                    <button class="btn btn-success mt-2" type="submit">Dodaj produkt</button>
                </form>
            </div>
        </div>
    </section>
<?php
    require("footer.php");
?>
<?php
    require("db_connect.php");
    require("head.php");
    require("header.php");

    $kategorie_zap=mysqli_query($connection,'SELECT * FROM kategorie');
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
                <h1>Edycja produktu</h1>

                <form action="prod_edit_exec.php" method="post">
                    <label class="form-label">Wybierz produkt</label>
                        <select class="form-select" id="prod_name" name="prod_prod">
                        <?php
                            while($opcja=mysqli_fetch_array($produkty_zap)){
                            $nr_kat=$opcja['nr_katalogowy'];
                            $producent=$opcja['producent'];
                            $nazwa=$opcja['nazwa'];
                            echo "<option value=\"$nr_kat\">$nr_kat $producent $nazwa</option>";
                        }
                        ?>
                    </select>

                    <label for="prod_kategoria" class="form-label">Wybierz nową kategorię</label>
                    <select class="form-select" id="prod_kategoria" name="prod_kategoria">
                        <option value="0">Nie zmieniaj</option>
                        <?php
                            while($opcja=mysqli_fetch_array($kategorie_zap)){
                                $kat_nazwa=$opcja['nazwa_kategorii'];
                                $kat_id=$opcja['id_kategorii'];
                                echo "<option value=\"$kat_id\">($kat_id) $kat_nazwa</option>";
                        }
                        ?>
                    </select>
                    <label for="prod_producent" class="form-label mt-1">Podaj nowego producenta</label>
                    <input type="text" name="prod_producent" id="prod_producent" class="form-control" required>
                    <label for="prod_nazwa" class="form-label mt-1">Podaj nową nazwę produktu</label>
                    <input type="text" name="prod_nazwa" id="prod_nazwa" class="form-control" required>
                    <label for="prod_opis" class="form-label mt-1">Dodaj nowy opis produktu</label>
                    <textarea name="prod_opis" id="prod_opis" class="form-control" required></textarea>
                    <label for="prod_cena" class="form-label mt-1">Podaj nową cenę produktu</label>
                    <input type="text" name="prod_cena" id="prod_cena" class="form-control" required>
                    <label for="prod_zdj" class="form-label mt-1">Podaj nową ścieżkę do zdjęcia</label>
                    <input type="text" name="prod_zdj" id="prod_zdj" class="form-control" required>
                    <input type="reset" class="btn btn-warning mt-2" value="Wyczyść formularz">
                    <button class="btn btn-success mt-2" type="submit">Edytuj produkt</button>
                </form>
            </div>
        </div>
    </section>
<?php
    require("footer.php");
?>
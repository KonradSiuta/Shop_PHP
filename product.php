<?php
    require ("db_connect.php");

    $ref_nr_kat=$_GET['it'];

    $prod_zap=mysqli_query($connection,"SELECT * FROM produkty where nr_katalogowy='$ref_nr_kat'");
    
    while ($wiersz=mysqli_fetch_array($prod_zap)) {
        $prod_producent=$wiersz['producent'];
        $prod_nazwa=$wiersz['nazwa'];
        $opis=$wiersz['opis'];
        $zdj=$wiersz['zdjecie'];
        $cena=$wiersz['cena'];
    }

    $prom_porownanie=mysqli_query($connection,'SELECT * FROM promocja');

    while($oof=mysqli_fetch_array($prom_porownanie)) {
        $porowanie_nr_kat=$oof['nr_katalogowy'];
        $porownanie_cena=$oof['nowa_cena'];
    }

    if($ref_nr_kat==$porowanie_nr_kat) {
        $cena=$porownanie_cena;
    }

    $opinie_zap=mysqli_query($connection, "SELECT * FROM komentarze WHERE `prod_nr_katalogowy`='$ref_nr_kat'");
    $opinie_suma_zap=mysqli_query($connection, "SELECT SUM(ocena) suma FROM komentarze WHERE `prod_nr_katalogowy`='$ref_nr_kat'");
    $opinie_suma = 0;
    $opinie_liczba=mysqli_num_rows($opinie_zap);

    if ($opinie_liczba > 0) {
        while ($suma_wiersz=mysqli_fetch_array($opinie_suma_zap)) {
            $opinie_suma+=$suma_wiersz['suma'];
        }
    }

    require ("head.php");
    require ("header.php");
    require ("navbar.php");
?>
<section class="main container-fluid p-1 mt-1">
    <div class="row p-1 m-1">
        <div class="col-md-5 text-center d-flex flex-column p-1">
            <div id="search_area" class="p-2">
                <h3>Wyszukiwanie</h3>
                <form  action="search.php" method="get">
                    <label for="search_expression"></label>
                    <input id="search_expression" class="form-control" type="text" name="search" value placeholder="Napisz, czego szukasz">
                    <input id="search_btn" class="btn mt-2" type="submit" value="Szukaj">
                </form>
            </div>

        <div id="product_photo_area" class="d-block mt-1 py-1 p-auto">
            <img src="<?php echo ($zdj); ?>" alt="<?php echo ($prod_producent." ".$prod_nazwa); ?>" class="w-75">
        </div>
            
        </div>
        
        <div id="description-area" class="col-md-7 text-center p-1">
            <?php
                echo <<<show
                <h1>$prod_producent $prod_nazwa</h1>
                <h2>Cena: $cena zł</h2>
                <p>$opis</p>

                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="nr_kat" value="$ref_nr_kat">
                    <button type="submit" class="btn btn-success"><i class="bi bi-cart-fill me-1"></i>Dodaj do koszyka</button>
                </form>
                show;
            ?>
        </div>
    </div>
</section>

<section class="comment_area container-fluid p-1 mt-1">
    <div class="container-fluid p-1 add_comment_area">
    <h1>Opinie</h1>
    <h3>Dodaj swoją opinię o tym produkcie</h3>

    <form action="comment_add.php" method="post">
        <label for="comment_rate">Wybierz ocenę (skala 1-6)</label>
        <input type="number" name="comment_rate" id="comment_rate" min="1" max="6" value="1" class="d-block">
        <label for="comment_text">Napisz, co sądzisz o tym produkcie</label>
        <textarea name="comment_text" id="comment_text" class="d-block container-fluid"></textarea>
        <input type="hidden" name="comment_user" value="<?php
            if (isset ($_SESSION['login'])) {
               echo ($_SESSION['login']);
            } else
                echo ("Użytkownik niezalogowany");
        ?>">
        <input type="hidden" name="prod_id" value="<?php echo $ref_nr_kat ?>">
        <input type="reset" value="Wyczyść" class="btn btn-warning mt-1">
        <button type="submit" class="btn btn-success">Dodaj</button>
    </form>
    </div>
    <hr>

    <h3>Opinie użytkowników</h3>
        <?php
        if($opinie_liczba > 0) {
            $ocena_srednia=$opinie_suma / $opinie_liczba;
            echo ("<h3>Średnia ocen: ".round($ocena_srednia, 1)."/6</h3>");
            while ($opinie_wiersz=mysqli_fetch_array($opinie_zap)) {
                $opinie_user=$opinie_wiersz['user'];
                $opinie_ocena=$opinie_wiersz['ocena'];
                $opinie_tresc=$opinie_wiersz['tresc'];
                echo <<<show
                    <div class="container-fluid single_comment_area p-1 mt-1">
                            <h5>Użytkownik: $opinie_user</h5>
                            <h5>Ocena użytkownika: $opinie_ocena</h5>
                            <p>$opinie_tresc</p>
                    </div>
                show;
            }
        } else 
            echo ("<h3>Ten produkt nie ma jeszcze opinii</h3>");
        ?>

</section>

<?php
    require ("footer.php");
?>
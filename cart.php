<?php
    require ("db_connect.php");

    require ("head.php");
    require ("header.php");
    require ("navbar.php");
?>
<section class="main container-fluid p-1 mt-1">
    <h3 class="text-center">Twój koszyk</h3>

    <?php
        if (!isset($_SESSION['koszyk'])) {
            echo ("<p class=\"h4\">Twój koszyk jest pusty</p>");
        }
    ?>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nazwa produktu</th>
                <th scope="col">Cena</th>
            </tr>
        </thead>

        <?php
        $suma=0;
            if (isset($_SESSION['koszyk'])) { 
                foreach ($_SESSION['koszyk'] as $el) {
                    // echo "SELECT * FROM produkty WHERE nr_katalogowy=".$el."<br>";
                    $el_zap= mysqli_query($connection, "SELECT * FROM produkty WHERE nr_katalogowy=\"$el\"");

                    while ($el_wys=mysqli_fetch_assoc($el_zap)) {
                        $el_zdj=$el_wys['zdjecie'];
                        $el_nazwa=$el_wys['producent']." ".$el_wys['nazwa'];
                        $el_cena=$el_wys['cena'];
                        echo <<<show
                                    <tr>
                                    <td class="px-a"><img class="koszyk_zdj" src="$el_zdj" alt="$el_nazwa"></td>
                                    <td>$el_nazwa</td>
                                    <td>$el_cena zł</td>
                                    </tr>
                        show;
                        $suma+=$el_cena;
                    }
                }
                echo '<tr>
                    <td colspan="2">Suma</td>
                    <td>'.$suma.' zł</td>
                    </tr>';
            }
        ?>
    </table>
        
    <form action="delete_from_cart.php">
    <input class="btn btn-success" type="submit" value="Wyczyść koszyk">
    </form>

</section>
<?php
    require ("footer.php");
?>

<?php
    require ("db_connect.php");

    $prom_zap= mysqli_query($connection,'SELECT * FROM produkty RIGHT JOIN promocja ON (produkty.nr_katalogowy = promocja.nr_katalogowy)');

    while ($wiersz=mysqli_fetch_array($prom_zap)) {
        $prom_nr_kat=$wiersz['nr_katalogowy'];
        $prom_nazw=$wiersz['producent']." ".$wiersz['nazwa'];
        $prom_stara_cena=$wiersz['cena'];
        $prom_zdj=$wiersz['zdjecie'];
    }
    $prom_nowa_cena_zap=mysqli_query($connection,'SELECT nowa_cena FROM promocja');

    while ($prom_cena=mysqli_fetch_array($prom_nowa_cena_zap)) {
        $prom_nowa_cena=$prom_cena['nowa_cena'];
    }

    $polecane_zap=mysqli_query($connection,'SELECT * FROM produkty RIGHT JOIN polecane ON (produkty.nr_katalogowy = polecane.nr_katalogowy)');

    require ("head.php");
    require ("header.php");
    require ("navbar.php");

?>

<div class="container-fluid px-0">
  <div id="carouselExampleCaptions" class="carousel slide mt-1" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="obrazy/carousel-1.jpg" class="d-block w-100" alt="Doświadczenie- prowadzimy nasz sklep od 6 lat">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-danger">Doświadczenie</h5>
          <p class="text-danger">Prowadzimy nasz sklep od 6 lat</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="obrazy/carousel-2.jpg" class="d-block w-100" alt="Profesjonalizm- nasi doradcy pomogą dobrać sprzęt zgodnie z wymaganiami">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-danger">Profesjonalizm</h5>
          <p class="text-danger">Nasi doradcy pomogą dobrać sprzęt zgodnie z wymaganiami</p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="obrazy/carousel-3.jpg" class="d-block w-100" alt="Renoma- współpracujemy z profesjonalnymi graczami">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-danger">Renoma</h5>
          <p class="text-danger">Współpracujemy z profesjonalnymi graczami</p>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Poprzedni</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Następny</span>
    </button>
  </div>
</div>

<section class="main container-fluid p-1 mt-1">
    <div class="row p-1 m-1">
        <div class="col-lg-4 text-center d-flex flex-column p-1">
            <div id="search_area" class="p-2">
                <h3>Wyszukiwanie</h3>
                <form  action="search.php" method="get">
                    <label for="search_expression"></label>
                    <input id="search_expression" class="form-control" type="text" name="search" value placeholder="Napisz, czego szukasz">
                    <input id="search_btn" class="btn mt-2" type="submit" value="Szukaj">
                </form>
            </div>

            <div id="promo_area" class="mt-2">
                <?php
                    echo <<<show
                        <a href="product.php?it=$prom_nr_kat">
                        <h1>Produkt dnia</h1>
                        <img id="prom_zdj" src="$prom_zdj" alt="$prom_nazw">
                        <h2>$prom_nazw</h2>
                        <h3>Nowa cena:  $prom_nowa_cena zł</h3>
                        <h4 class="text-decoration-line-through text-muted">Stara cena: $prom_stara_cena zł</h4>
                        </a>
                        show; 
                ?>
            </div>
        </div>

        <div id="recommend_area" class="container col-lg-8 col-md-12 text-center mt-1 mb-1">
            <h1>Polecane</h1>
            
            <div class="row">
            <?php
              while ($cos=mysqli_fetch_array($polecane_zap)) {
                $polcane_nr_kat=$cos['nr_katalogowy'];
                $polecane_nazwa=$cos['producent']." ".$cos['nazwa'];
                $polecane_cena=$cos['cena'];
                $polecane_zdj=$cos['zdjecie'];
                        
                echo <<<show
                  <div class="polecane_prod col-sm-12 col-md-6 col-lg-4 border-top border-bottom my-1">
                    <a href="product.php?it=$polcane_nr_kat">
                    <img class="polecane_zdj mt-1" src="$polecane_zdj" alt="$polecane_zdj">
                      <div>
                        <h5>$polecane_nazwa</h5>
                        <p>$polecane_cena zł</p>
                      </div>
                    </a>
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
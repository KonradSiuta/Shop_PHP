-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Cze 2021, 11:16
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorii` int(2) NOT NULL,
  `nazwa_kategorii` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorii`, `nazwa_kategorii`) VALUES
(1, 'Klawiatury'),
(2, 'Myszki'),
(3, 'Monitory'),
(4, 'Pady'),
(5, 'Podkładki'),
(6, 'Słuchawki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id` int(11) NOT NULL,
  `prod_nr_katalogowy` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `tresc` longtext COLLATE utf8_polish_ci NOT NULL,
  `ocena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`id`, `prod_nr_katalogowy`, `user`, `tresc`, `ocena`) VALUES
(1, '1/1', 'Użytkownik niezalogowany', 'nie najgorsze', 2),
(2, '2/5', 'bruh', 'srednie', 2),
(3, '2/5', 'bruh', 'dober', 5),
(4, '1/4', 'Użytkownik niezalogowany', 'moze byc', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polecane`
--

CREATE TABLE `polecane` (
  `id_polecane` int(3) NOT NULL,
  `nr_katalogowy` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `polecane`
--

INSERT INTO `polecane` (`id_polecane`, `nr_katalogowy`) VALUES
(4, '1/4'),
(2, '2/5'),
(6, '2/7'),
(7, '3/11'),
(11, '3/9'),
(3, '4/16'),
(8, '5/17'),
(9, '6/21'),
(5, '6/23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(3) NOT NULL,
  `id_kategorii` int(3) NOT NULL,
  `nr_katalogowy` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `producent` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `opis` longtext COLLATE utf8_polish_ci NOT NULL,
  `cena` int(5) NOT NULL,
  `zdjecie` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `id_kategorii`, `nr_katalogowy`, `producent`, `nazwa`, `opis`, `cena`, `zdjecie`) VALUES
(1, 1, '1/1', 'Creative', 'BlasterX Vanguard', 'Klawiatura Sound BlasterX Vanguard K08 została zaprojektowana, abyś osiągnął najwyższy poziom rozgrywki. Wyposażona w specjalne szybko działające mechaniczne przełączniki OMRON, kompaktowa klawiatura z 109 konfigurowalnymi klawiszami. Ergonomiczna komfortowa konstrukcja, gładka matowa powierzchnia i w pełni programowalny system oświetlenia pozwolą na doskonałą rozrywkę z grami i nie tylko. Od teraz każda Twoja komenda zostanie wykonana w ciągu sekundy z zegarmistrzowską precyzją.', 450, 'obrazy/produkty/blasterx.png'),
(2, 1, '1/2', 'SPC Gear', 'GK530 Tournament', 'SPC Gear GK530 Tournament to mobilna wersja klawiatury Gamingowej SPC Gear. 87 przycisków, kompaktowy rozmiar metalowy top obudowy, punktowe podświetlenie RGB, przełączniki Kailh i programowalne makra czynią z niej doskonały wybór dla graczy domowych i turniejowych. Model GK530 Tournament Kailh Red RGB został wyposażony w czerwone przełączniki Kailh, które zostały stworzone przede wszsytkim dla graczy. Charakteryzują się najmniejszą siłą nacisku i szczególnie sprawdzą się wśród użytkowników grających w FPSy.', 200, 'obrazy/produkty/spcgk503.png'),
(3, 1, '1/3', 'Logitech', 'G213 Prodigy', 'Każdy klawisz klawiatury G213 zbudowaliśmy z myślą o tym, by naciskało się go jak najwygodniej i by działał nawet cztery razy szybciej niż w przypadku standardowych klawiatur. Wykrywanie wielu klawiszy zapewnia optymalną wydajności w grach, zapewniając pełną kontrolę podczas jednoczesnego wydawania wielu poleceń. Kontroluj odtwarzanie utworu w tle bez wstrzymywania pracy. Klawiatura G213 ma specjalne elementy do sterowania multimediami, które pozwalają na natychmiastowe odtwarzanie, wstrzymywanie i wyciszanie muzyki i filmów. Ustaw głośność lub przejdź do następnego utworu za naciśnięciem jednego przycisku.', 250, 'obrazy/produkty/g213.png'),
(4, 1, '1/4', 'MODECOM', 'Volcano Lanparty', 'Modecom Volcano Lanparty to propozycja zaawansowanej mechanicznej klawiatury przeznaczonej dla profesjonalnych graczy, szukających wysokiej jakości sprzętu, na którym będą mogli polegać w trakcie wielogodzinnych sesji w wirtualnym świecie gier komputerowych. W kompaktowej konstrukcji Modecom Volcano Lanparty został zastosowany cały szereg zaawansowanych funkcji, które przydadzą się podczas grania w wymagające taktycznych umiejętności gry', 150, 'obrazy/produkty/volcano.png'),
(5, 2, '2/5', 'Steelseries', 'Rival 110', 'Poznaj nową, usprawnioną mysz dla graczy, jaką jest SteelSeries Rival 110. To gamingowe urządzenie zostało wyposażone w precyzyjny sensor optyczny TrueMove1, który zapewnia śledzenie 1:1. Ponadto wytrzymałe przełączniki zapewnią żywotność rzędu 30 milionów kliknięć, a to oznacza, że Rival 110 nie zawiedzie Cię podczas zaciętej rozgrywki. Mysz została wyposażona w sensor optyczny TrueMove1 o rozdzielczości 7200 DPI, który został opracowany wspólnie z liderem branży PixArt. Czujnik gwarantuje prawdziwe śledzenie 1:1 - czyli odległość, którą pokonasz na podkładce będzie dokładnie tak samo odwzorowana na ekranie komputera. Mało tego, możliwość regulacji rozdzielczości w zakresie od 200 do 7200 DPI umożliwia dostosowanie sensora do odpowiedniej rozgrywki.', 150, 'obrazy/produkty/rival110.png'),
(6, 2, '2/6', 'Razer', 'Deathadder Essential', 'Przez ponad dekadę seria Razer Deathadder była ostoją na światowej arenie e-sportowej. Deathadder to niezawodność, ergonomia i najwyższa jakość wykonania, dzięki którym rozgrywka nabiera nowego znaczenia. Poznaj najnowsze dzieło od Razer\'a - Deathadder Essential. Ten niewielki gryzoń zachwyci Cię klasyczną ergonomią, zaawansowaną wytrzymałością, a także perfekcyjnym śledzeniem ruchów. Odkryj nową jakość gamingu. Razer DeathAdder Essential wyposażona jest w nowej jakości czujnik optyczny, przystosowany do eSportu, posiadający niewiarygodnie dokładną rozdzielczość 6400 dpi oraz idealne śledzenie do 220 cali na sekundę (IPS), dzięki czemu daje Ci absolutną przewagę w rozgrywce.', 180, 'obrazy/produkty/deathadder.png'),
(7, 2, '2/7', 'Corsair', 'Harpoon', 'Mysz gamingowa Corsair Harpoon została zaprojektowana dla najbardziej wymagających graczy. Wyposażona w optyczny sensor o rozdzielczości 6000 DPI zapewnia zaawansowane i precyzyjne śledzenie. Corsair Harpoon ma możliwość zaprogramowania sześciu przycisków oraz posiada wbudowaną pamięć. Zaprogramuj przyciski wedle własnego uznania i wykorzystaj to w wirtualnej rozgrywce. Dopasuj rozdzielczość myszy w trakcie rozgrywki do odpowiednich warunków - skorzystaj z zakresu od 250 do 6000 DPI. Podświetlane logo RGB doda Ci pewności siebie - ustaw odpowiedni dla siebie kolor i podejmij wyzwanie.', 120, 'obrazy/produkty/harpoon.png'),
(8, 2, '2/8', 'Logitech', 'G502 Proteus Spectrum', 'Uzyskaj maksymalną precyzję śledzenia ruchów, którą zapewnia nasz najszybciej reagujący czujnik optyczny (PMW3366). Wyjątkowa technologia czujnika optycznego Logitech-G Delta Zero™ minimalizuje przyspieszenie myszy i zapewnia większą precyzję celowania. Tryby czułości można przełączać podczas gry, wybierając jedno z pięciu ustawień od 200 do 12 000 dpi. Dostosuj, aby uzyskać przewagę. Wraz z myszą Proteus Spectrum dostarczanych jest pięć ciężarków 3,6 g. Użyj niektórych lub wszystkich ciężarków w odpowiednich miejscach, aby odpowiednio zwiększyć lub zmniejszyć wagę. Tę mysz można dopasować do swoich preferencji.', 300, 'obrazy/produkty/g502.png'),
(9, 3, '3/9', 'Acer', 'Nitro VG240YBMIIX', 'Acer Nitro VG0 to nie tylko zwykły monitor. To zaawansowany wyświetlacz stworzony dla Ciebie - prawdziwego gracza. Poszerzaj swoje horyzonty i zobacz nowe oblicze rozgrywki. Przyjrzyj się dobrze Nitro VG0 z obudową w konstrukcji ZeroFrame wspartą na podstawie o odważnym kształcie. Odkryj radość, jaką daje możliwość płynnej gry dzięki funkcji Radeon™ FreeSync z technologią IPS. Zobacz więcej szczegółów z rozdzielczością Full HD. Niech rozgrywka Cię wciągnie.', 550, 'obrazy/produkty/acernitro.png'),
(10, 3, '3/10', 'LG', '24MP59G', 'Wejdź na nowy poziom profesjonalizmu z 24-calowym gamingowym monitorem LG IPS 24MP59G. Dzięki zaawansowanej matrycy IPS, ten monitor zapewnia niesamowitą jakość obrazu w rozdzielczości Full HD, gwarantując czysty obraz i żywe, naturalne kolory niezależnie od kąta, pod którym patrzysz na ekran. Perfekcyjnie odwzorowane kolory, generowane przez matrycę LG IPS, pozwalają wprost zanurzyć się w oglądanym obrazie.', 600, 'obrazy/produkty/lg.png'),
(11, 3, '3/11', 'Samsung', 'C24FG73FQUX', 'Technologia Quantum Dot powoduje, że zakrzywiony monitor Samsung, przeznaczony specjalnie dla graczy, zapewnia wyświetlanie żywych kolorów obejmujących około 125% przestrzeni barw sRGB. Kolory mają teraz szerszą gamę, są bardziej nasycone i zdecydowane, lepiej niż kiedykolwiek odzwierciedlają rzeczywistość, co sprawia, że gra jest bardziej realistyczna. Dzięki połączeniu swojej zaawansowanej technologii redukcji rozmycia ruchu i matrycy VA, firma Samsung stworzyła ten zakrzywiony monitor z superszybkim czas reakcji 1 ms (MPRT). W ten sposób gracze mogą korzystać z monitora o niespotykanej wydajności - bez rozmyć i poruszeń na całej powierzchni.', 1000, 'obrazy/produkty/samsung.png'),
(12, 3, '3/12', 'Acer', 'KG241QPBIIP', 'Przyjrzyj się dobrze monitorowi o eleganckiej konstrukcji wspartej na podstawie o odważnym kształcie. Monitor Acer z serii KG1 to zaawansowany wyświetlacz stworzony dla Ciebie - prawdziwego gracza. Wyjdź poza horyzonty i zanurz się w pełni w grze. Odkryj radość, jaką daje możliwość płynnej gry dzięki funkcji Radeon™ FreeSync z szbykim czasem reakcji. Zobacz więcej szczegółów z rozdzielczością Full HD. Niech rozgrywka Cię wciągnie. Dzięki rozdzielczości natywnej Full HD Twój monitor Acer KG241QPBIIP jest gotowy wyświetlać obrazy z najdrobniejszymi szczegółami. Oznacza to również, że na ekranie zmieści się około 60% więcej informacji niż na monitorze z rozdzielczością HD.', 800, 'obrazy/produkty/acer.png'),
(13, 4, '4/13', 'Microsoft', 'Pad XBOX One Wireless Controller + ', 'Nowe spusty impulsowe zapewniają wibracje odczuwane na opuszkach palców, dzięki czemu można wyraźnie odczuć każdy wstrząs i uderzenie (w obsługiwanych grach). Zaprojektowane od nowa drążki i nowy pad kierunkowy zapewniają większą precyzję. Do tego cały kontroler wygodniej leży w dłoniach. Ponad 40 innowacji sprawia, że to po prostu najlepszy kontroler Xbox w historii.', 210, 'obrazy/produkty/mspad.png'),
(14, 4, '4/14', 'SpeedLink', 'XEOX Pro', 'Gamepad analogowy SpeedLink XEOX Pro to idealne połączenie komfortu użytkowania, wygody i niebywałej precyzji. XEOX Pro daje Ci znaczącą przewagę taktyczną dzięki ultra-precyzyjnym, umieszczonym z myślą o ergonomii lewym drążku. Jest on niezwykle pomocny w klasycznych grach. Najnowsze gry oraz te starsze nie będą stanowić problemu dla kontrolera SpeedLink XEOX Pro, ponieważ z łatwością przełączysz się pomiędzy trybami sterowania XInput oraz DirectInput.', 60, 'obrazy/produkty/xeox.png'),
(15, 4, '4/15', 'Sony', 'Playstation 4 DualShock 4', 'Wykorzystuj swoje ulubione sposoby interakcji z grami, a także zupełnie nowe możliwości. Bardziej precyzyjne drążki, wbudowane czujniki ruchu, zintegrowany głośnik i sterowanie dotykowe to zaledwie kilka przykładów możliwości, jakie oferuje kontroler bezprzewodowy DualShock 4 V2, aby Twoja gra była intuicyjna i pełna werwy.', 225, 'obrazy/produkty/ds4.png'),
(16, 4, '4/16', 'Razer', 'Raiju Ultimate PS4 2019', 'Razer Raiju Ultimate 2019 to bezprzewodowy kontroler PS4, który umożliwia zaawansowaną personalizację przy użyciu naszej aplikacji mobilnej. Pełne opcje sterowania masz na wyciągnięcie ręki — od zmiany przypisania przycisków wielofunkcyjnych po regulację czułości. Co więcej, możesz też wymieniać gałki i wybrać D-pad odchylany lub z indywidualnym układem przycisków. Na panelu szybkiej kontroli możesz na bieżąco włączać funkcje i aktywować tryb ultraczułego spustu do błyskawicznego strzelania. Do łączenia się służą 3 tryby: PS4, USB i PC bez potrzeby ręcznego ponownego parowania, co optymalizuje efektywność konfiguracji. Dostępny jest też tryb przewodowy.', 900, 'obrazy/produkty/raiju.png'),
(17, 5, '5/17', 'A4Tech', 'XGame X7-300MP', 'Specjalna podkładka pod mysz dedykowana dla graczy, chętnie korzystających z popularnych myszy z serii XGame. Bardzo duża, trwała podkładka wykonana z gumy i tkaniny. Poprawia komfort rozgrywki. Wymiary podkładki to: 437mm x 350mm x 3mm.', 20, 'obrazy/produkty/a4t.png'),
(18, 5, '5/18', 'Dream Machines', 'DM Pad XL', 'Przygotuj się na zupełnie nowe doznania podczas rozgrywki dzięki podkładce DM PAD. Powstawała przez wiele miesięcy pod okiem ekspertów od gamingu. Wszystko po to aby mieć pewność, że produkt, który otrzymacie to najlepsze co ma do zaoferowania rynek. Podkładka DM PAD to spełnienie marzeń każdego gracza, szybka ale jednocześnie pozwalająca na pełną kontrolę. Daj się ponieść rozgrywce na jeszcze większym poziomie dzięki DM PAD.', 50, 'obrazy/produkty/dmpad.png'),
(19, 5, '5/19', 'SteelSeries', 'QcK+', 'QcK+ posiada antypoślizgową, gumową podstawę, która zapobiega przemieszczaniu się podkładki podczas użycia. Gumowa podstawa zapewnia także przez cały czas dodatkowy komfort dla Twojej dłoni i nadgarstka. Seria SteelSeries QcK+ przeszła intensywne testy przeprowadzone przez profesjonalnych graczy, potwierdzające, że seria QcK+ zapewnia użytkownikom niezawodne podkładki dla optymalnego funkcjonowania.', 30, 'obrazy/produkty/qck+.png'),
(20, 5, '5/20', 'SteelSeries', 'QcK Heavy', 'QcK+ to podkładka pod mysz stworzona dla wymagających graczy, która charakteryzuje się niebanalnym wyglądem z nadrukowanym logo producenta. Podkładka posiada antypoślizgową, gumową podstawę, która zapobiega przemieszczaniu się podkładki podczas użycia. Gumowa podstawa zapewnia także przez cały czas dodatkowy komfort dla Twojej dłoni i nadgarstka. Seria SteelSeries QcK+ przeszła intensywne testy przeprowadzone przez profesjonalnych graczy, potwierdzające, że seria QcK+ zapewnia użytkownikom niezawodne podkładki dla optymalnego funkcjonowania.', 120, 'obrazy/produkty/qckheavy.png'),
(21, 6, '6/21', 'SteelSeries', 'Arctis 3 ', 'Firma SteelSeries poszukiwała odpowiednich materiałów, aby stworzyć słuchawki, które byłyby nie tylko świetne pod względem wydajności, ale również komfortowe. Ze słuchawkami Arctis 3 ta sztuka się udała. Inspiracją do stworzenia poduszek wewnątrz nauszników były stroje sportowe. Stworzone przez firmę SteelSeries poduszki o nazwie AirWeave są niezwykle miękkie i przyjemne w dotyku. Pamiętająca kształt pianka została umieszczona wewnątrz oddychającego, pochłaniającego wilgoć materiału. Materiał ten został dodatkowo pokryty termoplastyczną powłoką zapewniającą skuteczną izolację szumów. Sprawdź, jak słuchawki SteelSeries Arctis 3 wyglądają w rzeczywistości. Chwyć zdjęcie poniżej i przeciągnij je w lewo lub prawo, aby obrócić produkt, lub skorzystaj z przycisków nawigacyjnych.', 250, 'obrazy/produkty/arctis3.png'),
(22, 6, '6/22', 'HyperX', 'Cloud II', 'Zestaw słuchawkowy HyperX Cloud II wyposażono w zaprojektowany od nowa moduł sterowania audio z kartą dźwiękową USB, która wzmacnia dźwięki i głos gracza, zapewniając najwyższą jakość audio Hi-Fi podczas gry – usłyszysz to, czego nie słyszałeś do tej pory. Eksploruj świat pełen detali, niedostępny innym graczom – usłysz szuranie buta biwakowicza, syk pary w znajdującym się gdzieś w oddali zaworze... Niezależne sterowanie dźwiękiem i mikrofonem pozwala regulować głośność dźwięku i głosu rejestrowanego przez mikrofon oraz w łatwo włączać i wyłączać dźwięk 7.1 Surround lub pochodzący z mikrofonu. Ten nowoczesny zestaw słuchawkowy generuje dźwięk w standardzie 7.1 Virtual Surround, pozwalając uzyskać niespotykaną przestrzenność i głębię dźwięku, dzięki czemu gry, filmy i muzyka dostarczają zupełnie nowych doświadczeń. Sprawdź, jak HyperX Cloud II wygląda w rzeczywistości. Chwyć zdjęcie poniżej i przeciągnij je w lewo lub prawo, aby obrócić produkt, lub skorzystaj z przycisków nawigacyjnych.', 320, 'obrazy/produkty/hxc2.png'),
(23, 6, '6/23', 'Corsair', 'HS60 Stereo', 'Słuchawki Corsair HS60 Stereo Gaming Headset zapewnią Ci komfort, wytrzymałość oraz jakość dźwięku, których potrzebujesz w czasie długich godzin spędzonych z ulubioną grą. Krystalicznie czysty i dokładny dźwięk zagwarantują przetworniki neodymowe o średnicy 50 mm. Wbudowany mikrofon wielokierunkowy pozwoli na bezproblemową komunikację z członkami Twojej drużyny.', 230, 'obrazy/produkty/hs60.png'),
(24, 6, '6/24', 'Creative', 'Sound BlasterX H3', 'Usłysz dźwięk jakiego oczekujesz w grach. Zestaw słuchawkowy Sound BlasterX H3 jest wyposażony w duże i efektywne przetworniki FullSpectrum o średnicy 40 mm i pełnym paśmie przenoszenia dzięki którym jakość dźwięku jest zdumiewająca. Parametry o wielkości 118 dB/mW sprawiają, że poziom dźwięku zestawu słuchawkowego Sound BlasterX H3 należy do najgłośniejszych w tej klasie urządzeń. Doświadcz drżenia zwalających na kolana wybuchów oraz grzechotania karabinów maszynowych jak nigdy wcześniej. Zestaw słuchawkowy Sound BlasterX H3 od początku eksploatacji charakteryzuje się ciepłym dźwiękiem. Bogate niskie tony dodatkowo uatrakcyjniają rozgrywkę. Dodatkowe możliwości dostosowania dźwięku dostępne są w oprogramowaniu Sound BlasterX Acoustic Engine Lite.', 150, 'obrazy/produkty/ch3.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `promocja`
--

CREATE TABLE `promocja` (
  `id_promocji` int(3) NOT NULL,
  `nr_katalogowy` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `nowa_cena` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `promocja`
--

INSERT INTO `promocja` (`id_promocji`, `nr_katalogowy`, `nowa_cena`) VALUES
(1, '1/1', 420);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `typ` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `haslo`, `typ`) VALUES
(1, 'admin', 'admin123', 'admin'),
(2, 'bruh', '123', 'klient'),
(3, 'em', '1234', 'klient'),
(5, 'romek', '4321', 'klient'),
(6, 'tomek', '321', 'klient');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorii`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `polecane`
--
ALTER TABLE `polecane`
  ADD PRIMARY KEY (`id_polecane`),
  ADD KEY `nr_katalogowy` (`nr_katalogowy`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`),
  ADD KEY `id_kategorii` (`id_kategorii`),
  ADD KEY `nr_katalogowy` (`nr_katalogowy`);

--
-- Indeksy dla tabeli `promocja`
--
ALTER TABLE `promocja`
  ADD PRIMARY KEY (`id_promocji`),
  ADD KEY `nr_katalogowy` (`nr_katalogowy`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorii` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `polecane`
--
ALTER TABLE `polecane`
  MODIFY `id_polecane` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `promocja`
--
ALTER TABLE `promocja`
  MODIFY `id_promocji` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `polecane`
--
ALTER TABLE `polecane`
  ADD CONSTRAINT `polecane_ibfk_1` FOREIGN KEY (`nr_katalogowy`) REFERENCES `produkty` (`nr_katalogowy`);

--
-- Ograniczenia dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `produkty_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie` (`id_kategorii`);

--
-- Ograniczenia dla tabeli `promocja`
--
ALTER TABLE `promocja`
  ADD CONSTRAINT `promocja_ibfk_1` FOREIGN KEY (`nr_katalogowy`) REFERENCES `produkty` (`nr_katalogowy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

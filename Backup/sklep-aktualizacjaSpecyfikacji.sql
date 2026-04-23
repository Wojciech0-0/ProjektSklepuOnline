-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2026 at 09:58 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE `administratorzy` (
  `id_admina` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `haslo` varchar(35) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(11) NOT NULL,
  `nazwa` varchar(99) NOT NULL,
  `cena` float NOT NULL,
  `kategoria` varchar(35) NOT NULL,
  `specyfikacja` varchar(600) NOT NULL,
  `opis` varchar(600) NOT NULL,
  `status` int(11) NOT NULL,
  `zdjecie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa`, `cena`, `kategoria`, `specyfikacja`, `opis`, `status`, `zdjecie`) VALUES
(1, 'Karton klapowy Standard A4', 1.85, 'opakowania', '<b>Wymiary wewnętrzne:</b> 310 x 220 x 100 mm <br>\r\n<b>Typ tektury:</b> 3-warstwowa, fala B <br>\r\n<b>Gramatura:</b> 350 g/m^2 <br>\r\n<b>Maksymalna nośność:</b> do 5 kg <br>\r\n<b>Kolor:</b> Brązowy (naturalny) <br>', 'Wytrzymały karton klapowy zaprojektowany specjalnie pod format A4. Idealnie sprawdza się w logistyce biurowej oraz e-commerce do wysyłki dokumentów, książek czy płaskiej elektroniki. Dzięki zastosowaniu wysokiej jakości tektury o fali B, produkt zapewnia optymalną ochronę przed zgnieceniem i uszkodzeniami mechanicznymi podczas transportu. Konstrukcja typu FEFCO 201 pozwala na szybkie i łatwe składanie przy użyciu standardowej taśmy pakowej.', 5000, 'KartonKlapowy.png'),
(2, 'Pudełko fasonowe Gabaryt A', 2.1, 'opakowania', '<b>Wymiary wewnętrzne:</b> 250 x 160 x 50 mm <br>\r\n<b>Typ konstrukcji:</b> FEFCO 427 <br>\r\n<b>Rodzaj tektury:</b> 3-warstwowa, fala E <br>\r\n<b>Gramatura:</b> 380 g/m^2 <br>\r\n<b>Przeznaczenie:</b> Gabaryt A <br>', 'Profesjonalne pudełko fasonowe o wzmocnionych ściankach, stworzone z myślą o bezpiecznej wysyłce drobnej elektroniki, kosmetyków oraz akcesoriów IT. Konstrukcja FEFCO 427 umożliwia błyskawiczne złożenie bez konieczności użycia taśmy klejącej, co znacznie przyspiesza proces pakowania na magazynie. Estetyczna fala E zapewnia wysoką sztywność przy zachowaniu niskiej wagi własnej, co jest kluczowe dla optymalizacji kosztów transportu. Pudełko idealnie mieści się w najmniejszej skrytce paczkomatowej (Gabaryt A).', 3000, 'KartonFasonowy.png'),
(3, 'Tuba wysyłkowa tekturowa', 4.8, 'opakowania', '<b>Średnica wewnętrzna:</b> 80m <br>\r\n<b>Długość:</b> 600mm <br>\r\n<b>Grubość ścianki:</b> 2mm <br>\r\n<b>Typ:</b> Spiralnie zawijana tektura <br>\r\n<b>Zabezpieczenie:</b> W komplecie dwie plastikowe zatyczki <br>', 'Profesjonalna tuba tekturowa o wysokiej sztywności, przeznaczona do bezpiecznego transportu materiałów rolowanych: plakatów, map, projektów architektonicznych oraz kalendarzy. Wykonana z grubego, spiralnie zwijanego kartonu, który zapewnia ekstremalną odporność na zgniecenie i złamanie w trakcie sortowania paczek. Dołączone do zestawu plastikowe zatyczki ściśle przylegają do krawędzi tuby, eliminując potrzebę stosowania dodatkowej taśmy i chroniąc zawartość przed kurzem oraz wilgocią.', 1400, 'TubaWysylkowa.png'),
(4, 'Karton 5-warstwowy wzmocniony', 12.5, 'opakowania', '<b>Wymiary wewnętrzne:</b> 600 x 400 x 400 mm <br>\r\n<b>Typ tektury:</b> 5-warstwowa. fala BC <br>\r\n<b>Gramatura:</b> 650 g/m^2 <br>\r\n<b>Maksymalna nośność:</b> do 40kg <br>\r\n<b>Właściwości:</b> Zwiększona odporność na wilgoć i przebicia <br>', 'Najwyższy standard ochrony dla najcięższych ładunków. Karton wykonany z dwufalowej, pięciowarstwowej tektury o wysokiej gramaturze, zaprojektowany z myślą o transporcie elektroniki, podzespołów komputerowych oraz ciężkich urządzeń przemysłowych. Dzięki zastosowaniu fali BC, ściany pudełka mają grubość blisko 7 mm, co tworzy naturalny \"zderzak\" chroniący zawartość przed uderzeniami bocznymi. Idealny do wysyłek międzynarodowych oraz wszędzie tam, gdzie wymagane jest piętrowanie paczek na paletach bez ryzyka ich zgniatania.', 460, 'Karton5Warstwowy.png'),
(5, 'Folia bąbelkowa B1', 29.5, 'zabezpieczenia', '<b>Szerokość rolki:</b> 50cm <br>\r\n<b>Długość nawoju:</b> 100m <br>\r\n<b>Średnica bąbelkowa:</b> 10mm <br>\r\n<b>Grubość folii:</b> 40µm <br>\r\n<b>Typ:</b> Dwuwarstwowa <br>', 'Najbardziej uniwersalny materiał ochronny w branży wysyłkowej. Folia bąbelkowa B1 zapewnia doskonałą amortyzację wstrząsów, chroniąc delikatne przedmioty (szkło, elektronikę, ceramikę) przed stłuczeniem i zarysowaniami podczas transportu. Dzięki swojej elastyczności łatwo dopasowuje się do kształtu pakowanego produktu, a wysoka przejrzystość pozwala na szybką identyfikację zawartości bez konieczności odpakowywania. Materiał jest wodoodporny i chemicznie obojętny, co gwarantuje czystość i bezpieczeństwo przesyłek.', 340, 'folia.png'),
(6, 'Folia Stretch Czarna', 34, 'zabezpieczenia', '<b>Szerokość:</b> 500mm<br>\r\n<b>Waga rolki:</b> 2,5kg<br>\r\n<b>Grubość:</b> 23µm<br>\r\n<b>Rozciągliwość:</b> do 180%<br>\r\n<b>Kolor:</b> Czarny kryjący<br>', 'Profesjonalna folia stretch o wysokim stopniu krycia, dedykowana do zabezpieczania jednostek paletowych oraz przesyłek wielkogabarytowych. Dzięki zwiększonej grubości (23 mikrony) charakteryzuje się ekstremalną odpornością na zerwania i przebicia, co jest kluczowe przy pakowaniu przedmiotów o ostrych krawędziach. Czarny pigment zapewnia pełną dyskrecję transportu, chroniąc towar przed wzrokiem osób trzecich oraz promieniowaniem UV. Doskonała kleistość wewnętrzna sprawia, że folia idealnie przylega do ładunku, stabilizując go na palecie podczas gwałtownych manewrów transportowych.', 230, 'FoliaStretch.png'),
(7, 'Wypełniacz Bio-Skropak', 45, 'zabezpieczenia', '<b>Objętość:</b> 100 litrów<br>\r\n<b>Materiał:</b> Skrobia kukurydziana<br>\r\n<b>Kształt:</b> Charakterystyczne \"chrupki\"<br>\r\n<b>Biodegradowalność:</b> 100%<br>\r\n<b>Waga worka:</b> ok 1,5kg<br>', 'Nowoczesna i w pełni ekologiczna alternatywa dla wypełniaczy styropianowych. Bio-Skropak to biodegradowalny materiał amortyzujący, wyprodukowany na bazie składników roślinnych. Jest niezwykle lekki, dzięki czemu nie podnosi kosztów transportu, a jednocześnie zapewnia doskonałą ochronę kruchym przedmiotom, szczelnie wypełniając puste przestrzenie w kartonie. Największą zaletą produktu jest jego utylizacja – po rozpakowaniu przesyłki wypełniacz można bezpiecznie rozpuścić w wodzie lub wyrzucić na kompost, co czyni go idealnym wyborem dla sklepów promujących ideę Zero Waste.', 5400, 'Wypelniacz.png'),
(8, 'Poduszki powietrzne Air-Bag', 19.9, 'zabezpieczenia', '<b>Wymiar pojedynczej poduszki:</b> 200 x 100mm<br>\r\n<b>Materiał:</b> Wielowarstwowa folia HDPE<br>\r\n<b>Skład:</b> 99% powietrze, 1% folia<br>\r\n<b>Wytrzymałość:</b> Odporność na nacisk do 40kg<br>\r\n<b>Perforacja:</b> Tak<br>', 'Innowacyjne rozwiązanie do stabilizacji towaru wewnątrz opakowania zbiorczego. Poduszki powietrzne Air-Bag to najlżejszy dostępny na rynku wypełniacz, który praktycznie nie zwiększa wagi przesyłki. Skutecznie blokują przemieszczanie się przedmiotów w kartonie, tworząc bezpieczną barierę amortyzacyjną. Dzięki perforacji pakowacz może precyzyjnie dobrać ilość wypełniacza do wolnej przestrzeni. Po zużyciu wystarczy przebić poduszkę, co redukuje objętość odpadów do minimum (zaledwie 1% pierwotnej wielkości).', 600, 'PoduszkiPowietrzne.png'),
(9, 'Etykiety termiczne 100x150mm', 18, 'etykiety', '<b>Szerokość:</b> 100mm<br>\r\n<b>Wysokość:</b> 150mm<br>\r\n<b>Średnica glizy:</b> 49mm<br>\r\n<b>Rodzaj papieru:</b> Termiczny<br>\r\n<b>Klej:</b> Akrylowy, mocny<br>\r\n<b>Perforacja:</b> Tak<br>', 'Wysokiej jakości etykiety termiczne dedykowane do druku listów przewozowych w systemach najpopularniejszych przewoźników (DPD, DHL, InPost, UPS, Poczta Polska). Zastosowanie specjalnego papieru termoczułego pozwala na błyskawiczny wydruk bez użycia kosztownych tonerów czy taśm barwiących. Mocny klej akrylowy gwarantuje, że etykieta pozostanie na miejscu nawet w trudnych warunkach magazynowych i przy niskich temperaturach. Idealnie gładka powierzchnia papieru chroni głowicę drukarki przed przedwczesnym zużyciem.', 503, 'EtykietyTermiczne.png'),
(10, 'Naklejki \"Ostrożnie Szkło\"', 14.5, 'etykiety', '<b>Wymiar pojedynczej naklejki:</b> 100x50mm\r\n<b>Kolor:</b> Jaskrawoczerwone tło, białe napisy i piktogram\r\n<b>Rodzaj papieru:</b> Półbłyszczący, zwiększona widoczność\r\n<b>Klej:</b> Klauczukowy\r\n<b>Język:</b> Polski + piktogram międzynarodowy', 'Profesjonalne etykiety ostrzegawcze pełniące kluczową rolę w procesie zabezpieczania przesyłek delikatnych. Jaskrawa, kontrastowa kolorystyka sprawia, że paczka jest natychmiast zauważalna dla personelu sortowni oraz kurierów, co znacząco minimalizuje ryzyko uszkodzenia zawartości. Dzięki zastosowaniu mocnego kleju kauczukowego, naklejki nie odklejają się pod wpływem wilgoci ani niskich temperatur w komorach załadunkowych. Niezbędne przy wysyłce monitorów, komponentów szklanych oraz precyzyjnej aparatury pomiarowej.', 352, 'OstroznieSzklo.png'),
(11, 'Etykiety plombowe (Void)', 89, 'etykiety', '<b>Wymiar:</b> 40 x 20mm<br>\r\n<b>Materiał:</b> Folia poliesterowa ze specjalnym klejem<br>\r\n<b>Efekt naruszenia:</b> Po odklejeniu na podłożu zostaje napis \"VOID\"<br>\r\n<b>Odporność:</b> Odporne na działanie<br> temperatury od -40°C do + 120°C oraz środki czyszczące<br>\r\n<b>Kolor:</b> Srebrny matowy<br>', 'Profesjonalne plomby gwarancyjne typu VOID, niezbędne w procesie zabezpieczania wartościowych przesyłek oraz podzespołów IT. Specjalna struktura kleju sprawia, że każda próba zerwania lub naruszenia etykiety staje się natychmiast widoczna i niemożliwa do ukrycia (napis ostrzegawczy zostaje na kartonie lub obudowie urządzenia). Plomby są niemożliwe do przyklejenia w nienaruszonym stanie, co stanowi niepodważalny dowód ingerencji osób trzecich. Idealne do zabezpieczania łączeń obudów, pudełek z elektroniką oraz nośników danych.', 345, 'EtykietyPlombowe.png'),
(12, 'Etykiety ostrzegawcze \"Góra / Dół\"', 15.5, 'etykiety', '<b>Wymiar:</b> 100 x 100mm<br>\r\n<b>Symbol:</b> Trzy czerwone strzałki skierowane w górę<br>\r\n<b>Materiał:</b> Papier półbłyszczący o wysokim kontraście<br>\r\n<b>Klej:</b> Akrylowy o zwiększonej sile spoiny<br>\r\n<b>Zgodność:</b> Zgodnie z międzynarodowymi standardami transportowymi <br>', 'Specjalistyczne etykiety kierunkowe niezbędne przy transporcie towarów wymagających zachowania konkretnej orientacji pionowej. Jasne i czytelne piktogramy informują kurierów oraz pracowników magazynu o konieczności ustawienia paczki strzałkami do góry, co zapobiega wyciekom, uszkodzeniom mechanicznym czy przemieszczaniu się delikatnych komponentów wewnątrz opakowania. Niezastąpione przy wysyłce serwerów, szaf rack oraz urządzeń wielofunkcyjnych.', 130, 'EtykietyGoraDol.png'),
(13, 'Skaner kodów kreskowych', 450, 'sprzet', '<b>Typ czytnika:</b> Imager 2D<br>\r\n<b>Łączność:</b> Bluetooth 5.0 + odbiornik USB 2.4GHz<br>\r\n<b>Bateria:</b> 2200 mAh<br>\r\n<b>Odporność:</b> Certyfikat IP54<br>\r\n<b>Tryby pracy:</b> Real-time (wysyłka natychmiastowa) lub inventory (pamięć do 100 000 kodów)<br>', 'Bezprzewodowy skaner kodów kreskowych klasy przemysłowej, zaprojektowany z myślą o intensywnej pracy w magazynach e-commerce. Dzięki zaawansowanemu modułowi skanującemu typu Imager, urządzenie błyskawicznie radzi sobie z odczytem kodów uszkodzonych, zamazanych lub znajdujących się pod grubą warstwą folii stretch. Ergonomiczna konstrukcja typu \"pistolet\" minimalizuje zmęczenie dłoni podczas wielogodzinnych inwentaryzacji. Skaner jest w pełni kompatybilny z systemami Windows, macOS, Android oraz iOS, co pozwala na bezpośrednią integrację z mobilnymi aplikacjami magazynowymi.', 40, 'Skaner.png'),
(14, 'Drukarka etykiet Zebra ZD220', 780, 'sprzet', '<b>Metoda druku:</b> Termotransferowa oraz Termiczna <br>\r\n<b>Rozdzielczość:</b> 203 dpi <br>\r\n<b>Szerokość druku:</b> do 104mm <br>\r\n<b>Prędkość druku:</b> 102 mm/s <br>\r\n<b>Języki programowania:</b> ZPL II, EPL II <br>\r\nInterfejs: USB 2.0', 'Zebra ZD220 to niezawodna drukarka biurkowa, która łączy w sobie legendarną trwałość marki z przystępną ceną. Model ten został stworzony dla firm wymagających stabilnej pracy przy średnim natężeniu wydruków. Dzięki technologii termotransferowej, wydrukowane etykiety są odporne na światło słoneczne, tarcie i zmienne warunki atmosferyczne, co jest kluczowe w długodystansowym transporcie. Konstrukcja typu \"OpenACCESS\" pozwala na błyskawiczną wymianę mediów, co minimalizuje przestoje na stanowisku pakowania.', 4, 'DrukarkaEtykiet.png'),
(15, 'Dyspenser do taśmy pakowej PRO', 65, 'sprzet', '<b>Szerokość taśmy:</b> do 50mm\r\n<b>Średnica glizy: 76mm\r\n<b>Materiał korpusu:</b> Stal malowana proszkowo + wytrzymałe tworzywo ABS\r\n<b>System tnący:</b> Ząbkowane ostrze ze stali hartowanej\r\n<b>Regulacja:</b> Mechanizm regulacji naciągu taśmy\r\n<b>Dodatki:</b> Ergonomiczna rękojeść i gumowa rolka dociskowa', 'Profesjonalny dyspenser ręczny przeznaczony do intensywnego użytkowania w centrach logistycznych i punktach pakowania. Solidna, metalowa konstrukcja gwarantuje wieloletnią trwałość i odporność na uszkodzenia mechaniczne przy upadku. Urządzenie wyposażone jest w regulowany hamulec naciągu taśmy, co pozwala na precyzyjne aplikowanie kleju i zapobiega plątaniu się materiału. Specjalna osłona ostrza zapewnia bezpieczeństwo pracy, a gumowy wałek dociskowy sprawia, że taśma idealnie przylega do powierzchni kartonu już przy pierwszym pociągnięciu.', 76, 'DyspenserTasmy.png'),
(16, 'Wózek paletowy ręczny (Paleciak)', 1450, 'sprzet', '<b>Udźwig maksymalny:</b> 2500kg <br>\r\n<b>Długość wideł:</b> 1150mm<br>\r\n<b>Szerokość całkowita:</b> 540mm<br>\r\n<b>Zakres podnoszenia:</b> od 85mm do 200mm<br>\r\n<b>Koła i rolki:</b> Poliuretanowe<br>\r\n<b>Materiał:</b> Stal hartowana, malowana proszkowo na kolor czerwnony, czarny<br>', 'Niezbędny element wyposażenia każdego nowoczesnego magazynu i punktu przeładunkowego. Wózek paletowy o wzmocnionej konstrukcji stalowej, zaprojektowany do intensywnej pracy z ładunkami o masie do 2,5 tony. Wyposażony w ergonomiczną dyszlową rączkę z hydraulicznym systemem podnoszenia oraz zaworem przeciążeniowym, co gwarantuje bezpieczeństwo operatora. Zastosowanie podwójnych rolek (tandem) przy widłach pozwala na łatwe pokonywanie nierówności podłoża oraz płynne wjeżdżanie w palety od strony bocznej.', 6, 'Paleciak.png'),
(17, 'Taśma pakowa papierowa', 8.5, 'sprzet', '<b>Szerokość:</b> 50mm <br>\r\n<b>Długość:</b> 50m<br>\r\n<b>Materiał:</b> Wytrzymały papier typu Kraft<br>\r\n<b>Rodzaj kleju:</b> Solvent - trzyma nawet w ujemnych temperaturach<br>\r\n<b>Możliwość recyklingu:</b> Tak<br>\r\n<b>Właściwość:</b> Możliwośc pisania po taśmie markerem lub długopisem<br>', 'Ekologiczna alternatywa dla standardowych taśm polipropylenowych. Taśma papierowa Kraft charakteryzuje się doskonałą przyczepnością do powierzchni tekturowych oraz wysoką odpornością na zerwania. Zastosowanie naturalnego kleju typu Solvent sprawia, że produkt jest niezawodny w każdych warunkach magazynowych, nie odklejając się pod wpływem wilgoci czy chłodu. Wybierając tę taśmę, wspierasz gospodarkę o obiegu zamkniętym – zużyte opakowanie może w całości trafić do pojemnika na papier, co znacząco ułatwia proces recyklingu Twoim klientom.', 135, 'TasmaPapierowa.png'),
(18, 'Taśma pakowa PP Solvent', 5.2, 'sprzet', '<b>Szerokość:</b> 48mm <br>\r\n<b>Długość:</b> 60m<br>\r\n<b>Materiał:</b> Polipropylen<br>\r\n<b>Rodzaj kleju:</b> Solvent<br>\r\n<b>Kolor:</b> Transparentny<br>\r\n<b>Grubość powłoki:</b> 45µm<br>', 'Profesjonalna taśma pakowa na bazie kauczuku naturalnego (Solvent), charakteryzująca się najwyższą siłą klejenia wśród taśm foliowych. Idealna do zaklejania ciężkich kartonów 5-warstwowych oraz przesyłek magazynowanych w trudnych warunkach (chłodnie, zawilgocone magazyny). Dzięki swojej przezroczystości nie zakrywa oznaczeń na kartonach ani kodów kreskowych, co ułatwia pracę skanerom w procesie automatycznej sortacji. Taśma jest odporna na starzenie i promieniowanie UV, co gwarantuje bezpieczeństwo przesyłki nawet podczas długiego transportu międzynarodowego.', 440, 'Tasma.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `haslo` varchar(35) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakupy`
--

CREATE TABLE `zakupy` (
  `id_zakupu` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_produktu` int(11) NOT NULL,
  `data_zakupu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD PRIMARY KEY (`id_admina`),
  ADD KEY `id_admina` (`id_admina`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `zakupy`
--
ALTER TABLE `zakupy`
  ADD PRIMARY KEY (`id_zakupu`),
  ADD KEY `id_zakupu` (`id_zakupu`,`id_uzytkownika`,`id_produktu`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `id_produktu` (`id_produktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administratorzy`
--
ALTER TABLE `administratorzy`
  MODIFY `id_admina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zakupy`
--
ALTER TABLE `zakupy`
  MODIFY `id_zakupu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD CONSTRAINT `zakupy_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`),
  ADD CONSTRAINT `zakupy_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id_produktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

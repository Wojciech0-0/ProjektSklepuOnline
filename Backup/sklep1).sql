-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2026 at 03:03 PM
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
(1, 'Karton klapowy Standard A4', 1.85, 'opakowania', 'Wymiary wewnętrzne: 310 x 220 x 100 mm\r\nTyp tektury: 3-warstwowa, fala B\r\nGramatura: 350 g/m^2\r\nMaksymalna nośność: do 5 kg\r\nKolor: Brązowy (naturalny)', 'Wytrzymały karton klapowy zaprojektowany specjalnie pod format A4. Idealnie sprawdza się w logistyce biurowej oraz e-commerce do wysyłki dokumentów, książek czy płaskiej elektroniki. Dzięki zastosowaniu wysokiej jakości tektury o fali B, produkt zapewnia optymalną ochronę przed zgnieceniem i uszkodzeniami mechanicznymi podczas transportu. Konstrukcja typu FEFCO 201 pozwala na szybkie i łatwe składanie przy użyciu standardowej taśmy pakowej.', 5000, 'KartonKlapowy.png'),
(2, 'Pudełko fasonowe Gabaryt A', 2.1, 'opakowania', 'Wymiary wewnętrzne: 250 x 160 x 50 mm\r\nTyp konstrukcji: FEFCO 427\r\nRodzaj tektury: 3-warstwowa, fala E\r\nGramatura: 380 g/m^2\r\nPrzeznaczenie: Gabaryt A', 'Profesjonalne pudełko fasonowe o wzmocnionych ściankach, stworzone z myślą o bezpiecznej wysyłce drobnej elektroniki, kosmetyków oraz akcesoriów IT. Konstrukcja FEFCO 427 umożliwia błyskawiczne złożenie bez konieczności użycia taśmy klejącej, co znacznie przyspiesza proces pakowania na magazynie. Estetyczna fala E zapewnia wysoką sztywność przy zachowaniu niskiej wagi własnej, co jest kluczowe dla optymalizacji kosztów transportu. Pudełko idealnie mieści się w najmniejszej skrytce paczkomatowej (Gabaryt A).', 3000, 'KartonFasonowy.png'),
(3, 'Tuba wysyłkowa tekturowa', 4.8, 'opakowania', 'Średnica wewnętrzna: 80m\r\nDługość: 600mm\r\nGrubość ścianki: 2mm\r\nTyp: Spiralnie zawijana tektura\r\nZabezpieczenie: W komplecie dwie plastikowe zatyczki', 'Profesjonalna tuba tekturowa o wysokiej sztywności, przeznaczona do bezpiecznego transportu materiałów rolowanych: plakatów, map, projektów architektonicznych oraz kalendarzy. Wykonana z grubego, spiralnie zwijanego kartonu, który zapewnia ekstremalną odporność na zgniecenie i złamanie w trakcie sortowania paczek. Dołączone do zestawu plastikowe zatyczki ściśle przylegają do krawędzi tuby, eliminując potrzebę stosowania dodatkowej taśmy i chroniąc zawartość przed kurzem oraz wilgocią.', 1400, 'TubaWysylkowa.png'),
(4, 'Karton 5-warstwowy wzmocniony', 12.5, 'opakowania', 'Wymiary wewnętrzne: 600 x 400 x 400 mm\r\nTyp tektury: 5-warstwowa. fala BC\r\nGramatura: 650 g/m^2\r\nMaksymalna nośność: do 40kg\r\nWłaściwości: Zwiększona odporność na wilgoć i przebicia', 'Najwyższy standard ochrony dla najcięższych ładunków. Karton wykonany z dwufalowej, pięciowarstwowej tektury o wysokiej gramaturze, zaprojektowany z myślą o transporcie elektroniki, podzespołów komputerowych oraz ciężkich urządzeń przemysłowych. Dzięki zastosowaniu fali BC, ściany pudełka mają grubość blisko 7 mm, co tworzy naturalny \"zderzak\" chroniący zawartość przed uderzeniami bocznymi. Idealny do wysyłek międzynarodowych oraz wszędzie tam, gdzie wymagane jest piętrowanie paczek na paletach bez ryzyka ich zgniatania.', 460, 'Karton5Warstwowy.png'),
(5, 'Folia bąbelkowa B1', 29.5, 'zabezpieczenia', 'Szerokość rolki: 50cm\r\nDługość nawoju: 100m\r\nŚrednica bąbelkowa: 10mm\r\nGrubość folii: 40µm\r\nTyp: Dwuwarstwowa', 'Najbardziej uniwersalny materiał ochronny w branży wysyłkowej. Folia bąbelkowa B1 zapewnia doskonałą amortyzację wstrząsów, chroniąc delikatne przedmioty (szkło, elektronikę, ceramikę) przed stłuczeniem i zarysowaniami podczas transportu. Dzięki swojej elastyczności łatwo dopasowuje się do kształtu pakowanego produktu, a wysoka przejrzystość pozwala na szybką identyfikację zawartości bez konieczności odpakowywania. Materiał jest wodoodporny i chemicznie obojętny, co gwarantuje czystość i bezpieczeństwo przesyłek.', 340, 'folia.png'),
(6, 'Folia Stretch Czarna', 34, 'zabezpieczenia', 'Szerokość: 500mm\r\nWaga rolki: 2,5kg\r\nGrubość: 23µm\r\nRozciągliwość: do 180%\r\nKolor: Czarny kryjący', 'Profesjonalna folia stretch o wysokim stopniu krycia, dedykowana do zabezpieczania jednostek paletowych oraz przesyłek wielkogabarytowych. Dzięki zwiększonej grubości (23 mikrony) charakteryzuje się ekstremalną odpornością na zerwania i przebicia, co jest kluczowe przy pakowaniu przedmiotów o ostrych krawędziach. Czarny pigment zapewnia pełną dyskrecję transportu, chroniąc towar przed wzrokiem osób trzecich oraz promieniowaniem UV. Doskonała kleistość wewnętrzna sprawia, że folia idealnie przylega do ładunku, stabilizując go na palecie podczas gwałtownych manewrów transportowych.', 230, 'FoliaStretch.png'),
(7, 'Wypełniacz Bio-Skropak', 45, 'zabezpieczenia', 'Objętość: 100 litrów\r\nMateriał: Skrobia kukurydziana\r\nKształt: Charakterystyczne \"chrupki\"\r\nBiodegradowalność: 100%\r\nWaga worka: ok 1,5kg', 'Nowoczesna i w pełni ekologiczna alternatywa dla wypełniaczy styropianowych. Bio-Skropak to biodegradowalny materiał amortyzujący, wyprodukowany na bazie składników roślinnych. Jest niezwykle lekki, dzięki czemu nie podnosi kosztów transportu, a jednocześnie zapewnia doskonałą ochronę kruchym przedmiotom, szczelnie wypełniając puste przestrzenie w kartonie. Największą zaletą produktu jest jego utylizacja – po rozpakowaniu przesyłki wypełniacz można bezpiecznie rozpuścić w wodzie lub wyrzucić na kompost, co czyni go idealnym wyborem dla sklepów promujących ideę Zero Waste.', 5400, 'Wypelniacz.png'),
(8, 'Poduszki powietrzne Air-Bag', 19.9, 'zabezpieczenia', 'Wymiar pojedynczej poduszki: 200 x 100mm\r\nMateriał: Wielowarstwowa folia HDPE\r\nSkład: 99% powietrze, 1% folia\r\nWytrzymałość: Odporność na nacisk do 40kg\r\nPerforacja: Tak', 'Innowacyjne rozwiązanie do stabilizacji towaru wewnątrz opakowania zbiorczego. Poduszki powietrzne Air-Bag to najlżejszy dostępny na rynku wypełniacz, który praktycznie nie zwiększa wagi przesyłki. Skutecznie blokują przemieszczanie się przedmiotów w kartonie, tworząc bezpieczną barierę amortyzacyjną. Dzięki perforacji pakowacz może precyzyjnie dobrać ilość wypełniacza do wolnej przestrzeni. Po zużyciu wystarczy przebić poduszkę, co redukuje objętość odpadów do minimum (zaledwie 1% pierwotnej wielkości).', 600, 'PoduszkiPowietrzne.png'),
(9, 'Etykiety termiczne 100x150mm', 18, 'etykiety', 'Szerokość: 100mm\r\nWysokość: 150mm\r\nŚrednica glizy: 49mm\r\nRodzaj papieru: Termiczny\r\nKlej: Akrylowy, mocny\r\nPerforacja: Tak', 'Wysokiej jakości etykiety termiczne dedykowane do druku listów przewozowych w systemach najpopularniejszych przewoźników (DPD, DHL, InPost, UPS, Poczta Polska). Zastosowanie specjalnego papieru termoczułego pozwala na błyskawiczny wydruk bez użycia kosztownych tonerów czy taśm barwiących. Mocny klej akrylowy gwarantuje, że etykieta pozostanie na miejscu nawet w trudnych warunkach magazynowych i przy niskich temperaturach. Idealnie gładka powierzchnia papieru chroni głowicę drukarki przed przedwczesnym zużyciem.', 503, 'EtykietyTermiczne.png'),
(10, 'Naklejki \"Ostrożnie Szkło\"', 14.5, 'etykiety', 'Wymiar pojedynczej naklejki: 100x50mm\r\nKolor: Jaskrawoczerwone tło, białe napisy i piktogram\r\nRodzaj papieru: Półbłyszczący, zwiększona widoczność\r\nKlej: Klauczukowy\r\nJęzyk: Polski + piktogram międzynarodowy', 'Profesjonalne etykiety ostrzegawcze pełniące kluczową rolę w procesie zabezpieczania przesyłek delikatnych. Jaskrawa, kontrastowa kolorystyka sprawia, że paczka jest natychmiast zauważalna dla personelu sortowni oraz kurierów, co znacząco minimalizuje ryzyko uszkodzenia zawartości. Dzięki zastosowaniu mocnego kleju kauczukowego, naklejki nie odklejają się pod wpływem wilgoci ani niskich temperatur w komorach załadunkowych. Niezbędne przy wysyłce monitorów, komponentów szklanych oraz precyzyjnej aparatury pomiarowej.', 352, 'OstroznieSzklo.png'),
(11, 'Etykiety plombowe (Void)', 89, 'etykiety', 'Wymiar: 40 x 20mm\r\nMateriał: Folia poliesterowa ze specjalnym klejem\r\nEfekt naruszenia: Po odklejeniu na podłożu zostaje napis \"VOID\"\r\nOdporność: Odporne na działanie temperatury od -40°C do + 120°C oraz środki czyszczące\r\nKolor: Srebrny matowy', 'Profesjonalne plomby gwarancyjne typu VOID, niezbędne w procesie zabezpieczania wartościowych przesyłek oraz podzespołów IT. Specjalna struktura kleju sprawia, że każda próba zerwania lub naruszenia etykiety staje się natychmiast widoczna i niemożliwa do ukrycia (napis ostrzegawczy zostaje na kartonie lub obudowie urządzenia). Plomby są niemożliwe do przyklejenia w nienaruszonym stanie, co stanowi niepodważalny dowód ingerencji osób trzecich. Idealne do zabezpieczania łączeń obudów, pudełek z elektroniką oraz nośników danych.', 345, 'EtykietyPlombowe.png'),
(12, 'Etykiety ostrzegawcze \"Góra / Dół\"', 15.5, 'etykiety', 'Wymiar: 100 x 100mm\r\nSymbol: Trzy czerwone strzałki skierowane w górę\r\nMateriał: Papier półbłyszczący o wysokim kontraście\r\nKlej: Akrylowy o zwiększonej sile spoiny\r\nZgodność: Zgodnie z międzynarodowymi standardami transportowymi ', 'Specjalistyczne etykiety kierunkowe niezbędne przy transporcie towarów wymagających zachowania konkretnej orientacji pionowej. Jasne i czytelne piktogramy informują kurierów oraz pracowników magazynu o konieczności ustawienia paczki strzałkami do góry, co zapobiega wyciekom, uszkodzeniom mechanicznym czy przemieszczaniu się delikatnych komponentów wewnątrz opakowania. Niezastąpione przy wysyłce serwerów, szaf rack oraz urządzeń wielofunkcyjnych.', 130, 'EtykietyGoraDol.png'),
(13, 'Skaner kodów kreskowych', 450, 'sprzet', 'Typ czytnika: Imager 2D\r\nŁączność: Bluetooth 5.0 + odbiornik USB 2.4GHz\r\nBateria: 2200 mAh\r\nOdporność: Certyfikat IP54\r\nTryby pracy: Real-time (wysyłka natychmiastowa) lub inventory (pamięć do 100 000 kodów)', 'Bezprzewodowy skaner kodów kreskowych klasy przemysłowej, zaprojektowany z myślą o intensywnej pracy w magazynach e-commerce. Dzięki zaawansowanemu modułowi skanującemu typu Imager, urządzenie błyskawicznie radzi sobie z odczytem kodów uszkodzonych, zamazanych lub znajdujących się pod grubą warstwą folii stretch. Ergonomiczna konstrukcja typu \"pistolet\" minimalizuje zmęczenie dłoni podczas wielogodzinnych inwentaryzacji. Skaner jest w pełni kompatybilny z systemami Windows, macOS, Android oraz iOS, co pozwala na bezpośrednią integrację z mobilnymi aplikacjami magazynowymi.', 40, 'Skaner.png'),
(14, 'Drukarka etykiet Zebra ZD220', 780, 'sprzet', 'Metoda druku: Termotransferowa oraz Termiczna\r\nRozdzielczość: 203 dpi\r\nSzerokość druku: do 104mm\r\nPrędkość druku: 102 mm/s\r\nJęzyki programowania: ZPL II, EPL II\r\nInterfejs: USB 2.0', 'Zebra ZD220 to niezawodna drukarka biurkowa, która łączy w sobie legendarną trwałość marki z przystępną ceną. Model ten został stworzony dla firm wymagających stabilnej pracy przy średnim natężeniu wydruków. Dzięki technologii termotransferowej, wydrukowane etykiety są odporne na światło słoneczne, tarcie i zmienne warunki atmosferyczne, co jest kluczowe w długodystansowym transporcie. Konstrukcja typu \"OpenACCESS\" pozwala na błyskawiczną wymianę mediów, co minimalizuje przestoje na stanowisku pakowania.', 4, 'DrukarkaEtykiet.png'),
(15, 'Dyspenser do taśmy pakowej PRO', 65, 'sprzet', 'Szerokość taśmy: do 50mm\r\nŚrednica glizy: 76mm\r\nMateriał korpusu: Stal malowana proszkowo + wytrzymałe tworzywo ABS\r\nSystem tnący: Ząbkowane ostrze ze stali hartowanej\r\nRegulacja: Mechanizm regulacji naciągu taśmy\r\nDodatki: Ergonomiczna rękojeść i gumowa rolka dociskowa', 'Profesjonalny dyspenser ręczny przeznaczony do intensywnego użytkowania w centrach logistycznych i punktach pakowania. Solidna, metalowa konstrukcja gwarantuje wieloletnią trwałość i odporność na uszkodzenia mechaniczne przy upadku. Urządzenie wyposażone jest w regulowany hamulec naciągu taśmy, co pozwala na precyzyjne aplikowanie kleju i zapobiega plątaniu się materiału. Specjalna osłona ostrza zapewnia bezpieczeństwo pracy, a gumowy wałek dociskowy sprawia, że taśma idealnie przylega do powierzchni kartonu już przy pierwszym pociągnięciu.', 76, 'DyspenserTasmy.png'),
(16, 'Wózek paletowy ręczny (Paleciak)', 1450, 'sprzet', 'Udźwig maksymalny: 2500kg\r\nDługość wideł: 1150mm\r\nSzerokość całkowita: 540mm\r\nZakres podnoszenia: od 85mm do 200mm\r\nKoła i rolki: Poliuretanowe\r\nMateriał: Stal hartowana, malowana proszkowo na kolor czerwnony, czarny', 'Niezbędny element wyposażenia każdego nowoczesnego magazynu i punktu przeładunkowego. Wózek paletowy o wzmocnionej konstrukcji stalowej, zaprojektowany do intensywnej pracy z ładunkami o masie do 2,5 tony. Wyposażony w ergonomiczną dyszlową rączkę z hydraulicznym systemem podnoszenia oraz zaworem przeciążeniowym, co gwarantuje bezpieczeństwo operatora. Zastosowanie podwójnych rolek (tandem) przy widłach pozwala na łatwe pokonywanie nierówności podłoża oraz płynne wjeżdżanie w palety od strony bocznej.', 6, 'Paleciak.png'),
(17, 'Taśma pakowa papierowa', 8.5, 'sprzet', 'Szerokość: 50mm\r\nDługość: 50m\r\nMateriał: Wytrzymały papier typu Kraft\r\nRodzaj kleju: Solvent - trzyma nawet w ujemnych temperaturach\r\nMożliwość recyklingu: Tak\r\nWłaściwość: Możliwośc pisania po taśmie markerem lub długopisem', 'Ekologiczna alternatywa dla standardowych taśm polipropylenowych. Taśma papierowa Kraft charakteryzuje się doskonałą przyczepnością do powierzchni tekturowych oraz wysoką odpornością na zerwania. Zastosowanie naturalnego kleju typu Solvent sprawia, że produkt jest niezawodny w każdych warunkach magazynowych, nie odklejając się pod wpływem wilgoci czy chłodu. Wybierając tę taśmę, wspierasz gospodarkę o obiegu zamkniętym – zużyte opakowanie może w całości trafić do pojemnika na papier, co znacząco ułatwia proces recyklingu Twoim klientom.', 135, 'TasmaPapierowa'),
(18, 'Taśma pakowa PP Solvent', 5.2, 'sprzet', 'Szerokość: 48mm\r\nDługość: 60m\r\nMateriał: Polipropylen\r\nRodzaj kleju: Solvent\r\nKolor: Transparentny\r\nGrubość powłoki: 45µm', 'Profesjonalna taśma pakowa na bazie kauczuku naturalnego (Solvent), charakteryzująca się najwyższą siłą klejenia wśród taśm foliowych. Idealna do zaklejania ciężkich kartonów 5-warstwowych oraz przesyłek magazynowanych w trudnych warunkach (chłodnie, zawilgocone magazyny). Dzięki swojej przezroczystości nie zakrywa oznaczeń na kartonach ani kodów kreskowych, co ułatwia pracę skanerom w procesie automatycznej sortacji. Taśma jest odporna na starzenie i promieniowanie UV, co gwarantuje bezpieczeństwo przesyłki nawet podczas długiego transportu międzynarodowego.', 440, 'Tasma.png');

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

**HraHad**

HraHad je jednoduchá verze klasické hry Snake, která navíc obsahuje žebříček nejlepších hráčů. Hra je vytvořená v jazyce PHP a skóre hráčů se ukládá do MySQL databáze.

Návod k instalaci a spuštění
Instalace a nastavení potřebných programů
Aplikace je naprogramována pomocí jazyku PHP a pro správné fungování je nutné mít nainstalovaný a funkční webový server například Apache, PHP a MySQL nebo jiný databázový systém. Tohle vše bude dostupné, pokud si stáhnete balíček softwarových programů XAMPP nebo WAMPP.
Stažení a nastavení souborů
Zdrojové soubory aplikace si stáhněte a rozbalte je do kořenového adresáře webového serveru např. C:\xampp\htdocs\. Dále se ujistěte že složka se soubory obsahuje databaze.php zde totiž propojíte váš server s aplikací.
Nastavení databáze
1.	V MySQL souboru databaze.sql vytvořte databázi had pomoci příkazu: 
              CREATE DATABASE IF NOT EXISTS had;
2.	Dále tuto databázi spusťte pomocí příkazu: 
              USE had;
3.	A dále vytvořte 2 tabulky „hraci“ a „tophraci“ pomocí příkazů:
              CREATE TABLE hraci
  	          CREATE TABLE tophraci
Poté otevřete soubor databaze.php ve Visual Studio Code a mezi uvozovky upravíte připojení k databázi podle vašich údajů: 

Spusťte webový server, otevřete prohlížeč a do adresního řádku zadejte http://localhost/HraHad/.

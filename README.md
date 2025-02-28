HraHad
HraHad je jednoduchá verze klasické hry Snake s žebříčkem nejlepších hráčů. Hra je napsaná v PHP a skóre hráčů se ukládá do MySQL databáze.

Jak hru nainstalovat a spustit

Instalace
Spusťte skript databaze.sql, který vytvoří databázi a potřebné tabulky.
Otevřete soubor databaze.php a upravte nastavení připojení k databázi podle vašich údajů.

Potřebné programy
Hra běží na PHP, MySQL a webovém serveru (např. Apache). Nejjednoduší způsob, jak si vše nastavit, je stáhnout a nainstalovat XAMPP nebo WAMPP.

Stažení souborů
Stáhněte a rozbalte zdrojové soubory hry do kořenového adresáře webového serveru, např. C:\xampp\htdocs.
Ujistěte se, že soubor databaze.php je v adresáři a správně propojuje hru s databází.

Nastavení databáze
Otevřete MySQL a spusťte následující příkazy:
CREATE DATABASE IF NOT EXISTS had;
USE had;
CREATE TABLE hraci (...);
CREATE TABLE tophraci (...);
Otevřete databaze.php v editoru (např. Visual Studio Code) a zadejte své připojovací údaje k databázi.

Jak spustit hru
Spusťte webový server (Apache v XAMPP nebo jiné řešení).
Otevřete prohlížeč a do adresního řádku napište: http://localhost/HraHad/.

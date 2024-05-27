# ig-clone
### Uniwersytet Śląski - projekt

Projekt zaliczeniowy przedmiotów: Języki Programowania Dynamicznych Stron Internetowych oraz Projektowanie Bazodanowych Aplikacji Webowych.



## Aplikacja stworzona na podstawie:
- [Amelia Framework](https://amelia-framework.eu/) (Smarty, Medoo)
- [Instagram Clone (HTML, CSS, JS)](https://github.com/leocosta1/instagram-clone/tree/main) - za przyzwoleniem licencji MIT

## Funkcje aplikacji:
- CRUD użytkowników
- CRUD postów
- dodawanie/usuwanie komentarzy
- dodawanie/usuwanie polubień
- stronicowanie postów (pobieranie po 10, przy pomocy AJAX)

## Role:
- `user` - klasyczny użytkownik, docelowo może dodawać, edytować, komentować posty, dodawać/usuwać polubienia, dodawać/usuwać komentarze
- `moderator` - może usunąć dowolny post lub komentarz

## Schemat bazy danych:
![Schemat bazy danych](https://github.com/azizko1337/ig-clone/blob/main/db-scheme/ig-clone.svg?raw=true)

## Deployment, wskazówki:
- Aby Amelia-Framework działała, należy uruchomić na serwerze Apache2 mod_rewrite, przy pomocy polecenia `sudo a2enmod rewrite`
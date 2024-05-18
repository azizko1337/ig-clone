{extends "../templates/Main.tpl"}

{block name="main"}
    <h1>Twoje dane</h1>
    <form action="">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text">
        <label for="firstName">Imię</label>
        <input id="firstName" name="firstName" type="text">
        <label for="lastName">Nazwisko</label>
        <input id="lastName" name="lastName" type="text">
        <label for="email">Email</label>
        <input id="email" name="email" type="email">
        <label for="password">Obecne hasło</label>
        <input id="password" name="password" type="password">
        <label for="newPassword">Nowe hasło</label>
        <input id="newPassword" name="newPassword" type="password" placeholder="(wypełnij jeśli chcesz zmienić hasło)">
        <label for="repeatedNewPassword">Powtórz nowe hasło</label>
        <input id="repeatedNewPassword" name="repeatedNewPassword" type="password" placeholder="(wypełnij jeśli chcesz zmienić hasło)">
        <input type="submit" value="Edytuj dane">
    </form>
    <form action="">
        <input class="red" type="submit" value="Usuń konto">
    </form>
{/block}

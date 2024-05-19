{extends "../templates/Main.tpl"}

{block name="main"}
    <h1>Twoje dane</h1>
    <form action="user" method="POST">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text" value="{$form->nickname}">
        <label for="firstName">Imię</label>
        <input id="firstName" name="firstName" type="text" value="{$form->firstName}">
        <label for="lastName">Nazwisko</label>
        <input id="lastName" name="lastName" type="text" value="{$form->lastName}">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{$form->email}">
        <label for="password">Obecne hasło</label>
        <input id="password" name="password" type="password" value="{$form->password}">
        <label for="newPassword">Nowe hasło</label>
        <input id="newPassword" name="newPassword" type="password" placeholder="(wypełnij jeśli chcesz zmienić hasło)"  value="{$form->newPassword}">
        <label for="repeatedNewPassword">Powtórz nowe hasło</label>
        <input id="repeatedNewPassword" name="repeatedNewPassword" type="password" placeholder="(wypełnij jeśli chcesz zmienić hasło)" value="{$form->repeatedNewPassword}">
        <input type="submit" value="Edytuj dane">
    </form>
    <hr>
    <h1>Wylogowanie</h1>
    <form action="logout" method="POST">
        <input type="submit" value="Wyloguj">
    </form>
    <hr>
    <h1>Usuwanie konta</h1>
    <form action="user_delete" method="POST">
        <label for="password_delete">Obecne hasło</label>
        <input id="password_delete" name="password" type="password" value="{$form->password}">
        <input class="red" type="submit" value="Usuń konto">
    </form>
{/block}

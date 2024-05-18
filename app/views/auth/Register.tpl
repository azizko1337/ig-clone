{extends "../templates/Main.tpl"}

{block name="main"}
    <h1>Rejestracja</h1>
    <form action="">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text">
        <label for="firstName">Imię</label>
        <input id="firstName" name="firstName" type="text">
        <label for="lastName">Nazwisko</label>
        <input id="lastName" name="lastName" type="text">
        <label for="email">Email</label>
        <input id="email" name="email" type="email">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password">
        <label for="repeatedPassword">Powtórz hasło</label>
        <input id="repeatedPassword" name="repeatedPassword" type="password">
        <input type="submit" value="Zarejestruj">
    </form>
{/block}

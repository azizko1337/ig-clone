{extends "Main.tpl"}

{block name="main"}
    <h1>Logowanie</h1>
    <form action="">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password">
        <input type="submit" value="Zaloguj">
    </form>
{/block}
{extends "templates/Main.tpl"}

{block name="main"}
    <h1>Wyniki wyszukiwania:</h1>
    {foreach $users as $user}
    {strip}
        <div class="side-menu__user-profile">
            <a
                    href="https://github.com/leocosta1"
                    target="_blank"
                    class="side-menu__user-avatar"
            >
                <img src="assets/default-user.png" alt="User Picture" />
            </a>
            <div class="side-menu__user-info">
                <a href="https://github.com/leocosta1" target="_blank"
                >{$user["nickname"]}</a
                >
                <span>{$user["firstName"]} {$user["lastName"]}</span>
            </div>
        </div>
    {/strip}
    {/foreach}
{/block}
{extends "templates/Main.tpl"}

{block name="main"}
    <h1>Wyniki wyszukiwania:</h1>
    {if count($users)>0}
        {foreach $users as $user}
        {strip}
            <div class="side-menu__user-profile">
                <a
                        href="{url action="profile/"|cat: $user["nickname"]}"
                        class="side-menu__user-avatar"
                >
                    <img src="assets/default-user.png" alt="User Picture" />
                </a>
                <div class="side-menu__user-info">
                    <a href="{url action="profile/"|cat: $user["nickname"]}"
                    >{$user["nickname"]}</a
                    >
                    <span>{$user["firstName"]} {$user["lastName"]}</span>
                </div>
            </div>
        {/strip}
        {/foreach}
    {else}
        <p>Brak pasujących użytkowników.</p>
    {/if}
{/block}
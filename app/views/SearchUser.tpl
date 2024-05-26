{extends "templates/Main.tpl"}

{block name="main"}
    <h1>Wyniki wyszukiwania:</h1>
    {if count($users)>0}
        {foreach $users as $user}
        {strip}
            <div class="side-menu__user-profile">
                <a
                        href="{url action="profile" nickname=$user["nickname"]}"
                        class="side-menu__user-avatar"
                >
                    <img src="{url action="assets" asset="default-user.png"}" alt="User Picture" />
                </a>
                <div class="side-menu__user-info">
                    <a href="{url action="profile" nickname=$user["nickname"]}"
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
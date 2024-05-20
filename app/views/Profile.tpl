{extends "templates/Main.tpl"}

{block name="main"}
    {if isset($user["id"])}
        <div class="side-menu__user-profile">
            <a
                    href="{url action="profile" nickname=$user["nickname"]}"
                    class="side-menu__user-avatar"
            >
                <img src="{url action="assets/default-user.png"}" alt="User Picture" />
            </a>
            <div class="side-menu__user-info">
                <a href="{url action="profile" nickname=$user["nickname"]}"
                >{$user["nickname"]}</a
                >
                <span>{$user["firstName"]} {$user["lastName"]}</span>
            </div>
            <button class="side-menu__suggestion-button">Follow</button>
        </div>
    {/if}
    {include "components/Feed.tpl"}
{/block}


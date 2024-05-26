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
            <button id="{$user["id"]|cat:"isfollowed"}" onClick="followUser({$user["id"]})" class="side-menu__suggestion-button">{if $user["is_followed"]}Unfollow{else}Follow{/if}</button>
        </div>
    {/if}
    {include "components/Feed.tpl"}
{/block}


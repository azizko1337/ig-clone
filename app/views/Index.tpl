{extends "templates/Main.tpl"}

{block name="main"}
  <div class="content">

    <div class="posts">
      {include file="components/Feed.tpl"}
    </div>
  </div>
{/block}

{block name="aside"}
  <div class="side-menu__user-profile">
    <a
            href="{url action="profile" nickname=$user["nickname"]}"
            class="side-menu__user-avatar"
    >
      <img src="assets/default-user.png" alt="{$user["nickname"]}' picture" />
    </a>
    <div class="side-menu__user-info">
      <a href="{url action="profile" nickname=$user["nickname"]}"
      >{$user["nickname"]}</a
      >
      <span>{$user["firstName"]} {$user["lastName"]}</span>
    </div>
  </div>

  {include "components/Suggestions.tpl"}
{/block}
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
            href="https://github.com/leocosta1"
            target="_blank"
            class="side-menu__user-avatar"
    >
      <img src="assets/default-user.png" alt="User Picture" />
    </a>
    <div class="side-menu__user-info">
      <a href="https://github.com/leocosta1" target="_blank"
      >leocosta1</a
      >
      <span>Leonardo Costa</span>
    </div>
  </div>

  {include "components/Suggestions.tpl"}
{/block}
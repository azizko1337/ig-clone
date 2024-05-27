{extends "templates/Main.tpl"}

{block name="main"}
  <div class="content">

    <div class="posts">
      {include file="components/Feed.tpl"}
    </div>

    {literal}
      <script type="text/javascript">
        let blocked = false;
        let page = 0;
        const postsContainer = document.querySelector("div.posts");
        window.addEventListener("scroll", () => {

          if(!blocked && window.scrollY > postsContainer.scrollHeight - window.outerHeight){
            blocked = true;
            page++;
            console.log(`Pobieranie ${page} strony postów!`)

            fetch(`${URL}feed/${page}`).then((res) => res.text()).then((posts) => {
              postsContainer.innerHTML += posts;
              if(posts.includes("Brak postów do wyświetlenia.")) return;
              blocked = false;
            })
          }
        })
      </script>
    {/literal}
  </div>
{/block}

{block name="aside"}
  <div class="side-menu__user-profile">
    <a
            href="{url action="profile" nickname=$user["nickname"]}"
            class="side-menu__user-avatar"
    >
      <img src="{url action="assets" asset="default-user.png"}" alt="{$user["nickname"]}' picture" />
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


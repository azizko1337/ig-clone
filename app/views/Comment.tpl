{extends "./templates/Main.tpl"}

{block name="main"}
    {include "./components/Feed.tpl"}

    <article class="post padding">
        <form class="big" action="{url action="comment_add" post_id=$posts[0]["id"]}" method="POST">
            <div><label for="body">Treść komentarza:</label></div>
            <textarea id="body" name="body" placeholder="1-200 znaków">{$form->body}</textarea>
            <input type="submit" value="Skomentuj">
        </form>
    </article>

    {if isset($comments) && count($comments)>0}
        {foreach $comments as $comment}
            {strip}
                <article class="post padding">
                    <div class="post__description">
                    <span>
                      <a
                              class="post__name--underline"
                              href="{url action="profile" nickname=$comment["nickname"]}"
                      >{$comment["nickname"]}</a
                      >{$comment["body"]}</span>
                    </div>
                    {if $comment["user_id"]==(\core\SessionUtils::load("id", true)) || \core\RoleUtils::inRole("moderator")}
                        <div class="delete_comment"><a href="{url action="comment_delete" post_id=$posts[0]["id"] comment_id=$comment["id"]}"><img src="{url action="/assets/icons/delete.png"}" alt="Delete comment"></a></div>
                    {/if}
                </article>
            {/strip}
        {/foreach}
    {else}
        <p>Brak komentarzy</p>
    {/if}


{/block}
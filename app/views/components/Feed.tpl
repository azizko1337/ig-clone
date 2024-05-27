{if isset($posts) && count($posts)>0}

    {foreach $posts as $post}
        {strip}
            <article class="post">
                <div class="post__header">
                    <div class="post__profile">
                        <a
                                href="{url action="profile" nickname={$post["nickname"]}}"
                                class="post__avatar"
                        >
                            <img src="{url action="assets/default-user.png"}" alt="User Picture" />
                        </a>
                        <a
                                href="{url action="profile" nickname={$post["nickname"]}}"
                                class="post__user"
                        >{$post["nickname"]}</a
                        >
                    </div>

                    {if $post["user_id"]==(\core\SessionUtils::load("id", true)) || \core\RoleUtils::inRole("moderator")}
                        <a href="{url action="edit_post_show" post_id={$post["id"]}}" class="post__more-options">
                            <svg
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                            >
                                <circle
                                        cx="6.5"
                                        cy="11.5"
                                        r="1.5"
                                        fill="var(--text-dark)"
                                />
                                <circle cx="12" cy="11.5" r="1.5" fill="var(--text-dark)" />
                                <circle
                                        cx="17.5"
                                        cy="11.5"
                                        r="1.5"
                                        fill="var(--text-dark)"
                                />
                            </svg>
                        </a>
                    {/if}
                </div>

                <div class="post__content">
                    <div class="post__medias">
                        <img
                                class="post__media"
                                src="{url action="assets/insta-clone.png"}"
                                alt="Post Content"
                        />
                    </div>
                </div>

                <div class="post__footer">
                    <div class="post__buttons">
                        <button class="post__button" onclick="likePost({$post["id"]})">
                            {if $post["is_liked"]}
                                <img width="20" id="{$post["id"]}likeimg" src="{url action="/assets/icons/heart-filled.png"}" alt="Polub">
                            {else}
                                <img width="20" id="{$post["id"]}likeimg" src="{url action="/assets/icons/heart.png"}" alt="Polub">
                            {/if}

                        </button>
                        <a class="post__button" href="{url action="comment_show" post_id=$post["id"]}">
                            <img  src="{url action="/assets/icons/comment.svg"}" alt="Skomentuj">
                        </a>


                    </div>

                    <div class="post__infos">
                        <div class="post__likes">
                    <span
                    ><b class="post__name--underline" id="{$post["id"]}likes">{$post["likes"]}</b> polubień, <b class="post__name--underline" id="{$post["id"]}comments">{$post["comments"]}</b> komentarzy
                        </div>

                        <div class="post__description">
                        <span>
                          <a
                                  class="post__name--underline"
                                  href="{url action="profile" nickname=$post["nickname"]}"
                          >{$post["nickname"]}</a
                          > {$post["body"]} </span>
                        </div>

                        <span class="post__date-time">Dodano {$post["createdAt"]}</span>
                    </div>
                </div>
            </article>
        {/strip}
    {/foreach}

{else}

    <p>Brak postów do wyświetlenia.</p>

{/if}

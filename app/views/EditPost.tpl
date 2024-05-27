{extends "./templates/Main.tpl"}

{block name="main"}
    <form class="post" action="{url action="edit_post" post_id=$post_id}" method="POST">
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

            <div class="post__infos">
                <div class="post__description" style="flex-direction:column; gap:5px">
                    <label for="postBody" style="padding-left: 2px;">Opis posta: </label>
                    <textarea name="body" id="postBody" placeholder="Opis posta (2-200 znaków)">{$form->body}</textarea>
                    <div style="display:flex; justify-content:flex-end;"><input type="submit" value="Edytuj post"></div>
                </div>

            </div>
        </div>
    </form>

    <form class="right" action="{url action="delete_post" post_id=$post_id}" method="POST">
        <input class="red" type="submit" value="Usuń post">
    </form>

{/block}
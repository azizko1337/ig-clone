{extends "./templates/Main.tpl"}

{block name="main"}
    {include "./components/Feed.tpl"}

    <article class="post padding">
        <form class="big" action="">
            <textarea res></textarea>
            <input type="submit" value="Skomentuj">
        </form>
    </article>

    <article class="post padding">
        <div class="post__description">
            <span>
              <a
                      class="post__name--underline"
                      href="https://github.com/leocosta1"
                      target="_blank"
              >leocosta1</a
              >
              Responsive clone of Instagram UI. Made with ❤ for study
              purposes.
            </span>
        </div>
    </article>
{/block}
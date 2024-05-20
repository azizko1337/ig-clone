<div class="side-menu__suggestions-section">
    <div class="side-menu__suggestions-header">
        <h2>Użytkownicy dla Ciebie</h2>
    </div>
    <div class="side-menu__suggestions-content">
        {foreach $suggestions as $suggestion}
            {strip}
                <div class="side-menu__suggestion">
                    <a href="profile/{$suggestion["nickname"]}" class="side-menu__suggestion-avatar">
                        <img src="assets/default-user.png" alt="{$suggestion["nickname"]} picture" />
                    </a>
                    <div class="side-menu__suggestion-info">
                        <a href="profile/{$suggestion["nickname"]}">{$suggestion["nickname"]}</a>
                        <span>{$suggestion["firstName"]} {$suggestion["lastName"]}</span>
                    </div>
                    <a href="profile/{$suggestion["nickname"]}" class="side-menu__suggestion-button">Profile</a>
                </div>
            {/strip}
        {/foreach}
    </div>
</div>
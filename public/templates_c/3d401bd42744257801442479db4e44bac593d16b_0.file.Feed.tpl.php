<?php
/* Smarty version 4.3.4, created on 2024-05-26 17:57:03
  from 'C:\xampp\htdocs\ig-clone\app\views\components\Feed.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66535bcf216cf7_54326291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d401bd42744257801442479db4e44bac593d16b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\components\\Feed.tpl',
      1 => 1716739022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66535bcf216cf7_54326291 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['posts']->value))) {?>
    <?php if (count($_smarty_tpl->tpl_vars['posts']->value) > 0) {?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
            <article class="post"><div class="post__header"><div class="post__profile"><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['post']->value["nickname"];
$_prefixVariable1 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_prefixVariable1),$_smarty_tpl ) );?>
"class="post__avatar" ><img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"assets/default-user.png"),$_smarty_tpl ) );?>
" alt="User Picture" /></a><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['post']->value["nickname"];
$_prefixVariable2 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_prefixVariable2),$_smarty_tpl ) );?>
"class="post__user"><?php echo $_smarty_tpl->tpl_vars['post']->value["nickname"];?>
</a></div><?php if ($_smarty_tpl->tpl_vars['post']->value["user_id"] == (\core\SessionUtils::load("id",true)) || \core\RoleUtils::inRole("moderator")) {?><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['post']->value["id"];
$_prefixVariable3 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"edit_post",'post_id'=>$_prefixVariable3),$_smarty_tpl ) );?>
" class="post__more-options"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" ><circle cx="6.5" cy="11.5" r="1.5"fill="var(--text-dark)" /><circle cx="12" cy="11.5" r="1.5" fill="var(--text-dark)" /><circle cx="17.5" cy="11.5" r="1.5"fill="var(--text-dark)" /></svg></a><?php }?></div><div class="post__content"><div class="post__medias"><img class="post__media" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"assets/insta-clone.png"),$_smarty_tpl ) );?>
"alt="Post Content" /></div></div><div class="post__footer"><div class="post__buttons"><button class="post__button" onclick="likePost(<?php echo $_smarty_tpl->tpl_vars['post']->value["id"];?>
)"><?php if ($_smarty_tpl->tpl_vars['post']->value["is_liked"]) {?><img width="20" id="<?php echo $_smarty_tpl->tpl_vars['post']->value["id"];?>
likeimg" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"/assets/icons/heart-filled.png"),$_smarty_tpl ) );?>
" alt="Polub"><?php } else { ?><img width="20" id="<?php echo $_smarty_tpl->tpl_vars['post']->value["id"];?>
likeimg" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"/assets/icons/heart.png"),$_smarty_tpl ) );?>
" alt="Polub"><?php }?></button><a class="post__button" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"comment_show",'post_id'=>$_smarty_tpl->tpl_vars['post']->value["id"]),$_smarty_tpl ) );?>
"><img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"/assets/icons/comment.svg"),$_smarty_tpl ) );?>
" alt="Skomentuj"></a></div><div class="post__infos"><div class="post__likes"><span ><b class="post__name--underline" id="<?php echo $_smarty_tpl->tpl_vars['post']->value["id"];?>
likes"><?php echo $_smarty_tpl->tpl_vars['post']->value["likes"];?>
</b> likes, <b class="post__name--underline" id="<?php echo $_smarty_tpl->tpl_vars['post']->value["id"];?>
comments"><?php echo $_smarty_tpl->tpl_vars['post']->value["comments"];?>
</b> comments</div><div class="post__description"><span><a class="post__name--underline" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['post']->value["nickname"]),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value["nickname"];?>
</a> <?php echo $_smarty_tpl->tpl_vars['post']->value["body"];?>
 </span></div><span class="post__date-time">Zapostowano <?php echo $_smarty_tpl->tpl_vars['post']->value["createdAt"];?>
</span></div></div></article>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php } else { ?>

        <p>Brak postów do wyświetlenia.</p>

    <?php }
}
}
}

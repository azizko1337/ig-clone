<?php
/* Smarty version 4.3.4, created on 2024-05-20 15:20:46
  from 'C:\xampp\htdocs\ig-clone\app\views\components\Feed.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_664b4e2eb58786_90377146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d401bd42744257801442479db4e44bac593d16b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\components\\Feed.tpl',
      1 => 1716211245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664b4e2eb58786_90377146 (Smarty_Internal_Template $_smarty_tpl) {
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
</a></div><?php if ($_smarty_tpl->tpl_vars['post']->value["user_id"] == \core\SessionUtils::load("id",true) || \core\RoleUtils::inRole("moderator")) {?><a href="<?php ob_start();
echo $_smarty_tpl->tpl_vars['post']->value["id"];
$_prefixVariable3 = ob_get_clean();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"edit_post",'post_id'=>$_prefixVariable3),$_smarty_tpl ) );?>
" class="post__more-options"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" ><circle cx="6.5" cy="11.5" r="1.5"fill="var(--text-dark)" /><circle cx="12" cy="11.5" r="1.5" fill="var(--text-dark)" /><circle cx="17.5" cy="11.5" r="1.5"fill="var(--text-dark)" /></svg></a><?php }?></div><div class="post__content"><div class="post__medias"><img class="post__media" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"assets/insta-clone.png"),$_smarty_tpl ) );?>
"alt="Post Content" /></div></div><div class="post__footer"><div class="post__buttons"><button class="post__button"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" ><path d="M11.4995 21.2609C11.1062 21.2609 10.7307 21.1362 10.4133 20.9001C8.2588 19.3012 3.10938 15.3239 1.81755 12.9143C0.127895 9.76543 1.14258 5.72131 4.07489 3.89968C5.02253 3.31177 6.09533 3 7.18601 3C8.81755 3 10.3508 3.66808 11.4995 4.85726C12.6483 3.66808 14.1815 3 15.8131 3C16.9038 3 17.9766 3.31177 18.9242 3.89968C21.8565 5.72131 22.8712 9.76543 21.186 12.9143C19.8942 15.3239 14.7448 19.3012 12.5902 20.9001C12.2684 21.1362 11.8929 21.2609 11.4995 21.2609ZM7.18601 4.33616C6.34565 4.33616 5.5187 4.57667 4.78562 5.03096C2.43888 6.49183 1.63428 9.74316 2.99763 12.2819C4.19558 14.5177 9.58639 18.6242 11.209 19.8267C11.3789 19.9514 11.6158 19.9514 11.7856 19.8267C13.4082 18.6197 18.799 14.5133 19.997 12.2819C21.3603 9.74316 20.5557 6.48738 18.209 5.03096C17.4804 4.57667 16.6534 4.33616 15.8131 4.33616C14.3425 4.33616 12.9657 5.04878 12.0359 6.28696L11.4995 7.00848L10.9631 6.28696C10.0334 5.04878 8.6611 4.33616 7.18601 4.33616Z"fill="var(--text-dark)" stroke="var(--text-dark)" stroke-width="0.6" /></svg></button><button class="post__button"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" ><path fill-rule="evenodd" clip-rule="evenodd" d="M21.2959 20.8165L20.2351 16.8602C20.1743 16.6385 20.2047 16.3994 20.309 16.1907C21.2351 14.3342 21.5438 12.117 20.9742 9.80402C20.2003 6.67374 17.757 4.16081 14.6354 3.33042C13.7833 3.10869 12.9442 3 12.1312 3C6.29665 3 1.74035 8.47365 3.31418 14.5647C4.04458 17.3819 7.05314 20.2992 9.88344 20.9861C10.6486 21.173 11.4008 21.26 12.1312 21.26C13.7006 21.26 15.1701 20.8557 16.4614 20.1601C16.6049 20.0818 16.7657 20.0383 16.9222 20.0383C17.0005 20.0383 17.0787 20.047 17.157 20.0688L21.009 21.0991C21.0307 21.1035 21.0525 21.1078 21.0699 21.1078C21.2177 21.1078 21.3351 20.9687 21.2959 20.8165ZM19.0178 17.1863L19.6178 19.4253L17.4831 18.8558C17.3005 18.8079 17.1135 18.7819 16.9222 18.7819C16.557 18.7819 16.1875 18.8775 15.8571 19.0558C14.6963 19.6818 13.4441 19.9992 12.1312 19.9992C11.4834 19.9992 10.8269 19.9166 10.1791 19.7601C7.78354 19.1775 5.14453 16.6037 4.53586 14.2473C3.90111 11.7865 4.40109 9.26057 5.90536 7.31719C7.40964 5.3738 9.6791 4.26081 12.1312 4.26081C12.8529 4.26081 13.5876 4.35646 14.3137 4.5521C16.9961 5.26511 19.0786 7.39544 19.7525 10.1084C20.2264 12.0213 20.0308 13.9299 19.183 15.6298C18.9395 16.1168 18.8787 16.6689 19.0178 17.1863Z"fill="var(--text-dark)" stroke="var(--text-dark)" stroke-width="0.7" /></svg></button></div><div class="post__infos"><div class="post__likes"><span ><b class="post__name--underline"><?php echo $_smarty_tpl->tpl_vars['post']->value["likes"];?>
</b> likes, <b class="post__name--underline"><?php echo $_smarty_tpl->tpl_vars['post']->value["comments"];?>
</b> comments</div><div class="post__description"><span><a class="post__name--underline" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['post']->value["nickname"]),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value["nickname"];?>
</a> <?php echo $_smarty_tpl->tpl_vars['post']->value["body"];?>
 </span></div><span class="post__date-time">Zapostowano <?php echo $_smarty_tpl->tpl_vars['post']->value["createdAt"];?>
</span></div></div></article>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
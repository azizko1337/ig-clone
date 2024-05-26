<?php
/* Smarty version 4.3.4, created on 2024-05-26 18:22:32
  from 'C:\xampp\htdocs\ig-clone\app\views\Comment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_665361c8651043_77905978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf9b5fbca8dddd907cbe02253eb3c2ebc952733d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\Comment.tpl',
      1 => 1716740540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/Feed.tpl' => 1,
  ),
),false)) {
function content_665361c8651043_77905978 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1964764907665361c8639830_49906617', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "./templates/Main.tpl");
}
/* {block "main"} */
class Block_1964764907665361c8639830_49906617 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_1964764907665361c8639830_49906617',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender("file:./components/Feed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <article class="post padding">
        <form class="big" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"comment_add",'post_id'=>$_smarty_tpl->tpl_vars['posts']->value[0]["id"]),$_smarty_tpl ) );?>
" method="POST">
            <div><label for="body">Treść komentarza:</label></div>
            <textarea id="body" name="body" placeholder="1-200 znaków"><?php echo $_smarty_tpl->tpl_vars['form']->value->body;?>
</textarea>
            <input type="submit" value="Skomentuj">
        </form>
    </article>

    <?php if ((isset($_smarty_tpl->tpl_vars['comments']->value)) && count($_smarty_tpl->tpl_vars['comments']->value) > 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comment');
$_smarty_tpl->tpl_vars['comment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->do_else = false;
?>
            <article class="post padding"><div class="post__description"><span><a class="post__name--underline" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['comment']->value["nickname"]),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value["nickname"];?>
</a><?php echo $_smarty_tpl->tpl_vars['comment']->value["body"];?>
</span></div><?php if ($_smarty_tpl->tpl_vars['comment']->value["user_id"] == (\core\SessionUtils::load("id",true)) || \core\RoleUtils::inRole("moderator")) {?><div class="delete_comment"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"comment_delete",'post_id'=>$_smarty_tpl->tpl_vars['posts']->value[0]["id"],'comment_id'=>$_smarty_tpl->tpl_vars['comment']->value["id"]),$_smarty_tpl ) );?>
"><img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"/assets/icons/delete.png"),$_smarty_tpl ) );?>
" alt="Delete comment"></a></div><?php }?></article>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <p>Brak komentarzy</p>
    <?php }?>


<?php
}
}
/* {/block "main"} */
}

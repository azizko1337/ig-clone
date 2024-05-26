<?php
/* Smarty version 4.3.4, created on 2024-05-26 13:48:46
  from 'C:\xampp\htdocs\ig-clone\app\views\Profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6653219e1e7cf3_14602349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e795bcb7878c3ee3fccfcbaf7c163ddd3463ee5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\Profile.tpl',
      1 => 1716724124,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/Feed.tpl' => 1,
  ),
),false)) {
function content_6653219e1e7cf3_14602349 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11921449206653219e1d0aa9_37703374', "main");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/Main.tpl");
}
/* {block "main"} */
class Block_11921449206653219e1d0aa9_37703374 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_11921449206653219e1d0aa9_37703374',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if ((isset($_smarty_tpl->tpl_vars['user']->value["id"]))) {?>
        <div class="side-menu__user-profile">
            <a
                    href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['user']->value["nickname"]),$_smarty_tpl ) );?>
"
                    class="side-menu__user-avatar"
            >
                <img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"assets/default-user.png"),$_smarty_tpl ) );?>
" alt="User Picture" />
            </a>
            <div class="side-menu__user-info">
                <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['user']->value["nickname"]),$_smarty_tpl ) );?>
"
                ><?php echo $_smarty_tpl->tpl_vars['user']->value["nickname"];?>
</a
                >
                <span><?php echo $_smarty_tpl->tpl_vars['user']->value["firstName"];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value["lastName"];?>
</span>
            </div>
            <button id="<?php echo ($_smarty_tpl->tpl_vars['user']->value["id"]).("isfollowed");?>
" onClick="followUser(<?php echo $_smarty_tpl->tpl_vars['user']->value["id"];?>
)" class="side-menu__suggestion-button"><?php if ($_smarty_tpl->tpl_vars['user']->value["is_followed"]) {?>Unfollow<?php } else { ?>Follow<?php }?></button>
        </div>
    <?php }?>
    <?php $_smarty_tpl->_subTemplateRender("file:components/Feed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block "main"} */
}

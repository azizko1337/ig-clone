<?php
/* Smarty version 4.3.4, created on 2024-05-27 14:54:58
  from 'C:\xampp\htdocs\ig-clone\app\views\SearchUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_665482a2eac717_46211948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0d59de291e46b379e0aaaeeb36d21d49d73d738' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\SearchUser.tpl',
      1 => 1716750117,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_665482a2eac717_46211948 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1278845634665482a2e98ad7_23270277', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/Main.tpl");
}
/* {block "main"} */
class Block_1278845634665482a2e98ad7_23270277 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_1278845634665482a2e98ad7_23270277',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Wyniki wyszukiwania:</h1>
    <?php if ((isset($_smarty_tpl->tpl_vars['users']->value)) && count($_smarty_tpl->tpl_vars['users']->value) > 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
        <div class="side-menu__user-profile"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['user']->value["nickname"]),$_smarty_tpl ) );?>
"class="side-menu__user-avatar" ><img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"assets",'asset'=>"default-user.png"),$_smarty_tpl ) );?>
" alt="User Picture" /></a><div class="side-menu__user-info"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['user']->value["nickname"]),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value["nickname"];?>
</a><span><?php echo $_smarty_tpl->tpl_vars['user']->value["firstName"];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value["lastName"];?>
</span></div></div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
        <p>Brak pasujących użytkowników.</p>
    <?php }
}
}
/* {/block "main"} */
}

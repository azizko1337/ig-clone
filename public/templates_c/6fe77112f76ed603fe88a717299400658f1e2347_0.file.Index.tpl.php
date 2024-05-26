<?php
/* Smarty version 4.3.4, created on 2024-05-26 18:05:25
  from 'C:\xampp\htdocs\ig-clone\app\views\Index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66535dc5b5fa75_72485844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fe77112f76ed603fe88a717299400658f1e2347' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\Index.tpl',
      1 => 1716739523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/Feed.tpl' => 1,
    'file:components/Suggestions.tpl' => 1,
  ),
),false)) {
function content_66535dc5b5fa75_72485844 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_49987652366535dc5b52894_81820341', "main");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_31940332366535dc5b56053_41080246', "aside");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/Main.tpl");
}
/* {block "main"} */
class Block_49987652366535dc5b52894_81820341 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_49987652366535dc5b52894_81820341',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="content">

    <div class="posts">
      <?php $_smarty_tpl->_subTemplateRender("file:components/Feed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
  </div>
<?php
}
}
/* {/block "main"} */
/* {block "aside"} */
class Block_31940332366535dc5b56053_41080246 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'aside' => 
  array (
    0 => 'Block_31940332366535dc5b56053_41080246',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="side-menu__user-profile">
    <a
            href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['user']->value["nickname"]),$_smarty_tpl ) );?>
"
            class="side-menu__user-avatar"
    >
      <img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"assets",'asset'=>"default-user.png"),$_smarty_tpl ) );?>
" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value["nickname"];?>
' picture" />
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
  </div>

  <?php $_smarty_tpl->_subTemplateRender("file:components/Suggestions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block "aside"} */
}

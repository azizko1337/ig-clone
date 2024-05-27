<?php
/* Smarty version 4.3.4, created on 2024-05-27 16:58:15
  from 'C:\xampp\htdocs\ig-clone\app\views\components\Suggestions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66549f87d593a7_47650186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c1f41cef038c98ce8289bb8f0724e941c49f69f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\components\\Suggestions.tpl',
      1 => 1716821893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66549f87d593a7_47650186 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="side-menu__suggestions-section">
    <?php if (count($_smarty_tpl->tpl_vars['suggestions']->value) > 0) {?>
        <div class="side-menu__suggestions-header">
            <h2>Użytkownicy dla Ciebie</h2>
        </div>
        <div class="side-menu__suggestions-content">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['suggestions']->value, 'suggestion');
$_smarty_tpl->tpl_vars['suggestion']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['suggestion']->value) {
$_smarty_tpl->tpl_vars['suggestion']->do_else = false;
?>
                <div class="side-menu__suggestion"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['suggestion']->value["nickname"]),$_smarty_tpl ) );?>
" class="side-menu__suggestion-avatar"><img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"assets",'asset'=>"default-user.png"),$_smarty_tpl ) );?>
" alt="<?php echo $_smarty_tpl->tpl_vars['suggestion']->value["nickname"];?>
 picture" /></a><div class="side-menu__suggestion-info"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['suggestion']->value["nickname"]),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['suggestion']->value["nickname"];?>
</a><span><?php echo $_smarty_tpl->tpl_vars['suggestion']->value["firstName"];?>
 <?php echo $_smarty_tpl->tpl_vars['suggestion']->value["lastName"];?>
</span></div><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"profile",'nickname'=>$_smarty_tpl->tpl_vars['suggestion']->value["nickname"]),$_smarty_tpl ) );?>
" class="side-menu__suggestion-button">Profile</a></div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    <?php }?>
</div><?php }
}

<?php
/* Smarty version 4.3.4, created on 2024-05-20 12:50:56
  from 'C:\xampp\htdocs\ig-clone\app\views\auth\Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_664b2b10232ef5_13840347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40cfc97406d6a50566ad891ca51b5543a373e922' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\auth\\Login.tpl',
      1 => 1716124342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664b2b10232ef5_13840347 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_612733561664b2b1022ed57_76698120', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block "main"} */
class Block_612733561664b2b1022ed57_76698120 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_612733561664b2b1022ed57_76698120',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Logowanie</h1>
    <form action="login" method="POST">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nickname;?>
">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
">
        <input type="submit" value="Zaloguj">
    </form>
<?php
}
}
/* {/block "main"} */
}

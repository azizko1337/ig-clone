<?php
/* Smarty version 4.3.4, created on 2024-05-20 13:41:43
  from 'C:\xampp\htdocs\ig-clone\app\views\auth\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_664b36f7ed76b7_58565214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91419af00925c821f2d921d19d00aa4b8dc35e9c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\auth\\Register.tpl',
      1 => 1716127836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664b36f7ed76b7_58565214 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1528377583664b36f7ed19a5_60205514', "main");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/Main.tpl");
}
/* {block "main"} */
class Block_1528377583664b36f7ed19a5_60205514 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_1528377583664b36f7ed19a5_60205514',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Rejestracja</h1>
    <form action="register" method="POST">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nickname;?>
">
        <label for="firstName">Imię</label>
        <input id="firstName" name="firstName" type="text" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->firstName;?>
">
        <label for="lastName">Nazwisko</label>
        <input id="lastName" name="lastName" type="text" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lastName;?>
">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
">
        <label for="repeatedPassword">Powtórz hasło</label>
        <input id="repeatedPassword" name="repeatedPassword" type="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->repeatedPassword;?>
">
        <input type="submit" value="Zarejestruj">
    </form>
<?php
}
}
/* {/block "main"} */
}

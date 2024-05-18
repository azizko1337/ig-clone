<?php
/* Smarty version 4.3.4, created on 2024-05-18 12:32:33
  from 'C:\xampp\htdocs\ig-clone\app\views\auth\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_664883c1cd7497_87355125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91419af00925c821f2d921d19d00aa4b8dc35e9c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\auth\\Register.tpl',
      1 => 1715976490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664883c1cd7497_87355125 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1466074342664883c1cd6b74_34209011', "main");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block "main"} */
class Block_1466074342664883c1cd6b74_34209011 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_1466074342664883c1cd6b74_34209011',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Rejestracja</h1>
    <form action="">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text">
        <label for="firstName">Imię</label>
        <input id="firstName" name="firstName" type="text">
        <label for="lastName">Nazwisko</label>
        <input id="lastName" name="lastName" type="text">
        <label for="email">Email</label>
        <input id="email" name="email" type="email">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password">
        <label for="repeatedPassword">Powtórz hasło</label>
        <input id="repeatedPassword" name="repeatedPassword" type="password">
        <input type="submit" value="Zarejestruj">
    </form>
<?php
}
}
/* {/block "main"} */
}

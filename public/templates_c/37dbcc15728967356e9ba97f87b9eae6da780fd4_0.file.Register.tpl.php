<?php
/* Smarty version 4.3.4, created on 2024-05-17 21:57:44
  from 'C:\xampp\htdocs\ig-clone\app\views\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6647b6b881d475_43027546',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37dbcc15728967356e9ba97f87b9eae6da780fd4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\Register.tpl',
      1 => 1715975860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6647b6b881d475_43027546 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5389466546647b6b881c1e3_39056039', "main");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7508758576647b6b881ce44_01015021', "aside");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block "main"} */
class Block_5389466546647b6b881c1e3_39056039 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_5389466546647b6b881c1e3_39056039',
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
/* {block "aside"} */
class Block_7508758576647b6b881ce44_01015021 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'aside' => 
  array (
    0 => 'Block_7508758576647b6b881ce44_01015021',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "aside"} */
}

<?php
/* Smarty version 4.3.4, created on 2024-05-17 22:08:22
  from 'C:\xampp\htdocs\ig-clone\app\views\Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6647b936a45e28_78381751',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e158bfb4d42200bcfcd1aaa4807891690ce5c86d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\Login.tpl',
      1 => 1715976498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6647b936a45e28_78381751 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20045247676647b936a45630_07400651', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "Main.tpl");
}
/* {block "main"} */
class Block_20045247676647b936a45630_07400651 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_20045247676647b936a45630_07400651',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Logowanie</h1>
    <form action="">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text">
        <label for="password">Hasło</label>
        <input id="password" name="password" type="password">
        <input type="submit" value="Zaloguj">
    </form>
<?php
}
}
/* {/block "main"} */
}

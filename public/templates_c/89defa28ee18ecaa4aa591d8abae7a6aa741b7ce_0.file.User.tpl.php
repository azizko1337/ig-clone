<?php
/* Smarty version 4.3.4, created on 2024-05-18 12:40:58
  from 'C:\xampp\htdocs\ig-clone\app\views\auth\User.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_664885ba291ae4_85865034',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89defa28ee18ecaa4aa591d8abae7a6aa741b7ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\auth\\User.tpl',
      1 => 1716028857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664885ba291ae4_85865034 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_415697682664885ba291049_14615228', "main");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/Main.tpl");
}
/* {block "main"} */
class Block_415697682664885ba291049_14615228 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_415697682664885ba291049_14615228',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Twoje dane</h1>
    <form action="">
        <label for="nickname">Nazwa użytkownika</label>
        <input id="nickname" name="nickname" type="text">
        <label for="firstName">Imię</label>
        <input id="firstName" name="firstName" type="text">
        <label for="lastName">Nazwisko</label>
        <input id="lastName" name="lastName" type="text">
        <label for="email">Email</label>
        <input id="email" name="email" type="email">
        <label for="password">Obecne hasło</label>
        <input id="password" name="password" type="password">
        <label for="newPassword">Nowe hasło</label>
        <input id="newPassword" name="newPassword" type="password" placeholder="(wypełnij jeśli chcesz zmienić hasło)">
        <label for="repeatedNewPassword">Powtórz nowe hasło</label>
        <input id="repeatedNewPassword" name="repeatedNewPassword" type="password" placeholder="(wypełnij jeśli chcesz zmienić hasło)">
        <input type="submit" value="Edytuj dane">
    </form>
    <form action="">
        <input class="red" type="submit" value="Usuń konto">
    </form>
<?php
}
}
/* {/block "main"} */
}

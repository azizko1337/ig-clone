<?php
/* Smarty version 4.3.4, created on 2024-05-19 16:16:15
  from 'C:\xampp\htdocs\ig-clone\app\views\auth\User.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_664a09af00c3d1_69497117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89defa28ee18ecaa4aa591d8abae7a6aa741b7ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\auth\\User.tpl',
      1 => 1716128174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664a09af00c3d1_69497117 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_313971224664a09af0053b5_99058539', "main");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/Main.tpl");
}
/* {block "main"} */
class Block_313971224664a09af0053b5_99058539 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_313971224664a09af0053b5_99058539',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Twoje dane</h1>
    <form action="user" method="POST">
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
        <label for="password">Obecne hasło</label>
        <input id="password" name="password" type="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
">
        <label for="newPassword">Nowe hasło</label>
        <input id="newPassword" name="newPassword" type="password" placeholder="(wypełnij jeśli chcesz zmienić hasło)"  value="<?php echo $_smarty_tpl->tpl_vars['form']->value->newPassword;?>
">
        <label for="repeatedNewPassword">Powtórz nowe hasło</label>
        <input id="repeatedNewPassword" name="repeatedNewPassword" type="password" placeholder="(wypełnij jeśli chcesz zmienić hasło)" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->repeatedNewPassword;?>
">
        <input type="submit" value="Edytuj dane">
    </form>
    <hr>
    <h1>Wylogowanie</h1>
    <form action="logout" method="POST">
        <input type="submit" value="Wyloguj">
    </form>
    <hr>
    <h1>Usuwanie konta</h1>
    <form action="user_delete" method="POST">
        <label for="password_delete">Obecne hasło</label>
        <input id="password_delete" name="password" type="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
">
        <input class="red" type="submit" value="Usuń konto">
    </form>
<?php
}
}
/* {/block "main"} */
}

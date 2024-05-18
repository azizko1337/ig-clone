<?php
/* Smarty version 4.3.4, created on 2024-05-18 11:42:47
  from 'C:\xampp\htdocs\ig-clone\app\views\SearchUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6648781769c706_85763598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0d59de291e46b379e0aaaeeb36d21d49d73d738' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\SearchUser.tpl',
      1 => 1716025366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6648781769c706_85763598 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3947453946648781769bd51_33276793', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/Main.tpl");
}
/* {block "main"} */
class Block_3947453946648781769bd51_33276793 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_3947453946648781769bd51_33276793',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="side-menu__user-profile">
        <a
                href="https://github.com/leocosta1"
                target="_blank"
                class="side-menu__user-avatar"
        >
            <img src="assets/default-user.png" alt="User Picture" />
        </a>
        <div class="side-menu__user-info">
            <a href="https://github.com/leocosta1" target="_blank"
            >leocosta1</a
            >
            <span>Leonardo Costa</span>
        </div>
    </div>
<?php
}
}
/* {/block "main"} */
}

<?php
/* Smarty version 4.3.4, created on 2024-05-18 11:47:57
  from 'C:\xampp\htdocs\ig-clone\app\views\User.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6648794d91d633_37652373',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0574ede5ee842e61eb3b383c75b4057f1e2c22bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\User.tpl',
      1 => 1716025676,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/Feed.tpl' => 1,
  ),
),false)) {
function content_6648794d91d633_37652373 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7228140626648794d91a087_10889539', "main");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/Main.tpl");
}
/* {block "main"} */
class Block_7228140626648794d91a087_10889539 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_7228140626648794d91a087_10889539',
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
        <button class="side-menu__suggestion-button">Follow</button>
    </div>

    <?php $_smarty_tpl->_subTemplateRender("file:components/Feed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block "main"} */
}

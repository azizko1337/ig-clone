<?php
/* Smarty version 4.3.4, created on 2024-05-18 12:21:59
  from 'C:\xampp\htdocs\ig-clone\app\views\Index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66488147126192_04223334',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6fe77112f76ed603fe88a717299400658f1e2347' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\Index.tpl',
      1 => 1716027718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:components/Feed.tpl' => 1,
    'file:components/Suggestions.tpl' => 1,
  ),
),false)) {
function content_66488147126192_04223334 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1330993809664881471215a0_57909007', "main");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1220221748664881471254f6_44337727', "aside");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/Main.tpl");
}
/* {block "main"} */
class Block_1330993809664881471215a0_57909007 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_1330993809664881471215a0_57909007',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <div class="content">

    <div class="posts">
      <?php $_smarty_tpl->_subTemplateRender("file:components/Feed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
  </div>
<?php
}
}
/* {/block "main"} */
/* {block "aside"} */
class Block_1220221748664881471254f6_44337727 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'aside' => 
  array (
    0 => 'Block_1220221748664881471254f6_44337727',
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

  <?php $_smarty_tpl->_subTemplateRender("file:components/Suggestions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block "aside"} */
}

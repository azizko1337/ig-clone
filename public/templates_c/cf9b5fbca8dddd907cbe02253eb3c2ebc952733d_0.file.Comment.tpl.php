<?php
/* Smarty version 4.3.4, created on 2024-05-18 13:23:27
  from 'C:\xampp\htdocs\ig-clone\app\views\Comment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66488faf0991a6_27793408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf9b5fbca8dddd907cbe02253eb3c2ebc952733d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\Comment.tpl',
      1 => 1716031406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./components/Feed.tpl' => 1,
  ),
),false)) {
function content_66488faf0991a6_27793408 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_194033986266488faf0944e4_73927474', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "./templates/Main.tpl");
}
/* {block "main"} */
class Block_194033986266488faf0944e4_73927474 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_194033986266488faf0944e4_73927474',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender("file:./components/Feed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <article class="post padding">
        <form class="big" action="">
            <textarea res></textarea>
            <input type="submit" value="Skomentuj">
        </form>
    </article>

    <article class="post padding">
        <div class="post__description">
            <span>
              <a
                      class="post__name--underline"
                      href="https://github.com/leocosta1"
                      target="_blank"
              >leocosta1</a
              >
              Responsive clone of Instagram UI. Made with ❤ for study
              purposes.
            </span>
        </div>
    </article>
<?php
}
}
/* {/block "main"} */
}

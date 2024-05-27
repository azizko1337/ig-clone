<?php
/* Smarty version 4.3.4, created on 2024-05-27 16:55:26
  from 'C:\xampp\htdocs\ig-clone\app\views\EditPost.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_66549edef3d585_05788871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b5ace22d692009553696218cc94efcc1a51fcc7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\EditPost.tpl',
      1 => 1716821711,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66549edef3d585_05788871 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_89349706466549edef35fa5_30503937', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "./templates/Main.tpl");
}
/* {block "main"} */
class Block_89349706466549edef35fa5_30503937 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_89349706466549edef35fa5_30503937',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form class="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"edit_post",'post_id'=>$_smarty_tpl->tpl_vars['post_id']->value),$_smarty_tpl ) );?>
" method="POST">
        <div class="post__content">
            <div class="post__medias">
                <img
                        class="post__media"
                        src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"assets/insta-clone.png"),$_smarty_tpl ) );?>
"
                        alt="Post Content"
                />
            </div>
        </div>

        <div class="post__footer">

            <div class="post__infos">
                <div class="post__description" style="flex-direction:column; gap:5px">
                    <label for="postBody" style="padding-left: 2px;">Opis posta: </label>
                    <textarea name="body" id="postBody" placeholder="Opis posta (2-200 znaków)"><?php echo $_smarty_tpl->tpl_vars['form']->value->body;?>
</textarea>
                    <div style="display:flex; justify-content:flex-end;"><input type="submit" value="Edytuj post"></div>
                </div>

            </div>
        </div>
    </form>

    <form class="right" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"delete_post",'post_id'=>$_smarty_tpl->tpl_vars['post_id']->value),$_smarty_tpl ) );?>
" method="POST">
        <input class="red" type="submit" value="Usuń post">
    </form>

<?php
}
}
/* {/block "main"} */
}

<?php
/* Smarty version 4.3.4, created on 2024-05-18 13:52:56
  from 'C:\xampp\htdocs\ig-clone\app\views\AddPost.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_664896982e7580_49596774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a9747c55e0c11f45fa09d1cc7c0216be66f1d68' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ig-clone\\app\\views\\AddPost.tpl',
      1 => 1716033174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664896982e7580_49596774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1324752616664896982e6cd9_96697222', "main");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "./templates/Main.tpl");
}
/* {block "main"} */
class Block_1324752616664896982e6cd9_96697222 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'main' => 
  array (
    0 => 'Block_1324752616664896982e6cd9_96697222',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form class="post">
        <div class="post__content">
            <div class="post__medias">
                <img
                        class="post__media"
                        src="assets/insta-clone.png"
                        alt="Post Content"
                />
            </div>
        </div>

        <div class="post__footer">

            <div class="post__infos">
                <div class="post__description" style="flex-direction:column; gap:5px">
                    <label for="postBody" style="padding-left: 2px;">Opis posta: </label>
                    <textarea name="body" id="postBody" placeholder="Opis posta (2-200 znaków)"></textarea>
                    <div style="display:flex; justify-content:flex-end;"><input type="submit" value="Dodaj post"></div>
                </div>

            </div>
        </div>
    </form>
<?php
}
}
/* {/block "main"} */
}

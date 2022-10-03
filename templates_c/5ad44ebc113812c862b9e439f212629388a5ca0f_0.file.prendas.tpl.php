<?php
/* Smarty version 4.2.1, created on 2022-10-03 02:48:16
  from 'C:\xampp\htdocs\proyects\TPE-WebII\TPWeb2\templates\prendas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633a3150728a20_20636303',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ad44ebc113812c862b9e439f212629388a5ca0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\TPE-WebII\\TPWeb2\\templates\\prendas.tpl',
      1 => 1664758090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633a3150728a20_20636303 (Smarty_Internal_Template $_smarty_tpl) {
?>
<body>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prendas']->value, 'Clothes');
$_smarty_tpl->tpl_vars['Clothes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['Clothes']->value) {
$_smarty_tpl->tpl_vars['Clothes']->do_else = false;
?>
            <li>Prenda:<?php echo $_smarty_tpl->tpl_vars['Clothes']->value->prenda;?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['Clothes']->value->tipo_de_tela;?>
</li>
           <button><a href=Clothing/GetClothing<?php echo $_smarty_tpl->tpl_vars['Clothes']->value->id;?>
>Ver detalles</a></button>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</body>
<?php }
}

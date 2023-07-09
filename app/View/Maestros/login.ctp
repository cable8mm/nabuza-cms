<style>
#content DIV.centerBox {
	width:400px;
	height:400px;
	border:1px solid #CBCBCB;
	padding:10px 30px 10px 30px;
	margin:auto;
}
</style>
<div class="centerBox">
<?php //=$html->image('http://i.adoneclick.com/home/bi.gif')?>
<?php echo $this->form->create('Maestro', array('action'=>'login')) ?>
<?php echo $this->form->input('Maestro.username') ?>
<?php echo $this->form->input('Maestro.password') ?>
<?php echo $this->form->submit() ?>
<?php echo $this->form->end() ?>
<?php echo $this->Session->flash(); ?>
* <?php echo __('If you didn\'t have a permission, please don\'t make it up.')?><br /><br />
</div>
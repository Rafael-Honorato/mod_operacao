<?php 
// No direct access
defined('_JEXEC') or die; ?>
<div class="inputs container">
	<div class="row">
		<div class="col-md fields">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" >R$</label>
				</div>
			  <input class="form-control field mask" value="" placeholder="Digite o valor" required/>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" >R$</label>
				</div>
			  <input class="form-control field mask" value="" placeholder="Digite o valor" />
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" >R$</label>
				</div>
			  <input class="form-control field mask" value="" placeholder="Digite o valor" /><button type="button" class="btn btn-primary add" style="margin-left: 10px">+</button>	
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">		
			<div class="input-group mb-3">
				<button type="button" class="btn btn-primary calcular" value="m" style="margin-right: 10px">Calcular</button>
				<div class="input-group-prepend">
					<label class="input-group-text" >Meses</label>
				</div>

				<select class="custom-select">
					<option value="3">3</option>
					<option value="6">6</option>
					<option value="12" selected>12</option>
				</select>

			</div>
		</div>
	</div>

	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<label class="input-group-text" >Total R$</label>
		</div>
		<input type="text" class="soma mask" placehoder="Total" disabled="disabled">
	</div>
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<label class="input-group-text" >Média R$</label>
		</div>
		<input type="text" class="media mask" placehoder="Total" disabled="disabled">
	</div>
</div>

<script type="text/javascript">
	
</script>


<?php
JHtml::_('jquery.framework');
JHtml::script(Juri::base() . 'media/mod_operacao/js/jquery.maskMoney.js');

$document = JFactory::getDocument();
$document->addScriptDeclaration("
	jQuery( document ).ready(function($) {

		$('.mask').maskMoney()

 		$('.add').click(function(){
 			$('.fields').prepend('<div class=\"input-group mb-3\"><div class=\"input-group-prepend\"><label class=\"input-group-text\" >R$</label></div><input class=\"form-control field mask\" placeholder=\"Digite o valor\" /></div>');
 			$('.mask').maskMoney()
 		})

 		$('.calcular').click(function(){
 			var media = $( \".custom-select option:selected\" ).val();
 			let sum = 0
 			$('.field').each(function(){
 				if(!$(this).val())
 					return
		        sum += parseInt($(this).maskMoney('unmasked')[0]);
		    });
		    


		    $('.soma').val(sum.toFixed(2)).maskMoney('mask');
		    $('.media').val((sum / media).toFixed(2)).maskMoney('mask')
 		})

	});
");

?>


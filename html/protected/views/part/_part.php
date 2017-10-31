<?php
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	echo CHtml::form('/path','GET');
	echo CHtml::textField('text','valet');
	echo CHtml::submitButton('Отправка');
	echo CHtml::endForm();
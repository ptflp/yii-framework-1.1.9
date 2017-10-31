<?php
foreach ($models as $model) {
	$title = CHtml::encode($model->title);
	echo CHtml::link($title, '/site');
	echo '<hr/>';
}
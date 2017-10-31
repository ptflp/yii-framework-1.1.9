<?php
foreach ($models as $model) {
	$title = CHtml::encode($model->title);
	echo CHtml::link($title, array('page/view', 'id'=>$model->id));
	echo '<hr/>';
}
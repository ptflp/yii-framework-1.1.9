<?php
foreach ($models as $model) {
	$title = CHtml::encode($model->title);
	echo CHtml::link($title, array('page/view', 'id'=>$model->id),array('target'=>'_blank','id'=>$model->id, 'sfsfs'=>'afsf'));
	echo '<hr/>';
}
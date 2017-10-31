<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'Update Page', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Page', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<h1>View Page #<?php echo $model->id; ?></h1>
// Табличная Вьюха показывает детэйл 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'text' => array(
			'label' => 'Текст2', // Отображение в вьюхе таблицы
			'value' => $model->text // value
		),
		array (
			'label'=>'City',
			'type' => 'raw', // disactivate html escape tags, pasting code as is
			'value' => CHtml::link(CHtml::encode($model->title),
				array('city/view','id'=>$model->title)),
		),
	),
)); ?>

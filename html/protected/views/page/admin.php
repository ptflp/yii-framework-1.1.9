<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление страницами</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model, // фильтр
	'selectableRows' => 2,
	'columns'=>array(  // какие колонки выводить
		array(
			'class' => 'CCheckBoxColumn',
			'id' => 'checked'
		),
		array(
			'name' => 'id',
			'header' => 'Айди',
			'headerHtmlOptions' => array('width' => 160),
			'value' => '"Страница ".$data->id',
			'cssClassExpression' => '($data->id > 5)?"my":""',
			'htmlOptions' => array ('class'=>'asfsa') //php код в кавычках!
		),
		'title',
		'text',
		array(
			'class'=>'CButtonColumn',
			'deleteButtonOptions' => array ('style' => 'display:none'),
		),
	),
)); ?>

<?php

class BookController extends Controller
{
	public function actionIndex($id = false)
	{		
		$criteria = new CDbCriteria;
		$criteria->condition='id=7';
		$criteria->order='id ASC';
		$criteria->limit=10;
		$num = 3;
		$arr = Book::model()->find($criteria); //передача через array экранирует все символы
		//echo $id;			
		$a = Book::model()->findByPk($id);
		$f='Переменная $f';
		$D='Переменная $D';		
		$v = $this->render('index',array('model'=>$a,'f'=>$f,'D'=>$D),true); //Передача переменных в View
		echo $v;

	}
	public function actionSql()
	{
		echo 'findByPk Поиск по первичному ключу<br>';
		$arr = Book::model()->findByPk(2);
		echo $arr->title;
		echo '<pre>';
		print_r($arr);
		echo '</pre>';

		echo 'findAllByPk Поиск по нескольким первичным ключам array(2,3,4,5);<br>';
		$search=['1','2','3','4'];
		$arr = Book::model()->findAllByPk($search);
		foreach ($arr as $key => $value) {
			echo '<br>';
			echo $value->title;
		}
		echo '<pre>';
		print_r($arr);
		echo '</pre>';


		echo 'find Поиск функцией find задаем свое условие<br>'; //find вывод первого результат
		$num = 3;
		$arr = Book::model()->find('id<:num',array(':num'=> $num)); //передача через array экранирует все символы
		echo '<pre>';
		print_r($arr);
		echo '</pre>';

		echo 'findAll Поиск функцией findAll вывод всех результатов<br>';
		$arr = Book::model()->findAll('id<=:num',array(':num'=> $num)); //findAll вывод всех результатов
		foreach ($arr as $key => $value) {
			echo '<br>';
			echo $value->title;
		}
		echo '<pre>';
		print_r($arr);
		echo '</pre>';

		echo 'findByAttributes Поиск по аттрибутам';
		$arr = Book::model()->findByAttributes(array('id'=>array('1','2','3'), 'title'=>'Война и мир')); 
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
		echo 'findAllByAttributes Поиск по аттрибутам вывод всех результатов';
		$arr = Book::model()->findAllByAttributes(array('id'=>array('1','2','3'), 'title'=>'Война и мир')); 
		echo '<pre>';
		print_r($arr);
		echo '</pre>';

		echo 'findBySql Поиск по запросу SQl';
		$num=5435;
		$arr = Book::model()->findBySql('SELECT title,author FROM {{book}} WHERE year = :num', array(':num'=> $num)); 
		echo '<pre>';
		print_r($arr);
		echo '</pre>';
		$arr = Book::model()->findAllBySql('SELECT title,author FROM {{book}} WHERE year = :num', array(':num'=> $num)); 
		echo '<pre>';
		print_r($arr);
		echo '</pre>';

		echo 'Count';
		$num = 5435;
		$arr = Book::model()->count('year=:num',array(':num'=> $num)); //передача через array экранирует все символы
		echo '<pre>';
		print_r($arr);
		echo '</pre>';

		echo 'Count по SQL запросу';
		$arr = Book::model()->countBySql('SELECT count(title) FROM {{book}} WHERE year = :num', array(':num'=> $num)); 
		echo '<pre>';
		print_r($arr);
		echo '</pre>';

		echo 'updateByPk Изменение нескольких строк по ключам';
		$arr = Book::model()->updateByPk($search,array('title'=>'asфыафыаfasfa'));
		echo '<pre>';
		print_r($arr);
		boolval($arr);
		echo '</pre>';

		echo 'updateAll Изменение нескольких строк по любому полю';
		$arr = Book::model()->updateAll(array('author'=>'Chuchundra'),'title="asфыафыаfasfa"');
		echo '<pre>';
		print_r($arr);
		boolval($arr);
		echo '</pre>';

		echo 'deleteByPk удаление по ключу';
		$arr = Book::model()->deleteByPk(1);
		echo '<pre>';
		print_r($arr);
		boolval($arr);
		echo '</pre>';


		echo 'deleteByPk удаление по ключу';
		$title='test';
		$arr = Book::model()->deleteAll('title=:title',array(':title'=>$title));
		echo '<pre>';
		print_r($arr);
		boolval($arr);
		echo '</pre>';


		echo 'CDbCriteria';
		$criteria = new CDbCriteria;
		$criteria->condition='id=7';
		$criteria->order='id ASC';
		$criteria->limit=10;
		$num = 3;
		$arr = Book::model()->find($criteria); //передача через array экранирует все символы
		echo '<pre>';
		print_r($arr);
		echo '</pre>';

	}
	public function actionSave()
	{
		// Запись через ORM ActiveRecord
		$model = new Book;
		$model->title = 'Анна Каренина';
		$model->author = 'Л. Толстой';
		$model->year = '5435';
		$model->save(false);
		
		echo '<pre>';
		print_r($model);
		echo '</pre>';
	}
	public function actionSave2()
	{
		// Запись через ORM ActiveRecord
		$a = new Book;
		$a->title = 'Book of type';
		$a->author = 'Л. Толстой';
		$a->year = '1980';
		$a->save(false);
		
		echo '<pre>';
		print_r($a);
		echo '</pre>';

		//Для новой записи нужно сбросить id
		$a->id = false;
		$a->isNewRecord= true;
		$a->title = 'Колесо времени';
		$a->author = 'Каренин';
		$a->year = '1978';
		$a->save(false);


	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
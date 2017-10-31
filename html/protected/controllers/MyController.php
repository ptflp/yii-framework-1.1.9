<?php
/**
* 
*/
class MyController extends Controller
{
	
	public $defaultAction = 'one';
	
	public function actionOne()
	{
		echo '111';
	}
	public function actionTwo() {
		echo 'one';
	}
}
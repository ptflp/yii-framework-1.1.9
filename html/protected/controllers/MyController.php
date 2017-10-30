<?php
/**
* 
*/
class MyController extends Controller
{
	
	public function actionOne()
	{
		echo '111';
		echo $this->one();
	}
	private function one() {
		return 'one';
	}
}
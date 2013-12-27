<?php 

class PagesController extends BaseController{

	/*public function getIndex(){
		return 'index';
	}

	public function getFoo(){
		return 'foo';
	}*/

	public function getHello(){

		$name = DB::table('people')->pluck('name');
		return View::make('hello')->with('namea',$name);
		
	}
}

 ?>
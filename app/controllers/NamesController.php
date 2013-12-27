<?php 

/**
* 
*/
class NamesController extends BaseController
{

	public function getIndex(){

		/*$folks = DB::table('people')->get();*/
		$folks = Person::all();
		/*die(var_dump($folks->toArray()));*/
		return View::make('names.index')->with('folks',$folks); 
	}
	
	public function getCreate(){

		return View::make('names.create');
	}

	public function postCreate(){
		$name = Input::get('name');

		Person::create(['name'=>$name]);

		return Redirect:: to('/names');
	}

	/*public function getShow(){
		return Redirect:: to('names');
	}
*/
	public function getShow($id){

		/*return $id;*/

		/*$person = DB::table('people')->find($id);*/

		$person = Person::find($id);

		if($person == null){
			return Redirect:: to('names');
		}

		return View::make('names.personPage')->with('person',$person);

	}
}

 ?>
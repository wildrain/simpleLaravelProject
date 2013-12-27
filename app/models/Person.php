<?php 

/**
* 
*/
class Person extends Eloquent
{
	
	protected $guarded = [];
	public $timestamps = false;


	public function scopeByFirstLetter($query,$letter){

		return $query->where('name','LIKE',"$letter%");
	}
	
}

 ?>
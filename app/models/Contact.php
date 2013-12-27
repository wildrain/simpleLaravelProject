<?php

class Contact extends Eloquent {
	protected $guarded = array();

	protected $table = 'contacts';

	public $timestamps = false;

	public static $rules = array();
}

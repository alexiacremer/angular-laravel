<?php

class Product extends Eloquent
{

	protected $guarded = ['id'];

	public function getPublishedAttribute($value)
	{
		return (boolean)$value;
	}
}
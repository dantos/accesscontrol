<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementType extends Model
{
	public function elementBase() {
		return $this->hasMany( 'App\Models\ElementBase');
	}
}

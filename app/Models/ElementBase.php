<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElementBase extends Model
{
	public function elementType() {
		return $this->belongsTo('App\Models\ElementType');
	}

	public function parentElementBase() {
		return $this->belongsTo( 'App\Models\ElementBase', 'parent_element_base_id');
	}

	public function elementBase() {
		return $this->hasMany( 'App\Models\ElementBase', 'parent_element_base_id');
	}

	public function permission() {
		return $this->hasMany( 'App\Models\Permission');
	}
}

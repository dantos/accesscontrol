<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

	public function elementBase() {
		return $this->belongsTo('App\Models\ElementBase');
	}

	public function parentPermission() {
		return $this->belongsTo( 'App\Models\Permission', 'parent_permission_id');
	}

	public function permissions() {
		return $this->hasMany( 'App\Models\Permission', 'parent_permission_id');
	}

	public function roles() {
		return $this->belongsToMany('App\Models\Role');
	}

}

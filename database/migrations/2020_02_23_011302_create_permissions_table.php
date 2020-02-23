<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
	        $table->bigIncrements( 'id' );
	        $table->string( 'permissions' );
	        $table->unsignedBigInteger( 'parent_permission_id' )->nullable();
	        $table->foreign( 'parent_permission_id' )->references( 'id' )->on( 'permissions' )->onDelete( 'cascade' );
	        $table->unsignedBigInteger( 'element_base_id' );
	        $table->foreign( 'element_base_id' )->references( 'id' )->on( 'element_bases' )->onDelete( 'cascade' );
	        $table->boolean( 'active' )->default( true );
	        $table->timestamps();
        });

	    Schema::create('permission_role', function (Blueprint $table) {
		    $table->bigIncrements( 'id' );
		    $table->unsignedBigInteger('permission_id');
		    $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
		    $table->unsignedBigInteger('role_id');
		    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
		    $table->timestamps();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('permission_role');
	    Schema::dropIfExists('permissions');
    }
}

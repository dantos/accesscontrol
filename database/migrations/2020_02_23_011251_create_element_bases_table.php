<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create( 'element_bases', function ( Blueprint $table ) {
		    $table->bigIncrements( 'id' );
		    $table->string( 'name' );
		    $table->string( 'item_code' );
		    $table->boolean( 'active' )->default( true );
		    $table->unsignedBigInteger( 'element_type_id' )->nullable();
		    $table->foreign( 'element_type_id' )->references( 'id' )->on( 'element_types' )->onDelete( 'cascade' );
		    $table->unsignedBigInteger( 'parent_element_base_id' )->nullable();
		    $table->foreign( 'parent_element_base_id' )->references( 'id' )->on( 'element_bases' )->onDelete( 'cascade' );
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
        Schema::dropIfExists('element_bases');
    }
}

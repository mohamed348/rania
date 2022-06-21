<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatternScopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'pattern_scopes', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('pattern_id')->unsigned();
            $table->foreign('pattern_id')->references('id')->on('patterns')->onDelete('cascade');
            $table->integer('scope_id')->unsigned();
            $table->foreign('scope_id')->references('id')->on('scopes')->onDelete('cascade');
            $table->text('formula');
            $table->text('nl_formula');
            $table->timestamps();
           
        }
            
        );
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pattern_scopes');
    }
}



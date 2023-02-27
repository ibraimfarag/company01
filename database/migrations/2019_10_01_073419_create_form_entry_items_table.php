<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormEntryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_entry_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->longText('value')->nullable();
            $table->bigInteger('form_entry_id')->unsigned()->index();
            $table->foreign('form_entry_id')->references('id')->on('form_entries')->onDelete('cascade');
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
        Schema::dropIfExists('form_entry_items');
    }
}

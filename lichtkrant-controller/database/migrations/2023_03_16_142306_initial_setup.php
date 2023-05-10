<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createTextPresetsTable();

		$this->createColourPresetsTable();

        $this->createModesTable();

		$this->createCurrentTable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('textPresets');
		Schema::dropIfExists('colourPresets');
        Schema::dropIfExists('modes');
		Schema::dropIfExists('current');
    }

    private function createTextPresetsTable() {
        Schema::create('textPresets', function(Blueprint $table) {
			$table->id();
			$table->string('text');
			$table->char('colour', 6);
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->boolean('private');

			$table->timestamps();
			$table->softDeletes();
		});
    }

    private function createColourPresetsTable() {
        Schema::create('colourPresets', function(Blueprint $table) {
			$table->id();
			$table->char('colour', 6);
            $table->foreignId('user_id')->references('id')->on('users');

			$table->timestamps();
			$table->softDeletes();
		});
    }

    private function createModesTable() {
        Schema::create('modes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    private function createCurrentTable() {
        Schema::create('current', function(Blueprint $table) {
			$table->id();
            $table->string('text')->nullable();
			$table->char('colour', 6);
            $table->foreignId('mode')->references('id')->on('modes');

			$table->timestamps();
			$table->softDeletes();
		});
    }




}

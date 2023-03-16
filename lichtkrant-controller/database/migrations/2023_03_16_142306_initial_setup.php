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
        $this->createPresetsTable();

		$this->createColourPresetsTable();

		$this->createCurrentTable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presets');
		Schema::dropIfExists('colourPresets');
		Schema::dropIfExists('current');
    }

    private function createTextPresetsTable() {
        Schema::create('textPresets', function(Blueprint $table) {
			$table->increments('id');
			$table->string('text');
			$table->char('colour', 6);
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('private');

			$table->timestamps();
			$table->softDeletes();
		});
    }

    private function createColourPresetsTable() {
        Schema::create('colourPresets', function(Blueprint $table) {
			$table->increments('id');
			$table->char('colour', 6);
            $table->foreign('user_id')->references('id')->on('users');

			$table->timestamps();
			$table->softDeletes();
		});
    }

    private function createCurrentTable() {
        Schema::create('current', function(Blueprint $table) {
			$table->increments('id');
            $table->string('text');
			$table->char('colour', 6);

			$table->timestamps();
			$table->softDeletes();
		});
    }
}

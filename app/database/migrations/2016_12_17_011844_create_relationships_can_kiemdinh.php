<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsCanKiemdinh extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('rlships_can_kiemdinh', function(Blueprint $table) {
            $table->increments('id');
            $table->string('id_bang_can',20);
            $table->string('id_so_phieu',20);
            $table->string('id_chi_nhanh',20);
            $table->string('id_status',20);
            $table->string('id_bang_kd',20)->nullable();
            $table->softDeletes();
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
        Schema::drop('rlships_can_kiemdinh');
	}

}

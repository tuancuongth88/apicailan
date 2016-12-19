<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangKiemDinh extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('kiem_dinh', function(Blueprint $table) {
            $table->increments('id');
            $table->string('id_bang_kd',20);
            $table->string('id_so_phieu',20);
            $table->string('id_chi_nhanh',20);
            $table->string('id_action',20);
            $table->string('user_id',20);
            $table->string('session_id',20);
            $table->string('id_status',20)->nullable();
            $table->dateTime('thoi_gian', 20)->nullable();
            $table->string('tl_tong', 20)->nullable();
            $table->string('tl_mun',20)->nullable();
            $table->string('tl_qua_co',20)->nullable();
            $table->string('tl_vo',20)->nullable();
            $table->string('tl_tap_chat',20)->nullable();
            $table->string('ty_le_mun',20)->nullable();
            $table->string('ty_le_qua_co',20)->nullable();
            $table->string('ty_le_vo',20)->nullable();
            $table->string('ty_le_tap_chat',20)->nullable();
            $table->string('don_vi_tl',20)->nullable();
            $table->string('don_vi_ty_le',20)->nullable();
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
        Schema::drop('kiem_dinh');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangKhachHangLog extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('khach_hang_log', function(Blueprint $table) {
            $table->increments('id');
            $table->string('id_action',20);
            $table->string('user_id',20);
            $table->string('session_id',20);
            $table->string('id_kh',20);
            $table->string('id_kh_cha',20)->nullable();
            $table->string('ten_khach_hang', 500)->nullable();
            $table->string('trang_thai', 20)->nullable();
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
        Schema::drop('khach_hang_log');
	}

}

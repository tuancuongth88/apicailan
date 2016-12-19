<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBangCan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('bang_can', function(Blueprint $table) {
            $table->increments('id');
            $table->string('id_bang_can',20);
            $table->string('id_so_phieu',20);
            $table->string('id_chi_nhanh',20);
            $table->string('user_id',20);
            $table->string('session_id',20);
            $table->string('id_action',20);
            $table->string('id_status',20)->nullable();
            $table->string('id_kho',20)->nullable();
            $table->string('id_ma_tau',20)->nullable();
            $table->string('id_kh',20);
            $table->string('ten_kh', 500)->nullable();
            $table->string('so_xe',20)->nullable();
            $table->string('ten_hang', 100)->nullable();
            $table->string('kho', 20)->nullable();
            $table->dateTime('ngay_can', 20)->nullable();
            $table->string('gio_can_lan_1', 20)->nullable();
            $table->string('gio_can_lan_2', 20)->nullable();
            $table->string('xuat_nhap', 20)->nullable();
            $table->string('kl_tong', 20)->nullable();
            $table->string('kl_xe',20)->nullable();
            $table->string('kl_tap_chat',20)->nullable();
            $table->string('kl_hang',20)->nullable();
            $table->string('tap_chat',20)->nullable();
            $table->string('don_gia',20)->nullable();
            $table->string('thanh_tien',20)->nullable();
            $table->string('tai_xe',20)->nullable();
            $table->string('don_vi_kl',20)->nullable();
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
        Schema::drop('bang_can');
	}

}

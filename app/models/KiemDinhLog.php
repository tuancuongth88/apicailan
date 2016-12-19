<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class KiemDinhLog extends Eloquent  {

    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kiem_dinh_log';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('id_bang_kd', 'id_so_phieu','id_chi_nhanh','id_action','user_id','session_id',
        'id_status','thoi_gian','tl_tong','tl_mun','tl_qua_co','tl_vo','tl_tap_chat','ty_le_mun','ty_le_qua_co',
        'ty_le_vo','ty_le_tap_chat','don_vi_tl','don_vi_ty_le');
    protected $dates = ['deleted_at'];
}

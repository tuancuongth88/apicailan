<?php
//get name file
function getFilename($filename = null)
{
	if($filename != '') {
		return pathinfo($filename, PATHINFO_FILENAME);
	}
	return null;
}

//get extension from filename
function getExtension($filename = null)
{
	if($filename != '') {
		return pathinfo($filename, PATHINFO_EXTENSION);
	}
	return null;
}

function getStatus($status){
		return $status == ACTIVE ? 'Kích hoạt': 'Chưa kích hoạt';
}

 function getnameParent($model, $id, $parent_id){
	if($parent_id)
	{
		$data = $model::find($parent_id)->name;

	return $data .'-'.$model::find($id)->name;
	}
	else
	{
		return $model::find($id)->name;
	}
}
function getIdUserAuth(){
	return Auth::user()->get()->id;
}

function generateRandomString($length = RANDOMSTRING) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
 function checkSoPhieu($model,$id_so_phieu){
    $data = $model::where('id_so_phieu', $id_so_phieu)->get()->count();
    if ($data){
        return true;
    }else{
        return false;
    }
}

// kiem tra du lieu bang can + reasion ship
function checkSoPhieuRlshipsCanKiemDinh($input){
    $data = DB::table("bang_kiem_dinh AS kd")
        ->join("rlships_can_kiemdinh as rl","kd.id_bang_kd","=","rl.id_bang_kd")
        ->where('kd.id_bang_kd',$input['id_bang_kd'])
        ->where('kd.id_bang_can',$input['id_bang_can'])
        ->where('kd.id_so_phieu',$input['id_so_phieu'])
        ->where('kd.id_chi_nhanh',$input['id_chi_nhanh'])
        ->get()->toArray();
    if (!empty($data)){
        return $data;
    }else{
        return false;
    }
}
// kiem tra du lieu bang can + reasion ship
function getDataInBangCan($input){
    $data = BangCan::where('id_bang_can',$input['id_bang_can'])
        ->where('id_so_phieu',$input['id_so_phieu'])
        ->where('id_chi_nhanh',$input['id_chi_nhanh'])
        ->get()->toArray();
    if (!empty($data)){
        return $data;
    }else{
        return false;
    }
}

function checkIdSoPhieu($input){
    $data = BangCan::where('id_so_phieu',$input['id_so_phieu'])
        ->where('id_chi_nhanh',$input['id_chi_nhanh'])
        ->get()->toArray();
    if (!empty($data)){
        return $data;
    }else{
        return false;
    }
}


function checkIdKH($model,$id_khach_hang){
    $data = $model::where('id_khach_hang',$id_khach_hang)->get()->count();
    if ($data){
        return true;
    }else{
        return false;
    }
}

function checkExitID($model,$id){
    $data = $model::find($id);
    if ($data){
        return true;
    }else{
        return false;
    }
}
function getResutBcan($model,$id_so_phieu){
    $data = $model::where('id_so_phieu',$id_so_phieu)->get()->toArray();
    if ($data){
        return $data;
    }else{
        return false;
    }
}

function getAllResutBcanMaTau($model,$matau){
    $data = $model::where('kho',$matau)->get()->toArray();
    if ($data){
        return $data;
    }else{
        return false;
    }
}

function tinhKLhang($input){
    //Tỷ lệ mùn vuot nguong(<1,2%)
    $tlvn_mun = 1.2;
    //Tỷ lệ quá cỡ  vuot nguong <8%
    $tlvn_quaco = 8;
    //Tỷ lệ vỏ vuot nguong(<0,5%)
    $tlvn_vo = 0.5;

    $kl_tong = $input['kl_tong'];
    $kl_xe = $input['kl_xe'];
    // KL tươi của hàng
    $kl_tuoi = $kl_tong - $kl_xe;
    // phần trăm đã kiểm định và gửi lên server
    $ty_le_mun = $input['ty_le_mun'];
    $ty_le_qua_co = $input['ty_le_qua_co'];
    $ty_le_vo = $input['ty_le_vo'];

    $a = ($ty_le_mun <= $tlvn_mun) ? 0 : ($ty_le_mun - $tlvn_mun)*$kl_tuoi/100;
    $b = ($ty_le_qua_co <= $tlvn_quaco) ? 0 : ($ty_le_qua_co - $tlvn_quaco)*$kl_tuoi/100;
    $c = ($ty_le_vo <= $tlvn_vo) ? 0 : ($ty_le_vo - $tlvn_vo)*$kl_tuoi/100;
    // trọng lượng hàng
    return $tl_hang = $kl_tuoi - (round($a,3) + round($b,3) + round($c,3));

//    $tongtlbc = (1000 * 1000 * $tongtlbc);
//    return ($tongtlbc * $ptramkd)/(100 * $tongtlkd);

}
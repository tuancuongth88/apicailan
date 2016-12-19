<?php

class ApiImportManagement extends ApiController {



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function importBangCan()
    {
        $input = Input::all();
        $user_id = $input['user_id'];
        $dataReturn = [];
        $actionData =  array();
        //phai check them user thuoc chi nhanh nao
        $ssuserid = Common::checkSessionLogin($input);
        $id_bc_log =CommonNormal::create($input,'BangCanLog');
            if ($id_bc_log) {
                $dataBangCan = getDataInBangCan($input);
                if ($dataBangCan && $input['id_action'] === UPDATE_DB) {
                    try {
                        CommonNormal::update($dataBangCan['id'], $input, 'BangCan');
                        $actionData['id_status'] = 1;
                        $actionData['description'] = 'Sửa thông tin thành công';
                        $actionData['datas'] = null;
                    } catch (Exception $e) {
                        $actionData['id_status'] = 2;
                        $actionData['description'] = 'Lỗi sửa thông tin';
                        $actionData['datas'] = null;
                    }
                } else if ($input['id_action'] === INSERT_DB) {
                    $checkIdSoPhieu = checkIdSoPhieu($input);
                    if (!$checkIdSoPhieu) {
                        try {
                            CommonNormal::create($input, 'BangCan');
                            CommonNormal::create($input, 'RlshipsCanKiemDinh');
                            $actionData['id_status'] = 1;
                            $actionData['description'] = 'Thêm dữ liệu thành công';
                            $actionData['datas'] = null;
                        } catch (Exception $e) {
                            $actionData['id_status'] = 2;
                            $actionData['description'] = 'Lỗi thêm dữ liệu';
                            $actionData['datas'] = null;
                        }
                    }else{
                        $actionData['id_status'] = 2;
                        $actionData['description'] = 'Đã tồn tại dữ liệu';
                        $actionData['datas'] = $checkIdSoPhieu;
                    }

                } else {
                    //delete table
                }
            }

        $dataReturn = $actionData;
        return Common::returnData(200,SUCCESS,$user_id,$ssuserid, $dataReturn);
    }

    public function importKiemDinh()
    {
        $input = Input::all();
        $checkidvoteIM = 0;
        $user_id = $input['user_id'];
        $data = 'loi';
        $ssuserid = Common::checkSessionLogin($input);
            $id_kd_log = CommonNormal::create($input,'KiemDinhLog');
            if ($id_kd_log) {
                $checkidvoteIM = checkSoPhieuRlshipsCanKiemDinh($input);
                if ($checkidvoteIM && $input['id_action'] === UPDATE_DB) {
//                    CommonNormal::update($input['id_so_phieu'], $input, 'KiemDinh');
//                    CommonNormal::update($input, 'RlshipsCanKiemDinh');
//                    $data = 'thanh cong';
                    $actionData['id_status'] = 2;
                    $actionData['description'] = 'Đã tồn tại dữ liệu';
                    $actionData['datas'] = $checkidvoteIM;
                } else if ($input['id_action'] === INSERT_DB) {
                    try {
                        CommonNormal::create($input, 'KiemDinh');
                        CommonNormal::create($input, 'RlshipsCanKiemDinh');
                        $this->tinhtyle($input);
                        $actionData['id_status'] = 1;
                        $actionData['description'] = 'Thêm mới dữ liệu thành công';
                    }catch (Exception $e){
                        $actionData['id_status'] = 2;
                        $actionData['description'] = 'Lỗi thêm mới dữ liệu';
                    }
                }
            }
        $dataReturn = $actionData;
        return Common::returnData(200,SUCCESS,$user_id,$ssuserid, $dataReturn);
    }

    public function importKhachHang()
    {
        $input = Input::all();
        $user_id = $input['user_id'];
        $data = 'loi';
        $ssuserid = Common::checkSessionLogin($input);
            $id_kd_log = CommonNormal::create($input,'KhachHangLog');
            if ($id_kd_log)
                $checkIdKH = checkIdKH('KhachHang',$input['id_kh']);
            if ($checkIdKH){
                CommonNormal::update($input['id_kh'],$input,'KhachHang');
                $data = 'sua thanh cong';
            }else{
                CommonNormal::create($input,'KhachHang');
                $data = 'them thanh cong';
            }
        return Common::returnData(200,SUCCESS,$user_id,$ssuserid, $data);
    }

    public function tinhtyle($input)
    {
        $tl_tong = $input['tl_tong'];
        $tl_mun = $input['tl_mun'];
        $tl_qua_co = $input['tl_qua_co'];
        $tl_vo = $input['tl_vo'];
        $tl_tap_chat = $input['tl_tap_chat'];
        $ty_le_mun = $input['ty_le_mun'];
        $ty_le_qua_co = $input['ty_le_qua_co'];
        $ty_le_vo = $input['ty_le_vo'];
        $ty_le_tap_chat= $input['ty_le_tap_chat'];
        $reusut = getResutBcan('BangCan', $input['id_so_phieu']);
        if ($reusut){
            $reusut1 = getAllResutBcanMaTau('BangCan',$reusut[0]['kho']);
            if ($reusut1){
                $inputrs =[];
                $inputup =[];
                foreach ($reusut1 as $value){
                    $inputrs['ty_le_mun'] = $ty_le_mun;
                    $inputrs['ty_le_qua_co'] = $ty_le_qua_co;
                    $inputrs['ty_le_vo'] = $ty_le_vo;
                    $inputrs['kl_tong'] = $value['kl_tong'];
                    $inputrs['kl_xe'] = $value['kl_xe'];
                    $inputup['kl_hang'] = tinhKLhang($inputrs);
                    CommonNormal::update($value['id'],$inputup,'BangCan');
                }
            }
        }

    }


    public function updatePassword($id)
    {
        $rules = array(
            'password'   => 'required',
            'repassword' => 'required|same:password'

        );
        $data = "Thay doi pass thanh cong";
        $input = Input::except('_token');
        $ssuserid = Common::checkSessionLogin($input);
        $validator = Validator::make($input,$rules);
        if($validator->fails()) {
            $data = $validator->fails();
            return Common::returnData(200,SUCCESS,$input['user_id'],$ssuserid, $data);
        } else {
            $inputPass['password'] = Hash::make($input['password']);
            CommonNormal::update($id, $inputPass,'User');
        }
        return Common::returnData(200,SUCCESS,$input['user_id'],$ssuserid, $data);
    }

   public function validateInputBangCan($input)
    {
        if (!empty($input) && !empty($input['id_bang_can']) && !empty($input['id_so_phieu']) && !empty($input['id_chi_nhanh'])) {
            return true;
        }
        return false;
    }
}

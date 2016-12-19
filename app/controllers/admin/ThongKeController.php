<?php

class ThongKeController extends AdminController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = BangCan::join('kiem_dinh', function($join) {
            $join->on('bang_can.id_so_phieu', '=', 'kiem_dinh.id_so_phieu');
        })->paginate(PAGINATE);

        return View::make('admin.thongke.index')->with(compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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

    public function resPassword()
    {

    }

    public function findByParam(){
        $input = Input::all();
//        $data = BangCan::join('kiem_dinh', function($join) {
//                        $join->on('bang_can.id_so_phieu', '=', 'kiem_dinh.id_so_phieu');
//        })->where('bang_can.ngay_can','>=',$input->txt_tu_ngay)
//        ->where('bang_can.ngay_can','<=',$input->txt_den_ngay)->paginate(PAGINATE);
        $data = DB::table("bang_can AS bc")
            ->join("kiem_dinh as kd","kd.id_so_phieu","=","bc.id_so_phieu")
            ->whereRaw('bc.ngay_can >= '.$input['txt_tu_ngay'].' and bc.ngay_can <= '.$input['txt_tu_ngay'] )->paginate(PAGINATE);

        return View::make('admin.thongke.index')->with(compact('data'));
    }
}

<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $obj = \DB::table('user')->get();
        $array = $this->objectToArray($obj);
        // 定义Redis的key
        $listKey = 'LIST:TEST:ADMIN';
        $hashKey = 'HASH:TEST:ADMIN:';
        // 遍历时写入Redis list为索引 hash为数据
//        foreach($array as $v){
//            \Redis::rpush($listKey,$v['user_id']);
//            \Redis::hMset($hashKey.$v['user_id'],$v);
//        }
        $list = \Redis::lrange($listKey,0,-1);
        $array = null;
        foreach($list as $v){
            // 取出哈希里的数据写入大数组中
            $array[] = \Redis::hGetall($hashKey.$v);
        }
        dd($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

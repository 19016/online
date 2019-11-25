<?php

namespace App\Http\Controllers\bank;

use App\Model\Bank;
use App\Model\Course;
use App\Model\Lect;
use DemeterChain\B;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankController extends Controller
{
    /** 题库添加的页面 */
    public function bank_add(){
        //查询课程
        $course = Course::all();

        //查询讲师
        $lect = Lect::all();

        return view('bank.bank_add',['course'=>$course,'lect'=>$lect]);
    }

    /** 题库添加 */
    public function bank_add_do(Request $request){
        $course_id = $request->input('course_id');
        $lect_id = $request->input('lect_id');
        $bank_type = $request->input('bank_type');
        $bank_answer = $request->input('bank_answer');
        $bank_name = $request->input('bank_name');

        if($bank_name==''){
            echo '请填写题目';
            return redirect('/bank_add');
        }else{
            if($bank_type==1 || $bank_type==2){
                $choose_A = $request->input('choose_A');
                $choose_B = $request->input('choose_B');
                $choose_C = $request->input('choose_C');
                $choose_D = $request->input('choose_D');

                $data1 = [
                    'course_id' => $course_id,
                    'lect_id' =>$lect_id,
                    'bank_answer' =>$bank_answer,
                    'bank_type'=>$bank_type,
                    'bank_name'=> $bank_name,
                    'bank_del'=>0,
                    'choose_A'=>$choose_A,
                    'choose_B'=>$choose_B,
                    'choose_C'=>$choose_C,
                    'choose_D'=>$choose_D,
                ];

                $bank = Bank::insert($data1);

            }else if($bank_type==3 || $bank_type){
                $data2 = [
                    'course_id' => $course_id,
                    'lect_id' =>$lect_id,
                    'bank_del'=>0,
                    'bank_type'=>$bank_type,
                    'bank_answer' =>$bank_answer,
                    'bank_name'=> $bank_name,
                ];
                $bank = Bank::insert($data2);

            }

            if($bank){
                echo '添加成功';
                return redirect('/bank_list');
            }else{
                echo '添加失败';
                return redirect('/bank_add');
            }

        }


    }

    /** 题库列表 */
    public function bank_list(){
        $bank_list = Bank::join('course','bank.course_id','=','course.course_id')
            ->join('lect','bank.lect_id','=','lect.lect_id')
            ->get()
            ->toArray();

        return view('bank.bank_list',['bank_list'=>$bank_list]);
    }

    /** 题库删除 */
    public function bank_del(){
        $bank_id = $_GET['id'];

        $where = [
            'bank_id'=>$bank_id
        ];

        $data = [
            'bank_del'=>1
        ];
        $bank_del_sql = Bank::where($where)->update($data);
        if($bank_del_sql){
            echo '删除成功';
            return redirect('/bank_list');
        }else{
            echo '删除失败';
            return redirect('/bank_list');
        }
    }

    /** 题库修改 */
    public function bank_update(){
        $bank_id = $_GET['id'];
        $where = [
            'bank_id'=>$bank_id
        ];
        /** 根据id查询 */
        $bank_list = Bank::where($where)->join('course','bank.course_id','=','course.course_id')
            ->join('lect','bank.lect_id','=','lect.lect_id')
            ->get()
            ->toArray();
        //查询课程
        $course = Course::all();

        //查询讲师
        $lect = Lect::all();
        return view('bank.bank_update_list',['bank_list'=>$bank_list,'course'=>$course,'lect'=>$lect]);
    }

    public function bank_update_do(Request $request)
    {
        $course_id = $request->input('course_id');
        $lect_id = $request->input('lect_id');
        $bank_type = $request->input('bank_type');
        $bank_answer = $request->input('bank_answer');
        $bank_name = $request->input('bank_name');

        $bank_id = $request->input('bank_id');
        $where = [
            'bank_id'=>$bank_id
        ];
        if ($bank_name == '') {
            echo '请填写题目';
            return redirect('/bank_add');
        } else {
            if ($bank_type == 1 || $bank_type == 2) {
                $choose_A = $request->input('choose_A');
                $choose_B = $request->input('choose_B');
                $choose_C = $request->input('choose_C');
                $choose_D = $request->input('choose_D');

                $data1 = [
                    'course_id' => $course_id,
                    'lect_id' => $lect_id,
                    'bank_answer' => $bank_answer,
                    'bank_type' => $bank_type,
                    'bank_name' => $bank_name,
                    'bank_del' => 0,
                    'choose_A' => $choose_A,
                    'choose_B' => $choose_B,
                    'choose_C' => $choose_C,
                    'choose_D' => $choose_D,
                ];

                $bank = Bank::where($where)->update($data1);

            } else if ($bank_type == 3 || $bank_type) {
                $data2 = [
                    'course_id' => $course_id,
                    'lect_id' => $lect_id,
                    'bank_del' => 0,
                    'bank_type' => $bank_type,
                    'bank_answer' => $bank_answer,
                    'bank_name' => $bank_name,
                ];
                $bank = Bank::where($where)->update($data2);

            }

            if ($bank) {
                echo '添加成功';
                return redirect('/bank_list');
            } else {
                echo '添加失败';
                return redirect('/bank_update');
            }

        }
    }
}

<?php

namespace App\Http\Controllers\Member;


use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\member;
use Illuminate\Http\Request;

class MinistryController extends BaseController implements MinistryrControllerInterface
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $model;

    public function __construct(Member $model)
    {
        $this->model = $model;
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $this->loadWithRelatedModel();

        return $this->makeResponse($this->model,'successfully retrieved', 200);
    }

    public function store(Request $request)
    {
        return response([],200);
    }

    public function show(Request $request, $id)
    {
        return view('member.member_show');
    }

    public function update(Request $request, $id)
    {
        return response([],200);
    }

    public function destroy(Request $request, $id)
    {
        return response([],200);
    }


    public function loadWithRelatedModel(){
        $this->model = $this->model->with(['ministries']);
    }
}

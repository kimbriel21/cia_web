<?php

namespace App\Http\Controllers\Member;

use Excel;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class MemberController extends BaseController implements MemberControllerInterface
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $this->loadWithRelatedModel();
        $this->_search();

        return $this->getResultList($this->model->latest());


    }

    public function store(Request $request)
    {
        $validatedData = $this->validateRequest($request);

        if ($validatedData->fails())
        {
           return response($validatedData->errors(), 500);
        }

        $data = $this->model->create($request->all());

        return response($data,200);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $this->validateRequest($request);

        if ($validatedData->fails())
        {
            return response($validatedData->errors(), 500);
        }

        $this->model = $this->model->find($id)->fill($request->all());
        $data = $this->model;
        $this->model->save();
        return response($data,200);
    }

    public function show(Request $request, $id)
    {
        $this->loadWithRelatedModel();
        $this->model = $this->model->find($id);
        return $this->response($this->model);
    }

    public function destroy(Request $request, $id)
    {
        $this->model = $this->model->find($id);
        $data =  $this->model;
        $this->model->delete();

        return response($data,200);
    }

    protected function _search()
    {

        $allowedField = ['first_name', 'last_name', 'address'];

        //search
        $this->model = $this->enableSearch($allowedField, $this->model);

        //filter
        $this->model = $this->enableDateFilter('date', $this->model);
        $this->model = $this->enableDateMonthFilter('birthday', $this->model);

    }


    public function loadWithRelatedModel(){
        $this->model = $this->model->with(['ministries']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validateRequest(Request $request): \Illuminate\Contracts\Validation\Validator
    {
        $validatedData = Validator::make($request->all(), [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'number' => 'required|min:11|max:11',
            'birthday' => 'required',
            'address' => 'required',
        ]);
        return $validatedData;
    }


    public function downloadExcel(Request $request)
    {
        $this->_search();

        Excel::create('Member', function($excel){

            $excel->sheet('123', function($sheet){


                $sheet->fromModel($this->model->get());

            });

        })->download('xls');

    }


}

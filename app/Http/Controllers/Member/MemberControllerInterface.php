<?php namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

interface MemberControllerInterface
{

    public function index(Request $request);

    public function store(Request $request);

    public function show(Request $request, $id);

    public function update(Request $request, $id);

    public function destroy(Request $request, $id);



}

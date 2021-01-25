<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAcessController extends Controller
{
    public function index()
    {
        dd('idex');
    }

    public function create()
    {
        dd('create');
    }

    public function store(Request $request)
    {
        dd('store');
    }

    public function show($id)
    {
        dd('show');
    }

    public function edit($id)
    {
        dd('edit');
    }

    public function update(Request $request, $id)
    {
        dd('update');
    }

    public function destroy($id)
    {
        dd('destroy');
    }
}

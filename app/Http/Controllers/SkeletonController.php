<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Config;

class SkeletonController extends Controller
{
    public function index()
    {
        $data['result'] = \App\Skeleton::all();
        return view('skeleton.list', $data);
    }

    public function create()
    {
        return view('skeleton.form');
    }

    public function store(Request $request, $id="")
    {
        $rules = [
            'textfield' => 'required',
            'textarea' => 'required',
            'date' => 'required|date_format:d M Y',
//            'file' => 'required'
        ];
        $this->validate($request, $rules);

        $input = $request->all();

        if (empty($id)) {
            $status = \App\Skeleton::create($input);
        } else {
            $skeleton = \App\Skeleton::find($id);
            $status = $skeleton->update($input);
        }

        if ($status) return redirect('skeleton')->with('success', 'Data berhasil ' . (empty($id) ? 'ditambahkan' : 'diubah'));
        else return redirect('skeleton')->with('error', 'Data gagal ' . (empty($id) ? 'ditambahkan' : 'diubah'));
    }

    public function edit($id)
    {
        $data['result'] = \App\Skeleton::find($id);
        return view('skeleton.form', $data);
    }

    public function destroy($id)
    {
        $status = \App\Skeleton::destroy($id);
        if ($status) return redirect('skeleton')->with('success', 'Data berhasil dihapus');
        else return redirect('skeleton')->with('error', 'Data gagal dihapus');
    }
}

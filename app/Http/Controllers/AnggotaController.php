<?php

namespace App\Http\Controllers;


use App\Models\AnggotaModel;

use Illuminate\Http\Request;


class AnggotaController extends Controller
{

    public function index()
    {
        $data = AnggotaModel::all();

        return response()->json([
            'success' => true,
            'message' => 'list semua users',
            'data' => $data,
        ], 200);
    }

    public function insert(Request $request)
    {
        $insert = AnggotaModel::create([
            'nama' => $request->input('nama'),
            'umur' => $request->input('umur'),
            'alamat' => $request->input('alamat'),
        ]);
        if ($insert) {
            return response()->json([
                'success' => true,
                'message' => 'berhasil di tambahkan',
                'data' => $insert,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'gagal di tambakan',
            ], 401);
        }
    }

    public function show($id)
    {
        $data = AnggotaModel::find($id);

        if ($data) {
            return response()->json([
                'success'   => true,
                'message'   => 'Detail data!',
                'data'      => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data Tidak Ditemukan!',
            ], 404);
        }
    }

    public function delete($id)
    {
        $data = AnggotaModel::whereId($id)->first();
        $data->delete();

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'data berhasil di hapus',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data gagal dihapus',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = AnggotaModel::whereId($id)->update([
            'nama' => $request->input('nama'),
            'umur' => $request->input('umur'),
            'alamat' => $request->input('alamat'),
        ]);

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'datas Berhasil Diupdate!',
                'data' => $data
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data Gagal Diupdate!',
            ], 400);
        }
    }
}

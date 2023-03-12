<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    
    
    
    // public function upload(Request $request)
    // {
    // //     // ディレクトリ名
    //     $dir = 'sample';

    // //     // アップロードされたファイル名を取得
    //     $file_name = $request->file('profile_image')->getClientOriginalName();

    // //     // 取得したファイル名で保存
    //     $request->file('profile_image')->storeAs('public/' . $dir, $file_name);

    //     return redirect('people/');
    // }
}

// class PhotoController extends Controller
// {
// public function uploadForm()
// {
// return view('photos.create');
// }

// public function upload(Request $request)
// {
// // バリデーション
// $request->validate([
// 'photo' => 'required|image|max:2048',
// ]);

// // 保存先ディレクトリ
// $directory = 'public/sample';

// // ファイル名をユニークにする
// $filename = uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();

// // ファイルを保存
// $request->file('photo')->storeAs($directory, $filename);

// // 保存したファイルのパスを取得
// $filepath = $directory . '/' . $filename;

// // リダイレクト
// return redirect()->route('photos.create.form')->with('success', '画像をアップロードしました。');
// }
// }

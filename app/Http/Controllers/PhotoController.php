<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PhotoController extends Controller
{
    public function index()
    {
        return view('photos.create');//
    }
    public function uploadForm()
    {
        // return view('people');変更↓
        return view('photos.create');
    }
    public function upload(Request $request)
{
// バリデーション
$request->validate([
            'profile_image' => 'required|image|max:2048',
            ]);
// 保存先ディレクトリ
 $directory = 'public/sample';

// ファイル名をユニークにする
$filename = uniqid() . '.' . $request->file('profile_image')->getClientOriginalExtension();

// アップロードされたファイル名を取得	// sampleディレクトリに画像を保存
$filename = $request->file('profile_image')->getClientOriginalName();	
// ファイルを保存
$request->file('profile_image')->storeAs($directory, $filename);
// 保存したファイルのパスを取得
$filepath = $directory . '/' . $filename;
// リダイレクト
return redirect()->route('photos.create.form')->with('success', '画像をアップロードしました。');
}
}
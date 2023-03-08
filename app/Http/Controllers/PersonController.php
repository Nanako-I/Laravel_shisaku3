<?php

namespace App\Http\Controllers;

// Personモデルを呼び出している↓
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 全件データ取得して一覧表示する↓
        // $people は変数名　Person::でPersonモデルにアクセスする
        $people = Person::all();
        // ('people')に$peopleが代入される
        
        // 'people'はpeople.blade.phpの省略↓　// compact('people')で合っている↓
        return view('people',compact('people'));
        // APIのときは　return $people;などでJSONデータで返す
   
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
         $storeData = $request->validate([
            //  requireは必須項目　nullableは書かなくてもいい
            'person_name' => 'required|max:255',
            // 'date_of_birth' => 'required|max:255',
            // 'age' => 'required|max:255',
        ]);
        // バリデーションした内容を保存する↓
        // Personモデルにアクセス
        $people = Person::create($storeData);
        // トップページに返す↓
        return redirect('/people');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
     
    // 更新画面の表示↓
    public function edit(Person $person)
    {
        // compact('people')で合っている↓
        return view('peopleedit',compact('people'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
     
     
    //  フォームから送られてきたデータ↓
    public function update(Request $request, Person $person)
    {
       $storeData = $request->validate([
            //  requireは必須項目　nullableは書かなくてもいい
            'person_name' => 'required|max:255',
            'date_of_birth' => 'required|max:255',
            'age' => 'required|max:255',
        ]);
        
        $person ->update($storeData);
        // トップページに返す↓
        return redirect('/people');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        
        $person->delete();
        return redirect('/people');
    }
}

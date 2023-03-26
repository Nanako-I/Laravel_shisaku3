<?php

namespace App\Http\Controllers;

use App\Models\temperature;
use App\Models\Person;

use Illuminate\Http\Request;

class TemperatureController extends Controller
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
        $temperature = Temperature::all();
        // ('people')に$peopleが代入される
        
        // 'people'はpeople.blade.phpの省略↓　// compact('people')で合っている↓
        return view('people',compact('temperature'));
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
            'temperature' => 'required|max:255',
        ]);
        // バリデーションした内容を保存する↓
        
        $temperature = Temperature::create([
          'temperature' => $request->temperature,
         
    ]);
    // return redirect('people/{id}/edit');
    $person = Person::findOrFail($request->input('id'));
    return redirect()->route('people.edit', ['id' => $person->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function show(temperature $temperature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $person = Person::find($id);
    return view('peopleedit', compact('person'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, temperature $temperature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\temperature  $temperature
     * @return \Illuminate\Http\Response
     */
    public function destroy(temperature $temperature)
    {
        //
    }
}

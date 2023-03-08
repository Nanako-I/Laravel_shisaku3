<!-- resources/views/books.blade.php -->
<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <!-- resources/views/components/errors.blade.php -->
        @if (count($errors) > 0)
            <!-- Form Error List -->
            <div class="flex justify-between p-4 items-center bg-red-500 text-white rounded-lg border-2 border-white">
                <div><strong>入力した文字を修正してくた?さい。</strong></div> 
                <div>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <!-- バリデーションエラーの表示に使用-->
    
    <!--全エリア[START]-->
    <div class="flex bg-gray-100">

        <!--左エリア[START]--> 
        <div class="text-gray-700 text-left px-4 py-4 m-2">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-500 font-bold">
                    本を管理する
                </div>
            </div>


            <!-- 本のタイトル -->
            <form action="{{ url('people'/.$person->id ) }}" method="POST" class="w-full max-w-lg">
                @method('PATCH')
                @csrf
                  <div class="flex flex-col px-2 py-2">
                   <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       氏名
                      </label>
                      <input name="title" value="{{$person->person_name}}" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                    
                     <!-- カラム2 -->
                     <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    生年月日  
                     </label>
                     
                    <span style="color:red">{{ $errors->first('birthday') }}</span>
                    @livewire('birthday',['year' =>2000, 'month'=>12, 'day'=>31])
                    </div>
                    
                    
                     <!-- カラム3 -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       年齢
                      </label>
                      <input name="age" value="{{$person->age}}" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
            </div>
            
            
             <!-- カラム4 -->
　　　　　　<div class="form-group">
　　　　　　    性別
　　　　　　<!--<label for="category-id">{{ __('カテゴリー') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>-->
     　　　<select class="form-control" value="{{$person->gender}}"　id="category-id"  name="category_id">
}"
          <option value="1">--</option>
          <option value="2">男性</option>
          <option value="3">女性</option>
          <option value="4">その他</option>
     　　 </select>
  　　　　　 </div>
  　　　　　 
  　　　　　 
  　　　　　  <!-- カラム6 -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       障害名
                      </label>
                      <input name="body" value="{{$person->disability_name}}" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                    
                
                  <!-- カラム５ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                送信
                            </button>
                      </div>
                   </div>
            </form>
        </div>
        </div>
        <!--左エリア[END]--> 
        
    
    
    <!--右側エリア[START]-->
    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
         <!-- 現在の本 -->
        
    </div>
    <!--右側エリア[[END]--> 

</div>
 <!--全エリア[END]-->

</x-app-layout>
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
                <div><strong>入力した文字を修正してください。</strong></div> 
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
                    新規登録する
                </div>
            </div>


            <!-- 本のタイトル -->
            <form action="{{ url('people') }}" method="POST" class="w-full max-w-lg">
                @csrf
                  <div class="flex flex-col px-2 py-2">
                   <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       氏名
                      </label>
                      <input name="person_name" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                    <!-- カラム2 -->
                    
                    
                     <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                    <input name="date_of_birth" label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    生年月日  
                     </label>
                     
                    <span style="color:red">{{ $errors->first('birthday') }}</span>
                    @livewire('birthday',['year' =>2000, 'month'=>12, 'day'=>31])
                    </div>
                    
                    <!--<div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">-->
                    <!--    生年月日-->
                    <!--    <input type="date" class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base">-->
                    
                    <!--</div>-->
                    
                    <!-- カラム3 -->
                   
                    <div class="w-full md: px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       年齢
                      </label>
                      
                      <input name="age" class="appearance-none block w-1/3 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                      @livewire('age-input')
                      </div>
            <!--</div>-->
            
           
  　　　　 <!-- カラム4 -->
  　　　　 <!--<div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">-->
       <!--               <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">-->
       <!--                性別-->
       <!--               </label>-->
       <!--               <input name="gender" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">-->
       <!--             </div>-->
                    
                     <div class="form-group">
    <label for="gender">性別</label>
    <select class="form-control" id="gender" name="gender">
        <option value="">--</option>
        <option value="男性">男性</option>
        <option value="女性">女性</option>
        <option value="その他">その他</option>
    </select>
</div>

       <!--     </div>-->
  　　　　　 
  　　<!-- カラむ５  -->
  　　<!--画像-->
  　　
  　　@if (session('success'))
  <div class=“alert alert-success”>
  {{ session('success') }}
  </div>
  @endif
  　　
  　　<enctype="multipart/form-data">
  @csrf
  <input type="file" name="profile_image">
  <button>アップロード</button>
  <button type="submit">
</form>


 <!--<div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">-->
 <!--                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">-->
 <!--                      画像-->
 <!--                     </label>-->
 <!--                     <input name="profile_image" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">-->
 <!--                   </div>-->
 <!--           </div>-->
            
                    <!-- カラム6 -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       障害名
                      </label>
                      <input name="body" value="{{$person->disability_name}}" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
               
               
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
    <!--ある↑-->
         <!-- 現在の本 -->
        @if (count($people) > 0)
            @foreach ($people as $person)
                  
    
              
                 <section class="text-gray-600 body-font" _msthidden="14">
             　 <!--<div class="container px-5 py-24 mx-auto" _msthidden="14">-->
             　     <!--ある↑-->
            
              <div class="w-24 h-full bg-indigo-500"></div>
             　 </div>
              
    　      
                
             　　　<div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4" _msthidden="12">
                      <div class="p-4 md:w-1/3 sm:mb-0 mb-6" _msthidden="4">
              　　　　　　<div class="rounded-lg h-64 overflow-hidden" _msthidden="1">
            <!--ある↑-->
                　　　　<img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1203x503" _msthidden="A" _mstalt="99710" _msthash="173">
              　　 
                
        
                <h2 class="text-xl font-medium title-font text-gray-900 mt-5" _msttexthash="204971" _msthidden="1" _msthash="178">{{ $person->person_name }}</h2>
                <p class="text-base leading-relaxed mt-2" _msttexthash="12667447" _msthidden="1" _msthash="179">{{ $person->date_of_birth }}</p>
                  <div>{{ $person->person_name }}</div>
                  
            　     　</div>
                    <div>
                    <!--ある↑-->
                    <form action="{{ url('people/'.$person->id.'/edit') }}" method="GET">
                         @csrf
                         
                        <button type="submit"  class="btn bg-blue-500 rounded-lg">
                            更新
                        </button>
                        
                     </form>
                     
                  </div>
                  
                  <div>
                <!--ある↑-->
                    <form action="{{ url('people/'.$person->id) }}" method="POST">
                         @csrf
                         @method('DELETE')
                        
                        <button type="submit"  class="btn bg-blue-500 rounded-lg">
                            削除
                        </button>
                        
                     </form>
                  </div>
                
                </div>
            @endforeach
        @endif
    </div>
    <!--右側エリア[[END]--> 

</div>
 <!--全エリア[END]-->

</x-app-layout>
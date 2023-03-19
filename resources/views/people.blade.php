<!-- resources/views/books.blade.php -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
                    
                    
                    <!-- カラム3 -->
                   
                    <div class="w-full md: px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       年齢
                      </label>
                      
                      <input name="age" class="appearance-none block w-1/3 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                      @livewire('age-input')
                      </div>
            <!--</div>-->
            
                    
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
  　<form action="{{ route('photos.create') }}" method="post" enctype="multipart/form-data">
  　　<!--<enctype="multipart/form-data">-->
  @csrf
  <input type="file" name="profile_image">
  <button>アップロード</button>
  <button type="submit">
</form>
            
                    <!-- カラム6 -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       障害名
                      </label>
                      <input name="disability_name" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
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
        
      <body>
    <div id="app" class="container">
        <br>
        <h3>ウェブカメラで名刺を読みとってデータ入力する</h3>
        　　　　<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    　　　　　　　　　　　　　　　　<div class="form-group">
       　　　　　　　　　　　　　　　　　　 <label class="block text-sm font-medium text-gray-700">名前</label>
       　　　　　　　　　　　　　　　　 <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.name">
    　　　　　　　　　　　　　　　　</div>
    　　　　　      　   　　　<div class="form-group">
                           <label class="block text-sm font-medium text-gray-700">会社名</label>
                           <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.organization">
                        </div>
                        <div class="form-group">
                           <label class="block text-sm font-medium text-gray-700">住所</label>
                           <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.address">
                        </div>
                        <div class="form-group">
                           <label class="block text-sm font-medium text-gray-700">TEL</label>
                           <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.tel">
                        </div>
                        <div class="form-group">
                           <label class="block text-sm font-medium text-gray-700">E-Mail</label>
                           <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.email">
                        </div>
                        <div class="form-group">
                           <label class="block text-sm font-medium text-gray-700">URL</label>
                           <input type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.url">
                        </div>
                </div>
        
        
        
        <hr>
        <h5>
            名刺をウェブカメラに見せて「キャプチャ」ボタンをクリックしてください。<br>
            3秒後に画像がキャプチャされます。
        </h5>
        
        <div v-show="isModeVideo">
            <div class="float-right">
                <span class="text-right" v-if="this.timeCount > 0">
                    @{{ timeCount }} 秒
                    &nbsp;&nbsp;&nbsp;
                    
                     </span>
             
                <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded" @click="capture">キャプチャ</button>
                 
            </div>
            <video ref="video" style="width: 640px; height: 480px;"></video>
        </div>
          <div v-show="isModeImage">
              <div class="float-right">
                 キャプチャしました。<br>この画像から情報を読みとりますか？
                 <br>
                  <div class="text-right">
                    <button type="button" class="bg-gray-100 text-gray-700 rounded-md py-2 px-4 mr-2" @click="cancel">キャンセル</button>
                    <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md" @click="extract">OK</button>
                  </div>
           
           <!--extractedText という変数が truthy（真）である場合、div 要素が描画される↓-->
                  <div v-if="extractedText" class="whitespace-pre"></div>
            
                   <hr class="border-t-2 border-gray-500">
                     <span class="inline-block px-2 py-1 rounded-full text-sm font-bold bg-blue-500 text-white">取得されたテキスト</span>
               <!--extractedTextという変数に格納されたテキストを表示する.その要素がクリックされた時にselectionメソッドを実行するように設定-->
                   <div class="mt-2" @mouseup="selection" v-text="extractedText"></div>
                  </div>
              </div>
              <!--キャンバス要素-->
              <canvas ref="canvas" width="640" height="480"></canvas>
        　</div>
        　　　　<div class="modal fixed z-10 inset-0 overflow-y-auto" id="modal">
                  <div class="modal-dialog inline-block align-middle max-w-md w-full p-4 my-8 overflow-hidden text-left transition-all transform bg-white shadow-xl rounded">
                    <div class="modal-content">
                       <div class="modal-header">
                  　　　　　　<h5 class="modal-title text-lg font-bold">自動入力する項目を選択してください</h5>
                       </div>
      <!-- ここにモーダルの中身を記述 -->
                    
                 
               
        　　　　　　　　　　　　　　　　　<div class="modal-body">
            　　　　　　　　　　　　　　　 <strong class="font-bold">選択されたテキスト：</strong>
              　　　　　　　　　　　　　　　　　　　<span class="font-bold" v-text="selectedText"></span>
          
        　　　　　　　        　　　　　　<br>
          　　　　　        　　　　<br>
            　　　　　　　  　　　　　　　<div class="mt-8">
              　　　　　　　　　　　　　<h3 class="float-left" v-for="(text, key) in inputs">
                  <!--ボタンがクリックされると、@click.preventディレクティブによって関数enterTextが呼び出される-->
               　　　　　　　　　　　　　　　　　　 <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" v-text="text" @click.prevent="enterText(key)"></a>
              　　　　　　　　　　　　　</h3>
                          </div>
                    </div>
        　         </div>
        　       </div>
        　
             <h1 class="a" >押したら？</h1>
             
              <style>
      <div class="relative h-screen">
      <video id="camera-stream" class="absolute inset-0 w-full h-full object-cover"></video>
      <div id="camera-range" class="absolute inset-10 w-80 h-80 border-2 border-red-500"></div>
    </div>
    
    </style>
    </div>
     <div id="video-container">
      <video id="camera-stream" autoplay></video>
      <div id="camera-range"></div>
    </div>
 <!--vue3.2.47をＣＤＮ経由で呼び出す↓　3.2.47のバージョンで呼び出し-->
 <!--<script src="https://unpkg.com/vue@3.2.47/dist/vue.global.prod.js"></script>-->
 <!--バージョン変えずに呼び出し↓-->
 <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
 <!--バージョン変えずに呼び出し↓-->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>-->
   <script src="https://unpkg.com/vue@3.2.47/dist/vue.global.prod.js"></script>
 <!--jquery3.6.4をCDN経由で呼び出し↓-->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

               
  

    <script>
    
    // async function startCamera() {
    //     const cameraStream = await navigator.mediaDevices.getUserMedia({
    //       video: {
    //         facingMode: 'environment',

    //         aspectRatio: {
    //           exact: 1.6,
    //         },
    //       },
    //       audio: false,
    //     });
    //     const videoElement = document.createElement("video")
    //     videoElement.autoplay = true;
    //     videoElement.srcObject = cameraStream;
    //     document.body.append(videoElement);
    //     videoElement.addEventListener("resize", () => {
    //       videoElement.width = videoElement.videoWidth;
    //       videoElement.height = videoElement.videoHeight;
    //     });
    //   }
    //   startCamera()
    //   上記でカメラは起動する↑
    
    async function startCamera() {
        const cameraStream = await navigator.mediaDevices.getUserMedia({
          video: {
            facingMode: 'environment',

            aspectRatio: {
              exact: 1.6,
            },
          },
          audio: false,
        });
        const videoElement = document.querySelector('#camera-stream')
        videoElement.srcObject = cameraStream;
        videoElement.addEventListener("resize", () => {
          videoElement.width = videoElement.videoWidth;
          videoElement.height = videoElement.videoHeight;
        });

        // Set camera range size based on video dimensions
        videoElement.addEventListener('loadedmetadata', () => {
          const videoRatio = videoElement.videoWidth / videoElement.videoHeight;
          const rangeElement = document.querySelector('#camera-range')
          const rangeWidth = rangeElement.offsetHeight * videoRatio;
          rangeElement.style.width = `${rangeWidth}px`;
        });
      }
      startCamera()
      
//       videoElement.autoplay = true;
// videoElement.mediaStream = cameraStream;

function captureImage(videoElement) {
    const canvas = document.createElement('canvas');
    const context = canvas.getContext('2d');
    if (context === null) {
      throw new Error("canvas.getContext('2d') return null");
    }

    canvas.width = videoElement.videoWidth;
    canvas.height = videoElement.videoHeight;
    context.drawImage(this.videoElement, 0, 0, canvas.width,        canvas.height);
    return canvas.toDataURL('image/jpeg', 0.95);
}

const capturedImageUrl = captureImage(videoElement)

document.getElementsByTagName("img").src = capturedImageUrl


</script>
 <!--<input type="file" id="file-input" accept="image/*"><br>-->
 <!-- <div id="result"></div>-->
</body>
</html>
    
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
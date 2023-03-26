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
            
        </div>
    </div>
       
        <!--左エリア[END]--> 
        
      <body>
            <form action="{{ url('people') }}" method="POST" class="w-full">
                        @csrf
              
                <br>
                <h3>ウェブカメラで身分証明書（障害者手帳など）を読みとってデータ入力する</h3>
                　　  　  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="form-group col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">名前</label>
                                    <input name="person_name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.name">
                                </div>
                                <div class="form-group col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">生年月日</label>
                                    <input name="date_of_birth" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.date_of_birth">
                                </div>
                                <div class="form-group col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">年齢</label>
                                    <input name="age" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.age">
                                </div>
                                <div class="form-group col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">性別</label>
                                    <input name="gender" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.gender">
                                </div>
                                <div class="form-group col-span-1">
                                    <label class="block text-sm font-medium text-gray-700">障害名</label>
                                    <input name="disability_name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" v-model="params.disability_name">
                                </div>
                                <div class="flex flex-col col-span-1">
                                    <div class="text-gray-700 text-center px-4 py-2 m-2">
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                            送信
                                        </button>
                                    </div>
                                </div>
                        </div>

            </form>   
        
        
        <hr>
        <h5>
            読み取った文字を上のフォームに当てはめてください。<br>
        </h5>
        
        <div v-show="isModeVideo">
            <div class="float-right">
                <span class="text-right" v-if="this.timeCount > 0">
                 
                    &nbsp;&nbsp;&nbsp;
                    
                     </span>
                     
                     <!--福島先生コード-->
                      <div>
                          <video autoplay muted playsinline id="video"></video>
                      </div>
    
             　 <button type="button" button id="button" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">写真を撮る</button>
                <!--<button type="button" button id="take-photo" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded" @click="capture">キャプチャ</button>-->
                 
            </div>  
                <div>
                   <img id="image" alt="" />
                </div>
            <!--カメラが映っている部分が表示されている箇所↓-->
            <div class="flex">
                 <style>
                    <div class="relative h-screen">
                      <video id="camera-stream" class="absolute inset-0 w-full h-full object-cover"></video>
                       <div id="camera-range" class="absolute inset-10 w-80 h-80 border-2 border-red-500"></div>
                    </div>
        
                  </style>
              
              <!--福島先生コード-->
              <!--<form action="storage.php" method="post">-->
                 <input type="hidden" id="base64_image" name="base64_image" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded" value="" />
                  <!--<button type="button" button id="" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">画像保存</button>-->
              </form>
    
                    <div id="video-container">
                        
                            <video id="camera-stream" autoplay></video>
                            <div id="camera-range"></div>
                    </div>
    　　　　     <input type="text" id="text-box" class="w-300 h-10">
　　　　　　
        </div>
          <div v-show="isModeImage">
           <!--   <div class="float-right">-->
           <!--      キャプチャしました。<br>この画像から情報を読みとりますか？-->
           <!--      <br>-->
           <!--       <div class="text-right">-->
           <!--         <button type="button" class="bg-gray-100 text-gray-700 rounded-md py-2 px-4 mr-2" @click="cancel">キャンセル</button>-->
           <!--         <button type="button" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md" @click="extract">OK</button>-->
           <!--       </div>-->
           
           <!--extractedText という変数が truthy（真）である場合、div 要素が描画される↓-->
           <!--       <div v-if="extractedText" class="whitespace-pre"></div>-->
            
           <!--        <hr class="border-t-2 border-gray-500">-->
           <!--         <span class="badge badge-primary">取得されたテキスト</span>-->
　　　　　　　　　　　<!--　<div v-text="extractedText" @mouseup="selection"></div>-->
               <!--extractedTextという変数に格納されたテキストを表示する.その要素がクリックされた時にselectionメソッドを実行するように設定-->
           <!--        <div class="mt-2" @mouseup="selection" v-text="extractedText"></div>-->
           <!--       </div>-->
              <!--</div>-->
              <!--キャンバス要素-->
              <canvas ref="canvas" width="640" height="480"></canvas>
        　<!--</div>-->
        　<!--左上のフロート部分↓-->
        　　　　<!--<div class="modal fixed z-10 inset-0 overflow-y-auto" id="modal">-->
            <!--      <div class="modal-dialog inline-block align-middle max-w-md w-full p-4 my-8 overflow-hidden text-left transition-all transform bg-white shadow-xl rounded">-->
            <!--        <div class="modal-content">-->
            <!--           <div class="modal-header">-->
            <!--      　　　　　　<h5 class="modal-title text-lg font-bold">自動入力する項目を選択してください</h5>-->
            <!--           </div>-->
                        


      <!-- ここにモーダルの中身を記述 -->
                    
                    <!-- ここにコンソールに表示された文章が反映される↓ -->
                 <!--<input type="text" id="text-box">-->
               
        　　　　　　　　　　　　　　　　　<!--<div class="modal-body">-->
            　　　　　　　　　　　　　<!--　　 <strong class="font-bold">選択されたテキスト：</strong>-->
              　　　　　　　　　　　　　　　　　　　<span class="font-bold" v-text="selectedText"></span>
           <!--<strong>選択されたテキスト：</strong> <span v-text="selectedText"></span>-->
        　　　　　　　        　　　　　　<br>
          　　　　　        　　　　<br>
            　　　　　　　  　　　　　　　<div class="mt-8">
              　　　　　　　     　　　　　　<h3 class="float-left" v-for="(text, key) in inputs">
                  <!--ボタンがクリックされると、@click.preventディレクティブによって関数enterTextが呼び出される-->
               　 <a class="badge badge-primary" href="#" v-text="text" @click.prevent="enterText(key)"></a>&nbsp;
              　　　　　　　     　　　　　
              　　　　　　　       　　　　</h3>
                                </div>
                          </div>
                    </div>
        　         </div>
        　       </div>
        
             
            
    
   
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

async function main() {
  try {
    const video = document.querySelector("#camera-stream");
    const button = document.querySelector("#button");
    const image = document.querySelector("#image");
 　 let dataUrl = "";

    const stream = await navigator.mediaDevices.getUserMedia({
      video: {
        facingMode: "user",
      },
      audio: false,
    });

    video.srcObject = stream;

    const [track] = stream.getVideoTracks();
    const settings = track.getSettings();
    const { width, height } = settings;

const base64_image = document.getElementById("base64_image");

   button.addEventListener("click", async (event) => {
  const canvas = document.createElement("canvas");
  canvas.setAttribute("width", width);
  canvas.setAttribute("height", height);

  const context = canvas.getContext("2d");
  context.drawImage(video, 0, 0, width, height);


// Webカメラで撮った画像をURLに変換
  dataUrl = canvas.toDataURL("image/jpeg");
    image.src = dataUrl;

  console.log(dataUrl); // 追加
 image.onload = async () => {
      if (!dataUrl) {
        console.log("dataUrl is undefined");
        return;
      }
       // recognizeText関数が呼び出され、テキスト認識を実行
      await recognizeText(dataUrl);
};
    });
  } catch (err) {
    console.error(err);
  }
}





// 福島先生コード↑


// HTMLのフォームでユーザーがアップロードした画像のBase64エンコードされたデータを取得
// Google Cloud Vision APIの「TEXT_DETECTION」機能を使用するためのリクエストデータを作成します。
async function recognizeText(dataUrl) {
  if (!dataUrl) return; // 追加
  const base64Data = dataUrl.split(",")[1];
  const requestData = {
    requests: [
      {
        image: {
          content: base64Data,
        },
        features: [{ type: "TEXT_DETECTION" }],
      },
    ],
  };
const apiKey = "{{ config('app.api_key') }}";
const response = await fetch(
 "https://vision.googleapis.com/v1/images:annotate?key=" + apiKey,
  {
    method: "POST",
    body: JSON.stringify(requestData),
  }
);
  
//   応答データからテキストを抽出し、コンソールに出力
 const data = await response.json();
  const text = data.responses[0].fullTextAnnotation.text;
  console.log(text);
  //   テキストボックスにコンソールに表示された文字を入れる
  document.getElementById("text-box").value = text;
}
main();
// recognizeText();

</script>
 <!--<input type="file" id="file-input" accept="image/*"><br>-->
  <div id="result"></div>
</body>
</html>
    
    <!--右側エリア[START]-->
    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
    <!--ある↑-->
         <!-- 現在の本 -->
      @if (count($people) > 0)
            @foreach ($people as $person)
                  
    
              
                 <!--<section class="text-gray-600 body-font" _msthidden="14">-->
             　 <!--<div class="container px-5 py-24 mx-auto" _msthidden="14">-->
             　     <!--ある↑-->
            
              <!--<div class="w-24 h-full bg-indigo-500"></div>-->
             　<!-- </div>-->
              
    　      
                
            <!-- 　　　<div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4" _msthidden="12">-->
            <!--          <div class="p-4 md:w-1/3 sm:mb-0 mb-6" _msthidden="4">-->
            <!--  　　　　　　<div class="rounded-lg h-64 overflow-hidden" _msthidden="1">-->
            <!--ある↑-->
            <!--    　　　　<img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1203x503" _msthidden="A" _mstalt="99710" _msthash="173">-->
              　　 
                
        
            <!--    <h2 class="text-xl font-medium title-font text-gray-900 mt-5" _msttexthash="204971" _msthidden="1" _msthash="178">{{ $person->person_name }}</h2>-->
            <!--    <p class="text-base leading-relaxed mt-2" _msttexthash="12667447" _msthidden="1" _msthash="179">{{ $person->date_of_birth }}</p>-->
            <!--      <div>{{ $person->person_name }}</div>-->
                  
            <!--　     　</div>-->
            　　　　　<section class="text-gray-600 body-font" _msthidden="18">
            　   　　　 　　<div class="container px-5 py-24 mx-auto" _msthidden="18">
    　　　　　　　　　　　　　　　　　　　　<div class="flex flex-wrap -m-4" _msthidden="18">
   　　　　　　　　　　　　　　　　　　　　　　　　　   <div class="p-4 lg:w-1/3" _msthidden="6">
        　　　　　　　　            　　　　　　<div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative" _msthidden="6">
                                          <!--<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1" _msttexthash="84188" _msthidden="1" _msthash="63">CATEGORY</h2>-->
                                                  <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3" _msttexthash="882973" _msthidden="1" _msthash="64">{{$person->person_name}}</h1>
                                                      <p class="leading-relaxed mb-3" _msttexthash="5575180" _msthidden="1" _msthash="65">{{$person->date_of_birth}}生まれ</p>
                                                      　<p class="leading-relaxed mb-3" _msttexthash="5575180" _msthidden="1" _msthash="65">{{$person->gender}}</p>
                                                             <a class="text-indigo-500 inline-flex items-center" _msthidden="1">
                  　　　                                           <div class="inline-flex items-center">
                                                          　　        <form action="{{ url('people/'.$person->id.'/edit') }}" method="GET">
                                                                         @csrf
                                                                         
                                                                         
                                                                          <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg text-lg mr-4">
                                                                            詳細を見る
                                                                          </button>
                                                                          
                                                                    </form>          
                                                                    <form action="{{ url('people/'.$person->id) }}" method="POST">
                                                                     @csrf
                                                                     @method('DELETE')
                                                                    
                                                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg text-lg">
                                                                        削除
                                                                    </button>
                                                                    
                                                                    </form>
                  　　　                                           </div>
                  　　　                     
                  　　　               </div>
   　　　                          </div>
   　　　                      </div>
   　　　                  </div>
   　　　              
   　　　              
                   
                        
                     
                     
                  </div>
                  
                  <div>
                <!--ある↑-->
                    
                  </div>
                
                </div>
            @endforeach
        @endif
    </div>
    <!--右側エリア[[END]--> 

</div>
 <!--全エリア[END]-->

</x-app-layout>
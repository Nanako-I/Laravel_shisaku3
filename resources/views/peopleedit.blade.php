<!-- resources/views/books.blade.php -->
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
    <!--<div class="flex bg-gray-100">-->

        <!--左エリア[START]--> 
        <!--<div class="text-gray-700 text-left px-4 py-4 m-2">-->
            
            <!--<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">-->
            <!--    <div class="p-6 bg-white border-b border-gray-500 font-bold">-->
                　
            <!--    </div>-->
            <!--</div>-->


            <!-- 本のタイトル -->
        <form action="{{ url('people' ) }}" method="POST" class="w-full max-w-lg">
                        @method('PATCH')
                        @csrf
                        
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center" _msthidden="5">
                <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center" _msthidden="4">
                    <h1 class="title-font sm:text-4xl text-5xl mb-4 font-medium text-gray-900" _msttexthash="1004770" _msthidden="1" _msthash="63">{{$person->person_name}}
                        
                    </h1>
                            <p class="mb-8 leading-relaxed" _msttexthash="26864591" _msthidden="1" _msthash="64">{{$person->date_of_birth}}生まれ</p>
                            <p class="mb-8 leading-relaxed" _msttexthash="26864591" _msthidden="1" _msthash="64">{{$person->gender}}</p>
                            <p class="mb-8 leading-relaxed" _msttexthash="26864591" _msthidden="1" _msthash="64">{{$person->disability_name}}</p>
                           
                                
                      
                </div>      
    
            </div>          
                      
                        <!--<div class="flex flex-col px-2 py-2">-->
                           <!-- カラム１ -->
                            <!--<div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">-->
            
                       
        </form>
        </div>
    </div>
        <!--左エリア[END]--> 
         
        <form action="{{ url('people/{id}/edit') }}" method="POST" class="w-full max-w-lg">
      
                        @csrf
                        <input type="hidden" name="id" value="{{ $person->id }}">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-1">
                        体温
                        </label>
                        <input name="temperature" id="text-box" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                       
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                送信
                            </button>
                            
        </form>
    <!--右側エリア[START]-->
    <div class="flex-1 text-gray-700 text-left bg-blue-100 px-4 py-2 m-2">
         <!-- 現在の本 -->
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
    　　　　     <!--<input type="text" id="text-box" class="w-300 h-10">-->
　　　　　　
        </div>
          <div v-show="isModeImage">
              <canvas ref="canvas" width="640" height="480"></canvas>
    </div>
    <!--右側エリア[[END]--> 

</div>
 <!--全エリア[END]-->
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
</x-app-layout>
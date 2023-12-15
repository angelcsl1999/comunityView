
@extends('layouts.main')

@section('content')

<!-- component -->

    <div class="gallery border-2 rounded mx-auto m-5 bg-gray-100" style="width:750px;">
        <div class="top flex p-2 border-b select-none">
          <div class="heading text-gray-800 w-full pl-3 font-semibold my-auto"></div>
          <div class="buttons ml-auto flex text-gray-600 mr-1">
            <svg action="prev" class="w-7 border-2 rounded-l-lg p-1 cursor-pointer border-r-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path action="prev" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            <svg action="next" class="w-7 border-2 rounded-r-lg p-1 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path action="next" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
          </div>
        </div>
        <div class="content-area w-full h-96 overflow-hidden">
          <div class="platform shadow-xl h-full flex">
            <!-- frame start -->
            <div class="each-frame border-box flex-none h-full" title="Bienvenido"> <!-- title shows in top -->
                <!-- this is full editable area -->
                <div class="main flex w-full p-8"> 
                    <div class="sub w-4/6 my-auto">
                        <img class="w-full p-8" src="{{asset('storage/images/ComunityView-logos_white.png') }}" alt="">
                    </div>
                    <div class="sub w-full my-auto">
                        <div class="head text-3xl font-bold mb-4">ComunityView</div>
                        <div class="long-text text-lg">ComunityView es el lugar donde se encuentran los fans del cine, series y contenido independiente.Disfruta de nuestro catalogo Premium, explora las ultimas tendencias y unete a los foros de la comunidad</div> 
                        <!-- this buttons are usable everywhere inside gallery element -->
                        <div class="goto border border-gray-400 text-sm font-semibold inline-block mt-2 p-1 px-2 rounded cursor-pointer" action="goto" goto="2">Premium</div><!-- add (action="goto" goto="[val]{0 means first frame and so on}") attribute to jump into frames -->
                        <div class="goto border border-gray-400 text-sm font-semibold inline-block mt-2 p-1 px-2 rounded cursor-pointer" action="goto" goto="end">Foros</div> 
                    </div>
                </div>
            </div>
            <!-- frame end -->

            <div class="each-frame border-box flex-none h-full" title="Novedades"> <!-- title shows in top -->
                <!-- this is full editable area -->
                <div class="main flex w-full p-8"> 
                    <div class="sub w-4/6 my-auto">
                        <img class="w-full p-8" src="{{asset('storage/images/moon.avif') }}" alt="">
                    </div>
                    <div class="sub w-full my-auto">
                        <div class="head text-3xl font-bold mb-4">Explora las ultimas novedades </div>
                        <div class="long-text text-lg">Descubre tendencias y estrenos referentes al mundo audiovisual.  ¿Te apuntas?</div> 
                        <br>
                            <a href="{{url('/movies')}}"> 
                                <div class="long-text text-lg font-bold">¡Quiero saber los ultimos estrenos!</div> 
                            </a>
                        <br>
                        <a href="{{url('/movies')}}"> 
                            <div class="long-text text-lg font-bold">¡Quiero ver las series mas populares!</div> 
                        </a>
                    </div>
                    
                </div>
            </div>
            <!-- frame end -->

            <div class="each-frame border-box flex-none h-full" title="Premium"> <!-- title shows in top -->
                <!-- this is full editable area -->
                <div class="main flex w-full p-8"> 
                    <div class="sub w-4/6 my-auto">
                        <img class="w-full p-8" src="{{asset('storage/images/vip.png') }}" alt="">
                    </div>
                    <div class="sub w-full my-auto">
                        <div class="head text-3xl font-bold mb-4">Contenido Premium</div>
                        <div class="long-text text-lg">Siendo premium podrás de disfrutar peliculas y contenido especial dieseñado por nuestros creadores.</div> 
                        <br>
                        @if(!Auth::user()->hasRole('premium'))
                        <a href="{{url('/plans')}}"> 
                        @else
                        <a href="{{url('/premium')}}"> 
                        @endif  
                            <div class="long-text text-lg font-bold">¡Quiero ver contenido exclusivo!</div> 
                        </a>
                    </div>
                </div>
            </div>
            <!-- frame end -->

            <div class="each-frame border-box flex-none h-full" title="Foros"> <!-- title shows in top -->
                <!-- this is full editable area -->
                <div class="main flex w-full p-8"> 
                    <div class="sub w-4/6 my-auto">
                        <img class="w-full p-8" src="{{asset('storage/images/comunity_simple.png') }}" alt="">
                    </div>
                    <div class="sub w-full my-auto">
                        <div class="head text-3xl font-bold mb-4">Foros</div>
                        <div class="long-text text-lg">Aqui nuestra comunidad comenta las ultimas novedades, con diferentes temáticas, aportando ideas, pensamientos e incluso hablar directamente con nuestros creadores vips</div> 
                        <a href="{{url('/foros')}}"> 
                            <div class="long-text text-lg font-bold">¡Quiero unirme a la conversación!</div> 
                        </a>
                        <div class="goto border border-gray-400 text-sm font-semibold inline-block mt-2 p-1 px-2 rounded cursor-pointer" action="goto" goto="0">Volver al inicio</div>
                    </div>
                </div>
            </div>
            <!-- frame end -->


          </div>
        </div>
      </div>

      <style>
          .platform{
              position: relative;
              transition:right 0.3s;
          }
          .body{background-color:white !important;}
      </style>

      <script>
          function gallery(){
              this.index=0;
              this.load=function(){
                this.rootEl = document.querySelector(".gallery");
                this.platform = this.rootEl.querySelector(".platform");
                this.frames = this.platform.querySelectorAll(".each-frame");
                this.contentArea = this.rootEl.querySelector(".content-area");      
                this.width = parseInt(this.rootEl.style.width);
                this.limit = {start:0,end:this.frames.length-1};
                this.frames.forEach(each=>{each.style.width=this.width+"px";});   
                this.goto(this.index);      
              }
              this.set_title = function(){this.rootEl.querySelector(".heading").innerText=this.frames[this.index].getAttribute("title");}
              this.next = function(){this.platform.style.right=this.width * ++this.index + "px";this.set_title();}
              this.prev = function(){this.platform.style.right=this.width * --this.index + "px";this.set_title();}
              this.goto = function(index){this.platform.style.right = this.width * index + "px";this.index=index;this.set_title();}
              this.load();
          }
          var G = new gallery();
            G.rootEl.addEventListener("click",function(t){
                var val = t.target.getAttribute("action");
                if(val == "next" && G.index != G.limit.end){G.next();}
                if(val == "prev" && G.index != G.limit.start){G.prev();}
                if(val == "goto"){
                    let rv = t.target.getAttribute("goto");
                    rv = rv == "end" ? G.limit.end:rv;
                    G.goto(parseInt(rv));
                }
            });
            document.addEventListener("keyup",function(t){
                var val = t.keyCode;
                if(val == 39 && G.index != G.limit.end){G.next();}
                if(val == 37 && G.index != G.limit.start){G.prev();}
            });

            // run G.load() if new data loaded with ajax

      </script>

    
@endsection

@section('scripts')

<style>
    .platform{
        position: relative;
        transition:right 0.3s;
    }
    .body{background-color:white !important;}
</style>

<script>
    function gallery(){
        this.index=0;
        this.load=function(){
          this.rootEl = document.querySelector(".gallery");
          this.platform = this.rootEl.querySelector(".platform");
          this.frames = this.platform.querySelectorAll(".each-frame");
          this.contentArea = this.rootEl.querySelector(".content-area");      
          this.width = parseInt(this.rootEl.style.width);
          this.limit = {start:0,end:this.frames.length-1};
          this.frames.forEach(each=>{each.style.width=this.width+"px";});   
          this.goto(this.index);      
        }
        this.set_title = function(){this.rootEl.querySelector(".heading").innerText=this.frames[this.index].getAttribute("title");}
        this.next = function(){this.platform.style.right=this.width * ++this.index + "px";this.set_title();}
        this.prev = function(){this.platform.style.right=this.width * --this.index + "px";this.set_title();}
        this.goto = function(index){this.platform.style.right = this.width * index + "px";this.index=index;this.set_title();}
        this.load();
    }
    var G = new gallery();
      G.rootEl.addEventListener("click",function(t){
          var val = t.target.getAttribute("action");
          if(val == "next" && G.index != G.limit.end){G.next();}
          if(val == "prev" && G.index != G.limit.start){G.prev();}
          if(val == "goto"){
              let rv = t.target.getAttribute("goto");
              rv = rv == "end" ? G.limit.end:rv;
              G.goto(parseInt(rv));
          }
      });
      document.addEventListener("keyup",function(t){
          var val = t.keyCode;
          if(val == 39 && G.index != G.limit.end){G.next();}
          if(val == 37 && G.index != G.limit.start){G.prev();}
      });

      // run G.load() if new data loaded with ajax
@endsection
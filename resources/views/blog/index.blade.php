@extends('layouts.main')

@section('content')
    <section id="blog-section" >
     <div class="container">
       <div class="row">
         <div class="col-lg-8">
           <div class="row">
            @foreach($posts as $post)
            <div class="col-lg-12 col-md-12">
                <aside>
                @if($post->image_url === '')
                    <img src="{{ $post->image}}" class="img-responsive">
                @endif
                    <div class="content-title">
                    <div class="text-center">
                    <h3><a href="{{route('show', $post->slug)}}">{{$post->title}}</a></h3>
                    </div>
                    <div class="text-justify">
                        <h4>{{$post->excerpt}}</h4>
                    </div>
                    </div>
                    <div class="content-footer">
                    <img class="user-small-img" src="{{$post->image_url}}">
                    <span style="font-size: 16px;color: #fff;"></span>
                    <span class="">
                    <a href="#"></i> {{ $post->author->name}}</a> 
                    <a href="#"></i> {{ $post->date }}</a> 
                    {{-- <a href="#"></i> {{ $post->author->name}}</a>  --}}
                    <a href="#" data-toggle="tooltip" data-placement="left" title="Comments"><i class="fa fa-comments" ></i> 30</a>
                    <a href="#" data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-heart"></i> 20</a>                  
                                     
                    </span>
                        <div class="user-ditels">
                        <div class="user-img"><img src="{{$post->image_url}}" class="img-responsive"></div>
                            <span class="user-full-ditels">
                            <h3>Sumit Kumar</h3>
                            <p>Web & Graphics Disigner</p>
                            </span>
                            <div class="social-icon">
                            <a href="#"><i class="fa fa-facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus" data-toggle="tooltip" data-placement="bottom" title="Google Plus"></i></a>
                            <a href="#"><i class="fa fa-youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube"></i></a>
                            <a href="#"><i class="fa fa-github" data-toggle="tooltip" data-placement="bottom" title="Github"></i></a>				
                        </div>
                        </div>
                    </div>
                </aside>
            </div>
            @endforeach

            </div>
            {{ $posts->links()}}
          </div>
               
@include('layouts.sidebar')
           </div>
         </div>
     
    </section>
    
    
@endsection
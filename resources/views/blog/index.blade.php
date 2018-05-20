@extends('layouts.main')

@section('content')
    <section id="blog-section" >
     <div class="container">
       <div class="row">
         <div class="col-lg-8">
           <div class="row">
            
            @if(! $posts->count())
            <div class="col-lg-12 col-md-12">
                <aside>
                    <div class="alert alert-warning">
                    <p>Nothing Found</p>
                    </div>
                </aside>
            </div>
            @else
                @if(isset($categoryName)) 
                    <div class="col-lg-12 col-md-12">
                        <aside>
                            <div class="alert alert-info">
                                <p>Category: <strong>{{$categoryName}}</strong></p>
                            </div>
                        </aside>
                    </div>
                @endif

                @foreach($posts as $post)
                <div class="col-lg-12 col-md-12">
                    <aside>
                                        
                        @if($post->image_url !== NULL)
                            <img src="{{ $post->image_url}}" class="img-responsive">
                        @endif
                        <div class="content-title">
                        <div class="text-left">
                        <h2><a href="{{route('show', $post->slug)}}">{{$post->title}}</a></h2>
                        </div>
                        <div class="text-left">
                            <h4>{!! $post->excerpt_html !!}</h4>
                        </div>
                        </div>
                        <div class="content-footer">
                        {{-- <img class="user-small-img" src="{{$post->image_url}}"> --}}
                        {{-- <span style="font-size: 16px;color: #fff;"></span> --}}
                        <span class="">
                        <i class="glyphicon glyphicon-user"></i>    
                        <a href="#"></i> {{ $post->author->name}}</a> 
                        <i class="glyphicon glyphicon-calendar"></i>
                        <a href="#"></i> {{ $post->date }}</a> 
                        <i class="glyphicon glyphicon-folder-open"></i>
                        <a href="{{ route('category', $post->category->slug) }}"> {{$post->category->title}} </a> 
                        {{-- <a href="#"></i> {{ $post->author->name}}</a>  --}}
                        {{-- <a href="#" data-toggle="tooltip" data-placement="left" title="Comments"><i class="fa fa-comments" ></i> 30</a>
                        <a href="#" data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-heart"></i> 20</a>                   --}}
                                        
                        </span>
                        </div>
                    </aside>
                </div>
                @endforeach
            @endif
            </div>
            {{ $posts->links()}}
          </div>
               
@include('layouts.sidebar')
           </div>
         </div>
     
    </section>
    
    
@endsection
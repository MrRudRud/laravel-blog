
@extends('layouts.main')

@section('content')
    <section id="blog-section" >
     <div class="container">
       <div class="row">
         <div class="col-lg-8">
           <div class="row">
              <div class="col-lg-12 col-md-12">
             <aside>
            @if($post->image_url)
              <img src="{{ $post->image_url }}" class="img-responsive">
            @endif
                <div class="content-title">
				<div class="text-center">
          <h2>{{ $post->title }}</h2>
        </div>
        <div class="">
            <h4>{!! $post->body_html !!}</h4>
        </div>        
				</div>
				<div class="content-footer">
        <img class="user-small-img" src="{{$post->image}}">
				{{-- <span style="font-size: 16px;color: #fff;">Sumit Kumar</span> --}}
				<span class="">
        <a href="#"></i> {{ $post->author->name}}</a> 
        <a href="#"></i> {{ $post->date }}</a>           
				<a href="#" data-toggle="tooltip" data-placement="left" title="Comments"><i class="fa fa-comments" ></i> 30</a>
				<a href="#" data-toggle="tooltip" data-placement="right" title="Loved"><i class="fa fa-heart"></i> 20</a>                  
				</span>

				</div>
             </aside>
            </div>
            {{-- Comments --}}
              <div class="col-lg-12 col-md-12">
            @include('blog.comment')
            </div>
            {{-- end of comments --}}

           </div>
         </div>     
        @include('layouts.sidebar')
           </div>
         </div>
     
    </section>
    
    
@endsection
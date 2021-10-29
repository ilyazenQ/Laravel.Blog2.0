@extends('layouts.app')
@section('seo')
<title>Название</title>
<meta name="keywords" content="КейВорд">
<meta name="description" content="Описание">
@endsection
@section('content')
<main class="contatiner">

   @include('app.partials.hero')

   <section class="main-body">
      
         <div class=" m-1 row g-3 mt-5 mb-5">

            @foreach($articles as $article)
         <div class="col-md-4">
             <div class="card">
                 <div class="card-img-top image-card"> 
                    <a href="#"><img src="{{$article->img}}" alt="..."></a> </div>
                    
                 <div class="card-body"> 
                  @foreach ($article->categories as $category)
                    <a href="{{route('article.category',$category->slug)}}" 
                     class="text-uppercase text-danger fw-bold fs-6 article-category-link">
                     {{$category->label}}
                  </a>
                  @endforeach
                     <h6 class="card-title text-dark mt-2">{{$article->title}}</h6>
                     <p class="card-text">
                        {{$article->preview}}
                       </p> 
                     <a href="#" class="text-dark btn btn-outline-info btn-lg">Читать</a>
                     <div class="mt-4 about d-flex justify-content-between align-items-center"> 
                        @foreach ($article->tags as $tag)
                        <a href="{{route('article.tag',$tag->slug)}}"  class="text-primary fw-bold fs-6">
                           <span>{{$tag->label}}</span>
                        </a> 
                        @endforeach
                        <span>{{$article->createdAtForHumans()}}</span>
                       <!--  <a href=""  class="text-primary fw-bold fs-6">
                        <span>5 min read</span>
                     </a> -->
                      </div> 
                 </div>
             </div>
            

         </div>
         @endforeach
 </div>

 
 
   </section>
   <div class="mx-auto" style="width:max-content;">
      {{ $articles->links() }}
   </div>
 
 </main>
 @include('app.partials.popup')

 @endsection
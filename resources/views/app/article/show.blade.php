@extends('layouts.app')
@section('content')
<main class="container">
      
    
   <div class="p-5  bg-light rounded-3 card-cover" style="background-image: url('{{$article->img}}');">
     <div class="container-fluid py-2 text-white text-shadow-1">
       <h1 class="display-5 fw-bold">{{$article->title}}</h1>
       <p class="col-md-8 fs-4">
         {{$article->preview}}
      </p>
     </div>
   </div>
   
  
   <div class="row g-5">
     <div class="col-md-8">
       

       <article class="blog-post">
 
         <p class="blog-post-meta">{{cratedAtWithoutHours($article->created_at)}}<br>
            @foreach($article->categories as $category)
            <a href="{{ route('article.category',$category->id)}}">{{$category->label}}</a>
            @endforeach
         </p>
         <div class="tagcloud06">
           <ul>
              @foreach($article->tags as $tag)
              <li><a href="{{ route('article.tag',$tag->id)}}"><span>{{$tag->label}}</span></a></li>
              @endforeach
              
             
           </ul>
        </div>
        
        {{$article->body}}
         
 
     </div>
 
     <div class="col-md-4">
       <div class="position-sticky" style="top: 2rem;">
         <div class="p-4 mb-1 bg-light rounded">
           <div class="col">
             <div class="card">
               <div class="card-body">
                 <h5 class="card-title">Здоровая спина</h5>
                 <p class="card-text">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking..</p>
                 <a href="#" class="btn btn-primary">Читать</a>
               </div>
             </div>
           </div>
         </div>

         <div class="p-4 mb-1 bg-light rounded">
           <div class="col">
             <div class="card">
               <div class="card-body">
                 <h5 class="card-title">Здоровая спина</h5>
                 <p class="card-text">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking..</p>
                 <a href="#" class="btn btn-primary">Читать</a>
               </div>
             </div>
           </div>
         </div>

         <div class="p-4 mb-1 bg-light rounded">
           <div class="col">
             <div class="card">
               <div class="card-body">
                 <h5 class="card-title">Здоровая спина</h5>
                 <p class="card-text">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking..</p>
                 <a href="#" class="btn btn-primary">Читать</a>
               </div>
             </div>
           </div>
         </div>
 
         
 
         <div class="p-4">
           
           <ol class="list-unstyled">
             <div class="d-flex justify-content-center flex-row">
               <a href="#" class="py-2"><img src="/img/instagram.svg" class="hero-icon mx-2" alt="instagramm" width="60px"></a>
               <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="/img/mail.svg" class="hero-icon mx-2" alt="Mail" width="65px"></button>
             </div>
           </ol>
         </div>
       </div>
     </div>
   </div>
</main>
 @include('app.partials.popup')

 @endsection
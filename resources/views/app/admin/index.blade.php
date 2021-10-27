@extends('layouts.admin')
@section('content')
<div class="container-fluid">
   <div class="row">
      @include('app.partials.admin.sidebar')

 
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
       <h2>Посты</h2>
       <div class="table-responsive">
         <table class="table table-striped table-sm">
           <thead>
             <tr>
               <th scope="col">ID</th>
               <th scope="col">Название</th>
               <th scope="col">Превью</th>
               <th scope="col">Категория</th>
               <th scope="col">Дата</th>
               <th scope="col">Действия</th>
             </tr>
           </thead>
           <tbody>
            @foreach($articles as $article)

             <tr>
               <td>{{$article->id}}</td>
               <td><a href="{{ route('article.show',$article->slug) }}" class="text-dark">{{$article->title}}</a></td>
               <td><img src="{{$article->img}}" alt="Превью" width="80" height="80">
               </td>
               <td>
               @foreach ($article->categories as $category)
                  {{$category->label}}
               @endforeach
               </td>
               <td>{{$article->created_at}}</td>
               <td>
                  <button type="button" class="btn btn-outline-danger">X</button>
                  <a href="{{ route('post.show', $article->slug) }}" class="btn btn-outline-primary">Р</a>
                  <button type="button" class="btn btn-outline-success">П</button>
               </td>
             </tr>
             @endforeach

             
           </tbody>
         </table>
       </div>
       <div class="mx-auto" style="width:max-content;">
         {{ $articles->links() }}
      </div>
     </main>
   </div>
 </div>
 @endsection
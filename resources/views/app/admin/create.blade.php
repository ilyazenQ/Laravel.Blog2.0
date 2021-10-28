@extends('layouts.admin')
@section('content')
<div class="container-fluid">
   <div class="row">
      @include('app.partials.admin.sidebar')

 
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
        
     
         <div class="row g-5">
           
           <div class="col">
             <h4 class="mb-3">Новая статья</h4>
             <form method="POST" action="{{ route('post.store')}}" enctype="multipart/form-data">
              @csrf
              @method('POST')
               <div class="row g-3">
                 <div>
                   <label for="title" class="form-label">Title</label>
                   <input type="text" class="form-control" id="title" name="title"
                   value="" required>
                 </div>
                 <div class="form-group">
                  <img src="" alt="" class="img-responsive" width="200">
                  <input type="file" id="exampleInputFile" name="img">
                </div>
                
                 <div class="col-md-5">
                  <label for="category" class="form-label">Категории</label>
                  <select class="form-select multiple" multiple  
                  aria-label="multiple" name="categories[]"
                   id="category" required>
                   @foreach($allCategories as $category)
                   
                    <option>{{$category->label}}</option>
                    
                    @endforeach
                  </select>
                </div>
               
                <div class="col-md-5">
                  <label for="tag" class="form-label">Теги</label>
                  <select class="form-select multiple" multiple  
                  aria-label="multiple" name="tags[]"
                   id="tag" required>
                   @foreach($allTags as $tag)

                   <option>{{$tag->label}}</option>
                   
                   @endforeach
                  </select>
                </div>

                <div>
                  <label for="prev" class="form-label">Превью</label>
                  <textarea rows="3" name="preview"
                  class="form-control">
                  
                  </textarea>
                </div>
                
                <div>
                  <label for="body"  class="form-label">Основной текст</label>
                  <textarea rows="20" name="body"
                  class="form-control">
                  
                  </textarea>
                </div>
     
               </div>
               
               
     
               <hr class="my-4">
     
      
     
               <div class="my-3">
                 <div class="form-check">
                   <input id="credit" name="production" value="0" type="radio" class="form-check-input" 
                  
                   required>
                   <label class="form-check-label" for="credit">Черновик</label>
                 </div>
                 <div class="form-check">
                   <input id="debit" name="production" value="1" type="radio" class="form-check-input" 
                   checked
                   required>
                   <label class="form-check-label" for="debit">Запостить</label>
                 </div>
                 
               </div>
               <div class="my-3">
                <div class="form-check">
                  <input class="form-check-input"
                   name="recommend" type="checkbox" value="1"
                  
                   id="flexCheckDefault">
                  <label class="form-check-label"
                    for="flexCheckDefault">
                    Рекомендовать
                  </label>
                </div>
              </div>
               <hr class="my-4">
     
               <button class="w-100 btn btn-primary btn-lg" type="submit">Опубликовать</button>
             </form>
           </div>
         </div>
       
       
       
     </main>
   </div>
 </div>
 @endsection
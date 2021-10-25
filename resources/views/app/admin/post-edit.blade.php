@extends('layouts.admin')
@section('content')
<div class="container-fluid">
   <div class="row">
      @include('app.partials.admin.sidebar')

 
     <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      
        
     
         <div class="row g-5">
           
           <div class="col">
             <h4 class="mb-3">POst title</h4>
             <form novalidate>
               <div class="row g-3">
                 <div>
                   <label for="Title" class="form-label">Title</label>
                   <input type="text" class="form-control" id="title" required>
                 </div>
                 <div class="col-md-5">
                  <label for="category" class="form-label">Категории</label>
                  <select class="form-select multiple" multiple  
                  aria-label="multiple"
                   id="category" required>
                    <option>United States</option>
                    <option>United States</option>
                    <option>United States</option>
                    <option>United States</option>
                  </select>
                </div>
    
                <div class="col-md-5">
                  <label for="tag" class="form-label">Теги</label>
                  <select class="form-select multiple" multiple  
                  aria-label="multiple"
                   id="tag" required>
                    <option>United States</option>
                    <option>United States</option>
                    <option>United States</option>
                    <option>United States</option>
                  </select>
                </div>

                <div>
                  <label for="prev" class="form-label">Превью</label>
                  <textarea rows="3"
                  class="form-control">
                  </textarea>
                </div>
                
                <div>
                  <label for="body" class="form-label">Основной текст</label>
                  <textarea rows="20"
                  class="form-control">
                  </textarea>
                </div>
     
               </div>
     
               
     
               <hr class="my-4">
     
      
     
               <div class="my-3">
                 <div class="form-check">
                   <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                   <label class="form-check-label" for="credit">Черновик</label>
                 </div>
                 <div class="form-check">
                   <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                   <label class="form-check-label" for="debit">Запостить</label>
                 </div>
                 
               </div>
     
     
               <hr class="my-4">
     
               <button class="w-100 btn btn-primary btn-lg" type="submit">Исправить</button>
             </form>
           </div>
         </div>
       
       
       
     </main>
   </div>
 </div>
 @endsection
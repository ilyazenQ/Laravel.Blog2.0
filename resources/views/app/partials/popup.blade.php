<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
   <div class="offcanvas-header border-bottom">
     
      <form class="pt-1 header-form-offcanvas">
         <input type="search" class="form-control" placeholder="Статья..." aria-label="Search">
         <button type="submit" class="btn btn-outline-primary">Искать</button>
         
       </form>
       <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
      </div>
      <div class="offcanvas-body">
         <nav class="py-2 offcanvas-nav">
          <ul class="nav flex-column">
            @foreach($allCategories as $category)
          <!--  <li class="nav-item"><a href="#" class="nav-link px-2 main-category-link"> Лечение & профилактика:</a></li>-->
             <li class="nav-item">
              <a href="{{route('article.category',$category->id)}}" class="nav-link  px-2
                @if(isSearchingCategory())
					        {{activeCategoryLink($searchingCategoryLabel, $category->label)}}
			        	@endif
                ">
                {{ $category->label}}</a>
               </li>
              @endforeach
           </ul>
          <!--  <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link px-2 main-category-link">Упражнения:</a></li>
             <li class="nav-item"><a href="#" class="nav-link  px-2 active-nav-link">Home</a></li>
             <li class="nav-item"><a href="#" class="nav-link  px-2">Features</a></li>
             <li class="nav-item"><a href="#" class="nav-link  px-2">Pricing</a></li>
             <li class="nav-item"><a href="#" class="nav-link  px-2">FAQs</a></li>
             <li class="nav-item"><a href="#" class="nav-link  px-2">About</a></li>
           </ul>-->
            
          </nav>
          
      </div>
 </div>
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Спасибо за подписку!</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form>
       <div class="modal-body">
         
           <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Email</label>
             <input type="email" class="form-control" id="exampleInputEmail1" required>
           </div>
         
       </div>
       <div class="modal-footer">
         
         <button type="submit" class="btn btn-primary">Отправить</button>
       </div>
     </form>
     </div>
   </div>
 </div>
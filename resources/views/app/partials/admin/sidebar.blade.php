<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse overflow-auto">
   <div class="position-sticky pt-3">
     <ul class="nav flex-column">

        <li class="nav-item">
      <form action="{{ route('category.store') }}" method="post">
         @csrf
            <label for="new-cat" class="form-label">Новая Категория</label>
            <input required name="label" type="text" class="form-control w-100" id="new-cat">
            <button type="submit" class="btn btn-outline-success w-25">+</button>
       </form> 
         </li>
      
        <li class="nav-item">
         <form action="{{ route('tag.store') }}" method="post">
           @csrf
      
            <label for="new-tag" class="form-label">Новый тег</label>
           <input required type="text" name="label" class="form-control w-100" id="new-tag">
           <button type="submit" class="btn btn-outline-success w-25">+</button>
         </form>   
         </li>

       <li class="nav-item">
         <a class="nav-link active" aria-current="page" href="#">
           <span data-feather="home"></span>
           Категории
         </a>
       </li>

       @foreach($allCategories as $category)

       <li class="nav-item">
         <form method="post" 
         action="{{ route('category.destroy', $category->id)}}" 
         class="nav-link  d-flex flex-row">
           @csrf
           @method('DELETE')
            <span data-feather="file"></span>
           {{ $category->label}}
           <button type="submit"  class="btn btn-outline-danger">X</button>
         </form>
       </li>
		 @endforeach

       
     

     <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">
          <span data-feather="home"></span>
          Теги
        </a>
      </li>
      @foreach($allTags as $tag)
      <li class="nav-item">
         <form method="post" action="{{ route('tag.destroy', $tag->id)}}" class="nav-link  d-flex flex-row">
            @csrf
            @method('DELETE')
          <span data-feather="file"></span>
          {{ $tag->label}}
          <button type="submit" class="btn btn-outline-danger">X</button> 
         </form>
      </li>
      @endforeach
    </ul>
   </div>
 </nav>
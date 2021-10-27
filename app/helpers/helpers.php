<?php
if (! function_exists('isSearchingCategory')) {
    function isSearchingCategory() {
        if(request()->is('articles/category/*')) {
            return true;
        }
        return false;
    }
}

if (! function_exists('activeArticleLink')) {
    function activeArticleLink (){
        if((request()->is('articles') or request()->is('articles/*'))) {
            return 'menu-link__active';
        }
        return '';
    }
}

if (! function_exists('cratedAtWithoutHours')) {
   function cratedAtWithoutHours($created_at) {
       return mb_strimwidth($created_at, 0, 10);
   }
}

if (! function_exists('activeTagLink')) {
    function activeTagLink($pageTag, $currentTag) {
        
        if($pageTag === $currentTag) {
            return 'active';
        }
        
    }
    
 }
 if (! function_exists('activeCategoryLink')) {
    function activeCategoryLink($pageCategory, $currentCategory) {
        
        if($pageCategory === $currentCategory) {
            return 'active-nav-link';
        }
        
    }
    
 }
 if (! function_exists('getActiveLabels')) { 
    function getActiveLabels($activeCollection) {
        $activeLabelArray = [];
        foreach($activeCollection->toArray() as $item) {
            $activeLabelArray[] = $item['label'];
        }
        return $activeLabelArray;
    }
 }

 if (! function_exists('selectIfActive')) {
    function selectIfActive($activeCollection,$currentLabel) {
        $activeLabelArray = getActiveLabels($activeCollection);

       if (in_array($currentLabel,$activeLabelArray)) {
          return 'selected';
        } 

        }
   
    }
    
 


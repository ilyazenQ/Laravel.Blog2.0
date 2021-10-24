<?php
if (! function_exists('activeMainLink')) {
    function activeMainLink() {
        if(request()->is('/')) {
            return 'menu-link__active';
        }
        return '';
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
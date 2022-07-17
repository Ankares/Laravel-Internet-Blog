<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('page-title')</title> 
  </head>
  <body>
    <div class="bg-secondary mb-3">
      <div class="container py-3 d-flex align-items-center justify-content-between">
        <div>
          <h2 class="text-white">WebSite</h2>
        </div>
        <div>
          <a href="/" class="text-white me-4 text-decoration-none">Главная</a>
          <a href="/about" class="text-white me-4 text-decoration-none">О нас</a>
          <a href="/blog" class="text-white me-4 text-decoration-none">Блог</a>
          <a href="/articles" class="text-white me-4 text-decoration-none">Статьи</a>
          <a href="/shop" class="text-white me-4 text-decoration-none">Магазин</a>
          <a href="/articles/create" class="text-white me-4 text-decoration-none">Создать статью</a>
          <button class="btn btn-outline-light">Войти</button>
        </div>
      </div>
    </div>

    <div class="container">
      @include('blocks/messages') 
      @yield('content') 
    </div>

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
      .create( document.querySelector( '#app-ckeditor' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
  </body>
</html>

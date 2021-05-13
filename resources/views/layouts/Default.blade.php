<!doctype html>
<html>
<head>
   @include('includes.head')
</head>
<body>
    <header id="header" class="header fixed-top">
       @include('includes.header')
   </header>
        @yield('page_body_content')
   <footer id="footer" class="footer">
       @include('includes.footer')
   </footer>
    @include('includes.scripts')
</body>
</html>
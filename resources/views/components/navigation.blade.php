   <!-- Sidebar -->
   <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
      <div class="sidebar-header">
      <div class="sidebar-brand">
        <a href="#">Training</a></div></div>
        <li class="dropdown">
            <a href="#works" class="dropdown-toggle"  data-toggle="dropdown">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu animated fadeInLeft" role="menu">
            <div class="dropdown-header">Front end pages</div>
            <li><a href="{{url('services')}}">Serices</a></li>
          </ul>
        </li>
		<li class="dropdown">
            <a href="#blog" class="dropdown-toggle"  data-toggle="dropdown">Blog <span class="caret"></span></a>
          <ul class="dropdown-menu animated fadeInLeft" role="menu">
            {{-- <div class="dropdown-header">Front end pages</div> --}}
            <li><a href="{{url('/add-blog')}}">Add Blog</a></li>
            <li><a href="{{url('/blog-list')}}">Blog List</a></li>
          </ul>
        </li>
      {{-- <li><a href="#about">Post</a></li> --}}
      <li><a href="#events">Events</a></li>
      <li><a href="#team">Team</a></li>
      <li class="dropdown">
      <a href="#works" class="dropdown-toggle"  data-toggle="dropdown">Works <span class="caret"></span></a>
    <ul class="dropdown-menu animated fadeInLeft" role="menu">
     <div class="dropdown-header">Dropdown heading</div>
     <li><a href="#pictures">Pictures</a></li>
     <li><a href="#videos">Videeos</a></li>
     <li><a href="#books">Books</a></li>
     <li><a href="#art">Art</a></li>
     <li><a href="#awards">Awards</a></li>
     </ul>
     </li>
     <li><a href="#services">Services</a></li>
     <li><a href="#contact">Contact</a></li>
     <li><a href="#followme">Follow me</a></li>
     </ul>
 </nav>
       <!-- /#sidebar-wrapper -->
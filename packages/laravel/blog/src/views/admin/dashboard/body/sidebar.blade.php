<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('blog_admin') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">BinShop  Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            @php
                use Laravel\Blog\Models\Page;
                $pages = Page::all();
            @endphp
            @foreach ($pages as $page)
            <li class="nav-item"> <a class="nav-link" href="{{ route('page.index', $page->slug) }}">{{ $page->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </li>

      <li class="nav-item">
            <a class="nav-link" href="{{ route('contacts.index') }}" >
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Contact-Us</span>
            </a>
      </li>

      <li class="nav-item">
            <a class="nav-link" href="{{ route('settings.index') }}">
            <i class="ti-settings menu-icon"></i>
            <span class="menu-title">Settings</span>
            </a>
     </li>

      {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-meta" aria-expanded="false" aria-controls="page-meta">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Pages Meta</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-meta">
            <ul class="nav flex-column sub-menu">
                @foreach ($pages as $page)
                <li class="nav-item"> <a class="nav-link" href="{{ route('page-meta.index', $page->slug) }}">{{ $page->name }}</a></li>
                @endforeach
            </ul>
            </div>
      </li> --}}
    </ul>
  </nav>

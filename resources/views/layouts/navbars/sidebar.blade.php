<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{route('front')}}" class="simple-text logo-normal">
      {{ __('Public') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item {{ Request::is('admin/gallery*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('gallery.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Gallery') }}</p>
        </a>
      </li>

        <li class="nav-item {{ Request::is('admin/mosaic*') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('mosaic.index') }}">
                <i class="material-icons">extension</i>
                <p>{{ __('Mosaic') }}</p>
            </a>
        </li>
      <li class="nav-item {{ Request::is('admin/glass*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('glass.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Stained Glass') }}</p>
        </a>
      </li>

        <li class="nav-item  {{ Request::is('admin/slider*') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('slider.index') }}">
                <i class="material-icons">image</i>
                <p>{{ __('Slider') }}</p>
            </a>
        </li>

        <li class="nav-item {{ Request::is('admin/settings*') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('settings.index') }}">
                <i class="material-icons">settings</i>
                <p>{{ __('Settings') }}</p>
            </a>
        </li>

    </ul>
  </div>
</div>

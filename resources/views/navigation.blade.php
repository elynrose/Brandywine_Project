@php
    $menus = \App\Models\Menu::where('published', 1)->orderBy('ordering', 'asc')->get();
@endphp


    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/brandywine-bus-sales-pennsylvania.png')}}" width="180" alt="Brandywine Bus Sales LLC, Pennsylvania." style="max-width:180px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @foreach($menus as $menu)
                @if($menu->parent_id == 0)
                    @php
                        $hasSubmenu = $menus->where('parent_id', $menu->id)->count() > 0;
                    @endphp
                    <li class="nav-item @if($hasSubmenu) dropdown @endif">
                        <a class="nav-link @if($hasSubmenu) dropdown-toggle @endif" href="{{ $menu->url ? $menu->url : route('frontend.content-pages.show', $menu->page->id) }}" @if($hasSubmenu) id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>
                            {{ $menu->name }}
                        </a>
                        @if($hasSubmenu)
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($menus as $submenu)
                                @if($submenu->parent_id == $menu->id)
                                    <a class="dropdown-item" href="{{ $submenu->url ? $submenu->url : route('frontend.content-pages.show', $submenu->page->id) }}">{{ $submenu->name }}</a>
                                @endif
                            @endforeach
                        </div>
                        @endif
                    </li>
                @endif
            @endforeach 
                        @else
                          
                            
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link"  href="tel:+16106418102"><i class="fa fa-phone"></i> <strong>{{_('(610) 641-8102') }}</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="mailto:"><i class="fa fa-email"></i> </a>
                            </li>
                      
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('permission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    @endcan
                                    @can('role_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    @endcan
                                    @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan
                                    @can('content_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.contentManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('menu_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.menus.index') }}">
                                            {{ trans('cruds.menu.title') }}
                                        </a>
                                    @endcan
                                    @can('content_page_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.content-pages.index') }}">
                                            {{ trans('cruds.contentPage.title') }}
                                        </a>
                                    @endcan
                                    @can('content_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.content-categories.index') }}">
                                            {{ trans('cruds.contentCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('content_tag_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.content-tags.index') }}">
                                            {{ trans('cruds.contentTag.title') }}
                                        </a>
                                    @endcan
                                    @can('category_access')
                                        <a class="dropdown-item" href="{{ route('frontend.categories.index') }}">
                                            {{ trans('cruds.category.title') }}
                                        </a>
                                    @endcan
                                    @can('inventory_access')
                                        <a class="dropdown-item" href="{{ route('frontend.inventories.index') }}">
                                            {{ trans('cruds.inventory.title') }}
                                        </a>
                                    @endcan
                                    @can('inquiry_access')
                                        <a class="dropdown-item" href="{{ route('frontend.inquiries.index') }}">
                                            {{ trans('cruds.inquiry.title') }}
                                        </a>
                                    @endcan
                                    @can('contact_access')
                                        <a class="dropdown-item" href="{{ route('frontend.contacts.index') }}">
                                            {{ trans('cruds.contact.title') }}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

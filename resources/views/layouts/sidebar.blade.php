<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Hulanesia</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">HN</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::segment(1) == 'dashboard' ? 'active' : '' }}"><a class="nav-link"
                    href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            @can('browse_posts')
                {{-- <li class="{{ Request::segment(1) == 'posts' ? 'active' : '' }}"><a class="nav-link" href="/posts"><i class="fas fa-stream"></i> <span>Posts</span></a></li> --}}
                <li class="nav-item dropdown {{ Request::segment(1) == 'posts' ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stream"></i>
                        <span>Editorial</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::segment(1) == 'posts' && request()->post == null ? 'active' : '' }}"><a
                                class="nav-link" href="{{ route('post.index') }}">All</a></li>
                        <li class="{{ request()->post == 'publish' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('post.index', ['post' => 'publish']) }}">Published</a></li>
                        <li class="{{ request()->post == 'draft' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('post.index', ['post' => 'draft']) }}">Draft</a></li>
                        @if (!auth()->user()->hasRole('writter'))
                            <li class="{{ Request::segment(2) == 'editor_choice' ? 'active' : '' }}"><a
                                    class="nav-link"
                                    href="{{ route('post.management', ['slug' => 'editor_choice']) }}">Editor Choice</a>
                            </li>
                            <li class="{{ Request::segment(2) == 'headline' ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('post.management', ['slug' => 'headline']) }}">Headline</a></li>
                            <li class="{{ Request::segment(2) == 'breaking_news' ? 'active' : '' }}"><a
                                    class="nav-link"
                                    href="{{ route('post.management', ['slug' => 'breaking_news']) }}">Breaking News</a>
                            </li>
                            <li class="{{ request()->post == 'trash' ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('post.index', ['post' => 'trash']) }}">Trash</a></li>
                        @endif
                    </ul>
                </li>

            @endcan
            @can('browse_categories')
                <li class="{{ Request::segment(1) == 'categories' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('category.index') }}"><i class="fas fa-layer-group"></i>
                        <span>Categories</span></a></li>
            @endcan
            @can('browse_tags')
                <li class="{{ Request::segment(1) == 'tags' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('tag.index') }}"><i class="fas fa-tag"></i> <span>Tags</span></a></li>
            @endcan
            @can('browse_features')
                <li class="{{ Request::segment(1) == 'features' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('feature.index') }}"><i class="fas fa-asterisk"></i> <span>Features</span></a>
                </li>
            @endcan
            @can('browse_users')
                <li class="{{ Request::segment(1) == 'users' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('user.index') }}"><i class="fas fa-user-circle"></i> <span>Users</span></a></li>
            @endcan
            @can('browse_roles')
                <li class="{{ Request::segment(1) == 'roles' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('role.index') }}"><i class="fas fa-key"></i> <span>Roles</span></a></li>
            @endcan
            @can('browse_settings')
                <li class="{{ Request::segment(1) == 'settings' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('setting.index') }}"><i class="fas fa-cogs"></i> <span>Settings</span></a></li>
            @endcan
            @can('browse_photos')
                <li class="{{ Request::segment(1) == 'photos' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('photo.index') }}"><i class="far fa-images"></i> <span>Photos</span></a></li>
            @endcan
            @can('browse_videos')
                <li class="{{ Request::segment(1) == 'videos' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('video.index') }}"><i class="fab fa-youtube"></i> <span>Videos</span></a></li>
            @endcan
        </ul>

        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div> --}}
    </aside>
</div>

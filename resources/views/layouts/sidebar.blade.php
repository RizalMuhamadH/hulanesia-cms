<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">{{ env('APP_NAME') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">{{ env('APP_ABB') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::segment(1) == 'dashboard' ? 'active' : '' }}"><a class="nav-link"
                    href="/dashboard"><i class="fas fa-chart-bar"></i> <span>Dashboard</span></a></li>
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
                            <li class="{{ Request::segment(2) == 'popular' ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('post.management', ['slug' => 'popular']) }}">Popular</a>
                            </li>
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
            {{-- @can('browse_features')
                <li class="{{ Request::segment(1) == 'features' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('feature.index') }}"><i class="fas fa-asterisk"></i> <span>Features</span></a>
                </li>
            @endcan --}}
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
            @can('browse_reports')
                <li class="{{ Request::segment(1) == 'reports' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('report.index') }}"><i class="fas fa-chart-pie"></i> <span>Reports</span></a></li>
            @endcan
            @can('browse_management-rss')
                <li class="{{ Request::segment(1) == 'management-rss' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('management-rss.index') }}"><i class="fas fa-rss"></i> <span>Feed</span></a></li>
            @endcan
            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('editor'))
                <li class="{{ Request::segment(1) == 'notifications' ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('notification.index') }}"><i class="fas fa-bell"></i> <span>Notifications</span></a></li>
            @endif
        </ul>

        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div> --}}
    </aside>
</div>

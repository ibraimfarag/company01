
@inject('contentService', 'App\Services\ContentProvider')
<?php $pages = $contentService->getPageNavs(); ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @foreach($pages as $page)

            @if($page->id==1)
                <li class="nav-item">
                    <a class="nav-link {{ !isset($pageSlug) ? 'collapsed' : ''}}" data-toggle="collapse" href="#home" aria-expanded="true" aria-controls="homepage">
                        <i class="menu-icon mdi mdi-content-copy"></i>
                        <span class="menu-title">Home</span>
                        <i class="menu-arrow"></i>
                    </a>
                </li>
                <div class="collapse  {{ !isset($pageSlug) ? 'show' : 'in'}}" id="home">
                    <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL('admin/sections/edit/1') }}">Page Contents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL('admin/home/icons') }}">Why Acota Boxes</a>
                            </li>
                    </ul>
                </div>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ $pageSlug==$page->slug ? 'collapsed' : ''}}" data-toggle="collapse" href="#{{$page->slug}}" aria-expanded="true" aria-controls="homepage">
                        <i class="menu-icon mdi mdi-content-copy"></i>
                        <span class="menu-title">{{ $page->name }}</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse {{ $pageSlug==$page->slug ? 'show' : 'in'}}" id="{{$page->slug}}">
                        <ul class="nav flex-column sub-menu">
                            @if(count($page->sections))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/sections/edit/'.$page->id) }}">Page Contents</a>
                                </li>
                            @endif
                            @if($page->id==2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/leadership/') }}">View Leadership</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/leadership/create') }}">Add Leadership</a>
                                </li>
                            @endif
                            @if($page->id==3)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/services/') }}">View Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/services/create') }}">Add Service</a>
                                </li>
                            @endif
                            @if($page->id==4)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/benefits/') }}">View Benefits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/benefits/create') }}">Add Benefit</a>
                                </li>
                            @endif
                            @if($page->id==5)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/client-categories/') }}">View Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/client-categories/create') }}">Add Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/clients/') }}">View Clients</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/clients/create') }}">Add Client</a>
                                </li>
                            @endif
                            @if($page->id==6)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/our-team/') }}">View Team</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ URL('admin/our-team/create') }}">Add Team Member</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
        @endforeach

        {{--<li class="nav-item">--}}
            {{--<a class="nav-link " data-toggle="collapse" href="{{ URL('admin/contacts') }}">--}}
                {{--<i class="menu-icon mdi mdi-content-copy"></i>--}}
                {{--<span class="menu-title">Inquiries</span>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
</nav>

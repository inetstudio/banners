<li class="{{ isActiveRoute('back.banners-package.*') }}">
    <a href="#">
        <i class="fa fa-ad"></i> <span class="nav-label">Баннеры</span><span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        @include('admin.module.banners-package.banners::back.includes.package_navigation')
        @include('admin.module.banners-package.places::back.includes.package_navigation')
        @include('admin.module.banners-package.groups::back.includes.package_navigation')
    </ul>
</li>

<div class="btn-nowrap">
    <a href="{{ route('back.banners-package.banners.edit', [$id]) }}" class="btn btn-xs btn-default m-r-xs">
        <i class="fa fa-pencil-alt"></i>
    </a>
    <a href="#" class="btn btn-xs btn-danger delete" data-url="{{ route('back.banners-package.banners.destroy', [$id]) }}">
        <i class="fa fa-times"></i>
    </a>
</div>

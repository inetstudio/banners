@php
    $isActive = false;
    $now = now();

    if ($item->date_start) {
        $isActive = $now->greaterThan($item->date_start);
    }

    if ($item->date_end) {
        $isActive = $now->lessThan($item->date_end);
    }
@endphp

<span><i class="fa fa-circle {{ ($isActive) ? 'banner-active' : 'banner-inactive' }}"></i></span>

<div class="col-12 col-md-6 order-md-2 order-first">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
            @foreach (breadcrumb() as $bc)
                <li class="breadcrumb-item{{ (breadcrumb()[count(breadcrumb())-1] == $bc) ? ' active' : '' }}" @if(breadcrumb()[count(breadcrumb())-1] == $bc) aria-current="page" @endif>@if(breadcrumb()[count(breadcrumb())-1] == $bc) {{ ucfirst($bc) }}  @else <a href="#">{{ ucfirst($bc) }}</a> @endif</li>
            @endforeach
        </ol>
    </nav>
</div>

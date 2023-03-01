<div {{ $attributes->class("card text-center") }}>

    @if(isset($title))
        <div class="card-header">
            {{ $title }}
        </div>
    @endif

    @if(isset($content))
        <div class="card-body">
            {{ $content }}
        </div>
    @endif

    @if(isset($footer))
        <div class="card-footer text-muted">
            {{ $footer }}
        </div>
    @endif

</div>

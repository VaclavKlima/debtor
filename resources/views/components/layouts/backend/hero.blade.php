<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-1">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-2">
                    {!! $title !!}
                </h1>
            </div>
            @if($slot->isNotEmpty())
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">

                        {{ $slot }}

                    </ol>
                </nav>
            @endif
        </div>
    </div>
</div>

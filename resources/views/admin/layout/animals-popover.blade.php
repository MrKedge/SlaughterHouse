<p data-popover-target="popover-{{ $loop->index }}" class="font-medium rounded-lg py-2.5 text-center">
    {{ $animals->type }}
</p>

<!-- Popover -->
<div data-popover id="popover-{{ $loop->index }}" role="tooltip"
    class="absolute border border-gray-400 z-50 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white rounded-lg shadow-2xl opacity-0">
    <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg">
        <h3 class="font-semibold text-gray-900">{{ $animals->type }}
        </h3>
    </div>
    <div class="z-40 px-3 py-2">
        <p>{{ $animals->gender }}</p>
        <p>{{ $animals->live_weight }} Kg.</p>
        <p>{{ $animals->age }} Mos.</p>
    </div>
    <div data-popper-arrow></div>
</div>

@if ($animal->status === 'approved')
    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@elseif($animal->status === 'pending')
    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@elseif($animal->status === 'rejected')
    <span class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@elseif($animal->status === 'not available')
    <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@elseif($animal->status === 'for slaughter')
    <span class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@elseif($animal->status === 'slaughtered')
    <span class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@elseif($animal->status === 'inspection' && optional($animal->anteMortem)->inspection_status === null)
    <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@endif
@if (optional($animal->anteMortem)->inspection_status === 'for slaughter' && $animal->status === 'inspection')
    <span class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->anteMortem->inspection_status }}
    </span>
@endif

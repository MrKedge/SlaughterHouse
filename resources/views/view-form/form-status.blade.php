@if ($animal->status === 'approved' || $animal->status === 'processed')
    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@elseif($animal->status === 'pending')
    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@elseif($animal->status === 'rejected')
    <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@else
    <span class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded uppercase">
        {{ $animal->status }}
    </span>
@endif

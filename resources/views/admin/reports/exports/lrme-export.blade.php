<table class="text-sm text-left text-gray-500">
    <thead class="">
        <tr>
            <th rowspan="2">
                Date
            </th>
            <!-- Loop through animal types and generate headers -->
            @foreach ($animalTypes as $animalType)
                @if ($animalType !== null && $animalType !== '')
                    <th scope="col" colspan="4">
                        {{ ucfirst($animalType) }}
                    </th>
                @endif
            @endforeach
        </tr>
        <tr>
            {{-- Loop through animal types and generate subheaders --}}
            @foreach ($animalTypes as $animalType)
                @if ($animalType !== null && $animalType !== '')
                    <th class="px-6 py-3 border">
                        Head
                    </th>
                    <th class="px-6 py-3 border">
                        Carcass wt.
                    </th>
                    <th class="px-6 py-3 border">
                        Source
                    </th>
                    <th class="px-6 py-3 border">
                        Destination
                    </th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        <!-- Loop through each day and display data -->
        @foreach ($animalData as $day)
            <tr class="even:bg-gray-100 odd:bg-white border-b">
                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($day['date'])->format('d') }}</td>

                @foreach ($animalTypes as $animalType)
                    @php
                        $animalsOfType = collect($day['animals'] ?? [])
                            ->where('type', $animalType)
                            ->filter(function ($animal) {
                                return isset($animal->postMortem) && $animal->postMortem->postmortem_status === 'good';
                            });

                        $totalAnimalCount = $animalsOfType->count();
                        $totalPostWeight = $animalsOfType->sum('postMortem.post_weight');
                        $uniqueDestinations = $animalsOfType
                            ->pluck('destination')
                            ->unique()
                            ->values();
                        $destinationIndices = $uniqueDestinations
                            ->map(function ($destination) use ($allFormData) {
                                return $allFormData->pluck('animal_destination')->search($destination) + 1;
                            })
                            ->implode(', ');

                        // Retrieve and display the source value
                        $uniqueSources = $animalsOfType
                            ->pluck('source')
                            ->unique()
                            ->values();
                        $sourceValue = $uniqueSources
                            ->map(function ($source) use ($allFormData) {
                                return $allFormData->pluck('animal_source')->search($source) + 1;
                            })
                            ->implode(', ');
                    @endphp

                    @if ($animalType !== null && $animalType !== '')
                        <td class="px-6 py-4">{{ $totalAnimalCount }}</td>
                        <td class="px-6 py-4">{{ $totalPostWeight }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $sourceValue }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $destinationIndices }}
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>

            <!-- Initialize totals for each column -->
            @foreach ($animalTypes as $animalType)
                @php
                    $totalAnimalCount = 0;
                    $totalPostWeight = 0;
                @endphp

                <!-- Loop through each day and accumulate totals for the current column -->
                @foreach ($animalData as $day)
                    @php
                        // Check if $day['animals'] is an array or object
                        if (is_array($day['animals']) || is_object($day['animals'])) {
                            // Loop through animals of the current type
                            foreach ($day['animals'] as $animal) {
                                // Check if the animal is of the current type
                                if (isset($animal->type) && $animal->type === $animalType) {
                                    // Check if postMortem data is available for the current animal
                                    if (isset($animal->postMortem)) {
                                        // Increment the total animal count for the current type
                                        $totalAnimalCount++;

                                        // Accumulate post_weight for the current animal
                                        $totalPostWeight += $animal->postMortem->post_weight;
                                    }
                                }
                            }
                        }
                    @endphp
                @endforeach

                <!-- Display totals for the current column -->
                <td class="px-6 py-3">{{ $totalAnimalCount }}</td>
                <td class="px-6 py-3">{{ $totalPostWeight }}</td>
                <td class="px-6 py-3"></td>
                <td class="px-6 py-3"></td>
            @endforeach
        </tr>
    </tfoot>
</table>

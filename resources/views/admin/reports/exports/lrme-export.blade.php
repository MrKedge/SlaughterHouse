<table class="w-full text-sm text-left rtl:text-right text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th rowspan="2" scope="col" class="px-6 py-3 border">
                Date</th>
            <!-- Loop through animal types and generate headers -->
            @foreach ($animalTypes as $animalType)
                @if ($animalType !== null && $animalType !== '')
                    <th scope="col" colspan="4" class="px-6 py-3 text-center border">
                        {{ ucfirst($animalType) }}
                    </th>
                @endif
            @endforeach
        </tr>
        <tr>
            {{-- <th scope="col" class="px-6 py-3 border"></th> --}}
            <!-- Loop through animal types and generate subheaders -->
            @foreach ($animalTypes as $animalType)
                @if ($animalType !== null && $animalType !== '')
                    <th scope="col" class="px-6 py-3 border">
                        Head
                    </th>
                    <th scope="col" class="px-6 py-3 border whitespace-nowrap">
                        Carcass wt.
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        Source
                    </th>
                    <th scope="col" class="px-6 py-3 border">
                        Destination
                    </th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        <!-- Loop through each date and display data -->
        @foreach ($animalData as $day)
            <tr class="even:bg-gray-100 odd:bg-white border-b">
                <td class="px-6 py-4">{{ $day['date'] }}</td>
                <!-- Loop through animal types and generate data columns -->
                @foreach ($animalTypes as $animalType)
                    @php
                        // Initialize variables for the current animal type
                        $totalAnimalCount = 0;
                        $totalPostWeight = 0;

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

                    <!-- Display data only if $animalType is not empty or null -->
                    @if ($animalType !== null && $animalType !== '')
                        <td class="px-6 py-4">{{ $totalAnimalCount }}</td>
                        <td class="px-6 py-4">{{ $totalPostWeight }}</td>
                        <td class="px-6 py-4">
                            {{-- Display other data --}}
                        </td>
                        <td class="px-6 py-4">
                            {{-- Display other data --}}
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="border-t">
            <th class="px-6 py-3 border">Total</th>
            <!-- Loop through animal types and calculate totals -->
            @foreach ($animalTypes as $animalType)
                <!-- Calculate and display totals (replace with actual calculations) -->
                <td class="px-6 py-3 border"></td>
                <td class="px-6 py-3 border"></td>
                <td class="px-6 py-3 border"></td>
                <td class="px-6 py-3 border"></td>
            @endforeach
        </tr>
    </tfoot>
</table>

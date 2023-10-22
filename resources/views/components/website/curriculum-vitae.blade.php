<div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="curiculum-vitae" role="tabpanel"
    aria-labelledby="curiculum-vitae-tab">
    <table class="w-full text-xs text-gray-500 dark:text-gray-400 md:text-base">
        @foreach ($data as $item)
            <tr>
                <td class="w-[43%] py-1.5 md:w-[23%]">{{ str_replace('_', ' ', $item->key) }}</td>
                <td class="w-[2%] py-1.5">:</td>
                <td class="w-[55%] py-1.5 md:w-[75%]">{{ $item->value }}</td>
            </tr>
        @endforeach
    </table>
</div>

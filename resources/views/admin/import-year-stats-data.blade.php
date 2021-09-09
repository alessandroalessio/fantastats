<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Year Stats Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Upload fantacalcio.it stats file for Years</p>
                    <form action="/do-import-year-stats-data" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-6 gap-4 my-8">
                            <div><label>{{ __('Year') }}</label></div>
                            <div class="col-span-4">
                                <select name="year">
                                    <?php for ( $y=2015; $y<=2035; $y++ ) :
                                        $y_end_season = substr($y+1, 2, 2);  ?>
                                        <option value=""><?php echo $y.'/'.$y_end_season ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-6 gap-4 my-8">
                            <div><label>File Excel</label></div>
                            <div class="col-span-4"><input type="file" name="excel_file"></div>
                        </div>
                        <div>
                            <div><input type="submit" value="Upload" class="inline-block rounded-lg px-4 py-2 bg-blue-500 text-blue-100"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

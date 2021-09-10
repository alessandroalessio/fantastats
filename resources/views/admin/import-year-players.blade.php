<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Year Players') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Upload fantacalcio.it players file for Years</p>
                    <?php
                    if ( isset($message) ) var_dump($message);
                    ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-3">
                        <strong>Attenzione:</strong> L'importazione attualmente non manda in output messaggi di successo
                    </div>
                    <form action="/do-import-year-players" method="POST" enctype="multipart/form-data">
                        @csrf
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

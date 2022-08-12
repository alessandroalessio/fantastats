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
                    <?php
                    if ( isset($message) ) var_dump($message);
                    ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-3">
                        <strong>Attenzione:</strong> L'importazione attualmente non manda in output messaggi di successo
                    </div>
                    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 mt-3">
                        <strong>Attenzione:</strong> Per la corretta importazione il formato deve essere:
                            <table cellpadding="4">
                                <tr>
                                    <td>ID</td>
                                    <td>Ruolo</td>
                                    <td>Nome</td>
                                    <td>Sq.</td>
                                    <td>PG</td>
                                    <td>MV</td>
                                    <td>FM</td>
                                    <td>GF</td>
                                    <td>GS</td>
                                    <td>RP</td>
                                    <td>RC</td>
                                    <td>RF</td>
                                    <td>RS</td>
                                    <td>ASS</td>
                                    <td>AMM</td>
                                    <td>ESP</td>
                                    <td>AU</td>
                                </tr>
                            </table>
                    </div>
                    <form action="/do-import-year-stats-data" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-6 gap-4 my-8">
                            <div><label>{{ __('Year') }}</label></div>
                            <div class="col-span-4">
                                <select name="year">
                                    <?php for ( $y=2015; $y<=2035; $y++ ) :
                                        $y_end_season = substr($y+1, 2, 2);  ?>
                                        <option value="<?php echo $y.'-'.$y_end_season ?>"><?php echo $y.'/'.$y_end_season ?></option>
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

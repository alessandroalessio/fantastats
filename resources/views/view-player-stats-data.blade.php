<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Player Stats Data') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <h2 class="text-xl text-gray-400 font-bold">{{ __('Players Data') }}</h2>
        </div>

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <div class="flex mb-4">
                <div class="w-full px-1">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="bg-white border-b-2 border-blue-300 px-1 py-1">
                            <table id="view-player-stats-datatable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('R') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Team') }}</th>
                                        <th>{{ __('Mp') }}</th>
                                        <th>{{ __('Avg') }}</th>
                                        <th>{{ __('FAvg') }}</th>
                                        <th>{{ __('Gs') }}</th>
                                        <th>{{ __('Gc') }}</th>
                                        <th>{{ __('Ps') }}</th>
                                        <th>{{ __('PT') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>{{ __('R') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Team') }}</th>
                                        <th>{{ __('Mp') }}</th>
                                        <th>{{ __('Avg') }}</th>
                                        <th>{{ __('FAvg') }}</th>
                                        <th>{{ __('Gs') }}</th>
                                        <th>{{ __('Gc') }}</th>
                                        <th>{{ __('Ps') }}</th>
                                        <th>{{ __('PT') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

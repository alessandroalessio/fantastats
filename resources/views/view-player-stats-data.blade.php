<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('players-stats.view-player-data') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <h2 class="text-xl text-gray-400 font-bold">
                {{ __('players-stats.player-data') }}
                <div class="float-right">
                    <a href="#" id="filter-position-p" class="filter-position" data-role="P">P</a>
                    <a href="#" id="filter-position-d" class="filter-position" data-role="D">D</a>
                    <a href="#" id="filter-position-c" class="filter-position" data-role="C">C</a>
                    <a href="#" id="filter-position-a" class="filter-position" data-role="A">A</a>
                </div>
            </h2>
        </div>

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <div class="flex mb-4">
                <div class="w-full px-1">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="bg-white border-b-2 border-blue-300 px-3 py-3">
                            <table id="view-player-stats-datatable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('R') }}</th>
                                        <th>{{ __('players-stats.name') }}</th>
                                        <th>{{ __('players-stats.team') }}</th>
                                        <th>{{ __('players-stats.mp') }}</th>
                                        <th>{{ __('players-stats.avg') }}</th>
                                        <th>{{ __('players-stats.favg') }}</th>
                                        <th>{{ __('players-stats.gt') }}</th>
                                        <th>{{ __('players-stats.gf') }}</th>
                                        <th>{{ __('players-stats.gs') }}</th>
                                        <th>{{ __('players-stats.rp') }}</th>
                                        <th>{{ __('players-stats.rc') }}</th>
                                        <th>{{ __('players-stats.rf') }}</th>
                                        <th>{{ __('players-stats.rs') }}</th>
                                        <th>{{ __('players-stats.ass') }}</th>
                                        <th>{{ __('players-stats.amm') }}</th>
                                        <th>{{ __('players-stats.esp') }}</th>
                                        <th>{{ __('players-stats.au') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>{{ __('R') }}</th>
                                        <th>{{ __('players-stats.name') }}</th>
                                        <th>{{ __('players-stats.team') }}</th>
                                        <th>{{ __('players-stats.mp') }}</th>
                                        <th>{{ __('players-stats.avg') }}</th>
                                        <th>{{ __('players-stats.favg') }}</th>
                                        <th>{{ __('players-stats.gt') }}</th>
                                        <th>{{ __('players-stats.gf') }}</th>
                                        <th>{{ __('players-stats.gs') }}</th>
                                        <th>{{ __('players-stats.rp') }}</th>
                                        <th>{{ __('players-stats.rc') }}</th>
                                        <th>{{ __('players-stats.rf') }}</th>
                                        <th>{{ __('players-stats.rs') }}</th>
                                        <th>{{ __('players-stats.ass') }}</th>
                                        <th>{{ __('players-stats.amm') }}</th>
                                        <th>{{ __('players-stats.esp') }}</th>
                                        <th>{{ __('players-stats.au') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    
                    @include('partials/legend')
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

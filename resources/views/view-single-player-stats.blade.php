@section('title', 'Statistiche Fantacalcio '.$player_data['name'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Player Stats Data') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <a href="/view-player-stats-data" class="text-gray-400 text-xs">&larr; Tutti i giocatori</a>
            <h2 class="text-3xl text-gray-500 font-bold">
                {{ $player_data['name'] }}
                <span class="float-right bg-{{ $player_data['color'] }}-600 px-2 text-white ml-3 rounded-full">{{ $player_data['role'] }}</span>
                <span class="float-right {{ strtolower($player_data['team']) }}  px-4 rounded-md italic">{{ $player_data['team'] }}</span>
            </h2>
        </div>

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <div class="flex mb-4">
                <div class="w-full px-1">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="bg-white border-b-2 border-blue-300 px-3 py-3 player-data-avg">

                            <div class="flex mb-2">
                                <div class="w-3/12 text-center">
                                    <span class="label">{{ __('players-stats.total-goal') }}</span>
                                    <span class="value">{{ $player_avg['gt'] }}</span>
                                </div>
                                <div class="w-3/12 text-center">
                                    <span class="label">{{ __('players-stats.average') }}</span>
                                    <span class="value">{{ $player_avg['mv'] }}</span>
                                </div>
                                <div class="w-3/12 text-center">
                                    <span class="label">{{ __('players-stats.match-played') }}</span>
                                    <span class="value">{{ $player_avg['pg'] }}</span>
                                </div>
                                <div class="w-3/12 text-center">
                                    <span class="label">{{ __('Goal per Partita') }}</span>
                                    <span class="value">{{ round($player_avg['sum_gt']/$player_avg['sum_pg'],2) }}</span>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="w-2/12 text-center">
                                    <span class="label">{{ __('players-stats.goal-signed') }}</span>
                                    <span class="value">{{ $player_avg['gf'] }}</span>
                                </div>
                                @if ($player_data['role']=='P') :
                                    <div class="w-2/12 text-center">
                                        <span class="label">{{ __('players-stats.goal-suffered') }}</span>
                                        <span class="value">{{ $player_avg['gs'] }}</span>
                                    </div>
                                    <div class="w-2/12 text-center">
                                        <span class="label">{{ __('players-stats.penalty-get') }}</span>
                                        <span class="value">{{ $player_avg['rp'] }}</span>
                                    </div>
                                @endif
                                <div class="w-2/12 text-center">
                                    <span class="label">{{ __('players-stats.executed-penalty') }}</span>
                                    <span class="value">{{ $player_avg['rc'] }}</span>
                                </div>
                                <div class="w-2/12 text-center">
                                    <span class="label">{{ __('players-stats.penalty-success') }}</span>
                                    <span class="value">{{ $player_avg['rf'] }}</span>
                                </div>
                                <div class="w-2/12 text-center">
                                    <span class="label">{{ __('players-stats.penalty-wrong') }}</span>
                                    <span class="value">{{ $player_avg['rs'] }}</span>
                                </div>
                                <div class="w-2/12 text-center">
                                    <span class="label">{{ __('players-stats.assist') }}</span>
                                    <span class="value">{{ $player_avg['ass'] }}</span>
                                </div>
                                <div class="w-2/12 text-center">
                                    <span class="label">{{ __('players-stats.admonition') }}</span>
                                    <span class="value">{{ $player_avg['amm'] }}</span>
                                </div>
                                
                                <div class="w-2/12 text-center">
                                    <span class="label">{{ __('players-stats.expulsion') }}</span>
                                    <span class="value">{{ $player_avg['esp'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm mt-3">
                        <div class="bg-white border-b-2 border-blue-300 px-3 py-3">
                            <input type="hidden" id="player-fid" value="{{ $player_data['fid'] }}">
                            <table id="view-single-player-stats-datatable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('players-stats.year') }}</th>
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
                                        <th>{{ __('players-stats.year') }}</th>
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

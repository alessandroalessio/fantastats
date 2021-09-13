<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Player Stats Data') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <h2 class="text-xl text-gray-400 font-bold">
                {{ $player_data['name'] }}
                <span class="float-right bg-{{ $player_data['color'] }}-600 px-2 text-white ml-3 rounded-full">{{ $player_data['role'] }}</span>
                <span class="float-right {{ strtolower($player_data['team']) }}  px-4 rounded-md italic">{{ $player_data['team'] }}</span>
            </h2>
        </div>

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <div class="flex mb-4">
                <div class="w-full px-1">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="bg-white border-b-2 border-blue-300 px-3 py-3">
                            <input type="hidden" id="player-fid" value="{{ $player_data['fid'] }}">
                            <table id="view-single-player-stats-datatable" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('Mp') }}</th>
                                        <th>{{ __('Avg') }}</th>
                                        <th>{{ __('FAvg') }}</th>
                                        <th>{{ __('Gs') }}</th>
                                        <th>{{ __('Gc') }}</th>
                                        <th>{{ __('rp') }}</th>
                                        <th>{{ __('rc') }}</th>
                                        <th>{{ __('rf') }}</th>
                                        <th>{{ __('rs') }}</th>
                                        <th>{{ __('ass') }}</th>
                                        <th>{{ __('amm') }}</th>
                                        <th>{{ __('esp') }}</th>
                                        <th>{{ __('au') }}</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>{{ __('Mp') }}</th>
                                        <th>{{ __('Avg') }}</th>
                                        <th>{{ __('FAvg') }}</th>
                                        <th>{{ __('Gs') }}</th>
                                        <th>{{ __('Gc') }}</th>
                                        <th>{{ __('rp') }}</th>
                                        <th>{{ __('rc') }}</th>
                                        <th>{{ __('rf') }}</th>
                                        <th>{{ __('rs') }}</th>
                                        <th>{{ __('ass') }}</th>
                                        <th>{{ __('amm') }}</th>
                                        <th>{{ __('esp') }}</th>
                                        <th>{{ __('au') }}</th>
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

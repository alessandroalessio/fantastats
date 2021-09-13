<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <h2 class="text-xl text-gray-400 font-bold">{{ __('Main Sections') }}</h2>
        </div>

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <div class="flex mb-4">
                <div class="w-1/3 px-1">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                        <div class="bg-white text-center border-b-2 border-blue-300">
                            <a href="/view-player-stats-data" class="block py-10">
                                {{ __('players-stats.view-player-data') }}
                                <em class="block text-center text-xs">{{ __('players-stats.view-player-data-desc') }}</em>
                            </a>
                        </div>
                    </div>    
                </div>
                <div class="w-1/3 px-1"></div>
                <div class="w-1/3 px-1"></div>
            </div>
        </div>

        <?php if ( Auth::user()->id==1 ) :  ?>
            <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
                <h2 class="text-xl text-gray-400 font-bold">{{ __('Administration') }}</h2>
            </div>

            <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
                <div class="flex mb-4">
                    <div class="w-1/3 px-1">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                            <div class="bg-white text-center border-b-2 border-blue-600">
                                <a href="/import-year-stats-data" class="block py-10">
                                    {{ __('Import Stats Data') }}
                                    <em class="block text-center text-xs">{{ __('Upload file with yearly stats') }}</em>
                                </a>
                            </div>
                        </div>    
                    </div>
                    <div class="w-1/3 px-1">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                            <div class="bg-white text-center border-b-2 border-green-600">
                                <a href="/import-year-players" class="block py-10">
                                    {{ __('Import Players') }}
                                    <em class="block text-center text-xs">{{ __('Upload file with current players available') }}</em>
                                </a>
                            </div>
                        </div>    
                    </div>
                    <div class="w-1/3 px-1"></div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</x-app-layout>

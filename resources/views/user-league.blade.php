@section('title', __('common.your-leagues'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('common.your-leagues') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <h2 class="text-xl text-gray-400 font-bold">
                {{ __('common.your-leagues') }}
            </h2>
        </div>

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <div class="flex mb-4">
                <div class="w-full px-1">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="bg-white border-b-2 border-blue-300 px-3 py-3">
                            <div class="mb-5 text-right">
                                <a href="/add-new-user-league" class="bg-gradient-to-b from-blue-600 to-blue-800 text-indigo-50 rounded-full px-4 py-2 inline-block mt-2">{{ __('common.add-new-league') }}</a>
                            </div>    

                            You leagues
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

@section('title', __('common.add-your-league'))

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('common.add-your-league') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <h2 class="text-xl text-gray-400 font-bold">
                {{ __('common.add-your-league') }}
            </h2>
        </div>

        <div class="max-w-7xl mx-auto mt-3 sm:px-6 lg:px-8">
            <div class="flex mb-4">
                <div class="w-full px-1">
                    <div class="bg-white overflow-hidden shadow-sm">
                        <div class="bg-white border-b-2 border-blue-300 px-3 py-3">

                            <!-- / UserLeaguesController@add -->

                            {{ Form::open() }}
                                {{ Form::token(); }}
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('league_name', __('leagues.name')); }}</div>
                                    <div class="w-9/12">{{ Form::text('league_name') }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('goal_segnato', __('leagues.goal-segnato')); }}</div>
                                    <div class="w-9/12">{{ Form::number('goal_segnato', 3, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('goal_subito', __('leagues.goal-subito')); }}</div>
                                    <div class="w-9/12">{{ Form::number('goal_subito', -1, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('rigore_segnato', __('leagues.rigore-segnato')); }}</div>
                                    <div class="w-9/12">{{ Form::number('rigore_segnato', 3, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('rigore_sbagliato', __('leagues.rigore-sbagliato')); }}</div>
                                    <div class="w-9/12">{{ Form::number('rigore_sbagliato', -3, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('rigore_parato', __('leagues.rigore-parato')); }}</div>
                                    <div class="w-9/12">{{ Form::number('rigore_parato', 3, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('ammonizione', __('leagues.ammonizione')); }}</div>
                                    <div class="w-9/12">{{ Form::number('ammonizione', -0.5, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('espulsione', __('leagues.espulsione')); }}</div>
                                    <div class="w-9/12">{{ Form::number('espulsione', -1, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('autogoal', __('leagues.autogoal')); }}</div>
                                    <div class="w-9/12">{{ Form::number('autogoal', -2, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('assist_soft', __('leagues.assist-soft')); }}</div>
                                    <div class="w-9/12">{{ Form::number('assist_soft', 1, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('assist_std', __('leagues.assist-std')); }}</div>
                                    <div class="w-9/12">{{ Form::number('assist_std', 1, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('assist_gold', __('leagues.assist-gold')); }}</div>
                                    <div class="w-9/12">{{ Form::number('assist_gold', 1, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('goal_decisivo_pareggio', __('leagues.goal-decisivo-pareggio')); }}</div>
                                    <div class="w-9/12">{{ Form::number('goal_decisivo_pareggio', 0, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('goal_decisivo_vittoria', __('leagues.goal-decisivo-vittoria')); }}</div>
                                    <div class="w-9/12">{{ Form::number('goal_decisivo_vittoria', 0, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                                <div class="flex mb-2">
                                    <div class="w-3/12">{{ Form::label('portiere_imbattuto', __('leagues.portiere-imbattuto')); }}</div>
                                    <div class="w-9/12">{{ Form::number('portiere_imbattuto', 0, array('class' => 'w-20 text-center text-sm')) }}</div>
                                </div>
                            {{ Form::close() }}



                            <!-- /
                        
                            GOL SEGNATO	3	3	3	3
GOL SUBITO	-1	-1	-1	-1
RIGORE SEGNATO	3	3	3	3
RIGORE SBAGLIATO	-3	-3	-3	-3
RIGORE PARATO	3	3	3	3
AMMONIZIONE	-0.5	-0.5	-0.5	-0.5
ESPULSIONE	-1	-1	-1	-1
AUTOGOL	-2	-2	-2	-2
ASSIST INV 	0	0	0	0
ASSIST SOFT 	1	1	1	1
ASSIST	1	1	1	1
ASSIST GOLD 	1	1	1	1
GOL DECISIVO PAREGGIO	0	0	0	0
GOL DECISIVO VITTORIA	0	0	0	0
PORTIERE IMBATTUTO	0	
                        -->


                            <!-- <div class="mb-5 text-right">
                                <a href="/add-new-league" class="bg-gradient-to-b from-blue-600 to-blue-800 text-indigo-50 rounded-full px-4 py-2 inline-block mt-2">{{ __('common.add-new-league') }}</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

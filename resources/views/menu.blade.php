@extends('layouts.app')

@section('navigation')
    <a href="{{ route('home') }}" class="text-stone-600 hover:text-amber-800 transition">O Restaurante</a>
    <a href="{{ route('menu.index') }}" class="text-amber-800 border-b-2 border-amber-800 pb-1 font-semibold">O Menu</a>
    <a href="{{ route('reservations.create') }}" class="text-stone-600 hover:text-amber-800 transition">Reservas</a>
    <a href="{{ route('contacto.index') }}" class="text-stone-600 hover:text-amber-800 transition">Contato</a>
@endsection

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ $title }}</h1>
        <p class="text-gray-600">Explore as nossas especialidades feitas com amor.</p>
    </div>

    <!-- Grid de Itens do Menu -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Item Exemplo 1 -->
        <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-400">Imagem do Prato</div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900">Mousse de Chocolate Espacial</h3>
                <p class="text-sm text-gray-600 mt-1">Uma sobremesa leve, cremosa e com um toque de raspas de chocolate belga.</p>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-orange-600 font-bold text-lg">2.500 Kz</span>
                    <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Sobremesa</span>
                </div>
            </div>
        </div>

        <!-- Item Exemplo 2 -->
        <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
            <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-400">Imagem do Prato</div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-900">Grelhado Misto Especial</h3>
                <p class="text-sm text-gray-600 mt-1">Seleção de carnes nobres grelhadas na perfeição, acompanhadas de batata frita e arroz.</p>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-orange-600 font-bold text-lg">7.800 Kz</span>
                    <span class="bg-orange-100 text-orange-800 text-xs px-2 py-1 rounded">Prato Principal</span>
                </div>
            </div>
        </div>
    </div>
@endsection

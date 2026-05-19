@extends('layouts.app')

@section('navigation')
    <a href="{{ route('home') }}" class="text-amber-800 border-b-2 border-amber-800 pb-1 font-semibold">O Restaurante</a>
    <a href="{{ route('menu.index') }}" class="text-stone-600 hover:text-amber-800 transition">O Menu</a>
    <a href="{{ route('reservations.create') }}" class="text-stone-600 hover:text-amber-800 transition">Reservas</a>
    <a href="{{ route('contacto.index') }}" class="text-stone-600 hover:text-amber-800 transition">Contato</a>
@endsection

@section('content')
    <div class="text-center py-12 bg-white rounded-lg shadow-sm border border-gray-100 p-8">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl mb-4">
            {{ $title }}
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Descubra uma experiência gastronómica única com os melhores ingredientes e um ambiente acolhedor feito a pensar em si.
        </p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('menu.index') }}" class="bg-orange-600 hover:bg-orange-700 text-white font-medium px-6 py-3 rounded-md transition shadow">
                Ver Cardápio
            </a>
            <a href="{{ route('contacto.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-6 py-3 rounded-md transition">
                Fale Connosco
            </a>
        </div>
    </div>
@endsection

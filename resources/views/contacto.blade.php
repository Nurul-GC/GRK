@extends('layouts.app')

@section('navigation')
    <a href="{{ route('home') }}" class="text-stone-600 hover:text-amber-800 transition">O Restaurante</a>
    <a href="{{ route('menu.index') }}" class="text-stone-600 hover:text-amber-800 transition">O Menu</a>
    <a href="{{ route('reservations.create') }}" class="text-stone-600 hover:text-amber-800 transition">Reservas</a>
    <a href="{{ route('contacto.index') }}" class="text-amber-800 border-b-2 border-amber-800 pb-1 font-semibold">Contato</a>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow border border-gray-200 p-6 md:p-8">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $title }}</h1>
            <p class="text-gray-600">Tem alguma dúvida ou gostaria de fazer uma reserva? Envie-nos uma mensagem.</p>
        </div>

        <!-- Alertas de Sucesso / Erro Globais -->
        @if(session('sucesso'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('sucesso') }}
            </div>
        @endif

        @if(session('erro'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('erro') }}
            </div>
        @endif

        <!-- Formulário de Contacto -->
        <form action="{{ route('contacto.enviar') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Campo Nome -->
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                       class="mt-1 block w-full px-3 py-2 border @error('nome') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                @error('nome')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo E-mail -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="mt-1 block w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo Mensagem -->
            <div>
                <label for="mensagem" class="block text-sm font-medium text-gray-700">Sua Mensagem</label>
                <textarea name="mensagem" id="mensagem" rows="4"
                          class="mt-1 block w-full px-3 py-2 border @error('mensagem') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">{{ old('mensagem') }}</textarea>
                @error('mensagem')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botão de Envio -->
            <div>
                <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-medium py-2 px-4 rounded-md transition shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                    Enviar Mensagem
                </button>
            </div>
        </form>
    </div>
@endsection


@extends('layouts.app')

@section('content')
    <div class="bg-white border border-stone-200 rounded-xl shadow-sm p-12 text-center max-w-2xl mx-auto">
        <div class="w-16 h-16 bg-green-50 text-green-600 border border-green-200 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
        </div>

        <h2 class="text-3xl font-bold font-serif text-stone-900 mb-3">Reserva Efetuada!</h2>
        <p class="text-stone-600 mb-8">Temos uma ótima notícia! Encontramos uma mesa ideal para você. Sua solicitação foi registrada no banco de dados e está pré-confirmada para a equipe do Kasper.</p>

        <div class="bg-stone-50 border border-stone-100 rounded-lg p-6 mb-8 text-left text-sm space-y-2">
            <div class="flex justify-between border-b border-stone-200 pb-2 mb-2">
                <span class="font-semibold text-stone-500">Status</span>
                <span class="text-amber-800 font-semibold uppercase text-xs tracking-wider">Aguardando Confirmação</span>
            </div>
            <p class="text-stone-600">Enviaremos em breve um e-mail de confirmação final para você.</p>
        </div>

        <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 justify-center">
            <a href="/" class="px-6 py-3 bg-stone-900 hover:bg-stone-800 text-white font-medium rounded-lg text-sm transition">
                Voltar para a Home
            </a>
            <a href="{{ route('reservations.create') }}" class="px-6 py-3 border border-stone-300 text-stone-600 hover:bg-stone-50 font-medium rounded-lg text-sm transition">
                Fazer Nova Reserva
            </a>
        </div>
    </div>
@endsection

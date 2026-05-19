@extends('layouts.app')

@section('navigation')
    <a href="{{ route('home') }}" class="text-stone-600 hover:text-amber-800 transition">O Restaurante</a>
    <a href="{{ route('menu.index') }}" class="text-stone-600 hover:text-amber-800 transition">O Menu</a>
    <a href="{{ route('reservations.create') }}" class="text-amber-800 border-b-2 border-amber-800 pb-1 font-semibold">Reservas</a>
    <a href="{{ route('contacto.index') }}" class="text-stone-600 hover:text-amber-800 transition">Contato</a>
@endsection

@section('content')
    <div class="bg-white border border-stone-200 rounded-xl shadow-sm p-8 md:p-12">
        <div class="text-center max-w-xl mx-auto mb-10">
            <h2 class="text-3xl font-bold font-serif text-stone-900 mb-3">Reserve Sua Mesa</h2>
            <p class="text-stone-500 text-sm">Preencha os detalhes abaixo para que o nosso sistema inteligente localize e reserve a melhor mesa para a sua experiência gastronômica.</p>
        </div>

        <!-- Alertas de Erros Globais (ex: se não houver mesa livre) -->
        @if($errors->has('error'))
            <div class="bg-amber-50 border border-amber-300 text-amber-900 p-4 rounded-lg mb-6 text-sm flex items-center space-x-2">
                <svg class="w-5 h-5 text-amber-700 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <span>{{ $errors->first('error') }}</span>
            </div>
        @endif

        <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nome Completo -->
                <div>
                    <label class="block text-xs font-semibold text-stone-600 uppercase tracking-wider mb-2">Seu Nome</label>
                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" required
                           class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-stone-800 transition">
                    @error('customer_name') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Telefone -->
                <div>
                    <label class="block text-xs font-semibold text-stone-600 uppercase tracking-wider mb-2">Telefone para Contato</label>
                    <input type="tel" name="customer_phone" placeholder="(11) 99999-9999" value="{{ old('customer_phone') }}" required
                           class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-stone-800 transition">
                    @error('customer_phone') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- E-mail -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-stone-600 uppercase tracking-wider mb-2">Endereço de E-mail</label>
                    <input type="email" name="customer_email" value="{{ old('customer_email') }}" required
                           class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-stone-800 transition">
                    @error('customer_email') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Data da Reserva -->
                <div>
                    <label class="block text-xs font-semibold text-stone-600 uppercase tracking-wider mb-2">Data</label>
                    <input type="date" name="reservation_date" min="{{ date('Y-m-d') }}" value="{{ old('reservation_date', date('Y-m-d')) }}" required
                           class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-stone-800 transition">
                    @error('reservation_date') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Horário -->
                <div>
                    <label class="block text-xs font-semibold text-stone-600 uppercase tracking-wider mb-2">Horário</label>
                    <select name="reservation_hour" required class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-stone-800 transition bg-white">
                        <option value="">Selecione...</option>
                        <option value="12:00" {{ old('reservation_hour') == '12:00' ? 'selected' : '' }}>Almoço - 12h00</option>
                        <option value="13:30" {{ old('reservation_hour') == '13:30' ? 'selected' : '' }}>Almoço - 13h30</option>
                        <option value="19:00" {{ old('reservation_hour') == '19:00' ? 'selected' : '' }}>Jantar - 19h00</option>
                        <option value="20:30" {{ old('reservation_hour') == '20:30' ? 'selected' : '' }}>Jantar - 20h30</option>
                        <option value="22:00" {{ old('reservation_hour') == '22:00' ? 'selected' : '' }}>Jantar - 22h00</option>
                    </select>
                    @error('reservation_hour') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Quantidade de Pessoas -->
                <div>
                    <label class="block text-xs font-semibold text-stone-600 uppercase tracking-wider mb-2">Número de Pessoas</label>
                    <select name="guests_count" required class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-stone-800 transition bg-white">
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}" {{ old('guests_count') == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'pessoa' : 'pessoas' }}</option>
                        @endfor
                    </select>
                    @error('guests_count') <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Observações Especiais -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-stone-600 uppercase tracking-wider mb-2">Notas Especiais (Opcional)</label>
                    <textarea name="notes" rows="3" placeholder="Restrições alimentares, aniversário, preferência de área..."
                              class="w-full px-4 py-3 rounded-lg border border-stone-300 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none text-stone-800 transition">{{ old('notes') }}</textarea>
                </div>
            </div>

            <div class="pt-4 border-t border-stone-100">
                <button type="submit" class="w-full bg-amber-800 text-white font-medium py-4 px-6 rounded-lg hover:bg-amber-900 shadow transition duration-200">
                    Solicitar Reserva no Kasper
                </button>
            </div>
        </form>
    </div>
@endsection

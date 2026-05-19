<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Kasper - Dashboard Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-800">

<div class="container mx-auto px-4 py-8 max-w-7xl">

    <!-- CABEÇALHO -->
    <header class="flex flex-col md:flex-row md:justify-between md:items-center border-b border-gray-200 pb-6 mb-8 gap-4">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold text-amber-800 font-serif tracking-wide">
                <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
                    KASPER Admin
                </h1>
            </a>
            <p class="text-sm text-gray-500 mt-1">Gestão de ocupação do salão e controle operacional de reservas.</p>
        </div>

        <!-- Controle de Filtro de Data -->
        <form method="GET" action="{{ route('admin.reservations.index') }}" class="flex items-center space-x-2 bg-white p-2 rounded-lg shadow-sm border">
            <input type="date" name="date" value="{{ $date }}" class="outline-none text-sm text-gray-700 font-medium p-1">
            <button type="submit" class="bg-amber-800 text-white px-4 py-1.5 rounded-md text-sm font-medium hover:bg-amber-900 transition">
                Filtrar
            </button>
        </form>
    </header>

    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl mb-6 text-sm flex items-center space-x-2">
            <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- CARDS INFORMATIVOS (MÉTRICAS DO DIA) -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <!-- Card 1: Total de Reservas -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total de Reservas</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalReservations }}</h3>
            </div>
            <div class="p-3 bg-amber-50 text-amber-800 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </div>

        <!-- Card 2: Total de Clientes Esperados -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Clientes Esperados</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalGuests }}</h3>
            </div>
            <div class="p-3 bg-blue-50 text-blue-700 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>

        <!-- Card 3: Ocupação de Mesas -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Mesas Ocupadas</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $occupiedTablesCount }} <span class="text-sm text-gray-400 font-normal">/ {{ $totalTablesInRestaurant }}</span></h3>
            </div>
            <div class="p-3 bg-emerald-50 text-emerald-700 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"></path></svg>
            </div>
        </div>

        <!-- Card 4: Capacidade Restante -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Status Ocupação</p>
                <h3 class="text-xl font-bold text-gray-800 mt-2">
                    @if($totalTablesInRestaurant > 0)
                        {{ round(($occupiedTablesCount / $totalTablesInRestaurant) * 100) }}% do Salão
                    @else
                        0%
                    @endif
                </h3>
            </div>
            <div class="p-3 bg-purple-50 text-purple-700 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.003 9.003 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
            </div>
        </div>
    </section>

    <!-- TABELA DE GESTÃO -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h3 class="font-bold text-gray-800">Linha do Tempo de Reservas</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 text-xs font-semibold text-gray-500 uppercase tracking-wider text-left">
                <tr>
                    <th class="px-6 py-4">Horário</th>
                    <th class="px-6 py-4">Cliente</th>
                    <th class="px-6 py-4">Mesa Alocada</th>
                    <th class="px-6 py-4 text-center">Pessoas</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Ações Rápidas</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
                @forelse($reservations as $reservation)
                    <tr class="hover:bg-gray-50/70 transition">
                        <td class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                            {{ $reservation->reservation_time->format('H:i') }} hs
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $reservation->customer_name }}</div>
                            <div class="text-xs text-gray-400">{{ $reservation->customer_phone }} | {{ $reservation->customer_email }}</div>
                            @if($reservation->notes)
                                <div class="mt-1 text-xs text-amber-700 bg-amber-50 rounded px-2 py-0.5 inline-block">
                                    Obs: "{{ $reservation->notes }}"
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 bg-stone-100 text-stone-800 font-semibold rounded-md text-xs border border-stone-200">
                                        {{ $reservation->table->number }}
                                    </span>
                        </td>
                        <td class="px-6 py-4 text-center font-medium whitespace-nowrap">
                            {{ $reservation->guests_count }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold
                                        {{ $reservation->status == 'confirmed' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : '' }}
                                        {{ $reservation->status == 'pending' ? 'bg-amber-50 text-amber-700 border border-amber-200' : '' }}
                                        {{ $reservation->status == 'cancelled' ? 'bg-rose-50 text-rose-600 border border-rose-100' : '' }}
                                        {{ $reservation->status == 'completed' ? 'bg-blue-50 text-blue-700 border border-blue-100' : '' }}
                                    ">
                                        {{ $reservation->status == 'pending' ? 'Pendente' : '' }}
                                        {{ $reservation->status == 'confirmed' ? 'Confirmada' : '' }}
                                        {{ $reservation->status == 'cancelled' ? 'Cancelada' : '' }}
                                        {{ $reservation->status == 'completed' ? 'Concluída' : '' }}
                                    </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-1 whitespace-nowrap">
                            @if($reservation->status == 'pending')
                                <form action="{{ route('admin.reservations.updateStatus', $reservation) }}" method="POST" class="inline-block">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs px-3 py-1.5 rounded-lg font-medium transition shadow-sm">Confirmar</button>
                                </form>
                            @endif

                            @if($reservation->status == 'confirmed')
                                <form action="{{ route('admin.reservations.updateStatus', $reservation) }}" method="POST" class="inline-block">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="completed">
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-lg font-medium transition shadow-sm">Finalizar</button>
                                </form>
                            @endif

                            @if($reservation->status != 'cancelled' && $reservation->status != 'completed')
                                <form action="{{ route('admin.reservations.updateStatus', $reservation) }}" method="POST" class="inline-block">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button class="bg-white hover:bg-rose-50 border text-gray-500 hover:text-rose-600 text-xs px-3 py-1.5 rounded-lg font-medium transition">Cancelar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.008 1.24l.885 1.77a2.25 2.25 0 002.007 1.24h1.98a2.25 2.25 0 002.007-1.24l.885-1.77a2.25 2.25 0 012.007-1.24h3.86m-18 0h18a2.25 2.25 0 012.25 2.25v4.25A2.25 2.25 0 0118 21.75H6a2.25 2.25 0 01-2.25-2.25V15.75a2.25 2.25 0 012.25-2.25zm0-10.5h18A2.25 2.25 0 0121.75 6v4.25m-18 0A2.25 2.25 0 011.5 8V6a2.25 2.25 0 012.25-2.25z"></path></svg>
                            Nenhuma reserva registrada para este dia.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

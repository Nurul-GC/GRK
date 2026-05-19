<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index(Request $request)
    {
        // Define a data selecionada (Padrão: Hoje)
        $date = $request->get('date', today()->toDateString());

        // 1. Busca todas as reservas da data correspondente
        $reservations = Reservation::with('table')
            ->whereDate('reservation_time', $date)
            ->orderBy('reservation_time', 'asc')
            ->get();

        // 2. Cálculo dos Indicadores do Dashboard
        $totalReservations = $reservations->count();
        $totalGuests = $reservations->where('status', '!=', 'cancelled')->sum('guests_count');

        // Contagem de mesas únicas que possuem reservas ativas neste dia
        $occupiedTablesCount = $reservations->where('status', '!=', 'cancelled')
            ->unique('table_id')
            ->count();

        $totalTablesInRestaurant = Table::where('status', 'available')->count();

        // Passa as variáveis organizadas para a view
        return view('admin.reservations.index', compact(
            'reservations',
            'date',
            'totalReservations',
            'totalGuests',
            'occupiedTablesCount',
            'totalTablesInRestaurant'
        ));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed'
        ]);

        $reservation->update(['status' => $validated['status']]);

        return back()->with('success', 'Status da reserva atualizado com sucesso!');
    }
}

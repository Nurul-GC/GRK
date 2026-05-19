<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    // Exibir o formulário de reserva
    public function create()
    {
        return view('reservations.create');
    }

    // Processar a reserva
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'guests_count' => 'required|integer|min:1',
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_hour' => 'required|string',
        ]);

        // Junta data e hora em um único objeto Carbon
        $reservationTime = Carbon::parse($validated['reservation_date'] . ' ' . $validated['reservation_hour']);

        // 1. Buscar uma mesa que comporte o número de clientes
        // 2. Verificar se essa mesa já não está reservada no intervalo daquele horário (ex: tolerância de 2 horas)
        $durationInHours = 2;
        $startTime = $reservationTime->copy()->subHours($durationInHours);
        $endTime = $reservationTime->copy()->addHours($durationInHours);

        $availableTable = Table::where('capacity', '>=', $validated['guests_count'])
            ->where('status', 'available')
            ->whereDoesntHave('reservations', function ($query) use ($startTime, $endTime) {
                $query->whereBetween('reservation_time', [$startTime, $endTime])
                    ->where('status', '!=', 'cancelled');
            })
            ->orderBy('capacity', 'asc') // Pega a menor mesa possível que caiba o grupo
            ->first();

        if (!$availableTable) {
            return back()->withErrors(['error' => 'Desculpe, não temos mesas disponíveis para este horário ou quantidade de pessoas.'])->withInput();
        }

        // Cria a reserva
        Reservation::create([
            'table_id' => $availableTable->id,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'reservation_time' => $reservationTime,
            'guests_count' => $validated['guests_count'],
            'notes' => $request->notes,
        ]);

        return redirect()->route('reservations.success')->with('success', 'Sua reserva no Kasper foi feita com sucesso!');
    }
}

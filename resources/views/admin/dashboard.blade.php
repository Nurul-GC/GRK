<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex h-screen font-sans">

<!-- Barra Lateral (Sidebar) -->
<aside class="w-64 bg-gray-900 text-white flex flex-col hidden md:flex">
    <div class="h-16 flex items-center justify-center bg-gray-950 font-bold text-xl text-amber-800">
        <a href="{{ route('home') }}" class="hover:text-white text-amber-800 font-serif tracking-wide">
            Restaurante KASPER
        </a>
    </div>
    <nav class="flex-grow p-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="block p-3 rounded bg-gray-800 text-white font-medium">
            Dashboard
        </a>
        <a href="{{ route('admin.reservations.index') }}" class="block p-3 rounded hover:bg-gray-800 text-gray-400 hover:text-white transition">
            Gerir Reservas
        </a>
        <a href="#" class="block p-3 rounded hover:bg-gray-800 text-gray-400 hover:text-white transition">
            Mensagens
        </a>
    </nav>
    <!-- Botão de Terminar Sessão (Logout) -->
    <div class="p-4 border-t border-gray-800">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full text-left p-2 rounded text-red-400 hover:bg-red-900/20 transition">
                Sair / Logout
            </button>
        </form>
    </div>
</aside>

<!-- Conteúdo Principal -->
<div class="flex-grow flex flex-col overflow-y-auto">
    <!-- Cabeçalho -->
    <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 border-b">
        <h1 class="text-xl font-semibold text-gray-800">{{ $title }}</h1>
        <div class="flex items-center space-x-3">
            <span class="text-sm text-gray-600 font-medium">{{ Auth::user()->name ?? 'Administrador' }}</span>
            <div class="w-10 h-200 rounded-full bg-amber-800 flex items-center justify-center text-white">
                ADM
            </div>
        </div>
    </header>

    <!-- Área de Trabalho -->
    <main class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Card de Exemplo 1 -->
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Itens no Menu</h3>
                <p class="text-3xl font-bold text-gray-900 mt-2">24</p>
            </div>
            <!-- Card de Exemplo 2 -->
            <div class="bg-white p-6 rounded-lg shadow-sm border">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Novas Mensagens</h3>
                <p class="text-3xl font-bold text-orange-600 mt-2">5</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Bem-vindo de volta!</h2>
            <p class="text-gray-600">Este é o painel de controlo do seu sistema. Utilize a barra lateral para navegar.</p>
        </div>
    </main>
</div>

</body>
</html>

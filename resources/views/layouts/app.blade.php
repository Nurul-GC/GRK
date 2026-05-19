<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Restaurante Kasper' }}</title>
    <!-- Tailwind CSS para desenvolvimento rápido e elegante -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fontes Elegant (Playfair para títulos, Inter para textos) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 font-sans flex flex-col min-h-screen">

<!-- CABEÇALHO DO KASPER -->
<header class="bg-white border-b border-stone-200 sticky top-0 z-50 shadow-sm">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-amber-800 font-serif tracking-wide">
            KASPER
        </a>

        <!-- Links Principais -->
        <nav class="hidden md:flex space-x-8 text-sm font-medium tracking-wide">
            @yield('navigation')
        </nav>

        <!-- Acesso Rápido Admin -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.dashboard') }}" class="text-xs text-stone-400 hover:text-stone-700 transition">
                Área Interna (Admin)
            </a>
        </div>
    </div>
</header>

<!-- CONTEÚDO DINÂMICO -->
<main class="flex-grow container mx-auto px-6 py-12 max-w-4xl">
    @yield('content')
</main>

<!-- RODAPÉ -->
<footer class="bg-stone-900 text-stone-400 py-8 border-t border-stone-800">
    <div class="container mx-auto px-6 text-center text-sm">
        <p>&copy; {{ date('Y') }} Restaurante Kasper. Todos os direitos reservados.</p>
    </div>
</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center px-4">

<div class="max-w-md w-full bg-white rounded-xl shadow-lg border border-gray-200 p-8">

    <!-- Logotipo ou Nome da Marca -->
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-amber-800 font-serif tracking-wide">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
                Restaurante KASPER - Admin
            </h1>
        </a>
        <p class="text-sm text-gray-500 mt-2">Painel de Gestão Administrativa</p>
    </div>

    <!-- Formulário de Autenticação -->
    <form action="{{ route('login') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Campo E-mail -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail Corporativo</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                   class="mt-1 block w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 text-sm">

            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Campo Palavra-Passe -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Palavra-Passe</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 text-sm">

            @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Manter Sessão Iniciada -->
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox"
                       class="h-4 w-4 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-600 select-none">
                    Lembrar-me neste dispositivo
                </label>
            </div>
        </div>

        <!-- Botão de Acesso -->
        <div>
            <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors">
                Iniciar Sessão
            </button>
        </div>
    </form>

    <!-- Link de Retorno Voluntário -->
    <div class="text-center mt-6">
        <a href="{{ route('home') }}" class="text-xs text-gray-400 hover:text-orange-600 transition-colors">
            &larr; Voltar para o Website Público
        </a>
    </div>
</div>

</body>
</html>

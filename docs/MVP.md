# Estrutura do MVP — Restaurante Kasper

## Funcionalidades principais

    - Público
    Página inicial do restaurante
    Lista de mesas disponíveis
    Formulário de reserva, Escolha de:
        nome
        telefone
        data
        hora
        número de pessoas
        Confirmação da reserva

    - Administração
    Login admin
    Dashboard simples
    Listar reservas
    Confirmar/cancelar reservas
    Gerir mesas

## Stack Técnica

    - Backend
    PHP 8.2+
    Laravel 12
    Eloquent ORM
    SQLite
    
    - Frontend
    Blade Templates
    TailwindCSS
    Alpine.js (opcional)
    
    - Base de Dados
    SQLite

## Estrutura da Base de Dados

    - Tabela tables
    id
    name
    capacity
    status
    created_at
    updated_at

    - Tabela reservations
    id
    table_id
    customer_name
    customer_phone
    reservation_date
    reservation_time
    guests
    status
    notes
    created_at
    updated_at

## Fluxo do Sistema

    Cliente entra no site
    ↓
    Escolhe data e hora
    ↓
    Sistema mostra mesas disponíveis
    ↓
    Cliente faz reserva
    ↓
    Admin recebe reserva no dashboard
    ↓
    Reserva confirmada
    Simples, limpo e profissional.

@extends('layouts.dashboard')

@section('title', 'Dashboard | E-Commerce')

@section('content')
<div class="max-w-screen-xl px-6 py-12 mx-auto sm:px-8 lg:px-12">
  {{-- Hero Banner --}}
  <div class="relative w-full h-96 bg-gradient-to-r from-indigo-500 to-indigo-800 rounded-lg shadow-lg">
    <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white p-6">
      <h2 class="text-4xl font-bold sm:text-5xl">Dashboard</h2>
      <p class="mt-4 text-lg sm:text-xl">Selamat datang di halaman dashboard! Kelola bisnis Anda dengan mudah dan pantau performa secara menyeluruh.</p>
    </div>
  </div>

  {{-- Fitur --}}
<div class="mt-16">
  <h3 class="text-3xl font-semibold text-gray-800">Fitur</h3>
  <p class="mt-2 text-gray-600">Akses cepat untuk mengelola berbagai aspek bisnis Anda.</p>
  <div class="grid grid-cols-1 gap-6 mt-8 sm:grid-cols-2 lg:grid-cols-4">
    <a href="{{ route('dashboard.orders.index') }}" class="flex items-center justify-center px-6 py-8 text-center rounded-lg shadow-xl bg-blue-600 text-white hover:opacity-90">
      <div>
        <i class="text-5xl bx bx-cart"></i>
        <p class="mt-4 text-lg font-medium">Kelola Pesanan</p>
      </div>
    </a>
    <a href="{{ route('dashboard.products.index') }}" class="flex items-center justify-center px-6 py-8 text-center rounded-lg shadow-xl bg-blue-600 text-white hover:opacity-90">
      <div>
        <i class="text-5xl bx bx-package"></i>
        <p class="mt-4 text-lg font-medium">Kelola Produk</p>
      </div>
    </a>
    <a href="{{ route('dashboard.users.index') }}" class="flex items-center justify-center px-6 py-8 text-center rounded-lg shadow-xl bg-blue-600 text-white hover:opacity-90">
      <div>
        <i class="text-5xl bx bx-user"></i>
        <p class="mt-4 text-lg font-medium">Kelola Pelanggan</p>
      </div>
    </a>
    <a href="{{ route('dashboard.subscriptions.index') }}" class="flex items-center justify-center px-6 py-8 text-center rounded-lg shadow-xl bg-blue-600 text-white hover:opacity-90">
      <div>
        <i class="text-5xl bx bx-heart"></i>
        <p class="mt-4 text-lg font-medium">Kelola Langganan</p>
      </div>
    </a>
  </div>
</div>

  
</div>
@endsection

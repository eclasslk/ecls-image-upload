@extends('layouts.app')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="text-center">
            <h2 class="mb-4 fw-bold" style="color: #ea5f18; font-size: 2.2rem;">
                🌟 Welcome to Your Dashboard 🌟
            </h2>

            <div class="d-flex flex-wrap justify-content-center gap-4">
                <a href="{{ route('papers.index') }}" class="btn btn-primary px-5 py-4 shadow-lg rounded-pill btn-custom">
                    <i class="bi bi-file-earmark me-2"></i> PAPERS
                </a>
            </div>
        </div>
    </div>
@endsection

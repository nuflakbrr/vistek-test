<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Data Perusahaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <h1 class="font-bold text-xl">Ubah Data Perusahaan</h1>

                        <a href="{{ route('home') }}">Kembali</a>
                    </div>

                    <form action="{{ route('companies.update', $companies->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mt-4">
                            <label for="name">
                                Nama Perusahaan
                            </label>
                            <input id="name" class="block mt-1 w-full dark:text-black" type="text"
                                name="name">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="logo">
                                Logo
                            </label>
                            <input id="logo" class="block mt-1 w-full" type="file" name="logo"
                                accept="image/*">
                            @error('logo')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="tagline">
                                Tagline Perusahaan
                            </label>
                            <input id="tagline" class="block mt-1 w-full dark:text-black" type="text"
                                name="tagline">
                            @error('tagline')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="address">
                                Alamat Perusahaan
                            </label>
                            <input id="address" class="block mt-1 w-full dark:text-black" type="text"
                                name="address">
                            @error('address')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="ml-4">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

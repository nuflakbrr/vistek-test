<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <h1 class="font-bold text-xl">Data Produk</h1>

                        @if (!is_null($product))
                            <a href="{{ route('companies.show', $product->id) }}">Ubah Data Perusahaan</a>
                        @endif
                    </div>

                    @if (is_null($product))
                        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-4">
                                <label for="name">
                                    Nama Perusahaan
                                </label>
                                <input id="name" class="block mt-1 w-full dark:text-black" type="text"
                                    name="name" required autofocus>
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="logo">
                                    Logo
                                </label>
                                <input id="logo" class="block mt-1 w-full" type="file" name="logo"
                                    accept="image/*" required autofocus>
                                @error('logo')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="tagline">
                                    Tagline Perusahaan
                                </label>
                                <input id="tagline" class="block mt-1 w-full dark:text-black" type="text"
                                    name="tagline" required autofocus>
                                @error('tagline')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="address">
                                    Alamat Perusahaan
                                </label>
                                <input id="address" class="block mt-1 w-full dark:text-black" type="text"
                                    name="address" required autofocus>
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
                    @endif

                    @if (!is_null($product))
                        <div class="flex items-start justify-between gap-3 mx-auto">
                            <div class="w-full md:w-1/2">
                                <div class="flex items-center justify-between gap-3">
                                    <div class="mt-5">
                                        <h3 class="text-sm text-gray-500">Nama Perusahaan</h3>
                                        <p class="text-lg text-white">{{ $product->name }}</p>
                                    </div>
                                    <div class="mt-5">
                                        <h3 class="text-sm text-gray-500">Alamat Perusahaan</h3>
                                        <p class="text-lg text-white">{{ $product->address }}</p>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <h3 class="text-sm text-gray-500">Tagline Perusahaan</h3>
                                    <p class="text-lg text-white">{{ $product->tagline }}</p>
                                </div>
                            </div>

                            <div class="w-full md:w-1/2">
                                @if (!is_null($product->logo))
                                    <div class="flex items-center justify-center">
                                        <img src="/storage/images/{{ $product->logo }}" alt="{{ $product->name }}"
                                            class="mt-5 bg-cover bg-center w-64 h-auto">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

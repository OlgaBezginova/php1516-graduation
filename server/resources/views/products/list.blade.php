<x-layout>
    <x-slot name="title">
        Products
    </x-slot>

    <x-slot name="h1">
        Products
    </x-slot>

    <x-slot name="sidebar">
        <ul>
            <li><a href="{{ route('products.add') }}"> + Add new</a></li>
        </ul>
    </x-slot>
</x-layout>

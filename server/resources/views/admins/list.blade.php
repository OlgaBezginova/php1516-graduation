<x-layout>
    <x-slot name="title">
        Admins
    </x-slot>
    <x-slot name="h1">
        Admins
    </x-slot>
    @each('admins.list-item', $admins, 'admin')
</x-layout>

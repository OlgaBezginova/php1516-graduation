<x-layout>
    <x-slot name="title">
        Users
    </x-slot>
    <x-slot name="h1">
        Users
    </x-slot>
    @each('users.list-item', $users, 'user')
</x-layout>

<x-layout>
    <x-slot name="title">
        Registration
    </x-slot>
    <x-slot name="h1">
        Registration
    </x-slot>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirm" placeholder="Confirm Password">
        <button type="submit">Register</button>
    </form>
</x-layout>

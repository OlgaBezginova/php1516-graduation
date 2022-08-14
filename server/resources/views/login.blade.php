<x-layout>
    <x-slot name="title">
        Login
    </x-slot>
    <x-slot name="h1">
        Login
    </x-slot>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</x-layout>

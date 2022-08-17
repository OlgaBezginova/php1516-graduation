<x-main-layout>
    <x-slot name="title">
        Login
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <x-alert></x-alert>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit">Login</button> or <a href="{{ route('register-page') }}">Register</a>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</x-main-layout>

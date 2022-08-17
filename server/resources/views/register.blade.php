<x-main-layout>
    <x-slot name="title">
        Registration
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Registration</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <x-alert></x-alert>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirm" placeholder="Confirm Password">
                    </div>
                    <button type="submit">Register</button> or <a href="{{ route('login-page') }}">Login</a>
                </form>
            </div>
        </div>
    </div>
</x-main-layout>


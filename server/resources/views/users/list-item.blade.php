<div class="post-preview">
    <a href="{{ route('users.user', ['id' => $user->id]) }}">
        <h3 class="post-title">
            {{ $user->firstname }} {{ $user->lastname }}
        </h3>
        <p class="post-meta">{{ $user->username }} </p>
    </a>
</div>
<hr>

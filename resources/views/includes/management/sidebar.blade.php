<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{ request()->is('management') ? 'active' : '' }}" href="{{ url('/management') }}">Dashboard</a>
    <a class="nav-link {{ request()->is('management/users')||request()->is('management/users/*') ? 'active' : '' }}" href="{{ url('/management/users') }}">Users</a>
</div>
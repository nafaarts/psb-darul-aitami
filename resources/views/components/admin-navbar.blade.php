@can('admin')
    <div class="card mb-3">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="navbar-nav">
                    <a @class(['nav-link', 'active' => request()->routeIs('dashboard')]) aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                    <a @class(['nav-link', 'active' => request()->routeIs('users*')]) aria-current="page" href="{{ route('users.index') }}">Data User</a>
                    <a @class(['nav-link', 'active' => request()->routeIs('profil.edit')]) aria-current="page" href="{{ route('profil.edit') }}">Profil Pondok</a>
                    <a @class([
                        'nav-link',
                        'active' => request()->routeIs('pengumuman.edit'),
                    ]) aria-current="page" href="{{ route('pengumuman.edit') }}">Pengumuman</a>
                </div>
            </div>
        </nav>
    </div>
@endcan

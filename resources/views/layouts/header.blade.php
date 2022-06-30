<div class="header">
    <div class="header-container container">
        <div class="header-menu">
            <a href="/" class="header-link">
                <div class="header-logo">
                    Codeethics
                </div>
            </a>
            <ul class="menu-nav">
                <li class="menu-item">
                    <a href="/" class="menu-link {{ $active === 'home' ? 'menu-link-active' : '' }}">
                        <span class="menu-text">Home</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/mahasiswa" class="menu-link {{ $active === 'mahasiswa' ? 'menu-link-active' : '' }}">
                        <span class="menu-text">Mahasiswa</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/kategori" class="menu-link {{ $active === 'kategori' ? 'menu-link-active' : '' }}">
                        <span class="menu-text">Kategori</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/postingan" class="menu-link {{ $active === 'postingan' ? 'menu-link-active' : '' }}">
                        <span class="menu-text">Postingan</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="header-action">
            <ul class="menu-nav">
                <li class="menu-item dropdown">
                    <a class="menu-link dropdown-toggle" style="padding-right: 0;"href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="menu-text">Hi, {{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <form action="/logout" method="POST">
                            @csrf
                            <li><button type="submit" class="dropdown-item">Logout</button></li>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

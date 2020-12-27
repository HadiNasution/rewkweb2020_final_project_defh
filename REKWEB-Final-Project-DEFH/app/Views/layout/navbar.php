    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <a id="nav-brand" class="navbar-brand" href="/">Acuk Sae</a>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/trends">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/new">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/contact">Contact</a>
                        </li>
                        <?php if (in_groups('admin')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/pages/dashboard">Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="/pages/keranjang"><i class="fa fa-shopping-cart" id="cart"></i><span class="badge bg-secondary"></span></a>
                        </li>
                        <div>
                            <?php if (logged_in()) : ?>
                                <li class="nav-item" id="btn-login">
                                    <a href="/logout" id="logout"><b>Logout</b></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item" id="btn-login">
                                    <a href="/login" id="login"><b>Login</b></a>
                                </li>
                            <?php endif; ?>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
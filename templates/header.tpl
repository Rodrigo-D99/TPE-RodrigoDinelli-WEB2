</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid shadow">
            <a class="navbar-brand" href="">  
                <img src="./images/logo.png" alt="Buenos sabores! rotiseria Tudai" id="logo">
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">INICIO</a>
                </li>
                
                {if !empty($smarty.session.USER_ID)}
                    <li class="nav-item">
                        <a class="nav-link" href="products">EDITAR PRODUCTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories">EDITAR CATEGORIAS</a>
                    </li>    
                {/if}
            </ul>
            <span class="navbar-text">
            {if !empty($smarty.session.USER_ID)}
                <a class="nav-link" href="logout">LOGOUT</a>
            {else}
                <a class="nav-link" href="login">LOGIN</a>
            {/if}
            </span>
        </div>
    </nav>

    
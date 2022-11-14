{include file='head.tpl'}
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid shadow">
        <a class="navbar-brand" href="">  
            <img src="./images/logo.png" alt="Gulp! cafetería" id="logo">
        </a> 
    </div>
</nav>

<div class="container mt-5 d-flex justify-content-center">
    <form class="form" action="login" method="POST">
        <div class="mb-2">
            <input type="email" name="email" class="form-control form-control-md" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control form-control-md" placeholder="password">
        </div>
        {if $error}
            <div class="alert alert-danger">{$error}</div>
        {/if}
        <button type="submit" class="btn btn-warning">Login</button>
    </form>  
</div>
</body>
</html>  


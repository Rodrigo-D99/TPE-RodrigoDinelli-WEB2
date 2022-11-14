{include file='head.tpl'}
{include file='header.tpl'}
<div>
<img src="./images/banner.png" class="banner shadow-lg" alt="banner">
</div>
<div class="container mb-5" >
    <h1 class="mt-5">BIENVENIDOS</h1>
    <div class="container mt-5" >
        <div class="container d-flex justify-content-center m-5">
            <h2 class="">Nuestro menú</h2>
            <div class="container-sm">
                <ul class="list-group list-group-flush">
                    {foreach from=$products item=$product}
                        <div class="card mb-2">
                            <div class="card-header">
                                {$product->category}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                <p><a href="detail/{$product->id}">{$product->names}</a></p>
                                </blockquote>
                            </div>
                        </div>
                    {/foreach} 
                </ul>
            </div>
        {include file='aside.tpl'}
        </div>
    </div>
</div>
{include file='footer.tpl'}



{include file='head.tpl'}
{include file='header.tpl'}
<div class="container d-flex p-2 justify-content-center mb-5">
    <div class="card m-5 " style="max-width: 740px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="./images/logo.png" class="img-fluid rounded-start shadow-lg" alt="Cafetería Gulp!">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{$item->names}</h5>
                    <p class="card-text">{$item->price}</p> 
                    <p class="card-text">{$item->descriptions}</p> 
                    <p class="card-text"><small class="text-muted">{$item->category}</small></p>       
                </div>
            </div>
        </div>
    </div>
</div>
{include file='footer.tpl'}



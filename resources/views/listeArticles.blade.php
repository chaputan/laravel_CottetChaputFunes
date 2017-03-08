/* A compléter */
<div class="container">
    <div class="col-md-8">
        <div class="blanc">
            <h2>Liste des articles du domaine {{ $domaine->libdomaine }} </h2>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:10%">Id</th> 
                    <th style="width:60%">Titre</th>  
                    <th style="width:10%">Prix</th> 
                    <th style="width:10%">Résumé</th> 
                    <th style="width:10%">Panier</th>                     
                </tr>
            </thead>
           /* A compléter */
            <tr>   
                <td> /* A compléter */ </td> 
                <td> /* A compléter */ </td> 
                <td> /* A compléter */ </td>                 
                <td style="text-align:center;"><a href="{{ url('/getArticle') }}//* A compléter */">
                        <span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="top" title="Résumé"></span></a></td>
                <td style="text-align:center;">
                        <a href="{{ url('/addBasket') }}//* A compléter */">
                        <span class="glyphicon glyphicon-shopping-cart" data-toggle="tooltip" data-placement="top" title="Panier"></span></a></td>
                </td>                    
            </tr>
            /* A compléter */
        </table>
        /* A compléter */
    </div>
</div>
/* A compléter */

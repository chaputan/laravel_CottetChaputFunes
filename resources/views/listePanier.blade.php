/* A compléter */
<div class="container">
    <div class="col-md-8">
        <div class="blanc">
            <h2>Mon panier</h2>
        </div>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th style="width:10%">Id</th> 
                    <th style="width:70%">Titre</th>  
                    <th style="width:10%">Prix</th> 
                    <th style="width:10%">Supprimer</th>                     
                </tr>
            </thead>
            /* A compléter */
            <tr>   
                <td> /* A compléter */ </td> 
                <td> /* A compléter */ </td> 
                <td> /* A compléter */ </td>                 
                <td style="text-align:center;">
                    <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                       onclick="javascript:if (confirm('Suppression confirmée ?'))
                           { window.location ='{{ url('/deleteBasket') }}//* A compléter */'; }">
                    </a>
                </td>   
            </tr>
            /* A compléter */
            <tr>
                <td colspan="2" style="text-align: right">Montant total</td>                    
                <td>/* A compléter */</td>                       
            </tr>             
        </table>
        /* A compléter */
        <div>
            <a class="btn btn-primary" href="{{ url('/validBasket') }}"><span class="glyphicon glyphicon-log-in"></span> Valider panier</a>    
        </div> 
        /* A compléter */
        /* A compléter */
    </div>
</div>
/* A compléter */

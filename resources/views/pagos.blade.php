<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title> {{ $pagament->titol }} </title>
</head>
<body>
    <div class="container-sm">
        @include('menu')

        <!-- Contenido -->
        <div id="contingut" class="p-3 px-4">
            <h2> {{ $pagament->titol }} </h2> 
            <hr>
            <p>  {!! $pagament->descripcio !!} </p> 
            
            
            <a class="button-style" href="">Fer el pagament</a>
            <form action="https://sis.sermepa.es/sis/realizarPago" method="post" accept-charset="utf-8" id="form_260">
                <input type="hidden" name="Ds_SignatureVersion" value="HMAC_SHA256_V1" /> <input type="hidden"
                    name="Ds_MerchantParameters"
                    value="eyJEU19NRVJDSEFOVF9BTU9VTlQiOiIyMDAwMCIsIkRTX01FUkNIQU5UX09SREVSIjoiMjAwMjI3MTAyOTU0IiwiRFNfTUVSQ0hBTlRfTUVSQ0hBTlRDT0RFIjoiMDIyMzE2Nzk5MCIsIkRTX01FUkNIQU5UX0NVUlJFTkNZIjoiOTc4IiwiRFNfTUVSQ0hBTlRfVFJBTlNBQ1RJT05UWVBFIjoiMCIsIkRTX01FUkNIQU5UX1RFUk1JTkFMIjoiMSIs">
            </form>
            <hr>
            <!-- Links Redes Sociales -->
            <a class="btn btn-twitter" href="https://twitter.com/intent/tweet?text=&url=http://127.0.0.1:8000/pagos/{{$pagament->id}}" role="button">Twitter</a>
            <a class="btn btn-facebook" href="https://www.facebook.com/sharer.php?u=http://127.0.0.1:8000/pagos/{{$pagament->id}}" role="button">Facebook</a>
            <a class="btn btn-whatsapp" href="https://wa.me/?text=http://127.0.0.1:8000/pagos/{{$pagament->id}}" role="button">WhatsApp</a>
            <a class="btn btn-telegram" href="https://telegram.me/share/url?url=http://127.0.0.1:8000/pagos/{{$pagament->id}}&text=" role="button">Telegram</a>
        </div>
        <!-- Fin del Contenido -->
        <!--Pie de Página-->
        @include('footer')
        <!-- Fin del Pie de Página -->
    </div>
    
</body>

</html>

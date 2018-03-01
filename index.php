<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Servidor</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        
        <link href="css/style.css" rel="stylesheet" />
        
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"> </script>
    </head>
    <body>
        
        <select id="opcion" class="form-control">
            <option style="Display: none">Opcion</option>
            <option value="area">area</option>
            <option value="perimetro">perimetro</option>
            <option value="volumen">volumen</option>
        </select>

        <form id="form1" name="formulario" method="POST" style="display: none">

            <span>Calcular area</span>
            <br>
            <input type="number" id="area" />
            <input type="button" class="enviar btn btn-default" value="Enviar" />

        </form>
        
        <form id="form2" name="formulario" method="POST" style="display: none">

            <span>Calcular perimetro</span>
            <br>
            <input type="number" id="perimetro" />
            <input type="button" class="enviar btn btn-default" value="Enviar" />

        </form>
        
        <form id="form3" name="formulario" method="POST" style="display: none">

            <span>Calcular volumen</span>
            <br>
            <input type="number" id="volumen" />
            <input type="button" class="enviar btn btn-default" value="Enviar" />

        </form>
        
        
        <script type="text/javascript">
            
            $(document).ready(function(){
                
                var opcion = "area";
                
                $('#opcion').change(function(){
                    opcion = $('#opcion').val();
                    
                    switch(opcion)
                    {
                        case "area":
                            $('#form1').removeAttr("style");
                            $('#form2').attr("style", "Display: none");
                            $('#form3').attr("style", "display: none");
                            break;
                        case "volumen":
                            $('#form3').removeAttr("style");
                            $('#form1').attr("style", "Display: none");
                            $('#form2').attr("style", "display: none");
                            break;
                        case "perimetro":
                            $('#form2').removeAttr("style");
                            $('#form1').attr("style", "Display: none");
                            $('#form3').attr("style", "display: none");
                            break;
                        default:
                            break;
                    }
                });
                
                $('.enviar').click(function(){
                    switch(opcion)
                    {
                        case "area":
                            $.ajax({
                                url: "area.php",
                                type: "POST",
                                data: "numero=" + $('#area').val(),
                                success: function(response)
                                {
                                    alert(response);
                                }
                              });
                            break;
                        case "volumen":
                            $.ajax({
                                url: "volumen.php",
                                type: "POST",
                                data: "numero=" + $('#volumen').val(),
                                success: function(response)
                                {
                                    alert(response);
                                }
                              });
                            break;
                        case "perimetro":
                            $.ajax({
                                url: "perimetro.php",
                                type: "POST",
                                data: "numero=" + $('#perimetro').val(),
                                success: function(response)
                                {
                                    alert(response);
                                }
                              });
                            break;
                        default:
                            break;
                    }
                    
                    $('#area').val() = '';
                    $('#perimetro').val() = '';
                    $('#volumen').val() = '';
                });                
            });
        </script>
    </body>
</html>

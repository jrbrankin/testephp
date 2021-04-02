<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Teste PonteOn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="src/css/estilo.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
 
  	<!-- faz a busca no select dos estados e cidades -->
  <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <script type="text/javascript">    
        
        $(document).ready(function () {
        
            $.getJSON('src/js/estados_cidades.json', function (data) {

                var items = [];
                var options = '<option value="">Escolha um Estado</option>';    

                $.each(data, function (key, val) {
                    options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
                });                    
                $("#estados").html(options);                
                
                $("#estados").change(function () {                
                
                    var options_cidades = '';
                    var str = "";                    
                    
                    $("#estados option:selected").each(function () {
                        str += $(this).text();
                    });
                    
                    $.each(data, function (key, val) {
                        if(val.nome == str) {                            
                            $.each(val.cidades, function (key_city, val_city) {
                                options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                            });                            
                        }
                    });

                    $("#cidades").html(options_cidades);
                    
                }).change();        
            
            });
        
        });
        
    </script>
     	<!-- aplica mascara no input do telefone padrão para 9 digitos -->
    <script type="text/javascript">
            function fMasc(objeto,mascara) {
                obj=objeto
                masc=mascara
                setTimeout("fMascEx()",1)
            }
            function fMascEx() {
                obj.value=masc(obj.value)
            }    
            function mTel(tel) {
                tel=tel.replace(/\D/g,"")
                tel=tel.replace(/^(\d)/,"($1")
                tel=tel.replace(/(.{3})(\d)/,"$1)$2")
                if(tel.length == 9) {
                    tel=tel.replace(/(.{1})$/,"-$1")
                } else if (tel.length == 10) {
                    tel=tel.replace(/(.{2})$/,"-$1")
                } else if (tel.length == 11) {
                    tel=tel.replace(/(.{3})$/,"-$1")
                } else if (tel.length == 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                } else if (tel.length > 12) {
                    tel=tel.replace(/(.{4})$/,"-$1")
                }
                return tel;
            }
            
            
        </script>
</head>
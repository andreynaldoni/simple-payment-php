<html>
<head>
 <title>Passar Variável Javascript para PHP</title>
 <script type="text/javascript">
  var variaveljs = 'Mauricio Programador';
var hashClient ;
 
 </script>
</head>
<body>
 <?php 
  $po = "<script>document.write(variaveljs)</script>";
    echo  "Olá $po";
    
    //"<script> PagSeguroDirectPayment.setSessionId($sessionId) </script>";
    
    ECHO "<script>  hashClient = 'asd' </script>";
 $hashClient = "<script>document.write(hashClient)</script>";
    echo  "Olá  $hashClient ";
     $teste = "<script>document.write('". $hashClient ."')</script>";
    echo " teste $teste ";
    
    echo "<script>  PagSeguroDirectPayment.getSenderHash() </script>"; 
?>
</body>
</html>
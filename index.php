<?php
$json = file_get_contents('config.json');
$config = json_decode($json,true);
$row = 1;
$redirect = '';
$tempo = '';
$cont = 0;
$l_temp = '';
$qm_temp = '';
$qa_temp = '';

$lista = array();
if (($handle = fopen("links_redirect.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $num = count($data);
    $row++;
    for ($c=0; $c < $num; $c++) {
      $tmp = explode(';',$data[$c]);
      $l_temp = $tmp['0'];
      $qm_temp = $tmp['1'];
      $qa_temp = $tmp['2'];
      if($cont > 0 && $qm_temp > $qa_temp && $redirect == ''){
        $redirect = $l_temp;
        $qa_temp++;
      }
      array_push($lista, array($l_temp,$qm_temp,$qa_temp));
      $cont++;
    }
  }
  fclose($handle);
}
$fp = fopen('links_redirect.csv', 'w');
foreach ($lista as $linha) {
    fputcsv($fp, $linha, ';');
}
fclose($fp);
?>

<!DOCTYPE html>
<html>
<head>
  <title><?=$config['titulo_pagina']?></title>
  <meta http-equiv="Content-Language" content="pt-br">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style type="text/css">
  .loader_custom {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
    margin:20px auto 20px auto;
  }
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="row align-content-center" style="height: 100vh;">
      <div class="col-12 text-center">
        <?=($config['head_line'] != '' ? '<p class="h2 mb-1">'.$config['head_line'].'</p>' : '')?>
        <?=($config['sub_head_line'] != '' ? '<p class="h4 mb-5">'.$config['sub_head_line'].'</p>' : '')?>
        <?=($config['spinner'] != '' ? $config['spinner'] : '')?>
        <?=($config['mensagem_redirect'] != '' ? '<p>'.$config['mensagem_redirect'].'</p>' : '')?>
      </div>
    </div>
  </div>
  <script>
  console.log('URL => <?=$redirect?>');
  console.log('TEMPO => <?=$config['tempo_redirect'] * 1000?>');
  setTimeout(function () {
       window.location.href = "<?=$redirect?>";
    }, <?=$config['tempo_redirect'] * 1000?>);
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

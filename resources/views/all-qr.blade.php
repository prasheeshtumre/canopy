<!DOCTYPE html>
<html lang="en">
<head>
  <title>Canopy QR</title>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    
    <div class="p-3">
        <img src="https://my.canopy-insurance.com/assets/canopy-insurance-34a7d3ab1bfa4d173628c1003f1bc4f2a84bee6abb71b21046ceaf4dab96e2e8.png" width="160">
    </div>
    
    
  <div class="bg-success text-white rounded"><h4 class="p-2">Cardholder Details</h4></div>
  <!--<p>The .table-bordered class adds borders to a table:</p>            -->
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
  <thead>
    <tr class="table-success">
      <th width="5%">S.No</th>
      <th  >Cardholder Number</th>
      <th  >QR code</th>
      
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach($users as $val){ ?>
    <tr>
      <th scope="row">{{ $i++;}}</th>
      <td>{{$val->card_no}}</td>
      <td>
          <a href="{{ url('/newqrcode')}}/{{$val->qr_path}}" target="__blank">
          <img src="{{ url('/newqrcode')}}/{{$val->qr_path}}" width="200" height="200">
          </a>
         </td>
    
    </tr>
    <?php } ?>
  </tbody>
</table>
  </div>  


</div>

</body>
</html>

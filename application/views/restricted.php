<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    body {
  margin: auto;
  padding: auto;
}

p {
  font-size: 18px;
}

.error-page {
  text-align: center;
  background-color: #001F5B;
  padding: 5% 0 5% 0;
  color: white;
  box-shadow: 0px 4px 17px rgba(0,0,0,0.6);
}

.material-icons { 
  font-size: 200px !important; 
  -webkit-transition: 1s ease-out;
  -moz-transition:  1s ease-out;
  transition:  1s ease-out;

}

.material-icons:hover{
  -webkit-transform: rotateZ(360deg) ;
  -moz-transform: rotateZ(360deg);
  transform: rotateZ(360deg);
}

.btn-large {
  margin: 5% 42% 5% 42%;
  width: 300px;
  background-color: #17B8B8;
}
</style>
</head>
<body>
  <div class="error-page">
     <i class="material-icons">report</i>
     <h4>Page Forbidden</h4>
     <p>Sorry, you are not authorized to view this page.</p>
  </div>
  <a href="<?= BASE_URL ?>" class="waves-effect waves-light btn-large">Back To Home Page</a>
</body> 
<html>
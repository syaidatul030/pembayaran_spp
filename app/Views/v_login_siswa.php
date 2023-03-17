<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login Siswa</title>
  <meta charset="utf-8">
  <link href="/css/bootstrap.css" rel="stylesheet" />
  <link href="/css/signin.css" rel="stylesheet" />

  <link href="/fontawesome/css/all.min.css" rel="stylesheet" />

  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    body{
    }
  </style>

</head>


<body class="text-center hold-transition login-page bg-image" style="background-image: url('/bg_1.jpg'); background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;" >
  <form class="form-signin" method="POST" action="/siswa/login">
  <img class="mb-4" src="/logo.png" class="img-thumbnail" height="150">
    <h1 class="h3 mb-3 font-weight-normal"><b> Login Siswa</b></h1>

    <?=session()->getFlashData('msg', 'Username atau Password salah');?>

    <label for="inputUser" class="sr-only">Username</label>
    <input type="text" name="txtUsername" id="inputUser" class="form-control" placeholder="NISN" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="txtPassword" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-info btn-block" type="submit"><i class="fa fa-arrow-down"></i> LOGIN </button>
    <p class="mt-5 mb-3 text-muted">SMKN 2 KUNINGAN </p>
  </form>


  <body>

</html>
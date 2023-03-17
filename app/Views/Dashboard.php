<?=$this->include('Layout/Header');?>

<!-- Awal Konten Aplikasi -->
<link rel="stylesheet=0" href="https://www.w3schools.com/w3css/4/w3.css">
<main role="main" class="flex-shrink-0 bg-info" style="background-image: url('/bg_2.jpg'); height: 155vh; width: 100%; background-repeat: no-repeat;">
<div class="w3-cursive">
<div class="container" style="margin-top:100px">
  <?php 
    if(empty($intro)){
        $this->renderSection('content');
    } else {
        echo $intro;
    }
    ?>
  </div>
  
</main>

<?=$this->include('Layout/Modal');?>
<?=$this->include('Layout/Footer');?>
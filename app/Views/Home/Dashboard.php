<?=$this->include('Home/Header');?>

<!-- Awal Konten Aplikasi -->
<main role="main" class="flex-shrink-0 bg-info" style="background-image: url('/bg_2.jpg'); height: 125vh; width: 100%; background-repeat: no-repeat;">
    
<div class="text-center">
    <?php 
    if(empty($intro)){
        $this->renderSection('content');
    } else {
        echo $intro;
    }
    ?>
  </div>

</main>

<?=$this->include('Home/Footer');?>
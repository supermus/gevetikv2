<style>
  .navbar-fixed-bottom{
    display: none;
  }
</style>
<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>

  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1>Participez</h1>
            <h3>Tous le monde est le bienvenue</h3>
        </hgroup>
        <?php echo $this->Html->link(
            'Lire la suite',
            ['controller' => 'evenements', 'action' => 'view',1]
            ,['class'=>'btn btn-danger']
        );
        ?>
      </div>
    </div>
    <div class="item slides">
      <div class="slide-2"></div>
      <div class="hero">        
        <hgroup>
            <h1>We are smart</h1>        
            <h3>Get start your next awesome project</h3>
        </hgroup>       
        <button class="btn btn-hero btn-lg" role="button">See all features</button>
      </div>
    </div>
    
  </div> 
</div>
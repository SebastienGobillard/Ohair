</main>

<footer>

  <div class="social">
    <ul>
      <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
      <li><a href="#"><i class="fab fa-instagram"></i></a></li>
    </ul>
  </div>

  <div class="legal">
    <p>Copyright 2018-2019 - Tous droits réservés</p>
    <?php 
      $menu = wp_nav_menu([
        'theme_location'    => 'nav-footer',
        // 'echo'              => false,
        'container_class'   => 'ul'
      ]);

      $menu = strip_tags($menu, '<a><li>'); ?>
  </div>

  <div class="webdev">
    <p>Développé par <a href="https://www.laure-lamande.fr">Laure Lamande</a></p>
  </div>

</footer>

</div>
    <aside class="menu_over">

        <div>
            <?php 
              $menu = wp_nav_menu([
                'theme_location'    => 'nav-mobile',
                // 'echo'              => false,
                'container_class'   => 'ul'
              ]);

              $menu = strip_tags($menu, '<a><li>'); 
            ?>
        </div>
    </aside>
</body>

<?php wp_footer(); ?>
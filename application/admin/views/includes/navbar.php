<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$url = $this->uri->segment(1);
$settings = getSettings();
$site_logo = front_url().$settings->site_logo;
?>
      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
              <li class="<?= $url == 'dashboard' ? 'active' : ''; ?>"><a class="nav-link"
                                                                         href="<?php echo base_url(); ?>dashboard"><i
                              class="fas fa-fire"></i><span>Dashboard</a>
              </li>

              <li class="<?php echo $url == 'drivers' ? 'active' : ''; ?>"><a class="nav-link"
                                                                              href="<?php echo base_url(); ?>drivers">Drivers</a>
              </li>
              <li class="<?php echo $url == 'passengers' ? 'active' : ''; ?>"><a class="nav-link"
                                                                                 href="<?php echo base_url(); ?>passengers">Passengers</a>
              </li>

              <li class="<?php echo $url == 'rides' ? 'active' : ''; ?>"><a class="nav-link"
                                                                            href="<?php echo base_url(); ?>rides">Rides</a>
              </li>
              <li class="<?php echo $url == 'tickets' ? 'active' : ''; ?>"><a class="nav-link"
                                                                              href="<?php echo base_url(); ?>tickets">Tickets</a>
              </li>
          </ul>
        </div>
      </nav>

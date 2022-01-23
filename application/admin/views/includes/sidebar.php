<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$url = $this->uri->segment(1);
$settings = getSettings();
$site_logo = front_url() . $settings->site_logo;

$dashboard= false;
$drivers= false;
$passengers= false;
$tickets= false;
$rides= false;
$alerts= false;
$city= false;

switch ($url) {
    case 'dashboard':
    case '/':
        $dashboard = true;
        break;
    case 'drivers':
    case 'view-drivers':
    case 'edit-drivers':
    case 'add-drivers':
    case 'driver-subscription':
        $drivers = true;
        break;
    case 'passengers':
    case 'view-passenger':
    case 'edit-passenger':
    case 'add-passenger':
        $passengers = true;
        break;
    case 'rides':
    case 'view-ride':
    case 'edit-ride':
    case 'add-ride':
        $rides = true;
        break;
    case 'cites':
    case 'view-city':
    case 'edit-city':
    case 'add-city':
        $city = true;
        break;
    case 'tickets':
    case 'thread':
        $tickets = true;
        break;
    case 'alerts':
    case 'create-alerts':
    case 'view-alerts':
        $alerts = true;
        break;
}

?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dashboard">
                <?php
                if ($site_logo != '') {
                    ?>
                    <img src="<?= $site_logo ?>"
                    <?php
                }
                ?>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dashboard">SB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= ($dashboard) ? 'active' : ''; ?>"><a class="nav-link"
                                                                href="<?php echo base_url(); ?>dashboard"><i
                            class="fas fa-fire"></i><span>Dashboard</a>
            </li>

            <li class="<?php echo ($drivers) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>drivers">
                    <i class="fas fa-user"></i> Drivers</a>
            </li>
            <li class="<?php echo ($passengers) ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>passengers"> <i class="fas fa-user"></i>
                    Passengers</a>
            </li>

            <li class="<?php echo ($rides) ? 'active' : ''; ?>"><a class="nav-link"
                                                                   href="<?php echo base_url(); ?>rides"> <i
                            class="fas fa-car"></i>Rides</a>
            </li>
            <li class="<?php echo ($tickets) ? 'active' : ''; ?>"><a class="nav-link"
                                                                            href="<?php echo base_url(); ?>tickets"> <i
                            class="fas fa-ticket-alt"></i> Support Tickets</a>
            </li>
            <li class="<?php echo ($alerts) ? 'active' : ''; ?>"><a class="nav-link"
                                                                            href="<?php echo base_url(); ?>alerts"> <i
                            class="fas fa-bell"></i> Alerts</a>
            </li>
            <li class="<?php echo ($city) ? 'active' : ''; ?>"><a class="nav-link"
                                                                    href="<?php echo base_url(); ?>cites"> <i
                            class="fas fa-globe"></i> Cites</a>
            </li>
        </ul>


    </aside>
</div>

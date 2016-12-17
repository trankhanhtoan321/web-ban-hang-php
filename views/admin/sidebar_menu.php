<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="menu_section">
  <h3>Dashboard</h3>
  <ul class="nav side-menu">
    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="/admin">Dashboard</a></li>
        <!-- <li><a href="/">Website</a></li> -->
      </ul>
    </li>
    <li><a><i class="fa fa-database"></i> Products <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="/admin/new_product">New Product</a></li>
        <li><a href="/admin/add_product_category">New Category</a></li>
        <li><a href="/admin/categorys">Categorys</a></li>
        <li><a href="/admin/products">Products</a></li>
      </ul>
    </li>
    <li><a><i class="fa fa-user"></i>User <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="/admin/profile_user">Profile</a></li>
        <li><a href="/admin/change_password">Change Password</a></li>
      </ul>
    </li>
  </ul>
</div>
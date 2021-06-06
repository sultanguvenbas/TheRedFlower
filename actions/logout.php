<?php
setcookie("login", null, path: "/", httponly: true);
setcookie("admin", null, path: "/", httponly: true);
echo "<script>localStorage.setItem('cart','[]');alert('Using biz service icin tesekkur, sen logout kardes');window.location.href='/';</script>";

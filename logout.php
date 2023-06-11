<?php

session_start(); 
session_destroy();
header("Location:../canine/index.php");


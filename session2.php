<?php
session_start();
echo $_SESSION["name"];
echo $_SESSION["age"];
echo session_id();
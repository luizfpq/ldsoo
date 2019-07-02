<?php

function __autoload($class)
{
	if(file_exists('src/Controller/'. $class . '.php')) {
		include('src/Controller/'. $class . '.php');
	echo '<script>';
  echo 'console.log('. json_encode( 'src/Controller/'. $class . '.php' ) .')';
  echo '</script>';
	}


	if(file_exists('src/Model/'. $class . '.php')) {
	include('src/Model/'. $class . '.php');
	echo '<script>';
  echo 'console.log('. json_encode( 'src/Model/'. $class . '.php' ) .')';
  echo '</script>';
		}


	if(file_exists('src/View/'. $class . '.php')) {
		include('src/View/'. $class . '.php');
		echo '<script>';
  echo 'console.log('. json_encode( 'src/View/'. $class . '.php' ) .')';
  echo '</script>';
	}


	if(file_exists('common-class/'. $class . '.php')) {
		include('common-class/'. $class . '.php');
		echo '<script>';
  echo 'console.log('. json_encode( 'common-class/'. $class . '.php' ) .')';
  echo '</script>';
	}

}

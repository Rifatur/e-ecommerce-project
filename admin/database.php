<?php
$connection=mysqli_connect("localhost","root","","greenleaf");

//Create Database..
//
$database=" CREATE DATABASE greenleaf";

if(mysqli_query($connection,$database)){
  echo"create database </br>";
}

//CREATE ALL TABLE START FROM HERE ...
//
$admins="CREATE TABLE admin (
  adminID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  userName varchar(50) NOT NULL,
  Email varchar(50) NOT NULL,
  password varchar(20) NOT NULL
)";
if(mysqli_query($connection,$admins)){
  echo"create Table product </br>";
}else {
  echo"Not Create ";
}
//CREATE CATEGORY TABLE
//
$category="CREATE TABLE category(
  categoryID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  categoryName varchar(50) NOT NULL
)";
if(mysqli_query($connection,$category)){
  echo"create Table Category </br>";
}

//CREATE TABLE Product .. enctype="multipart/form-data
//
$product="CREATE TABLE product(
    productID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    productName varchar(50) NOT NULL,
    SKU varchar(50)NOT NULL,
    productPrice int(10)NOT NULL,
    productQuantity int(11)NOT NULL,
    productOrigin varchar(10)not null,
    productSizes varchar(5)NOT NULL,
    image varchar(1000) not null,
    discription varchar(1100)NOT NULL,
    categoryID INT NOT NULL,
    productDate DATE NOT NULL,
    keyword varchar(250) NOT NULL
)";
if(mysqli_query($connection,$product)){
  echo"create Table product </br>";
}else {
  echo"Not Create ";
}
//Create Cart Customer
//
$customer="CREATE TABLE customers(
    customerID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName varchar(50) NOT NULL,
    LastName varchar(50) NOT NULL,
    password varchar(20) NOT NULL,
    Email varchar(30) NOT NULL,
    Address varchar(230) NOT NULL,
    city varchar(30) NOT NULL,
    country varchar(30) NOT NULL,
    zipCode varchar(30),
    phone int(12) NOT NULL,
    regDate DATE NOT NULL
)";
if(mysqli_query($connection,$customer)){
  echo"create Table product </br>";
}else {
  echo"Not Create ";
}
//Create Cart table
//
$cart="CREATE TABLE cart(
    pID INT NOT NULL PRIMARY KEY,
    IpAddess varchar(30) NOT NULL,
    
    quantity INT NOT NULL

)";
if(mysqli_query($connection,$cart)){
  echo"create Table product </br>";
}else {
  echo"Not Create ";
}
//Create Cart ORDERS Table
//
$orders="CREATE TABLE orders (
  orderID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  customerID int(10) NOT NULL,
  DueAmount int(20) NOT NULL,
  invoice int(20) NOT NULL,
  totalProduct int(10) NOT NULL,
  orderDate DATE NOT NULL,
  orderStatus varchar(100) NOT NULL
)";
if(mysqli_query($connection,$cart)){
  echo"create Table product </br>";
}else {
  echo"Not Create ";
}
//Create Cart Orders Table
//
$ordersdetails="CREATE TABLE `ordersdetails` (
  cdID int(11) NOT NULL,
  customerID int(10) NOT NULL,
  invoice int(10) NOT NULL,
  productID int(10) NOT NULL,
  qtn int(10) NOT NULL,
  orderStatus text NOT NULL,
  orderDate DATE NOT NULL
)";




 ?>

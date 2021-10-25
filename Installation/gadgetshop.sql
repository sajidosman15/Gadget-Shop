-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 10:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

-- create database gadgetshop

-- create a database gadgetshop before import this database

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadgetshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `name`, `password`, `email`, `phoneNumber`) VALUES
(1, 'admin', 'Gadget Shop', '81dc9bdb52d04dc20036dbd8313ed055', 'gadgetshop@gmail.com', '012345678910');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cid` int(11) NOT NULL,
  `Uid` int(11) DEFAULT NULL,
  `Pid` int(11) DEFAULT NULL,
  `Oid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `isConfirmed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Oid` int(11) NOT NULL,
  `Uid` int(11) DEFAULT NULL,
  `totalPrice` int(11) DEFAULT NULL,
  `isDelivered` int(11) DEFAULT NULL,
  `delivaryAddress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pid` int(11) NOT NULL,
  `Pname` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `imgAddress` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pid`, `Pname`, `price`, `category`, `imgAddress`, `description`) VALUES
(1, 'Tinmo F1 Deep Blue', 1235, 'Features Phone', 'https://i.ibb.co/K9jfhVW/Tinmo-F1-Deep-Blue.jpg', '1.77\" Display, QVGA Camera With Flash, 600mAh Battery, Wireless FM, Magic Voice, Bluetooth, Auto Call Record, Blacklist, Whitelist, Privacy Protection, MMC up to 32GB, Internet, Games, Dual SIM, Big Sound, Torch Light, Mp3/Mp4 Player, Bangla/English Language.'),
(2, 'Tinmo F17 Blue', 1280, 'Features Phone', 'https://i.ibb.co/xJ53gBP/Tinmo-F17-Blue.jpg', 'Dual SIM Dual Standby, 2.8” VGA Display, 0.3 MP Camera, 1580mAh Battery, Big Sound, Big Dual Torch Light, Mp3/Mp4 Player, Wireless FM Radio, Magic VoiceGames'),
(3, 'Tinmo F17 Ocean Blue', 1280, 'Features Phone', 'https://i.ibb.co/WkbkN03/Tinmo-F17-Ocean-Blue.jpg', 'Dual SIM Dual Standby, 2.8” VGA Display, 0.3 MP Camera, 1580mAh Battery, Big Sound, Big Dual Torch Light, Mp3/Mp4 Player, Wireless FM Radio, Magic VoiceGames'),
(4, 'Tinmo F2 Red', 1131, 'Features Phone', 'https://i.ibb.co/8bByXnD/Tinmo-F2-Red.jpg', '1.77\" Display, QVGA Camera With Flash, 600mAh Battery, Wireless FM, Magic Voice, Bluetooth, Auto Call Record, Blacklist, Whitelist, Privacy Protection, MMC up to 32GB'),
(5, 'APE Mini High Definition Wireless Monkey Speaker With Smartphone Stand', 676, 'Computer Accessories', 'https://i.ibb.co/vqqGHy7/60acc088d8715-1621934216.jpg', 'This fun yet multi-functional monkey-styled speaker will be the heart and soul of your party. Small enough to fit in your pocket and loud enough for a picnic. Its wireless '),
(6, 'Baseus Capsule Cordless Vacuum Cleaner', 4150, 'Computer Accessories', 'https://dsxzwbyxhnf79.cloudfront.net/productGalleries/2021/05/60a8e69c336e6_1621681820.jpg', 'Rotational speed: 45000rpm, Battery life: about 18 minutes, Charging time: 2-3 hours, Rated power: 45W, Battery capacity: 13.32Wh, Charging port: Type-C'),
(7, 'Cobalt - High Accuracy Lag-Free Wired Gaming Mouse', 3300, 'Computer Accessories', 'https://dsxzwbyxhnf79.cloudfront.net/productImages/2021/05/60acb3aa20881_1621930922.jpg', 'Score on advantage while gaming in tension field environment with Vertux Cobalt. With performance and strength combined, this high-precision gaming mouse allows you to track through screens swiftly by improving your reaction time. Crafted with high-tracking accuracy and up to 3200 DPI, Cobalt delivers ultimate performance combined with your skill. The wired gaming mouse offers easy customization with 6 programmable buttons so that you can deliver faster commands while playing. The mouse sports rainbow backlight effect for a complete battlefield feel.'),
(8, 'Fsp Ups Fp 2000 Va', 12750, 'Computer Accessories', 'https://dsxzwbyxhnf79.cloudfront.net/productImages/2021/04/607bdbc357b19_1618729923.jpg', 'FSP UPS (Power Never Ends) ,FP 2000 VA/ 1200W, Voltage : 220/230/240 Vac, Battery Type & Number : 12 V/9 Ah x 2 . 2 Years Warranty.'),
(9, 'MQ-2 Flammable Gas & Smoke Sensor', 120, 'Sensor', 'https://store.roboticsbd.com/1811-large_default/mq-2-flammable-gas-smoke-sensor-robotics-bangladesh.jpg', 'Gas Sensor(MQ2) module is useful for gas leakage detection (home and industry). It is suitable for detecting H2, LPG, CH4, CO, Alcohol, Smoke or Propane. Due to its high sensitivity and fast response time, measurement can be taken as soon as possible. The sensitivity of the sensor can be adjusted by the potentiometer.'),
(10, 'PIR Motion Sensor', 100, 'Sensor', 'https://store.roboticsbd.com/69-large_default/pir-motion-sensor.jpg', 'This is a simple to use motion sensor. Power it up and wait 1-2 seconds for the sensor to get a snapshot of the still room. If anything moves after that period, the  alarm pin will go low.'),
(11, 'Liquid Suspended Particles Turbidity Sensor Detection Module Kit', 890, 'Sensor', 'https://store.roboticsbd.com/2341-large_default/liquid-suspended-particles-turbidity-sensor-detection-module-kit-original-robotics-bangladesh.jpg', 'Turbidity sensors is the use of optics, through the liquid solution and scattering rate of transmittance integrated to determine the turbidity case, since the amount of haze value is gradual, usually detected in a dynamic environment, the turbidity sensor acquisition value , the need for external control for AD conversion , the conversion to obtain the corresponding environment turbidity situation, so that the sensor can also need to produce a peripheral circuit detected in the system, with a waterproof probe, mainly used in washing machines, dishwashers, and other equipment turbidity testing can also be used on electronic design, graduate design, electronic competition experiments and other applications.'),
(12, 'Voice Recognition Module Kit V3', 1990, 'Sensor', 'https://store.roboticsbd.com/3921-large_default/voice-recognition-module-kit-v3-robotics-bangladesh.jpg', '\"Voice Recognition Module is a compact and easy-control speaking recognition board.\r\nThis product is a speaker-dependent voice recognition module. It supports up to 80 voice commands in all. Max 7 voice commands could work at the same time. \"'),
(13, '4WD Smart Robot Chassis Kit', 980, 'Robot', 'https://store.roboticsbd.com/1081-large_default/4wd-smart-robot-chassis-kit-robotics-bangladesh.jpg', 'This 4WD Chassis is simple yet versatile robot chassis designed specifically for students and hobbyist. Featuring large size chassis plates cut from acrylic and designed with numerous holes and mounting points, providing plenty of space to carry a PCB board and any additional components that you choose. The possibilities are only limited by your imagination.'),
(14, 'Polulu RP5 Tracked Chassis Gray', 3800, 'Robot', 'https://store.roboticsbd.com/1178-large_default/polulu-rp5-tracked-chassis-gray-robotics-bangladesh.jpg', 'This durable tracked chassis is a complete robot base for your tank-like robot. With a battery holder, two DC motors, and two independent geared drive trains included, this chassis is just a robot controller and some sensors away from a complete robot. This chassis is gray.'),
(15, 'NAO V5 STANDARD EDITION', 1600000, 'Robot', 'https://store.roboticsbd.com/1220-large_default/nao-v5-standard-edition-robotics-bangladesh.jpg', 'The result of a unique combination of mechanical engineering and software, NAO is a character made up of a multitude of sensors, motors and software piloted by a made- to -measure operating system: NAOqi OS.'),
(16, 'Makeblock mBot Ranger 3-in-1 educational robot kit', 16000, 'Robot', 'https://store.roboticsbd.com/2936-large_default/makeblock-mbot-ranger-3-in-1-educational-robot-kit-robotics-bangladesh.jpg', 'The MakeBlock mBot Ranger 3-in-1 Transformable STEM Educational Robot Kit is a three-in-one STEM educational robot kit which supports 3 building forms: robot tank, three-wheeled racing car, and a self-balance car. Graphical programming developed based on Scratch for kids to learn entry-level coding. Ready-to-use projects built-in Makeblock HD app for immediate fun and play. Program & Control mBot Ranger via iPad, tablets, or laptop to start your exploration.'),
(17, 'Arduino Uno R3', 835, 'Arduino', 'https://store.roboticsbd.com/1523-large_default/8-arduino-uno-bangladesh.jpg', 'The Arduino Uno is a microcontroller board based on the ATmega328. It has 14 digital input/output pins (of which 6 can be used as PWM outputs), 6 analog inputs, a 16 MHz ceramic resonator, a USB connection, a power jack, an ICSP header, and a reset button. It contains everything needed to support the microcontroller.'),
(18, 'Mini Mega 2560 PRO', 1550, 'Arduino', 'https://store.roboticsbd.com/2817-large_default/mini-mega-2560-pro-embed-ch340gatmega2560-16au-robotics-bangladesh.jpg', 'The Mega Pro Embed CH340G / ATmega2560 board is based on the ATmega2560 microcontroller and the USB-UART adapter CH340. The board is compatible with Arduino Mega 2560.'),
(19, 'NodeMCU Wifi Module Lua V3', 440, 'Arduino', 'https://store.roboticsbd.com/3886-large_default/nodemcu-lua-v3-robotics-bangladesh.jpg', 'This is the famous NodeMCU which is based on ESP8266 WiFi SoC. This is version 3 and it is based on ESP-12E (An ESP8266 based WiFi module). NodeMCU is also an open-source firmware and development kit that helps you to prototype your IoT(Internet of Things) product within a few LUA script lines, and of course you can always program it with Arduino IDE.'),
(20, 'Arduino Pro Mini', 490, 'Arduino', 'https://store.roboticsbd.com/3528-large_default/arduino-pro-mini-328-china-robotics-bangladesh.jpg', 'It’s blue! It’s thin! It’s the Arduino Pro Mini! SparkFun’s minimal design approach to Arduino. This is a 5V Arduino running the 16MHz bootloader. Arduino Pro Mini does not come with connectors populated so that you can solder in any connector or wire with any orientation you need. We recommend first time Arduino users start with the Uno R3. It’s a great board that will get you up and running quickly. The Arduino Pro series is meant for users that understand the limitations of system voltage (5V), lack of connectors, and USB off board.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `Uid` (`Uid`),
  ADD KEY `Pid` (`Pid`),
  ADD KEY `Oid` (`Oid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Oid`),
  ADD KEY `Uid` (`Uid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Pid`) REFERENCES `product` (`Pid`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`Oid`) REFERENCES `orders` (`Oid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Uid`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

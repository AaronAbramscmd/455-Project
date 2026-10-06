-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2026 at 05:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msg_paintball`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `Review_ID` int(11) NOT NULL,
  `Player_ID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `Comment` varchar(500) DEFAULT NULL,
  `Field_Visited` varchar(50) DEFAULT NULL,
  `Would_Recommend` varchar(3) DEFAULT 'Yes',
  `Review_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`Review_ID`, `Player_ID`, `Rating`, `Title`, `Comment`, `Field_Visited`, `Would_Recommend`, `Review_Date`) VALUES
(1, 1, 5, 'Best field in the northeast', 'Brought my whole crew out for a Saturday. Refs ran tight games all day and the speedball layout is insane.', 'Field A', 'Yes', '2026-09-12'),
(2, 2, 4, 'Solid fields, parking needs work', 'Good prices and good paint quality. Only downside is the parking lot gets jammed up on busy weekends.', 'Field B', 'Yes', '2026-09-14'),
(3, 6, 3, 'Rentals were a bit rough', 'Fun day overall but the rental markers have seen better days. Brought my own next time and it was a totally different experience.', 'Field C', 'Yes', '2026-09-15'),
(4, 7, 5, 'Woodsball scenario was insane', 'Played the fall scenario game. Four hours of pure chaos in the best way. The field design is incredible.', 'Woods Field', 'Yes', '2026-09-17'),
(5, 11, 5, 'Worth the trip from Brazil', 'Came all the way from Sao Paulo with a group of friends. The energy here is unreal. Fields are well kept and the staff is friendly.', 'Field A', 'Yes', '2026-09-18'),
(6, 12, 4, 'Great for big groups', 'Organized a birthday party for 15 people. Booking was easy and the staff handled everything. Only wish they had more shade.', 'Field B', 'Yes', '2026-09-19'),
(7, 13, 5, 'Best field I have played at', 'The speedball arena is world class. Fast pace, great refs, and good paint. Already planning my next trip.', 'Speedball Arena', 'Yes', '2026-09-20'),
(8, 14, 4, 'Friendly staff and good vibe', 'The whole team made us feel welcome. The rental gear was clean and worked well. Will bring my cousins next time.', 'Field C', 'Yes', '2026-09-21'),
(9, 17, 5, 'Worth the flight from Rome', 'I have played fields all over Italy and this one holds up. Organization was excellent and the refs actually know the rules.', 'Field A', 'Yes', '2026-09-22'),
(10, 18, 5, 'Excellent experience', 'Came with a group from Moscow. The staff was welcoming and the fields were challenging. Highly recommend the woodsball course.', 'Woods Field', 'Yes', '2026-09-23'),
(11, 19, 4, 'Good organization', 'Everything ran on time and the equipment was in good shape. Only issue was the parking situation.', 'Field B', 'Yes', '2026-09-24'),
(12, 20, 5, 'Really great day out', 'Booked a corporate event for 20 people. Staff handled everything from check-in to gear. Everyone had a great time.', 'Field A', 'Yes', '2026-09-25'),
(13, 22, 4, 'Great atmosphere', 'The atmosphere was great. Good mix of experienced and new players. Refs kept things fair and fun.', 'Field C', 'Yes', '2026-09-26'),
(14, 24, 5, 'Outstanding experience', 'Traveled from Athens with a group. The staff went above and beyond to make our day memorable. Will definitely return.', 'Speedball Arena', 'Yes', '2026-09-27'),
(15, 25, 5, 'Amazing experience', 'Flew in from Accra for a tournament. The organization was top notch and the competition was fierce.', 'Speedball Arena', 'Yes', '2026-09-28'),
(16, 26, 5, 'The best field I have ever played', 'This place sets the standard. Equipment is well maintained, refs are professional, and the fields are creative.', 'Field A', 'Yes', '2026-09-29'),
(17, 27, 4, 'Sharp and well run', 'Came with a group of 12 from Johannesburg. Staff was on point and the games moved quickly.', 'Field B', 'Yes', '2026-09-30'),
(18, 28, 5, 'Excellent hospitality', 'The owners treated us like family. Great fields, great paint, great people. Worth every mile of the trip.', 'Field C', 'Yes', '2026-10-01'),
(19, 30, 5, 'Warrior spirit on the field', 'Played with my brothers from Lagos. The energy here matches what we bring. Fantastic day of paintball.', 'Woods Field', 'Yes', '2026-10-02'),
(20, 33, 5, 'Top tier field', 'Traveled from Tokyo with my team. The field design is incredible and the refs are world class.', 'Speedball Arena', 'Yes', '2026-10-03'),
(21, 34, 5, 'Had a blast', 'Came from Mumbai for the weekend. Staff was welcoming, gear was solid, and the games were intense.', 'Field A', 'Yes', '2026-10-04'),
(22, 35, 5, 'Fantastic experience', 'Booked for a company event from Beijing. Everything was professional from start to finish.', 'Field B', 'Yes', '2026-10-05'),
(23, 36, 4, 'Wonderful day', 'Played with coworkers. Fields were well maintained and the staff was very helpful.', 'Field C', 'Yes', '2026-10-05'),
(24, 37, 5, 'Best day ever', 'Came from Seoul with my squad. The speedball arena is no joke. Top tier competition and a great vibe.', 'Speedball Arena', 'Yes', '2026-10-06'),
(25, 38, 4, 'Thanks for a great time', 'From Karachi with a group of eight. Good day of paintball. Staff was friendly and the prices were fair.', 'Field A', 'Yes', '2026-10-06'),
(26, 39, 5, 'Incredible experience', 'The woodsball scenario was something else. Felt like being in a movie. Will definitely be back.', 'Woods Field', 'Yes', '2026-10-06'),
(27, 42, 5, 'Choice day out', 'Came from Auckland with the boys. This place is legit. Refs are sharp and the fields are next level.', 'Field A', 'Yes', '2026-10-06'),
(28, 43, 5, 'Mean day out', 'Booked a stag do here. Everyone had a blast. Staff sorted us out with everything.', 'Field B', 'Yes', '2026-10-06'),
(29, 44, 4, 'Bloody good fun', 'Came from Sydney on a road trip. Worth the drive. Good fields and good people.', 'Field C', 'Yes', '2026-10-06'),
(30, 45, 5, 'Sweet as', 'Kiwi hospitality meets paintball chaos. Perfect weekend. Already planning the next trip.', 'Speedball Arena', 'Yes', '2026-10-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `Player_ID` (`Player_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

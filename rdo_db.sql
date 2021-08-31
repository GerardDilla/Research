-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 05:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `highered_accounts`
--

CREATE TABLE `highered_accounts` (
  `HED_Account_ID` bigint(90) NOT NULL,
  `Reference_Number` bigint(90) NOT NULL,
  `Password` varchar(90) NOT NULL,
  `Active` int(5) NOT NULL DEFAULT '1',
  `Account_Picture` varchar(30) NOT NULL DEFAULT 'default.png',
  `Restore_Code` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `highered_accounts`
--

INSERT INTO `highered_accounts` (`HED_Account_ID`, `Reference_Number`, `Password`, `Active`, `Account_Picture`, `Restore_Code`, `Email`) VALUES
(1, 1, '20130150', 1, 'default.png', '', 'smvrelos@gmail.com'),
(2, 2, 'senpai1320', 1, 'default.png', 'UZRNP', ''),
(4, 9, '12345', 1, 'default.png', '', ''),
(5, 5, '20130112', 1, 'default.png', '', ''),
(6, 0, '', 1, 'default.png', '', ''),
(7, 4, '20130805', 1, 'default.png', 'AJGFG', ''),
(8, 19, '20130114', 1, 'default.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `ID` int(20) NOT NULL,
  `Instructor_ID` varchar(100) NOT NULL,
  `Instructor_Name` varchar(100) NOT NULL,
  `Passkey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`ID`, `Instructor_ID`, `Instructor_Name`, `Passkey`) VALUES
(1, 'faculty.sample', 'Juan Dela Cruz', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `rdo_admin_account`
--

CREATE TABLE `rdo_admin_account` (
  `rdo_admin_id` int(20) NOT NULL,
  `rdo_fullname` varchar(50) NOT NULL,
  `rdo_username` varchar(20) NOT NULL,
  `rdo_password` varchar(25) NOT NULL,
  `rdo_active` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rdo_admin_account`
--

INSERT INTO `rdo_admin_account` (`rdo_admin_id`, `rdo_fullname`, `rdo_username`, `rdo_password`, `rdo_active`) VALUES
(1, 'Gerhard Dilla', 'drareg', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rdo_category`
--

CREATE TABLE `rdo_category` (
  `rdo_category_id` int(10) NOT NULL,
  `rdo_category` varchar(50) NOT NULL,
  `rdo_category_publish` int(5) NOT NULL DEFAULT '1',
  `rdo_category_active` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rdo_category`
--

INSERT INTO `rdo_category` (`rdo_category_id`, `rdo_category`, `rdo_category_publish`, `rdo_category_active`) VALUES
(1, 'Corporate Journal', 1, 1),
(2, 'Faculty Journal', 1, 1),
(3, 'Sample category', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rdo_files`
--

CREATE TABLE `rdo_files` (
  `rdo_file_id` int(10) NOT NULL,
  `file_title` varchar(50) NOT NULL,
  `research_author` varchar(50) NOT NULL,
  `rdo_category_id` int(10) NOT NULL,
  `research_description` varchar(300) NOT NULL,
  `file_upload_date` date NOT NULL,
  `file_upload_name` varchar(150) NOT NULL,
  `rdo_file_active` int(5) NOT NULL DEFAULT '1',
  `rdo_pdf_views` int(100) NOT NULL,
  `department_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rdo_files`
--

INSERT INTO `rdo_files` (`rdo_file_id`, `file_title`, `research_author`, `rdo_category_id`, `research_description`, `file_upload_date`, `file_upload_name`, `rdo_file_active`, `rdo_pdf_views`, `department_id`, `course_id`) VALUES
(1, 'Sample pdf', 'Gerhard Dilla', 1, 'This is a sample description.', '2017-08-03', 'Sample pdf1.pdf', 1, 2, 0, 0),
(2, 'Admin Manual', 'Alvin Jason Virata', 2, 'Sample description admin manual', '2017-08-03', 'Admin Manual2.pdf', 1, 3, 0, 0),
(3, 'Disaster Manual', 'Alvin Jason Virata', 2, 'Sample Description disaster manual', '2017-08-03', 'Disaster Manual_3.pdf', 1, 1, 0, 0),
(4, 'Sample pdf 2', 'Juan Dela Cruz', 1, 'sample description 2', '2017-08-03', 'Sample pdf 2_4.pdf', 1, 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE `school_info` (
  `School_ID` int(20) NOT NULL,
  `School_Name` varchar(100) NOT NULL,
  `School_Code` varchar(10) NOT NULL,
  `School_Dean` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_info`
--

INSERT INTO `school_info` (`School_ID`, `School_Name`, `School_Code`, `School_Dean`) VALUES
(1, 'Department sample sbcs', 'sbcs', 'sbcs dean'),
(2, 'Department sample sase', 'sase', 'sase dean'),
(3, 'Department sample sihtm', 'sihtm', 'sihtm dean'),
(4, 'Department sample shsp', 'shsp', 'shsp dean');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Reference_Number` bigint(90) NOT NULL,
  `Student_Number` bigint(90) DEFAULT NULL,
  `First_Name` varchar(90) DEFAULT NULL,
  `Middle_Name` varchar(90) DEFAULT NULL,
  `Last_Name` varchar(90) DEFAULT NULL,
  `Course` varchar(90) DEFAULT NULL,
  `Major` varchar(90) DEFAULT NULL,
  `AdmittedSY` varchar(90) DEFAULT NULL,
  `AdmittedSEM` varchar(90) DEFAULT NULL,
  `CurrentStatus` varchar(90) DEFAULT NULL,
  `YearLevel` varchar(90) DEFAULT NULL,
  `Gender` varchar(90) DEFAULT NULL,
  `Age` varchar(90) DEFAULT NULL,
  `Address_No` varchar(90) DEFAULT NULL,
  `Address_Street` varchar(90) DEFAULT NULL,
  `Address_Subdivision` varchar(90) DEFAULT NULL,
  `Address_Barangay` varchar(90) DEFAULT NULL,
  `Address_City` varchar(90) DEFAULT NULL,
  `Address_Province` varchar(90) DEFAULT NULL,
  `Address_Zip` varchar(90) DEFAULT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Birth_Place` varchar(90) DEFAULT NULL,
  `Tel_No` bigint(30) DEFAULT NULL,
  `CP_No` bigint(30) DEFAULT NULL,
  `Nationality` varchar(90) DEFAULT NULL,
  `Email` varchar(90) DEFAULT NULL,
  `Parents_Status` varchar(90) DEFAULT NULL,
  `Father_Name` varchar(90) DEFAULT NULL,
  `Father_Occupation` varchar(90) DEFAULT NULL,
  `Father_Address` varchar(300) DEFAULT NULL,
  `Father_Contact` varchar(90) DEFAULT NULL,
  `Mother_Name` varchar(90) DEFAULT NULL,
  `Mother_Occupation` varchar(90) DEFAULT NULL,
  `Mother_Address` varchar(300) DEFAULT NULL,
  `Mother_Contact` varchar(90) DEFAULT NULL,
  `Guardian_Name` varchar(90) DEFAULT NULL,
  `Guardian_Relationship` varchar(90) DEFAULT NULL,
  `Guardian_Address` varchar(300) DEFAULT NULL,
  `Guardian_Contact` varchar(90) DEFAULT NULL,
  `Secondary_School_Name` varchar(90) DEFAULT NULL,
  `Secondary_School_Grad` varchar(90) DEFAULT NULL,
  `Secondary_School_Address` varchar(90) DEFAULT NULL,
  `Grade_School_Name` varchar(90) DEFAULT NULL,
  `Grade_School_Grad` varchar(90) DEFAULT NULL,
  `Grade_School_Address` varchar(90) DEFAULT NULL,
  `Transferee_Name` varchar(90) DEFAULT NULL,
  `Transferee_Attend` varchar(90) DEFAULT NULL,
  `Transferee_Address` varchar(90) DEFAULT NULL,
  `Transferee_Course` varchar(90) DEFAULT NULL,
  `Others_Know_SDCA` varchar(90) DEFAULT NULL,
  `Others_Relative_Stats` varchar(90) DEFAULT NULL,
  `Others_Relative_Name` varchar(90) DEFAULT NULL,
  `Others_Relative_Department` varchar(90) DEFAULT NULL,
  `Others_Relative_Relationship` varchar(90) DEFAULT NULL,
  `Others_Relative_Contact` varchar(90) DEFAULT NULL,
  `Course_1st` varchar(90) DEFAULT NULL,
  `Course_Major_1st` varchar(90) DEFAULT NULL,
  `Course_2nd` varchar(90) DEFAULT NULL,
  `Course_Major_2nd` varchar(90) DEFAULT NULL,
  `Course_3rd` varchar(90) DEFAULT NULL,
  `Course_Major_3rd` varchar(90) DEFAULT NULL,
  `Guidance_Approval` int(1) DEFAULT NULL,
  `Return_Semester` varchar(90) DEFAULT NULL,
  `Return_SchoolYear` varchar(90) DEFAULT NULL,
  `Curriculum` varchar(90) DEFAULT NULL,
  `Reserve` int(1) DEFAULT NULL,
  `Enroll` int(1) DEFAULT NULL,
  `Exam` int(1) DEFAULT NULL,
  `Exam_Date` date DEFAULT NULL,
  `Priority` int(1) DEFAULT NULL,
  `Inquiry_ID` varchar(90) DEFAULT NULL,
  `Entrance_SchoolYear` varchar(90) DEFAULT NULL,
  `Entrance_Semester` varchar(90) DEFAULT NULL,
  `Applied_Status` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Reference_Number`, `Student_Number`, `First_Name`, `Middle_Name`, `Last_Name`, `Course`, `Major`, `AdmittedSY`, `AdmittedSEM`, `CurrentStatus`, `YearLevel`, `Gender`, `Age`, `Address_No`, `Address_Street`, `Address_Subdivision`, `Address_Barangay`, `Address_City`, `Address_Province`, `Address_Zip`, `Birth_Date`, `Birth_Place`, `Tel_No`, `CP_No`, `Nationality`, `Email`, `Parents_Status`, `Father_Name`, `Father_Occupation`, `Father_Address`, `Father_Contact`, `Mother_Name`, `Mother_Occupation`, `Mother_Address`, `Mother_Contact`, `Guardian_Name`, `Guardian_Relationship`, `Guardian_Address`, `Guardian_Contact`, `Secondary_School_Name`, `Secondary_School_Grad`, `Secondary_School_Address`, `Grade_School_Name`, `Grade_School_Grad`, `Grade_School_Address`, `Transferee_Name`, `Transferee_Attend`, `Transferee_Address`, `Transferee_Course`, `Others_Know_SDCA`, `Others_Relative_Stats`, `Others_Relative_Name`, `Others_Relative_Department`, `Others_Relative_Relationship`, `Others_Relative_Contact`, `Course_1st`, `Course_Major_1st`, `Course_2nd`, `Course_Major_2nd`, `Course_3rd`, `Course_Major_3rd`, `Guidance_Approval`, `Return_Semester`, `Return_SchoolYear`, `Curriculum`, `Reserve`, `Enroll`, `Exam`, `Exam_Date`, `Priority`, `Inquiry_ID`, `Entrance_SchoolYear`, `Entrance_Semester`, `Applied_Status`) VALUES
(0, 12345, 'try', 'try', 'try', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 20130150, 'Shaira Mari', 'Villar', 'Relos', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Female', '20', 'Blk18 Lot12', 'Guijo St', 'Casimiro Townhomes', 'Habay 1', 'Bacoor City', 'Cavite', '4102', '1996-07-29', 'Manila', 4725174, 9365905648, 'Filipino', 'smvrelos@gmail.com', 'Married', 'Rolex Relos', 'Security Guard', 'Manila', 'N/A', 'Iluminada Relos', 'Retired Government Employee', 'Occidental Mindoro', '09496554477', 'Sheila Sales', 'Cousin', 'Bacoor Cavite', '09397478358', 'Looc National School Of Fisheries', '2013', 'Agkawayan Looc Occidental Mindoro', 'Agkawayan Elementary School', '2009', 'Agkawayan Looc Occidental Mindoro', '', '', '', '', '', 'Student', 'Danica Villaluna', 'SBCS', 'Cousin', '09475793170', 'Bachelor Of Science in Tourism Management', 'Major in Travel Management', 'Bachelor Of Arts in Communication', 'Major in Broadcasting', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(2, 20122411, 'Gerhard', 'Palencia', 'Dilla', 'Bachelor of Science in Information Technology', '', '2012', 'First', 'Single', '4', 'Male', '21', '', 'Peso St', 'Casimiro Westbay', 'Habay 1', 'Bacoor City', 'Cavite', '4102', '1995-06-04', '', 5198354, 9156624423, 'Filipino', 'gerarddilla@gmail.com', 'Married', '', '', '', '', 'Grace Dilla', '', 'Bacoor City, Cavite', '', '', '', '', '', 'Christian Values School', '2012', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2012-2013', 'First', ''),
(3, 20110150, 'Reginald', 'P', 'Salvador', 'Bachelor of Science in Information Technology', '', '2011', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Imus City', 'Cavite', '4103', '1996-02-28', '', 4725174, 9102797959, 'Filipino', 'rpsalvador@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2011', 'Bacoor City, Cavite', '', '2007', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2011-2012', 'First', ''),
(4, 20130805, 'Jenela Ciara', 'A', 'Garcia', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Female', '19', 'Blk 18 Lot 12', 'Phase 1', 'Maryhomes Subd.', 'Molino', 'Bacoor City', 'Cavite', '4102', '1996-01-16', '', 4725174, 9067857548, 'Filipino', 'jcagarcia@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(5, 20130112, 'Nathalie', 'Sayre', 'Macatol', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Female', '19', 'Blk 10 Lot 7', '', 'Palo Alto', 'Habay 1', 'Bacoor City', 'Cavite', '4102', '1996-01-16', '', 4725174, 9264605993, 'Filipino', 'nsmacatol@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(6, 20140495, 'Daniel', 'R', 'Bayron', 'Bachelor of Science in Information Technology', '', '2014', 'First', 'Single', '3', 'Male', '20', '', '', '', '', 'Imus City', 'Cavite', '4103', '1996-02-28', '', 4725174, 9102797959, 'Filipino', 'drbayron@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2011', 'Bacoor City, Cavite', '', '2007', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', ''),
(7, 20130658, 'Lovie Dianne', 'M', 'Cebu', 'Bachelor of Science in Information Technology', '', '2013', 'Second', 'Single', '4', 'Female', '21', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4725174, 9354334293, 'Filipino', 'ldmcebu@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2012', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'Second', ''),
(8, 20130441, 'Jayson', 'Perez', 'Rañola', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', 'Westbay Homes', 'Habay 1', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4458573, 9276172382, 'Filipino', 'pjranola@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2012', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(9, 20123116, 'Louie Lance', 'Ramos', 'Bundoc', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', '', 'Binakayan', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4340016, 9275737166, 'Filipino', 'louiebalot1@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2012', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(10, 20140116, 'Joise Pamela', 'Estacion', 'Sugatan', 'Bachelor of Science in Pharmacy', '', '2014', 'First', 'Single', '3', 'Female', '18', '', '', '', 'Tanza', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4382456, 9276802875, 'Filipino', 'jelai.sugatan@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Pharmacy', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', ''),
(11, 20121439, 'Rio Mae', 'Kalinga', 'Embradura', 'Bachelor of Science in business Administration', '', '2012', 'First', 'Single', '4', 'Female', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 5711217, 9712172015, 'Filipino', 'rieembradura@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Business Administration', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2012-2013', 'First', ''),
(12, 20141099, 'Justine Joy\r\n', 'Austria', 'Orina', 'Bachelor of Science in Business Administration', '', '2012', 'First', 'Single', '3', 'Female', '20', '', '', '', '', 'Imus City', 'Cavite', '4103', '1995-09-28', '', 4243145, 9061234567, 'Filipino', 'tenjoychan@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Business Administration', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2012-2013', 'First', ''),
(13, 20130688, 'Louie Jay', 'Guiao', 'Mandanas', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '3', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4256839, 9873698833, 'Filipino', 'louie31mandanas@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2008', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(14, 20150530, 'Alvin', 'Balmeo', 'Caberto', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4526122, 9153569920, 'Filipino', '', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2008 ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(15, 20150525, 'Shenna joy', 'Macalinao\r\n', 'Astorga\r\n', 'Bachelor of Science in Information Technology', '', '2013', 'First', 'Single', '2', 'Female', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4579878, 9355502313, 'Filipino', 'shennajoyastorga@yahoo.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', ''),
(16, 20150545, 'Maurine Anne', 'Cruz\r\n', 'Sabile\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Female', '17', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4555678, 97541800842, 'Filipino', 'thesmacof99@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', ''),
(17, 20150537, 'Jeffrey\r\n', 'Ellaga\r\n', 'Pagmanoja\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Male', '17', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4723512, 93652147853, 'Filipino', 'manhunter_150@yahoo.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', ''),
(18, 20150542, 'Engelbert\r\n', 'Edralin\r\n', 'Reyes\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Male', '17', '', '', '', '', 'Imus City', 'Cavite', '4103', '1995-09-28', '', 4728753, 93682637462, 'Filipino', 'engelbert.edralin@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', ''),
(19, 20130114, 'Dian Chelsie\r\n', 'Luzon\r\n', 'Paler\r\n', 'Bachelor of Science in Tourism Management', '', '2013', 'First', 'Single', '4', 'Female', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4179333, 9262894309, 'Filipino', 'palerdianchelsie@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Tourism Management', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(20, 20130359, 'Ranel\r\n', 'Guanez\r\n', 'Rena\r\n', 'Bachelor of Science in Computer Science', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4728753, 9168450705, 'Filipino', 'ranelrenajr@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Computer Science', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(21, 20150622, 'Joselle', 'C', 'Castañeda\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Female', '18', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'jccastaneda@sdca.com.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(22, 20131366, 'Nympha Mae', 'B', 'Jimenez\r\n', 'Bachelor of Science in Information Technology', '', '2013', 'Second', 'Single', '4', 'Female', '18', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'nmbjimenez@sdca.edu.ph', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'Second', ''),
(23, 20150356, 'Karlo', 'B', 'Morales\r\n', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Male', '18', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'Moraleskarlo05@gmail.comm', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2015', 'Bacoor City, Cavite', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', ''),
(24, 20123193, 'Jhoanne Khryss', 'P', 'Dela Cruz', 'Bachelor of Science in Computer Science', '', '2013', 'First', 'Single', '4', 'Female', '19', '#24', 'Lilac St.', 'Woodestate Village 2', 'Molino 3', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4728753, 9168450705, 'Filipino', 'jurisohsixeleven@gmail.com\r\n', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Computer Science', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(25, 20151047, 'John Paulo', 'T', 'Zaplan', 'Bachelor of Science in Hospitality Management', '', '2016', 'First', 'Single', '1', 'Male', '18', '', '', 'Cita Italia', '', 'Imus City', 'Cavite', '4103', '1995-09-28', '', 4728753, 9168450705, 'Filipino', 'jpaulozaplangmail.com\r\n', 'Married', '', '', '', '', '', '', 'Imus City, Cavite', '', '', '', '', '', '', '2015', 'Agkawayan, Looc, Occidental Mindoro', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Hospitality Management', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', ''),
(26, 20140033, 'Karen Frances', 'S', 'Cajigal', 'Bachelor of Science in Information Technology', '', '2014', 'First', 'Single', '3', 'Female', '19', '', '', '', 'Molino 2', 'Bacoor City', 'Cavite', '4102', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'pimplepuyat@gmail.com', 'Married', '', '', '', '', '', '', 'Bacoor City, Cavite', '', '', '', '', '', '', '2014', 'Bacoor City, Cavite', '', '2010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Science in Information Technology', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', ''),
(27, 20122526, 'Nerizza', 'O', 'Chavez', 'Bachelor of Medical Laboratory Science', '', '2013', 'First', 'Single', '4', 'Female', '20', '95', '', ' Rosevale Subdivision', 'Potol', 'Kawit', 'Cavite', '4104', '1995-09-28', '', 4641297, 9504927037, 'Filipino', 'chavez.nerizza@yahoo.com', 'Married', '', '', '', '', '', '', 'Kawit, Cavite', '', '', '', '', '', '', '2013', 'Bacoor City, Cavite', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bachelor of Medical Laboratory Science', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(28, 20122824, 'Ivan Chandler', 'C', 'Bagorio', 'Bachelor of Medical LaboratoryScience', '', '2013', 'First', 'Single', '4', 'Male', '20', 'Blk18 Lot12', 'Guijo St', '', 'Bacao II', 'General Trias', 'Cavite', '4107', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'chandlerbagorio98@gmail.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2013', '', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(29, 20130451, 'Jakie Carina', '', 'Candelaria', 'Bachelor of Business Administration', 'Financial Management', '2013', 'First', 'Single', '4', 'Female', '20', '', '', '', '', 'Bacoor', 'Cavite', '4102', '1996-10-03', 'Cavite', 4725174, 9067286020, 'Filipino', 'jakiekarinacandelaria@yahoo.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2013', '', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(30, 20150116, 'Czarina Lynne', 'Q', 'Bernardo', 'Bachelor of Arts in Multimedia Arts', '', '2015', 'First', 'Single', '4', 'Female', '18', '', '', 'Katherine Homes', 'Molino', 'Bacoor', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'bernardocza@yahoo.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2015', '', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(31, 20140467, 'Sebastian', 'C', 'Nobela', 'Bachelor of Science in Information Technology', '', '2014', 'First', 'Single', '3', 'Male', '19', '', '', 'Brgy. Gawaran', 'Molino 7', 'Bacoor', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'sbstian.nbela@yahoo.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2014', '', '', '2010', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', ''),
(32, 20150688, 'Garyll Mae', 'L', 'Buenaventura', 'Bachelor of Science in Psychology', '', '2015', 'First', 'Single', '2', 'Female', '18', '', '', 'Moonwalk Village', '', '', 'Las Piñas City', '1747', '1996-06-25', 'Las Piñas', 4725174, 9067286020, 'Filipino', 'garyllmae@icloud.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2015', '', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', ''),
(33, 20130082, 'Alexandro', 'R', 'Cheng', 'Bachelor of Science in Computer Science', '', '2013', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'sandrosia270522@gmail.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2013', '', '', '2009', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2013-2014', 'First', ''),
(34, 20141547, 'Jerwin', 'P', 'Rabanzo', 'Bachelor of Arts in Multimedia Arts', '', '2014', 'First', 'Single', '4', 'Male', '20', '', '', '', '', 'Bacoor City', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'jprabanzo@sdca.edu.ph', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2012', '', '', '2005', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2014-2015', 'First', ''),
(35, 20150340, 'Franz Allen Moises', '', 'Añasca', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Male', '17', '', '', '', 'Niog 2', 'Bacoor City', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'anascafranzallen@gmail.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2015', '', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', ''),
(36, 20150355, 'Angel', 'M', 'Manalo', 'Bachelor of Science in Information Technology', '', '2015', 'First', 'Single', '2', 'Female', '17', '', '', 'Parkdale 2', 'Perpetual 7', 'Bacoor City', 'Cavite', '4102', '1996-06-25', 'Cavite', 4725174, 9067286020, 'Filipino', 'angelmanalo1@gmail.com', 'Married', '', '', '', 'N/A', '', '', '', '', '', '', '', '', '', '2015', '', '', '2011', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, 0, 0, '0000-00-00', 0, '', '2015-2016', 'First', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `highered_accounts`
--
ALTER TABLE `highered_accounts`
  ADD PRIMARY KEY (`HED_Account_ID`),
  ADD KEY `Reference_Number` (`Reference_Number`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rdo_admin_account`
--
ALTER TABLE `rdo_admin_account`
  ADD PRIMARY KEY (`rdo_admin_id`);

--
-- Indexes for table `rdo_category`
--
ALTER TABLE `rdo_category`
  ADD PRIMARY KEY (`rdo_category_id`);

--
-- Indexes for table `rdo_files`
--
ALTER TABLE `rdo_files`
  ADD PRIMARY KEY (`rdo_file_id`);

--
-- Indexes for table `school_info`
--
ALTER TABLE `school_info`
  ADD PRIMARY KEY (`School_ID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Reference_Number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `highered_accounts`
--
ALTER TABLE `highered_accounts`
  MODIFY `HED_Account_ID` bigint(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rdo_admin_account`
--
ALTER TABLE `rdo_admin_account`
  MODIFY `rdo_admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rdo_category`
--
ALTER TABLE `rdo_category`
  MODIFY `rdo_category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rdo_files`
--
ALTER TABLE `rdo_files`
  MODIFY `rdo_file_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `School_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `highered_accounts`
--
ALTER TABLE `highered_accounts`
  ADD CONSTRAINT `highered_accounts_ibfk_1` FOREIGN KEY (`Reference_Number`) REFERENCES `student_info` (`Reference_Number`),
  ADD CONSTRAINT `highered_accounts_ibfk_2` FOREIGN KEY (`Reference_Number`) REFERENCES `student_info` (`Reference_Number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

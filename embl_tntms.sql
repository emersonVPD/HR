-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2023 at 01:24 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u772977650_skystream`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicantoverall`
--

CREATE TABLE `applicantoverall` (
  `id` int(11) NOT NULL,
  `applicantID` int(11) NOT NULL,
  `initial` int(11) DEFAULT NULL,
  `final` int(11) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `overall` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicantschedtbl`
--

CREATE TABLE `applicantschedtbl` (
  `id` int(11) NOT NULL,
  `nameapp` varchar(255) DEFAULT NULL,
  `app_initial` datetime DEFAULT NULL,
  `app_final` datetime DEFAULT NULL,
  `app_exam` datetime DEFAULT NULL,
  `sched_remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicanttbl`
--

CREATE TABLE `applicanttbl` (
  `id` int(11) NOT NULL,
  `applicantID` varchar(7) DEFAULT NULL,
  `app_firstname` varchar(255) DEFAULT NULL,
  `app_middlename` varchar(255) DEFAULT NULL,
  `app_lastname` varchar(255) DEFAULT NULL,
  `daily_rate` double DEFAULT NULL,
  `app_status` varchar(255) DEFAULT NULL,
  `app_age` int(2) DEFAULT NULL,
  `app_gender` varchar(255) DEFAULT NULL,
  `app_address` varchar(255) DEFAULT NULL,
  `app_birthdate` date DEFAULT NULL,
  `app_birthplace` varchar(255) DEFAULT NULL,
  `app_positionTitle` varchar(255) DEFAULT NULL,
  `app_email` varchar(255) DEFAULT NULL,
  `app_contactno` varchar(255) DEFAULT NULL,
  `app_files` varchar(255) DEFAULT NULL,
  `app_applydate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int(100) NOT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `deduction` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category_id` int(255) DEFAULT NULL,
  `category_type` varchar(255) DEFAULT NULL,
  `category_disc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificatestbl`
--

CREATE TABLE `certificatestbl` (
  `id` int(11) NOT NULL,
  `cert_type` varchar(255) DEFAULT NULL,
  `cert_file` varchar(255) DEFAULT NULL,
  `cert_datecrtd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collected_reps`
--

CREATE TABLE `collected_reps` (
  `id_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competencytbl`
--

CREATE TABLE `competencytbl` (
  `id` int(255) NOT NULL,
  `comp_name` varchar(255) DEFAULT NULL,
  `comp_datecreated` varchar(255) DEFAULT NULL,
  `comp_sandq_files` varchar(255) DEFAULT NULL,
  `comp_status` varchar(255) DEFAULT NULL,
  `comp_remarks` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `create_payroll`
--

CREATE TABLE `create_payroll` (
  `id` int(11) NOT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `employee_payroll` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `employeeID` varchar(255) DEFAULT NULL,
  `net_pay` double DEFAULT NULL,
  `total_deductions` double DEFAULT NULL,
  `job_position` varchar(255) DEFAULT NULL,
  `daily_rate` double DEFAULT NULL,
  `days_of_work` int(11) DEFAULT NULL,
  `sss` double DEFAULT NULL,
  `pag_ibig` double DEFAULT NULL,
  `philhealth` double DEFAULT NULL,
  `other_deductions` double DEFAULT NULL,
  `deduction_description` text DEFAULT NULL,
  `overtime_hours` double DEFAULT NULL,
  `overtime_rate` double DEFAULT NULL,
  `overtime_pay` double DEFAULT NULL,
  `bonus` double DEFAULT NULL,
  `bonus_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(22) NOT NULL,
  `names` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `mpin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employeetbl`
--

CREATE TABLE `employeetbl` (
  `id` int(2) NOT NULL,
  `employeeID` varchar(7) DEFAULT NULL,
  `emp_image` varchar(255) DEFAULT NULL,
  `daily_rate` double DEFAULT NULL,
  `emp_firstname` varchar(255) DEFAULT NULL,
  `emp_middlename` varchar(255) DEFAULT NULL,
  `emp_lastname` varchar(255) DEFAULT NULL,
  `emp_positionTitle` varchar(255) DEFAULT NULL,
  `emp_sub` varchar(255) DEFAULT NULL,
  `emp_status` varchar(255) DEFAULT NULL,
  `emp_dateHired` date DEFAULT NULL,
  `emp_department` varchar(255) DEFAULT NULL,
  `emp_gender` varchar(255) DEFAULT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `emp_age` int(255) DEFAULT NULL,
  `emp_birthdate` date DEFAULT NULL,
  `emp_birthplace` varchar(255) DEFAULT NULL,
  `emp_contactno` varchar(255) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_files` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emprecords`
--

CREATE TABLE `emprecords` (
  `id` int(255) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `emp_records` varchar(255) DEFAULT NULL,
  `emp_remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `essaccountstbl`
--

CREATE TABLE `essaccountstbl` (
  `id` int(255) NOT NULL,
  `username` varchar(18) DEFAULT NULL,
  `employeeID` varchar(255) DEFAULT NULL,
  `daily_rate` double DEFAULT NULL,
  `ess_firstname` varchar(255) DEFAULT NULL,
  `ess_middlename` varchar(255) DEFAULT NULL,
  `ess_lastname` varchar(255) DEFAULT NULL,
  `mpin` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ess_positionTitle` varchar(255) DEFAULT NULL,
  `ess_subpositionTitle` varchar(255) DEFAULT NULL,
  `ess_email` varchar(255) DEFAULT NULL,
  `ess_contactno` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluationemp`
--

CREATE TABLE `evaluationemp` (
  `id` int(255) NOT NULL,
  `nameemp` varchar(255) DEFAULT NULL,
  `behavior` int(255) DEFAULT NULL,
  `tna` int(255) DEFAULT NULL,
  `quality` int(255) DEFAULT NULL,
  `responsibility` int(255) DEFAULT NULL,
  `dependability` int(255) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examresult`
--

CREATE TABLE `examresult` (
  `id` int(11) NOT NULL,
  `applicantID` int(11) NOT NULL,
  `nameapp` varchar(255) DEFAULT NULL,
  `res_score` int(255) DEFAULT NULL,
  `res_remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_modulestbl`
--

CREATE TABLE `exam_modulestbl` (
  `id` int(11) NOT NULL,
  `exam_title` varchar(255) DEFAULT NULL,
  `exam_datecrtd` date DEFAULT NULL,
  `exam_links` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilitiestbl`
--

CREATE TABLE `facilitiestbl` (
  `id` int(11) NOT NULL,
  `req_dateFrom` date DEFAULT NULL,
  `req_dateTo` date DEFAULT NULL,
  `facility_type` varchar(255) DEFAULT NULL,
  `requestBy` varchar(255) DEFAULT NULL,
  `subSystem` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `alternative` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finalinterviewtbl`
--

CREATE TABLE `finalinterviewtbl` (
  `id` int(11) NOT NULL,
  `applicantID` int(11) NOT NULL,
  `fq1` int(3) DEFAULT NULL,
  `fq2` int(3) DEFAULT NULL,
  `fq3` int(3) DEFAULT NULL,
  `fq4` int(3) DEFAULT NULL,
  `fq5` int(3) DEFAULT NULL,
  `fq6` int(3) DEFAULT NULL,
  `fq7` int(3) DEFAULT NULL,
  `fq8` int(3) DEFAULT NULL,
  `fq9` int(3) DEFAULT NULL,
  `fq10` int(3) DEFAULT NULL,
  `final_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE `financial` (
  `id` int(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `br_requestor` varchar(255) DEFAULT NULL,
  `br_date` date DEFAULT NULL,
  `br_amount` int(255) DEFAULT NULL,
  `br_purpose` varchar(255) DEFAULT NULL,
  `br_department` varchar(255) DEFAULT NULL,
  `br_payment` varchar(255) DEFAULT NULL,
  `br_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interviewtbl`
--

CREATE TABLE `interviewtbl` (
  `id` int(11) NOT NULL,
  `applicantID` int(11) NOT NULL,
  `iq1` int(3) DEFAULT NULL,
  `iq2` int(3) DEFAULT NULL,
  `iq3` int(3) DEFAULT NULL,
  `iq4` int(3) DEFAULT NULL,
  `iq5` int(3) DEFAULT NULL,
  `iq6` int(3) DEFAULT NULL,
  `iq7` int(3) DEFAULT NULL,
  `iq8` int(3) DEFAULT NULL,
  `iq9` int(3) DEFAULT NULL,
  `iq10` int(3) DEFAULT NULL,
  `initial_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobvacancytbl`
--

CREATE TABLE `jobvacancytbl` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `job_date` date DEFAULT NULL,
  `job_available` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legaldocumentstbl`
--

CREATE TABLE `legaldocumentstbl` (
  `id` int(11) NOT NULL,
  `legal_type` varchar(255) DEFAULT NULL,
  `legal_datecrtd` date DEFAULT NULL,
  `legal_sub_system` varchar(255) DEFAULT NULL,
  `legal_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqcandr`
--

CREATE TABLE `reqcandr` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `emp` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `reqdate` date DEFAULT NULL,
  `candr_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqdocument`
--

CREATE TABLE `reqdocument` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `emp` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `docs_file` varchar(255) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `reqdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqemployee`
--

CREATE TABLE `reqemployee` (
  `id` int(255) NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `req_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `job_num` int(255) DEFAULT NULL,
  `subs` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqexammodulestbl`
--

CREATE TABLE `reqexammodulestbl` (
  `id` int(11) NOT NULL,
  `req_exam_title` varchar(255) DEFAULT NULL,
  `req_exam_date` date DEFAULT NULL,
  `req_exam_status` varchar(255) DEFAULT NULL,
  `req_exam_remarks` varchar(255) DEFAULT NULL,
  `req_exam_purpose` varchar(255) DEFAULT NULL,
  `req_exam_links` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqincentives`
--

CREATE TABLE `reqincentives` (
  `id` int(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `req_date` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqleave`
--

CREATE TABLE `reqleave` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `lv_leave` varchar(255) DEFAULT NULL,
  `lv_note` varchar(1000) DEFAULT NULL,
  `lv_datefrom` date DEFAULT NULL,
  `lv_dateto` date DEFAULT NULL,
  `lv_status` varchar(255) DEFAULT NULL,
  `emp` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `proof_file` varchar(255) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqlegaldocutbl`
--

CREATE TABLE `reqlegaldocutbl` (
  `id` int(255) NOT NULL,
  `req_legal_name` varchar(255) DEFAULT NULL,
  `req_legal_type` varchar(255) DEFAULT NULL,
  `req_legal_date` date DEFAULT NULL,
  `req_legal_subsystem` varchar(255) DEFAULT NULL,
  `req_legal_file` varchar(255) DEFAULT NULL,
  `req_legal_file1` varchar(255) DEFAULT NULL,
  `req_legal_status` varchar(255) DEFAULT NULL,
  `req_legal_add` varchar(255) DEFAULT NULL,
  `req_legal_remarks` varchar(255) DEFAULT NULL,
  `status` tinyint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqmodules`
--

CREATE TABLE `reqmodules` (
  `id` int(11) NOT NULL,
  `req_module_title` varchar(255) DEFAULT NULL,
  `req_module_date` date DEFAULT NULL,
  `req_module_remarks` varchar(255) DEFAULT NULL,
  `req_module_purpose` varchar(255) DEFAULT NULL,
  `req_module_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqpayroll`
--

CREATE TABLE `reqpayroll` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `yrmonth` varchar(255) DEFAULT NULL,
  `quarter` varchar(255) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `emp` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `datereq` date DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `payroll_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reqsands`
--

CREATE TABLE `reqsands` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `employeeID` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `reqdate` date DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `day1` varchar(255) DEFAULT NULL,
  `day2` varchar(255) DEFAULT NULL,
  `day3` varchar(255) DEFAULT NULL,
  `day4` varchar(255) DEFAULT NULL,
  `day5` varchar(255) DEFAULT NULL,
  `dayoff1` varchar(255) DEFAULT NULL,
  `dayoff2` varchar(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shiftandschedule`
--

CREATE TABLE `shiftandschedule` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `employeeID` varchar(255) DEFAULT NULL,
  `day1` varchar(255) DEFAULT NULL,
  `day2` varchar(255) DEFAULT NULL,
  `day3` varchar(255) DEFAULT NULL,
  `day4` varchar(255) DEFAULT NULL,
  `day5` varchar(255) DEFAULT NULL,
  `dayoff1` varchar(255) DEFAULT NULL,
  `dayoff2` varchar(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeattendance`
--

CREATE TABLE `timeattendance` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `empid` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `date_attendance` date DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `ot_from` time DEFAULT NULL,
  `ot_to` time DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_submit` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

CREATE TABLE `timesheet` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `employeeID` varchar(255) DEFAULT NULL,
  `timesheet_date` date DEFAULT NULL,
  `date_submit` date DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `first` varchar(255) DEFAULT NULL,
  `second` varchar(255) DEFAULT NULL,
  `third` varchar(255) DEFAULT NULL,
  `fourth` varchar(255) DEFAULT NULL,
  `fifth` varchar(255) DEFAULT NULL,
  `sixth` varchar(255) DEFAULT NULL,
  `seven` varchar(255) DEFAULT NULL,
  `eigth` varchar(255) DEFAULT NULL,
  `sp1` varchar(255) DEFAULT NULL,
  `sp2` varchar(255) DEFAULT NULL,
  `sp3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tntaccount`
--

CREATE TABLE `tntaccount` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `employeeID` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `mpin` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `positionTitle` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tntaccount`
--

INSERT INTO `tntaccount` (`id`, `username`, `employeeID`, `firstname`, `middlename`, `lastname`, `mpin`, `password`, `positionTitle`, `email`, `contactno`) VALUES
(1, 'username1', 'E-00001', 'HumanResource', 'User', 'One', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'HR 1 Manager', 'sample@gmail.com', 2147483647),
(2, 'username2', 'E-00002', 'HumanResource', 'User', 'Two', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'HR 2 Manager', 'sample@gmail.com', 2147483647),
(3, 'username3', 'E-00003', 'HumanResource', 'User', 'Three', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'HR 3 Manager', 'sample@gmail.com', 2147483647),
(4, 'username4', 'E-00004', 'HumanResource', 'User', 'Four', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'HR 4 Manager', 'sample@gmail.com', 2147483647),
(5, 'financialuser', 'E-00005', 'Financial', 'User', 'One', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'Financial', 'sample@gmail.com', 2147483647),
(6, 'adminuser', 'E-00006', 'Admin', 'User', 'One', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'Admin', 'sample@gmail.com', 2147483647),
(7, 'coreuser1', 'E-00007', 'Core1', 'User', 'One', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'Core1', 'sample@gmail.com', 2147483647),
(8, 'coreuser2', 'E-00008', 'Core2', 'User', 'One', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'Core2', 'sample@gmail.com', 2147483647),
(9, 'logisticuser', 'E-00009', 'Logistic', 'User', 'One', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'Logistic', 'sample@gmail.com', 2147483647),
(10, 'skystream', 'E-000010', 'Super Admin', 'User', 'One', '81dc9bdb52d04dc20036dbd8313ed055', '970fcd33852606d405b932e614837084', 'Super Admin', 'sample@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `trainingmodulestbl`
--

CREATE TABLE `trainingmodulestbl` (
  `id` int(11) NOT NULL,
  `train_title` varchar(255) DEFAULT NULL,
  `train_datecrtd` date DEFAULT NULL,
  `train_files` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainingresult`
--

CREATE TABLE `trainingresult` (
  `id` int(100) NOT NULL,
  `nameemp` varchar(255) DEFAULT NULL,
  `satisfaction` int(100) DEFAULT NULL,
  `application` int(100) DEFAULT NULL,
  `learning` int(100) DEFAULT NULL,
  `behavior` int(100) DEFAULT NULL,
  `accomplishment` int(100) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainingschedtbl`
--

CREATE TABLE `trainingschedtbl` (
  `id` int(11) NOT NULL,
  `nameemp` varchar(255) DEFAULT NULL,
  `train_sched_from` date DEFAULT NULL,
  `train_sched_to` date DEFAULT NULL,
  `train_sched_remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `datevisit` datetime DEFAULT NULL,
  `timeout` time NOT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicantoverall`
--
ALTER TABLE `applicantoverall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkapplicant` (`applicantID`);

--
-- Indexes for table `applicantschedtbl`
--
ALTER TABLE `applicantschedtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicanttbl`
--
ALTER TABLE `applicanttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificatestbl`
--
ALTER TABLE `certificatestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competencytbl`
--
ALTER TABLE `competencytbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_payroll`
--
ALTER TABLE `create_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeetbl`
--
ALTER TABLE `employeetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emprecords`
--
ALTER TABLE `emprecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empID` (`employeeID`);

--
-- Indexes for table `essaccountstbl`
--
ALTER TABLE `essaccountstbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluationemp`
--
ALTER TABLE `evaluationemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examresult`
--
ALTER TABLE `examresult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY` (`applicantID`);

--
-- Indexes for table `exam_modulestbl`
--
ALTER TABLE `exam_modulestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitiestbl`
--
ALTER TABLE `facilitiestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalinterviewtbl`
--
ALTER TABLE `finalinterviewtbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicantID` (`applicantID`);

--
-- Indexes for table `financial`
--
ALTER TABLE `financial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviewtbl`
--
ALTER TABLE `interviewtbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicantID` (`applicantID`);

--
-- Indexes for table `jobvacancytbl`
--
ALTER TABLE `jobvacancytbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legaldocumentstbl`
--
ALTER TABLE `legaldocumentstbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqcandr`
--
ALTER TABLE `reqcandr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqdocument`
--
ALTER TABLE `reqdocument`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqemployee`
--
ALTER TABLE `reqemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqexammodulestbl`
--
ALTER TABLE `reqexammodulestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqincentives`
--
ALTER TABLE `reqincentives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqleave`
--
ALTER TABLE `reqleave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqlegaldocutbl`
--
ALTER TABLE `reqlegaldocutbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqmodules`
--
ALTER TABLE `reqmodules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqpayroll`
--
ALTER TABLE `reqpayroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqsands`
--
ALTER TABLE `reqsands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shiftandschedule`
--
ALTER TABLE `shiftandschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeattendance`
--
ALTER TABLE `timeattendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheet`
--
ALTER TABLE `timesheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tntaccount`
--
ALTER TABLE `tntaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainingmodulestbl`
--
ALTER TABLE `trainingmodulestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainingresult`
--
ALTER TABLE `trainingresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainingschedtbl`
--
ALTER TABLE `trainingschedtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicantoverall`
--
ALTER TABLE `applicantoverall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicantschedtbl`
--
ALTER TABLE `applicantschedtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicanttbl`
--
ALTER TABLE `applicanttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificatestbl`
--
ALTER TABLE `certificatestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competencytbl`
--
ALTER TABLE `competencytbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `create_payroll`
--
ALTER TABLE `create_payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeetbl`
--
ALTER TABLE `employeetbl`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emprecords`
--
ALTER TABLE `emprecords`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `essaccountstbl`
--
ALTER TABLE `essaccountstbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluationemp`
--
ALTER TABLE `evaluationemp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examresult`
--
ALTER TABLE `examresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_modulestbl`
--
ALTER TABLE `exam_modulestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilitiestbl`
--
ALTER TABLE `facilitiestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalinterviewtbl`
--
ALTER TABLE `finalinterviewtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial`
--
ALTER TABLE `financial`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interviewtbl`
--
ALTER TABLE `interviewtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobvacancytbl`
--
ALTER TABLE `jobvacancytbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legaldocumentstbl`
--
ALTER TABLE `legaldocumentstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqcandr`
--
ALTER TABLE `reqcandr`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqdocument`
--
ALTER TABLE `reqdocument`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqemployee`
--
ALTER TABLE `reqemployee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqexammodulestbl`
--
ALTER TABLE `reqexammodulestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqincentives`
--
ALTER TABLE `reqincentives`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqleave`
--
ALTER TABLE `reqleave`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqlegaldocutbl`
--
ALTER TABLE `reqlegaldocutbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqmodules`
--
ALTER TABLE `reqmodules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqpayroll`
--
ALTER TABLE `reqpayroll`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqsands`
--
ALTER TABLE `reqsands`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shiftandschedule`
--
ALTER TABLE `shiftandschedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeattendance`
--
ALTER TABLE `timeattendance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tntaccount`
--
ALTER TABLE `tntaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainingmodulestbl`
--
ALTER TABLE `trainingmodulestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingresult`
--
ALTER TABLE `trainingresult`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingschedtbl`
--
ALTER TABLE `trainingschedtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicantoverall`
--
ALTER TABLE `applicantoverall`
  ADD CONSTRAINT `fkapplicant` FOREIGN KEY (`applicantID`) REFERENCES `applicanttbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emprecords`
--
ALTER TABLE `emprecords`
  ADD CONSTRAINT `fk_empID` FOREIGN KEY (`employeeID`) REFERENCES `applicanttbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examresult`
--
ALTER TABLE `examresult`
  ADD CONSTRAINT `FOREIGN_KEY` FOREIGN KEY (`applicantID`) REFERENCES `applicanttbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finalinterviewtbl`
--
ALTER TABLE `finalinterviewtbl`
  ADD CONSTRAINT `fk` FOREIGN KEY (`applicantID`) REFERENCES `applicanttbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interviewtbl`
--
ALTER TABLE `interviewtbl`
  ADD CONSTRAINT `interviewtbl_ibfk_1` FOREIGN KEY (`applicantID`) REFERENCES `applicanttbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

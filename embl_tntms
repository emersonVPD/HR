-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 04:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `embl_tntms`
--

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

--
-- Dumping data for table `applicantschedtbl`
--

INSERT INTO `applicantschedtbl` (`id`, `nameapp`, `app_initial`, `app_final`, `app_exam`, `sched_remarks`) VALUES
(1, 'A-00001 - Sample Sample Sample', '2023-11-09 14:38:00', '2023-11-09 14:38:00', '2023-11-25 14:38:00', NULL);

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

--
-- Dumping data for table `applicanttbl`
--

INSERT INTO `applicanttbl` (`id`, `applicantID`, `app_firstname`, `app_middlename`, `app_lastname`, `daily_rate`, `app_status`, `app_age`, `app_gender`, `app_address`, `app_birthdate`, `app_birthplace`, `app_positionTitle`, `app_email`, `app_contactno`, `app_files`, `app_applydate`) VALUES
(1, 'A-00001', 'Sample', 'Sample', 'Sample', 1250, 'Qualified', 22, 'Male', '34', '2023-11-11', 'QC', 'CustomerServiceAgent', 'test@gmail.com', '34', 'joe-jik-vol-18-no-1-8.pdf', '2023-11-01'),
(3, 'A-91090', 'Test', 'Test', 'Test', 1250, 'Active', 22, 'Male', 'Test', '2023-11-14', 'Test', 'AdministrativeStaff', 'te@4325432', '324', 'Branding-design.docx', '2023-11-01'),
(4, 'A-66737', 'Sample', 'Sample', 'Sample', 1250, 'Active', 22, 'Male', 'Sample', '2023-11-24', 'Sample', 'Customer Service Manager', 'Sample@gmai.com', '324', 'Market-Research-Draft.docx', '2023-11-01'),
(5, 'A-10646', 'Sample 2', 'Sample 2', 'Sample 2', 1250, 'Qualified', 22, 'Male', 'Sample 2', '2023-11-15', 'Sample 2', 'Customer Service Manager', 'Sample2@gmai.l.com', '234234', '2023-11-01_Branding-design (1).docx', '2023-11-01'),
(6, 'A-36591', 'TestApplicant', 'TestApplicant', 'TestApplicant', 1250, 'Active', 22, 'Male', 'TestApplicant', '2023-11-30', 'TestApplicant', 'Customer Service Agent', 'TestApplicant@gmail.com', '32453242', '2023-11-02_Branding-design (1).docx', '2023-11-02'),
(7, 'A-10334', 'WalaTO', 'WalaTO', 'WalaTO', 1250, 'Qualified', 22, 'Male', 'WalaTO', '2023-11-20', 'WalaTO', 'Customer Service Agent', 'WalaTO@gmail.com', '324324', '2023-11-02_The concept of digitalization and its impact on the modern economy.pdf', '2023-11-02');

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

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `benefits`, `type`, `details`, `deduction`) VALUES
(1, 'Pag-ibig', 'Annually', '', 500),
(2, 'Philhealth', 'Quarterly', '', 500),
(3, 'SSS', 'Quarterly', '', 100);

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

--
-- Dumping data for table `competencytbl`
--

INSERT INTO `competencytbl` (`id`, `comp_name`, `comp_datecreated`, `comp_sandq_files`, `comp_status`, `comp_remarks`) VALUES
(1, 'Customer Service Agent', '2023-11-24', 'VOIDABLE-MARRIAGES.pdf', 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `create_payroll`
--

CREATE TABLE `create_payroll` (
  `id` int(11) NOT NULL,
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
  `bonus` double DEFAULT NULL,
  `bonus_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_payroll`
--

INSERT INTO `create_payroll` (`id`, `employee_payroll`, `fullname`, `employeeID`, `net_pay`, `total_deductions`, `job_position`, `daily_rate`, `days_of_work`, `sss`, `pag_ibig`, `philhealth`, `other_deductions`, `deduction_description`, `bonus`, `bonus_description`) VALUES
(4, 'employee01', 'Sample, Sample Sample', 'E-00001', 44700, 400, 'CustomerServiceAgent                                                                          ', 3000, 15, 100, 100, 100, 100, '', 100, ''),
(5, 'test1234', 'Sample, Sample Sample', 'E-00001', 18450, 400, 'CustomerServiceAgent                                                                          ', 1250, 15, 100, 100, 100, 100, '', 100, '');

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

--
-- Dumping data for table `employeetbl`
--

INSERT INTO `employeetbl` (`id`, `employeeID`, `emp_image`, `daily_rate`, `emp_firstname`, `emp_middlename`, `emp_lastname`, `emp_positionTitle`, `emp_sub`, `emp_status`, `emp_dateHired`, `emp_department`, `emp_gender`, `emp_address`, `emp_age`, `emp_birthdate`, `emp_birthplace`, `emp_contactno`, `emp_email`, `emp_files`) VALUES
(1, 'E-00001', 'skystreamlogo.png', NULL, 'Sample', 'Sample', 'Sample', 'Customer Service Agent', 'Customer Service Supervisor', 'New Hired on Board', '2023-11-01', 'IT Department', 'Male', '34', 22, '2023-11-11', 'QC', '34', 'test@gmail.com', NULL),
(2, 'E-41774', 'image-1000x1000 (4).jpg', 1250, 'Sample', 'Sample', 'Sample', 'Customer Service Agent', 'Customer Service Manager', 'New Hired on Board', '2023-11-19', ' IT Department', 'Male', '34', 22, '2023-11-23', 'QC', '34', 'test@gmail.com', NULL),
(4, 'E-00005', 'image-1000x1000.jpg', 1250, 'Sample 2', 'Sample 2', 'Sample 2', 'Customer Service Agent', 'Customer Service Supervisor', 'New Hired on Board', '2023-11-16', 'Customer Service Department', 'Male', 'Sample 2', 22, '2023-11-15', 'Sample 2', '234234', 'Sample2@gmai.l.com', NULL),
(5, 'E-00006', 'EIS.jpg', 1250, 'Sample 2', 'Sample 2', 'Sample 2', 'Customer Service Agent', 'Customer Service Supervisor', 'New Hired on Board', '2023-11-08', 'Customer Service Department', 'Male', 'Sample 2', 22, '2023-11-15', 'Sample 2', '234234', 'Sample2@gmai.l.com', NULL),
(6, '1232345', '111.jpg', 1250, 'Sample 2', 'Sample 2', 'Sample 2', 'Customer Service Agent', 'Customer Service Manager', 'New Hired on Board', '2023-11-08', 'IT Department', 'Male', 'Sample 2', 22, '2023-11-15', 'Sample 2', '234234', 'Sample2@gmai.l.com', NULL),
(7, '2342342', '3sample.jpg', 1250, 'Sample 2', 'Sample 2', 'Sample 2', 'IT Security Officer', 'IT Security Manager', 'New Hired on Board', '2023-11-27', 'Admin Department', 'Male', 'Sample 2', 22, '2023-11-15', 'Sample 2', '234234', 'Sample2@gmai.l.com', NULL),
(8, 'E-09005', 'image-1000x1000 (5).jpg', 1250, 'WalaTO', 'WalaTO', 'WalaTO', 'Customer Service Agent', 'Customer Service Supervisor', 'New Hired on Board', '2023-12-01', 'Customer Service Department', 'Male', 'WalaTO', 22, '2023-11-20', 'WalaTO', '324324', 'WalaTO@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emprecords`
--

CREATE TABLE `emprecords` (
  `id` int(255) NOT NULL,
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

--
-- Dumping data for table `essaccountstbl`
--

INSERT INTO `essaccountstbl` (`id`, `username`, `employeeID`, `daily_rate`, `ess_firstname`, `ess_middlename`, `ess_lastname`, `mpin`, `password`, `ess_positionTitle`, `ess_subpositionTitle`, `ess_email`, `ess_contactno`) VALUES
(1, 'employee01', 'E-00001', 3000, 'Sample', 'Sample', 'Sample', '81dc9bdb52d04dc20036dbd8313ed055', '970fcd33852606d405b932e614837084', 'CustomerServiceAgent                                                                          ', NULL, 'test@gmail.com', 34),
(2, 'Test3241', 'E-00005', 1250, 'Sample', 'Sample', 'Sample', '81dc9bdb52d04dc20036dbd8313ed055', '82e4c02d025000ea7e30413ff260db61', 'CustomerServiceAgent                                                                          ', NULL, 'test@gmail.com', 34),
(3, 'sample01', 'E-00001', 1250, 'Sample', 'Sample', 'Sample', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', 'CustomerServiceAgent                                                                          ', NULL, 'test@gmail.com', 34),
(4, 'test1234', 'E-00001', 1250, 'Sample', 'Sample', 'Sample', '81dc9bdb52d04dc20036dbd8313ed055', '970fcd33852606d405b932e614837084', 'CustomerServiceAgent                                                                          ', NULL, 'test@gmail.com', 34),
(5, 'sampleuser01', 'E-41774', 1250, 'Sample', 'Sample', 'Sample', '81dc9bdb52d04dc20036dbd8313ed055', '486839d6584c71525ba3a24f8e847a50', ' CustomerServiceAgent', NULL, 'test@gmail.com', 34);

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

--
-- Dumping data for table `evaluationemp`
--

INSERT INTO `evaluationemp` (`id`, `nameemp`, `behavior`, `tna`, `quality`, `responsibility`, `dependability`, `remarks`) VALUES
(1, 'E-00001 - Sample Sample Sample', 50, 50, 50, 50, 50, ''),
(2, 'E-00001 - Sample Sample Sample', 100, 100, 100, 100, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `examresult`
--

CREATE TABLE `examresult` (
  `id` int(11) NOT NULL,
  `nameapp` varchar(255) DEFAULT NULL,
  `res_score` int(255) DEFAULT NULL,
  `res_remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examresult`
--

INSERT INTO `examresult` (`id`, `nameapp`, `res_score`, `res_remarks`) VALUES
(1, ' A-00001 - Sample Sample Sample', 50, ''),
(2, ' A-91090 - Test Test Test', 60, '');

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

--
-- Dumping data for table `exam_modulestbl`
--

INSERT INTO `exam_modulestbl` (`id`, `exam_title`, `exam_datecrtd`, `exam_links`) VALUES
(1, 'Customer Service Manager', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSd858PcYgEQI-RmPZGwTipwJiKS6skp225sZvui24KZrNqsXw/viewform?usp=share_link'),
(2, 'TourVisa Processing Staff', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSfFp-IYOGqC8UdBoa1rtWnEBJCyLMIsRvrlWnnd7bO0bf8jzQ/viewform?usp=share_link'),
(3, 'Project Manager', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSePY4v7g2Xicd67yJnJFASKvv0-LfnnsQsDS4MDySxC1Ehn5g/viewform?usp=share_link'),
(4, 'Sales and Marketing', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSd1i2xk1hR9K0HjUGABh23kKEWkQ_OZyMZngZ0Iv2BnZxzlRw/viewform?usp=share_link'),
(5, 'Documentation Manager', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSeqEcD-T2fTSzpw0CuST2_wvtD4ywNgR5oEJQriralSUdEWmQ/viewform?usp=share_link'),
(6, 'Documentation Officer', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLScxz456YAvWyCJp6Pb5Osuo9qOk81OttVLAHp0aFx1Zr-Q-_Q/viewform?usp=share_link'),
(7, 'General Manager', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSe-3PxP9hETZQ7MGUYbIg7_z1ohiA65QQfN3aLAxzCBuCZ7NA/viewform?usp=share_link'),
(8, 'Reservation Officer', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSe_vb_Q9oHeUh-TGtzIBKlQD4AF5r5pHFTvB6wtuXhkiHjOdA/viewform?usp=share_link'),
(9, 'Travel Consultant', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSfdGBGBNdLz7BKxKgmIpi_52veKQ2l1sYqJIUkNdl7YyLCx4Q/viewform?usp=share_link'),
(10, 'Administrative Staff', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSeGgZT0rRSgL0WRB30h4X6-Cu8Ox9Klnk5fvGCBlmuaYdy3JA/viewform?usp=share_link'),
(11, 'Liaison Staff', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSeyuNIF29SaYJOzBBbmw79b3PICk6_vUTxVhlRLdqZePMdcDw/viewform?usp=share_link'),
(12, 'Sales Manager', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSf69aGaw0wEMHvSj8rCQMia2PnRkMeE_0bEBtOopVRCNRZIxA/viewform?usp=share_link'),
(13, 'Database Administrator', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLScwkCaasUbM-gKTKMFf2dTbq4xkct8VrdL9Vp7uZcl0Qd8mrQ/viewform?usp=share_link'),
(14, 'IT Technical Officer', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLSeHCspxnUzTndxe_UQIyo24iwveFvDzkh_7S3K5S9Ct7BPYSA/viewform?usp=share_link'),
(15, 'IT Security Officer', '2023-02-22', 'https://docs.google.com/forms/d/e/1FAIpQLScZgiMCSkbIqKj1gC3ckjSPJoeulcJZnzBnyKcVeajCOzqd-Q/viewform?usp=share_link');

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
  `nameapp` varchar(255) DEFAULT NULL,
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

--
-- Dumping data for table `finalinterviewtbl`
--

INSERT INTO `finalinterviewtbl` (`id`, `nameapp`, `fq1`, `fq2`, `fq3`, `fq4`, `fq5`, `fq6`, `fq7`, `fq8`, `fq9`, `fq10`, `final_remarks`) VALUES
(1, 'A-00001 - Sample Sample Sample', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, '');

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
  `nameapp` varchar(255) DEFAULT NULL,
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

--
-- Dumping data for table `interviewtbl`
--

INSERT INTO `interviewtbl` (`id`, `nameapp`, `iq1`, `iq2`, `iq3`, `iq4`, `iq5`, `iq6`, `iq7`, `iq8`, `iq9`, `iq10`, `initial_remarks`) VALUES
(1, 'A-00001 - Sample Sample Sample', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, ''),
(2, 'A-36591 - TestApplicant TestApplicant TestApplicant', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, ''),
(3, 'A-00001 - Sample Sample Sample', 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, '');

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

--
-- Dumping data for table `jobvacancytbl`
--

INSERT INTO `jobvacancytbl` (`id`, `job_title`, `job_date`, `job_available`) VALUES
(1, 'Customer Service Agent', '2023-11-02', 0);

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

--
-- Dumping data for table `reqcandr`
--

INSERT INTO `reqcandr` (`id`, `username`, `type`, `note`, `status`, `emp`, `name`, `remarks`, `reqdate`, `candr_file`) VALUES
(1, 'sampleuser01', 'Separation Pay', '', 'Pending', 'E-41774', 'Sample Sample Sample', NULL, '2023-11-02', NULL),
(2, 'sampleuser01', 'Reimbursement', '', 'Pending', 'E-41774', 'Sample Sample Sample', NULL, '2023-11-02', 'image-1000x1000 (3).jpg');

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

--
-- Dumping data for table `reqemployee`
--

INSERT INTO `reqemployee` (`id`, `purpose`, `title`, `req_date`, `status`, `job_num`, `subs`, `remarks`, `note`) VALUES
(1, 'Request New Employee', 'Customer Service Agent', '2023-11-02', 'Pending', 2, NULL, NULL, '');

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

--
-- Dumping data for table `reqexammodulestbl`
--

INSERT INTO `reqexammodulestbl` (`id`, `req_exam_title`, `req_exam_date`, `req_exam_status`, `req_exam_remarks`, `req_exam_purpose`, `req_exam_links`) VALUES
(1, 'Customer Service Manager', '2023-11-01', NULL, '                                                    ', 'Exam', 'http://localhost/HR/HumanResource1/Modules/Applicant%20Management/RequestExam.php                 '),
(2, 'Sales and Marketing', '2023-11-02', NULL, '', 'Exam', 'http://localhost/HR/index.php');

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

--
-- Dumping data for table `reqincentives`
--

INSERT INTO `reqincentives` (`id`, `type`, `req_date`, `name`, `note`, `status`, `remarks`) VALUES
(1, 'Retirement incentives ', '2023-11-02', ' Sample, Sample ( E-00001 ) ', '', 'Pending', NULL);

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

--
-- Dumping data for table `reqleave`
--

INSERT INTO `reqleave` (`id`, `username`, `lv_leave`, `lv_note`, `lv_datefrom`, `lv_dateto`, `lv_status`, `emp`, `name`, `proof_file`, `remarks`) VALUES
(1, 'employee01', 'Sick Leave', '', '2023-11-01', '2023-11-03', 'Approved', 'E-00001', 'Sample Sample Sample', 'image-1000x1000 (1).jpg', ''),
(2, 'test1234', 'Maternity leave', '', '2023-11-15', '2023-11-14', 'Declined', 'E-00001', 'Sample Sample Sample', 'Branding-design (1).docx', ''),
(3, 'sampleuser01', 'Vacation Leave', '', '2023-11-09', '2023-11-15', 'Pending', 'E-41774', 'Sample Sample Sample', 'image-1000x1000 (3).jpg', NULL);

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

--
-- Dumping data for table `reqmodules`
--

INSERT INTO `reqmodules` (`id`, `req_module_title`, `req_module_date`, `req_module_remarks`, `req_module_purpose`, `req_module_file`) VALUES
(1, 'Customer Service Manager', '2023-11-02', '', 'Training', 'VOIDABLE-MARRIAGES.pdf');

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

--
-- Dumping data for table `reqpayroll`
--

INSERT INTO `reqpayroll` (`id`, `username`, `yrmonth`, `quarter`, `note`, `status`, `emp`, `name`, `datereq`, `remarks`, `payroll_file`) VALUES
(1, 'sampleuser01', '2023-12', 'Last of Month', '', 'Pending', 'E-41774', 'Sample Sample Sample', '2023-11-02', NULL, NULL);

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

--
-- Dumping data for table `reqsands`
--

INSERT INTO `reqsands` (`id`, `username`, `employeeID`, `status`, `name`, `reqdate`, `note`, `day1`, `day2`, `day3`, `day4`, `day5`, `dayoff1`, `dayoff2`, `shift`, `remarks`) VALUES
(1, 'test1234', 'E-00001', 'Pending', 'Sample Sample Sample', '2023-11-02', '', 'Wednesday', 'Wednesday', 'Wednesday', 'Wednesday', 'Tuesday', 'Monday', 'Wednesday', 'Morning Shift - 8:00 AM - 5:00 PM', NULL),
(2, 'sampleuser01', 'E-41774', 'Pending', 'Sample Sample Sample', '2023-11-02', '', 'Tuesday', 'Tuesday', 'Wednesday', 'Tuesday', 'Tuesday', 'Wednesday', 'Tuesday', 'Night Shift - 8:00 PM - 5:00 AM', NULL);

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

--
-- Dumping data for table `shiftandschedule`
--

INSERT INTO `shiftandschedule` (`id`, `username`, `fullname`, `employeeID`, `day1`, `day2`, `day3`, `day4`, `day5`, `dayoff1`, `dayoff2`, `shift`, `remarks`) VALUES
(1, 'employee01', 'Sample, Sample Sample', 'E-00001', 'Monday', 'Tuesday', 'Thursday', 'Wednesday', 'Tuesday', 'Thursday', 'Wednesday', 'Morning Shift - 8:00 AM - 5:00 PM', NULL),
(2, 'test1234', 'Sample, Sample Sample', 'E-00001', 'Tuesday', 'Friday', 'Friday', 'Thursday', 'Monday', 'Tuesday', 'Wednesday', 'Night Shift - 8:00 PM - 5:00 AM', NULL);

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
  `timeout` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeattendance`
--

INSERT INTO `timeattendance` (`id`, `username`, `empid`, `fullname`, `shift`, `date_attendance`, `timein`, `timeout`) VALUES
(1, 'employee01', 'E-00001', 'Sample,  Sample Sample ', 'Morning Shift - 8:00 AM - 5:00 PM', '2023-11-01', '14:44:00', '14:45:00'),
(2, 'sampleuser01', 'E-41774', 'Sample,  Sample Sample ', 'Morning Shift - 8:00 AM - 5:00 PM', '2023-11-15', '23:33:00', '23:33:00'),
(3, 'sampleuser01', 'E-41774', 'Sample,  Sample Sample ', 'Special Shift 1 - 6:00 AM - 6:00 PM', '2023-11-01', '20:41:00', '20:39:00');

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

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id`, `username`, `name`, `employeeID`, `timesheet_date`, `date_submit`, `shift`, `first`, `second`, `third`, `fourth`, `fifth`, `sixth`, `seven`, `eigth`, `sp1`, `sp2`, `sp3`) VALUES
(1, 'sampleuser01', 'Sample, Sample Sample', 'E-41774', '0000-00-00', '2023-11-02', 'Special Shift 1 - 6:00 AM - 6:00 PM', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a');

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
(10, 'tntaccount01', 'E-000010', 'Super Admin', 'User', 'One', '81dc9bdb52d04dc20036dbd8313ed055', '970fcd33852606d405b932e614837084', 'Super Admin', 'sample@gmail.com', 2147483647);

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

--
-- Dumping data for table `trainingmodulestbl`
--

INSERT INTO `trainingmodulestbl` (`id`, `train_title`, `train_datecrtd`, `train_files`) VALUES
(1, 'Customer Service Agent', '2023-02-22', 'Customer service agent - Training.pdf'),
(2, 'Customer Service Manager', '2023-02-22', 'Customer-Service-Manager-Training.pdf'),
(3, 'TourVisa Processing Staff', '2023-02-22', 'Tour Visa Processing Staff - Training.pdf'),
(4, 'Project Manager', '2023-02-22', 'Project Managers - Training.pdf'),
(5, 'Sales and Marketing', '2023-02-22', 'Sales and Marketing - Training.pdf'),
(6, 'Documentation Manager', '2023-02-22', 'Documentation Manager - Training.pdf'),
(7, 'Documentation Officer', '2023-02-22', 'Documentation Officer - Training.pdf'),
(8, 'General Manager', '2023-02-22', 'General-Manager-Training.pdf'),
(9, 'Reservation Officer', '2023-02-22', 'Reservation-Officer-Training.pdf'),
(10, 'Travel Consultant', '2023-02-22', 'Travel Consultant  - Training.pdf'),
(11, 'Administrative Staff', '2023-02-22', 'Administrative-staff-Training.pdf'),
(12, 'Liaison Staff', '2023-02-22', 'Liaison Staff - Training.pdf'),
(13, 'Sales Manager', '2023-02-22', 'Sales-Manager-Training.pdf'),
(14, 'Database Administrator', '2023-02-24', 'Database Administrator - Training.pdf'),
(15, 'IT Technical Officer', '2023-02-04', 'IT Technical Officer - Training.pdf'),
(16, 'TourVisa Processing Staff', '2023-11-25', '20231101175047.pdf');

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

--
-- Dumping data for table `trainingresult`
--

INSERT INTO `trainingresult` (`id`, `nameemp`, `satisfaction`, `application`, `learning`, `behavior`, `accomplishment`, `remarks`) VALUES
(1, 'E-00001 - Sample Sample Sample', 50, 50, 50, 50, 50, '                                                  ');

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

--
-- Dumping data for table `trainingschedtbl`
--

INSERT INTO `trainingschedtbl` (`id`, `nameemp`, `train_sched_from`, `train_sched_to`, `train_sched_remarks`) VALUES
(1, 'E-00001 - Sample Sample Sample', '2023-11-23', '2023-11-16', ' test\r\n                                          ');

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial`
--
ALTER TABLE `financial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviewtbl`
--
ALTER TABLE `interviewtbl`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `applicantschedtbl`
--
ALTER TABLE `applicantschedtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicanttbl`
--
ALTER TABLE `applicanttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_payroll`
--
ALTER TABLE `create_payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeetbl`
--
ALTER TABLE `employeetbl`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emprecords`
--
ALTER TABLE `emprecords`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `essaccountstbl`
--
ALTER TABLE `essaccountstbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evaluationemp`
--
ALTER TABLE `evaluationemp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `examresult`
--
ALTER TABLE `examresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_modulestbl`
--
ALTER TABLE `exam_modulestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `facilitiestbl`
--
ALTER TABLE `facilitiestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finalinterviewtbl`
--
ALTER TABLE `finalinterviewtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `financial`
--
ALTER TABLE `financial`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interviewtbl`
--
ALTER TABLE `interviewtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobvacancytbl`
--
ALTER TABLE `jobvacancytbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `legaldocumentstbl`
--
ALTER TABLE `legaldocumentstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqcandr`
--
ALTER TABLE `reqcandr`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reqdocument`
--
ALTER TABLE `reqdocument`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqemployee`
--
ALTER TABLE `reqemployee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reqexammodulestbl`
--
ALTER TABLE `reqexammodulestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reqincentives`
--
ALTER TABLE `reqincentives`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reqleave`
--
ALTER TABLE `reqleave`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reqlegaldocutbl`
--
ALTER TABLE `reqlegaldocutbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqmodules`
--
ALTER TABLE `reqmodules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reqpayroll`
--
ALTER TABLE `reqpayroll`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reqsands`
--
ALTER TABLE `reqsands`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shiftandschedule`
--
ALTER TABLE `shiftandschedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timeattendance`
--
ALTER TABLE `timeattendance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timesheet`
--
ALTER TABLE `timesheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tntaccount`
--
ALTER TABLE `tntaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainingmodulestbl`
--
ALTER TABLE `trainingmodulestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trainingresult`
--
ALTER TABLE `trainingresult`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainingschedtbl`
--
ALTER TABLE `trainingschedtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

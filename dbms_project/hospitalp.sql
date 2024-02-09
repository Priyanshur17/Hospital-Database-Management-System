-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 09:40 PM
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
-- Database: `hospitalp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_age_msg` (`patientid` INT)   BEGIN
if (select age(patientid)>18) then
select 'Patient is a Major';
else
select 'Minor Patient';
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `patient_count_msg` (`dayno` INT)   BEGIN
if (select total_patients_on_this_day(dayno)>2) then
select 'Many patients on this day!!';
else
select 'Not many patients on this day!';
end if;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `age` (`patientid` INT) RETURNS INT(11) DETERMINISTIC BEGIN
declare answer int;
declare DOB date;
select pat_dob from patient_personal_info where patient_personal_info.Pat_ID=patientid into
DOB;
select DATE_FORMAT(FROM_DAYS(DATEDIFF(CURDATE(),DOB)), '%Y')+0 AS
age into answer;
return answer;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `total_patients_on_this_day` (`dayno` INT) RETURNS INT(11) DETERMINISTIC BEGIN
declare answer int;
select count(patient_personal_info.Pat_ID) from appointment natural join
patient_personal_info where dayofweek(appointment.app_date_time)=dayno into answer;
return answer;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `App_ID` varchar(10) NOT NULL,
  `Pat_ID` int(11) DEFAULT NULL,
  `Doc_ID` varchar(10) DEFAULT NULL,
  `App_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `App_Description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`App_ID`, `Pat_ID`, `Doc_ID`, `App_Date_Time`, `App_Description`) VALUES
('App101', 1, 'Doc02', '2023-12-04 18:38:21', 'NewCase'),
('App102', 2, 'Doc01', '2023-12-04 18:38:21', 'NewCase'),
('App103', 1, 'Doc02', '2023-12-04 18:38:21', 'Followup'),
('App104', 3, 'Doc01', '2019-12-18 21:44:07', 'NewCase'),
('App105', 3, 'Doc01', '2019-12-31 21:50:10', 'Dressing'),
('App106', 4, 'Doc02', '2020-02-09 00:20:10', 'NewCase'),
('App107', 4, 'Doc02', '2020-02-09 02:50:50', NULL),
('App108', 2, 'Doc03', '2023-12-04 20:29:47', 'Followup'),
('App109', 3, 'Doc03', '2023-12-04 20:29:47', 'NewCase'),
('App110', 4, 'Doc04', '2023-12-04 20:29:47', 'Dressing'),
('App111', 5, 'Doc05', '2023-12-04 20:29:47', 'NewCase'),
('App112', 5, 'Doc06', '2023-12-04 20:29:47', 'Consultation'),
('App113', 6, 'Doc07', '2023-12-04 20:29:47', 'NewCase'),
('App114', 7, 'Doc08', '2023-12-04 20:29:47', 'Followup'),
('App115', 8, 'Doc09', '2023-12-04 20:29:47', 'NewCase'),
('App116', 9, 'Doc10', '2023-12-04 20:29:47', 'Consultation'),
('App117', 10, 'Doc01', '2023-12-04 20:29:47', 'Dressing'),
('App118', 10, 'Doc02', '2023-12-04 20:29:47', 'Followup'),
('App119', 11, 'Doc03', '2023-12-04 20:29:47', 'NewCase'),
('App120', 12, 'Doc04', '2023-12-04 20:29:47', 'Dressing'),
('App121', 13, 'Doc05', '2023-12-04 20:29:47', 'NewCase');

--
-- Triggers `appointment`
--
DELIMITER $$
CREATE TRIGGER `trigger4b` BEFORE DELETE ON `appointment` FOR EACH ROW begin
delete from Visit where Visit.App_ID=old.App_ID;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_ID` varchar(10) NOT NULL,
  `Dept_name` varchar(50) NOT NULL,
  `hod` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_ID`, `Dept_name`, `hod`) VALUES
('Dept1', 'Cardiology', 'Doc12'),
('Dept10', 'dermatology', NULL),
('Dept2', 'Gastro', ''),
('Dept3', 'GeneralSurgery', 'Doc3'),
('Dept4', 'Gynecology', NULL),
('Dept5', 'Neurology', 'Doc7'),
('Dept6', 'Physiotherapy', NULL),
('Dept7', 'Urology', NULL),
('Dept8', 'psychiatry', 'Doc17'),
('Dept9', 'ortho', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `Doc_ID` varchar(10) NOT NULL,
  `Doc_fname` varchar(20) NOT NULL,
  `Doc_mname` varchar(20) DEFAULT NULL,
  `Doc_lname` varchar(20) NOT NULL,
  `Doc_gender` varchar(1) NOT NULL,
  `Doc_DOB` date NOT NULL,
  `Doc_contactno` bigint(20) NOT NULL,
  `Doc_emailID` varchar(50) DEFAULT NULL CHECK (`Doc_emailID` = lcase(`Doc_emailID`)),
  `Doc_Address` varchar(250) DEFAULT NULL,
  `Doc_Specialist` varchar(50) DEFAULT NULL,
  `Doc_DeptID` varchar(10) DEFAULT NULL,
  `Doc_charge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`Doc_ID`, `Doc_fname`, `Doc_mname`, `Doc_lname`, `Doc_gender`, `Doc_DOB`, `Doc_contactno`, `Doc_emailID`, `Doc_Address`, `Doc_Specialist`, `Doc_DeptID`, `Doc_charge`) VALUES
('Doc01', 'Mauli', NULL, 'Patel', 'F', '1960-03-31', 9867420134, 'mauli@gmail.com', 'Ahmedabad', 'Gynecologist', 'Dept4', 2000),
('Doc02', 'Jay', NULL, 'Patel', 'M', '1950-12-21', 6347420134, 'jay@gmail.com', 'Ahmedabad', 'Cardiologist', 'Dept1', 5000),
('Doc03', 'Pranav', NULL, 'Dava', 'M', '1970-07-11', 8947422334, 'pranav@gmail.com', 'Vadodara', 'Surgeon', 'Dept3', 5000),
('Doc04', 'Aarav', NULL, 'Shah', 'M', '1985-05-15', 7568320124, 'aarav@gmail.com', 'Surat', 'Orthopedic', 'Dept9', 3000),
('Doc05', 'Aanya', NULL, 'Desai', 'F', '1978-09-02', 8876543210, 'aanya@gmail.com', 'Vadodara', 'Dermatologist', 'Dept10', 2500),
('Doc06', 'Rohan', NULL, 'Mehta', 'M', '1982-11-20', 9345678901, 'rohan@gmail.com', 'Ahmedabad', 'Gastroenterologist', 'Dept2', 4500),
('Doc07', 'Aisha', NULL, 'Verma', 'F', '1975-03-25', 7890123456, 'aisha@gmail.com', 'Surat', 'Neurologist', 'Dept5', 4000),
('Doc08', 'Arjun', NULL, 'Joshi', 'M', '1990-07-12', 8765432109, 'arjun@gmail.com', 'Vadodara', 'Psychiatrist', 'Dept8', 3500),
('Doc09', 'Sara', NULL, 'Singh', 'F', '1988-01-30', 9876543210, 'sara@gmail.com', 'Ahmedabad', 'Physiotherapist', 'Dept6', 2000),
('Doc10', 'Advait', NULL, 'Gupta', 'M', '1980-06-18', 7654321098, 'advait@gmail.com', 'Surat', 'Urologist', 'Dept7', 5000),
('Doc11', 'Anaya', NULL, 'Patil', 'F', '1972-12-08', 8765432109, 'anaya@gmail.com', 'Vadodara', 'Gynecologist', 'Dept4', 3000),
('Doc12', 'Vihaan', NULL, 'Rao', 'M', '1986-04-03', 7890123456, 'vihaan@gmail.com', 'Ahmedabad', 'Cardiologist', 'Dept1', 4500),
('Doc13', 'Ira', NULL, 'Kumar', 'F', '1984-08-28', 8901234567, 'ira@gmail.com', 'Surat', 'Orthopedic', 'Dept9', 3500),
('Doc14', 'Kabir', NULL, 'Sharma', 'M', '1995-02-14', 9876543210, 'kabir@gmail.com', 'Vadodara', 'Dermatologist', 'Dept10', 3000),
('Doc15', 'Anika', NULL, 'Gandhi', 'F', '1976-06-22', 8765432109, 'anika@gmail.com', 'Ahmedabad', 'Gastroenterologist', 'Dept2', 4000),
('Doc16', 'Rishi', NULL, 'Kaur', 'M', '1981-10-10', 7654321098, 'rishi@gmail.com', 'Surat', 'Neurologist', 'Dept5', 3500),
('Doc17', 'Ishita', NULL, 'Verma', 'F', '1983-04-05', 8901234567, 'ishita@gmail.com', 'Vadodara', 'Psychiatrist', 'Dept8', 3000),
('Doc18', 'Reyansh', NULL, 'Sinha', 'M', '1998-09-15', 9876543210, 'reyansh@gmail.com', 'Ahmedabad', 'Physiotherapist', 'Dept6', 2500),
('Doc19', 'Avni', NULL, 'Yadav', 'F', '1987-05-17', 8765432109, 'avni@gmail.com', 'Surat', 'Urologist', 'Dept7', 4000),
('Doc20', 'Aarush', NULL, 'Thakur', 'M', '1979-11-26', 7654321098, 'aarush@gmail.com', 'Vadodara', 'Gynecologist', 'Dept4', 3000),
('Doc21', 'Navya', NULL, 'Rawat', 'F', '1989-03-08', 8901234567, 'navya@gmail.com', 'Ahmedabad', 'Cardiologist', 'Dept1', 4500),
('Doc22', 'Advaita', NULL, 'Chauhan', 'F', '1983-07-03', 9876543210, 'advaita@gmail.com', 'Surat', 'Orthopedic', 'Dept9', 3500),
('Doc23', 'Veer', NULL, 'Agarwal', 'M', '1994-01-22', 8765432109, 'veer@gmail.com', 'Vadodara', 'Dermatologist', 'Dept10', 3000),
('Doc24', 'Aradhya', NULL, 'Nair', 'F', '1975-06-10', 7654321098, 'aradhya@gmail.com', 'Ahmedabad', 'Gastroenterologist', 'Dept2', 4000),
('Doc25', 'Aryan', NULL, 'Kapoor', 'M', '1980-10-29', 8901234567, 'aryan@gmail.com', 'Surat', 'Neurologist', 'Dept5', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `in_patients`
--

CREATE TABLE `in_patients` (
  `Pat_ID` int(11) NOT NULL,
  `Addmission_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `In_treatments` varchar(100) DEFAULT NULL,
  `Room_assigned` varchar(10) NOT NULL,
  `OT_assigned` varchar(10) DEFAULT NULL,
  `Operation_Date_Time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `in_patients`
--

INSERT INTO `in_patients` (`Pat_ID`, `Addmission_Date_Time`, `In_treatments`, `Room_assigned`, `OT_assigned`, `Operation_Date_Time`) VALUES
(1, '2021-04-07 04:05:48', 'hospitalisation', 'room1', 'room3', '2021-04-16 22:36:02'),
(2, '2021-04-14 04:47:02', 'Hospitalisation', 'room2', 'room5', '2021-04-16 22:37:31'),
(6, '2021-04-20 03:15:00', 'Hospitalisation', 'room6', 'room1', '2021-04-24 09:00:00'),
(7, '2021-04-22 07:00:00', 'Hospitalisation', 'room7', 'room3', '2021-04-26 11:15:00'),
(8, '2021-04-25 03:45:00', 'Hospitalisation', 'room1', 'room4', '2021-04-29 07:30:00'),
(9, '2021-04-28 09:30:00', 'Hospitalisation', 'room2', 'room5', '2021-05-02 13:00:00'),
(10, '2021-05-01 05:50:00', 'Hospitalisation', 'room3', 'room6', '2021-05-05 09:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `s_no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `action` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `Med_ID` varchar(10) NOT NULL,
  `Med_Name` varchar(50) NOT NULL,
  `Med_company` varchar(50) DEFAULT NULL,
  `Med_price` int(11) NOT NULL,
  `Med_dose` varchar(10) NOT NULL,
  `Med_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`Med_ID`, `Med_Name`, `Med_company`, `Med_price`, `Med_dose`, `Med_type`) VALUES
('Med101', 'DAN-P', 'UNISON', 15, '600', 'Anti inflammatoryd'),
('Med102', 'DOLO', 'Torrent', 20, '650', 'Paracetamol'),
('Med103', 'Clavam', 'Zydus', 120, '625', 'Anti biotic'),
('Med104', 'Ciprofloxacin', 'Cipla', 80, '250', 'Anti biotic'),
('Med105', 'Ampicillin', 'Sun Pharma', 50, '250', 'Anti biotic'),
('Med106', 'Omeprazole', 'Dr. Reddy\'s', 30, '20', 'Proton Pump Inhibitor'),
('Med107', 'Atorvastatin', 'Glenmark', 40, '40', 'Cholesterol Lowering'),
('Med108', 'Ibuprofen', 'Cadila', 15, '400', 'Pain Reliever'),
('Med109', 'Metformin', 'Aurobindo Pharma', 25, '500', 'Anti Diabetic'),
('Med110', 'Lisinopril', 'Intas Pharmaceuticals', 35, '10', 'Hypertension'),
('Med111', 'Prednisone', 'Lupin', 18, '5', 'Corticosteroid'),
('Med112', 'Aspirin', 'Ajanta Pharma', 10, '75', 'Blood Thinner'),
('Med113', 'Ranitidine', 'Biocon3', 223, '150', 'Acid Reducer'),
('Med114', 'Cetirizine', 'Alkem Laboratories', 12, '10', 'Antihistamine'),
('Med115', 'Levothyroxine', 'Micro Labs', 30, '503', 'Thyroid Hormone'),
('Med116', 'Simvastatin', 'Zydus Cadila', 40, '20', 'Cholesterol Lowering'),
('Med117', 'Diazepam', 'Sun Pharma', 18, '5', 'Anti Anxiety'),
('Med118', 'Amoxicillin', 'Dr. Reddy\'s', 45, '250', 'Anti biotic'),
('Med119', 'Losartan', 'Cipla', 28, '50', 'Hypertension');

--
-- Triggers `medicines`
--
DELIMITER $$
CREATE TRIGGER `trigger1` AFTER UPDATE ON `medicines` FOR EACH ROW begin
    declare curr_date_time timestamp;
	select current_timestamp into curr_date_time;
       
    if (old.Med_Name !=new.Med_Name) then
        insert into medicines_updates values (old.Med_ID,curr_date_time, 'Med_Name',old.Med_Name,new.Med_Name);
    end if;
  if (old.Med_company != new.Med_company) then
      insert into medicines_updates values (old.Med_ID, curr_date_time, 'Med_company', old.Med_company, new.Med_company);
  end if;

    if (old.Med_price !=new.Med_price) then
        insert into medicines_updates values (old.Med_ID,curr_date_time, 'Med_price',old.Med_price,new.Med_price);
    end if;
    
    if (old.Med_dose !=new.Med_dose) then
        insert into medicines_updates values (old.Med_ID,curr_date_time, 'Med_dose',old.Med_dose,new.Med_dose);
    end if;
    
    if (old.Med_type !=new.Med_type) then
        insert into medicines_updates values (old.Med_ID,curr_date_time, 'Med_type',old.Med_type,new.Med_type);
    end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medicines_updates`
--

CREATE TABLE `medicines_updates` (
  `Med_ID` varchar(20) NOT NULL,
  `change_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `field_name` varchar(50) DEFAULT NULL,
  `before_value` varchar(50) DEFAULT NULL,
  `after_value` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines_updates`
--

INSERT INTO `medicines_updates` (`Med_ID`, `change_date`, `field_name`, `before_value`, `after_value`) VALUES
('Med115', '2023-12-04 20:21:22', 'Med_dose', '50', '503');

-- --------------------------------------------------------

--
-- Table structure for table `patient_personal_info`
--

CREATE TABLE `patient_personal_info` (
  `Pat_ID` int(11) NOT NULL,
  `Pat_fname` varchar(20) NOT NULL,
  `Pat_mname` varchar(20) DEFAULT NULL,
  `Pat_lname` varchar(20) NOT NULL,
  `Pat_gender` varchar(1) NOT NULL,
  `Pat_DOB` date NOT NULL,
  `Pat_contactno` bigint(20) NOT NULL,
  `Pat_emailID` varchar(50) DEFAULT NULL CHECK (`Pat_emailID` = lcase(`Pat_emailID`)),
  `Pat_Address` varchar(250) DEFAULT NULL,
  `Pat_MedHistory` varchar(500) DEFAULT NULL,
  `Pat_BloodGroup` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_personal_info`
--

INSERT INTO `patient_personal_info` (`Pat_ID`, `Pat_fname`, `Pat_mname`, `Pat_lname`, `Pat_gender`, `Pat_DOB`, `Pat_contactno`, `Pat_emailID`, `Pat_Address`, `Pat_MedHistory`, `Pat_BloodGroup`) VALUES
(1, 'Dev', NULL, 'Mehta', 'M', '2001-01-31', 9239420134, 'dev@gmail.com', 'Ahmedabad', NULL, 'A+ve'),
(2, 'Rahi', NULL, 'Shah', 'F', '2001-11-02', 9239445324, 'rahi@gmail.com', 'Ahmedabad', NULL, 'B+ve'),
(3, 'Janvi', NULL, 'Joshi', 'F', '2000-02-02', 9239412342, 'janvi@gmail.com', 'Ahmedabad', NULL, 'O+ve'),
(4, 'Raj', NULL, 'Majmudar', 'M', '1989-06-22', 9124563427, 'raj@gmail.com', 'Surat', NULL, 'O+ve'),
(5, 'Raina', NULL, 'Rai', 'F', '1979-12-07', 9898563427, 'raina@gmail.com', 'Mumbai', NULL, 'A-ve'),
(6, 'Raj', NULL, 'Kumar', 'M', '1972-12-10', 9239111111, 'raj_kumar@gmail.com', 'Kolkata', 'Diabetes', 'A+ve'),
(7, 'Anita', NULL, 'Gupta', 'F', '1988-03-25', 9239222222, 'anita_gupta@gmail.com', 'Bangalore', 'Asthma', 'O+ve'),
(8, 'Rohan', NULL, 'Sharma', 'M', '2005-07-03', 9239333333, 'rohan_sharma@gmail.com', 'Pune', 'Fractured Leg', 'B-ve'),
(9, 'Neeta', NULL, 'Verma', 'F', '1992-09-18', 9239444444, 'neeta_verma@gmail.com', 'Chennai', 'Allergies', 'A-ve'),
(10, 'Karthik', NULL, 'Reddy', 'M', '1987-04-12', 9239555555, 'karthik_reddy@gmail.com', 'Hyderabad', 'Migraine', 'AB-ve'),
(11, 'Pooja', NULL, 'Mishra', 'F', '1998-01-30', 9239666666, 'pooja_mishra@gmail.com', 'Jaipur', 'Arthritis', 'O-ve'),
(12, 'Vikram', NULL, 'Rajput', 'M', '1978-06-05', 9239777777, 'vikram_rajput@gmail.com', 'Lucknow', 'Hypertension', 'B+ve'),
(13, 'Meera', NULL, 'Iyer', 'F', '1990-11-21', 9239888888, 'meera_iyer@gmail.com', 'Ahmedabad', 'Thyroid', 'O+ve');

--
-- Triggers `patient_personal_info`
--
DELIMITER $$
CREATE TRIGGER `trigger4a` BEFORE DELETE ON `patient_personal_info` FOR EACH ROW begin
delete from Appointment where Appointment.Pat_ID=old.Pat_ID;
delete from In_Patients where In_Patients.Pat_ID=old.Pat_ID;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Room_ID` varchar(10) NOT NULL,
  `Room_Type` varchar(50) DEFAULT NULL,
  `Room_Charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Room_ID`, `Room_Type`, `Room_Charge`) VALUES
('room1', 'Twin-sharing', 2500),
('room10', 'OT2', 3500),
('room11', 'General Ward', 1000),
('room12', 'OT1', 3500),
('room13', 'Consultation-1', 0),
('room14', 'Consultation-2', 0),
('room15', 'Twin-sharing', 2500),
('room16', 'Deluxe', 5000),
('room17', 'OT2', 3500),
('room18', 'General Ward', 1000),
('room19', 'OT1', 3500),
('room2', 'Deluxe', 5000),
('room20', 'Consultation-1', 0),
('room3', 'OT2', 3500),
('room4', 'General Ward', 1000),
('room5', 'OT1', 3500),
('room6', 'Consultation-1', 0),
('room7', 'Consultation-2', 0),
('room8', 'Twin-sharing', 2500),
('room9', 'Deluxe', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` varchar(10) NOT NULL,
  `Staff_fname` varchar(50) NOT NULL,
  `Staff_mname` varchar(50) DEFAULT NULL,
  `Staff_lname` varchar(50) DEFAULT NULL,
  `Staff_gender` varchar(1) NOT NULL,
  `Staff_contactno` bigint(20) NOT NULL,
  `Staff_type` varchar(50) DEFAULT NULL,
  `Staff_roomassigned1` varchar(10) NOT NULL,
  `Staff_roomassigned2` varchar(10) DEFAULT NULL,
  `Staff_dutystarttime` time NOT NULL,
  `Staff_dutyendtime` time NOT NULL,
  `Staff_holiday` varchar(10) DEFAULT NULL,
  `Staff_DeptID` varchar(10) DEFAULT NULL,
  `Staff_Charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Staff_fname`, `Staff_mname`, `Staff_lname`, `Staff_gender`, `Staff_contactno`, `Staff_type`, `Staff_roomassigned1`, `Staff_roomassigned2`, `Staff_dutystarttime`, `Staff_dutyendtime`, `Staff_holiday`, `Staff_DeptID`, `Staff_Charge`) VALUES
('S1', 'Deep', NULL, NULL, 'M', 9341568535, 'wardboy', 'room4', NULL, '01:00:00', '08:00:00', 'Wednesday', 'Dept1', 500),
('S10', 'Arjun', NULL, 'Dixit', 'M', 3210987654, 'wardboy', 'room15', NULL, '12:00:00', '08:00:00', 'Sunday', 'Dept10', 700),
('S11', 'Zara', NULL, 'Iyer', 'F', 2109876543, 'assistant', 'room6', NULL, '11:00:00', '07:00:00', 'Monday', 'Dept4', 1100),
('S12', 'Vivaan', NULL, 'Khanna', 'M', 1098765432, 'doctor', 'room13', NULL, '09:30:00', '05:30:00', 'Saturday', 'Dept1', 1400),
('S13', 'Sanya', NULL, 'Verma', 'F', 9988776655, 'nurse', 'room10', 'room14', '08:00:00', '04:00:00', 'Thursday', 'Dept3', 950),
('S14', 'Vihaan', NULL, 'Shah', 'M', 8877665544, 'wardboy', 'room8', NULL, '02:00:00', '10:00:00', 'Wednesday', 'Dept6', 800),
('S15', 'Kaira', NULL, 'Mehra', 'F', 7766554433, 'assistant', 'room14', NULL, '10:30:00', '06:30:00', 'Tuesday', 'Dept9', 1300),
('S16', 'Arnav', NULL, 'Dutta', 'M', 6655443322, 'doctor', 'room10', NULL, '09:00:00', '05:00:00', 'Friday', 'Dept7', 1700),
('S17', 'Aditi', NULL, 'Chauhan', 'F', 5544332211, 'nurse', 'room4', 'room9', '08:30:00', '04:30:00', 'Sunday', 'Dept2', 900),
('S18', 'Reyansh', NULL, 'Nair', 'M', 4433221100, 'wardboy', 'room13', NULL, '12:00:00', '08:00:00', 'Monday', 'Dept8', 750),
('S19', 'Aaradhya', NULL, 'Mittal', 'F', 3322110099, 'assistant', 'room11', NULL, '11:00:00', '07:00:00', 'Thursday', 'Dept5', 1150),
('S2', 'Prakash', NULL, NULL, 'M', 9823416792, 'assistant', 'room5', NULL, '08:00:00', '01:00:00', 'Wednesday', 'Dept3', 1000),
('S20', 'Veer', NULL, 'Saxena', 'M', 2211009988, 'doctor', 'room6', NULL, '10:30:00', '06:30:00', 'Wednesday', 'Dept10', 1500),
('S3', 'Mamta', NULL, NULL, 'F', 9135968535, 'nurse', 'room1', 'room3', '09:00:00', '05:00:00', 'Sunday', 'Dept4', 500),
('S4', 'Aarav', NULL, 'Patel', 'M', 9876543210, 'doctor', 'room7', NULL, '09:00:00', '05:00:00', 'Saturday', 'Dept5', 1500),
('S5', 'Anaya', NULL, 'Sharma', 'F', 8765432109, 'nurse', 'room2', 'room5', '08:00:00', '04:00:00', 'Monday', 'Dept2', 800),
('S6', 'Kabir', NULL, 'Gupta', 'M', 7654321098, 'wardboy', 'room9', NULL, '01:00:00', '09:00:00', 'Thursday', 'Dept7', 600),
('S7', 'Myra', NULL, 'Singh', 'F', 6543210987, 'assistant', 'room12', NULL, '09:30:00', '05:30:00', 'Friday', 'Dept9', 1200),
('S8', 'Advait', NULL, 'Chopra', 'M', 5432109876, 'doctor', 'room11', NULL, '10:00:00', '06:00:00', 'Tuesday', 'Dept6', 1600),
('S9', 'Aisha', NULL, 'Rao', 'F', 4321098765, 'nurse', 'room3', 'room8', '08:30:00', '04:30:00', 'Wednesday', 'Dept8', 900);

--
-- Triggers `staff`
--
DELIMITER $$
CREATE TRIGGER `trigger5` BEFORE INSERT ON `staff` FOR EACH ROW BEGIN
DECLARE err_msg varchar(200);
if(new.Staff_dutystarttime = new.Staff_dutyendtime) THEN
set err_msg = 'Error: Duty start time cannot be same as Duty end time...';
signal sqlstate '45123' set message_text = err_msg;
end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(25, 'admin', '$2y$10$ekGbWeAx0NArqAukwideK.zefWoikBNRShQ2DhJ4GdSXtyk1Gxesa'),
(26, 'priyanshu', '$2y$10$2CyDCNNyLjGiRmkmPu3SuOaHs7rC3AAW8DNuVooHuxbOzPnBJFaIa'),
(0, 'username', '$2y$10$efO.dYYRLwu7oeKRwkn3GeEO8QwLVcO71UW4imYI69qpbN.2pKND2'),
(0, 'mohit', '$2y$10$wumakVtnXTqGYFYF9ysXte9AigN67nwVhYQjkjJ82CC9/S2OIoEyS');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `Visit_ID` varchar(10) NOT NULL,
  `App_ID` varchar(10) NOT NULL,
  `Pat_weight` int(11) NOT NULL,
  `Pat_height` varchar(20) NOT NULL,
  `Disease_name` varchar(50) DEFAULT NULL,
  `Visit_charge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`Visit_ID`, `App_ID`, `Pat_weight`, `Pat_height`, `Disease_name`, `Visit_charge`) VALUES
('Vis101', 'App102', 59, '5ft6inch', 'Cancer', 500),
('Vis102', 'App101', 69, '5ft9inch', 'Dengue', 800),
('Vis103', 'App104', 78, '5ft8inch', 'Malaria', 700),
('Vis104', 'App105', 60, '5ft1inch', 'Broken Arm', 800),
('Vis105', 'App106', 89, '4ft11inch', 'Cancer', 800),
('Vis106', 'App107', 65, '5ft5inch', 'Common Cold', 400),
('Vis107', 'App108', 70, '6ft2inch', 'Fever', 600),
('Vis108', 'App109', 62, '5ft7inch', 'Asthma', 500),
('Vis109', 'App110', 75, '5ft10inch', 'Diabetes', 700),
('Vis110', 'App111', 80, '5ft4inch', 'Headache', 600),
('Vis111', 'App112', 68, '5ft6inch', 'Stomach Pain', 500),
('Vis112', 'App113', 72, '5ft9inch', 'Flu', 600),
('Vis113', 'App114', 63, '5ft8inch', 'Allergy', 500),
('Vis114', 'App115', 77, '6ft1inch', 'Arthritis', 700),
('Vis115', 'App116', 71, '5ft3inch', 'Back Pain', 600);

--
-- Triggers `visit`
--
DELIMITER $$
CREATE TRIGGER `trigger4c` BEFORE DELETE ON `visit` FOR EACH ROW begin
delete from Treatment where Treatment.App_ID=old.App_ID and
Treatment.Visit_ID=old.Visit_ID;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`App_ID`),
  ADD KEY `Pat_ID` (`Pat_ID`),
  ADD KEY `Doc_ID` (`Doc_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_ID`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`Doc_ID`),
  ADD UNIQUE KEY `Doc_emailID` (`Doc_emailID`),
  ADD KEY `Doc_DeptID` (`Doc_DeptID`);

--
-- Indexes for table `in_patients`
--
ALTER TABLE `in_patients`
  ADD PRIMARY KEY (`Pat_ID`,`Addmission_Date_Time`),
  ADD KEY `Room_assigned` (`Room_assigned`),
  ADD KEY `OT_assigned` (`OT_assigned`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`Med_ID`);

--
-- Indexes for table `patient_personal_info`
--
ALTER TABLE `patient_personal_info`
  ADD PRIMARY KEY (`Pat_ID`),
  ADD UNIQUE KEY `Pat_emailID` (`Pat_emailID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`Room_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `Staff_DeptID` (`Staff_DeptID`),
  ADD KEY `Staff_roomassigned1` (`Staff_roomassigned1`),
  ADD KEY `Staff_roomassigned2` (`Staff_roomassigned2`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`Visit_ID`,`App_ID`),
  ADD KEY `App_ID` (`App_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`Pat_ID`) REFERENCES `patient_personal_info` (`Pat_ID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`Doc_ID`) REFERENCES `doctor_info` (`Doc_ID`);

--
-- Constraints for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD CONSTRAINT `doctor_info_ibfk_1` FOREIGN KEY (`Doc_DeptID`) REFERENCES `department` (`Dept_ID`);

--
-- Constraints for table `in_patients`
--
ALTER TABLE `in_patients`
  ADD CONSTRAINT `in_patients_ibfk_1` FOREIGN KEY (`Room_assigned`) REFERENCES `rooms` (`Room_ID`),
  ADD CONSTRAINT `in_patients_ibfk_2` FOREIGN KEY (`OT_assigned`) REFERENCES `rooms` (`Room_ID`),
  ADD CONSTRAINT `in_patients_ibfk_3` FOREIGN KEY (`Pat_ID`) REFERENCES `patient_personal_info` (`Pat_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Staff_DeptID`) REFERENCES `department` (`Dept_ID`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`Staff_roomassigned1`) REFERENCES `rooms` (`Room_ID`),
  ADD CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`Staff_roomassigned2`) REFERENCES `rooms` (`Room_ID`);

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`App_ID`) REFERENCES `appointment` (`App_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

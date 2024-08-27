-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.37 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for universityofvavuniya_db
DROP DATABASE IF EXISTS `universityofvavuniya_db`;
CREATE DATABASE IF NOT EXISTS `universityofvavuniya_db` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `universityofvavuniya_db`;

-- Dumping structure for table universityofvavuniya_db.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.admin: ~1 rows (approximately)
INSERT INTO `admin` (`id`, `user_id`, `password`, `name`) VALUES
	(1, 'Admin', '123456', 'Admin Name');

-- Dumping structure for table universityofvavuniya_db.attendance
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `mark` int NOT NULL DEFAULT '0',
  `student_reg_no` varchar(45) NOT NULL,
  `class_shedule_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attendance_student1_idx` (`student_reg_no`),
  KEY `fk_attendance_class_shedule1_idx` (`class_shedule_id`),
  CONSTRAINT `fk_attendance_class_shedule1` FOREIGN KEY (`class_shedule_id`) REFERENCES `class_shedule` (`id`),
  CONSTRAINT `fk_attendance_student1` FOREIGN KEY (`student_reg_no`) REFERENCES `student` (`reg_no`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.attendance: ~0 rows (approximately)
INSERT INTO `attendance` (`id`, `date`, `mark`, `student_reg_no`, `class_shedule_id`) VALUES
	(1, '2024-08-27', 1, '2019/ASP/10', 1),
	(2, '2024-08-27', 1, '2019/ASP/98', 1),
	(3, '2024-08-27', 1, '2019/PM/20', 4),
	(4, '2024-08-27', 1, '2019/IT/30', 3),
	(5, '2024-08-27', 1, '2019/ASP/10', 2),
	(6, '2024-08-27', 1, '2019/ASP/98', 2),
	(7, '2024-08-27', 1, '2019/ASP/10', 5),
	(8, '2024-08-27', 1, '2019/ASP/98', 5);

-- Dumping structure for table universityofvavuniya_db.class_shedule
DROP TABLE IF EXISTS `class_shedule`;
CREATE TABLE IF NOT EXISTS `class_shedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time_to` time NOT NULL,
  `time_from` time NOT NULL,
  `cource_has_subject_id` int NOT NULL,
  `hours` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_class_shedule_cource_has_subject1_idx` (`cource_has_subject_id`),
  CONSTRAINT `fk_class_shedule_cource_has_subject1` FOREIGN KEY (`cource_has_subject_id`) REFERENCES `cource_has_subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.class_shedule: ~0 rows (approximately)
INSERT INTO `class_shedule` (`id`, `date`, `time_to`, `time_from`, `cource_has_subject_id`, `hours`) VALUES
	(1, '2024-07-01', '10:00:00', '08:00:00', 1, 2),
	(2, '2024-07-02', '13:00:00', '11:06:00', 2, 2),
	(3, '2024-07-03', '10:00:00', '09:00:00', 4, 1),
	(4, '2024-07-04', '11:00:00', '10:00:00', 3, 1),
	(5, '2024-07-05', '10:00:00', '08:00:00', 5, 2);

-- Dumping structure for table universityofvavuniya_db.cource
DROP TABLE IF EXISTS `cource`;
CREATE TABLE IF NOT EXISTS `cource` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cid` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `credit` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.cource: ~5 rows (approximately)
INSERT INTO `cource` (`id`, `cid`, `name`, `credit`) VALUES
	(1, 'C001', 'Applied Mathematics and Computing', '90'),
	(2, 'C002', 'Computer Science', '90'),
	(3, 'C003', 'Environmental Science', '90'),
	(4, 'C004', 'Project Management', '90'),
	(5, 'C005', 'IT', '90');

-- Dumping structure for table universityofvavuniya_db.cource_has_subject
DROP TABLE IF EXISTS `cource_has_subject`;
CREATE TABLE IF NOT EXISTS `cource_has_subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(45) NOT NULL,
  `level_id` int NOT NULL,
  `faculty_has_department_id` int NOT NULL,
  `cource_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cource_has_subject_subject1_idx` (`subject_id`),
  KEY `fk_cource_has_subject_level1_idx` (`level_id`),
  KEY `fk_cource_has_subject_faculty_has_department1_idx` (`faculty_has_department_id`),
  KEY `fk_cource_has_subject_cource1_idx` (`cource_id`),
  CONSTRAINT `fk_cource_has_subject_cource1` FOREIGN KEY (`cource_id`) REFERENCES `cource` (`id`),
  CONSTRAINT `fk_cource_has_subject_faculty_has_department1` FOREIGN KEY (`faculty_has_department_id`) REFERENCES `faculty_has_department` (`id`),
  CONSTRAINT `fk_cource_has_subject_level1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  CONSTRAINT `fk_cource_has_subject_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.cource_has_subject: ~0 rows (approximately)
INSERT INTO `cource_has_subject` (`id`, `subject_id`, `level_id`, `faculty_has_department_id`, `cource_id`) VALUES
	(1, 'AMA3213', 6, 1, 1),
	(2, 'PMA3213', 6, 1, 1),
	(3, 'PM3213', 6, 3, 4),
	(4, 'IT3213', 6, 5, 5),
	(5, 'CSC3213', 6, 1, 1);

-- Dumping structure for table universityofvavuniya_db.department
DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.department: ~0 rows (approximately)
INSERT INTO `department` (`id`, `name`) VALUES
	('D01', 'Department of Physical Science'),
	('D02', 'Department of Bio Science'),
	('D03', 'Department of IT'),
	('D04', 'Department of Management'),
	('D05', 'Department of Business'),
	('D06', 'Department of Technology');

-- Dumping structure for table universityofvavuniya_db.faculty
DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.faculty: ~0 rows (approximately)
INSERT INTO `faculty` (`id`, `name`) VALUES
	('F01', 'Faculty of Applied Science'),
	('F02', 'Faculty of Business Studies'),
	('F03', 'Faculty of Technology');

-- Dumping structure for table universityofvavuniya_db.faculty_has_department
DROP TABLE IF EXISTS `faculty_has_department`;
CREATE TABLE IF NOT EXISTS `faculty_has_department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `faculty_id` varchar(45) NOT NULL,
  `department_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_faculty_has_department_department1_idx` (`department_id`),
  KEY `fk_faculty_has_department_faculty1_idx` (`faculty_id`),
  CONSTRAINT `fk_faculty_has_department_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  CONSTRAINT `fk_faculty_has_department_faculty1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.faculty_has_department: ~0 rows (approximately)
INSERT INTO `faculty_has_department` (`id`, `faculty_id`, `department_id`) VALUES
	(1, 'F01', 'D01'),
	(2, 'F01', 'D02'),
	(3, 'F02', 'D04'),
	(4, 'F02', 'D05'),
	(5, 'F03', 'D03'),
	(6, 'F03', 'D06');

-- Dumping structure for table universityofvavuniya_db.level
DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.level: ~0 rows (approximately)
INSERT INTO `level` (`id`, `level`) VALUES
	(1, '1st Year 1st Semester'),
	(2, '1st Year 2nd Semester'),
	(3, '2nd Year 1st Semester'),
	(4, '2nd Year 2nd Semester'),
	(5, '3rd Year 1st Semester'),
	(6, '3rd Year 2nd Semester'),
	(7, '4th Year 1st Semester'),
	(8, '4th Year 2nd Semester');

-- Dumping structure for table universityofvavuniya_db.student
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `reg_no` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `level_id` int NOT NULL,
  `faculty_has_department_id` int NOT NULL,
  PRIMARY KEY (`reg_no`),
  KEY `fk_student_level1_idx` (`level_id`),
  KEY `fk_student_faculty_has_department1_idx` (`faculty_has_department_id`),
  CONSTRAINT `fk_student_faculty_has_department1` FOREIGN KEY (`faculty_has_department_id`) REFERENCES `faculty_has_department` (`id`),
  CONSTRAINT `fk_student_level1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.student: ~4 rows (approximately)
INSERT INTO `student` (`reg_no`, `name`, `email`, `contact`, `password`, `address`, `level_id`, `faculty_has_department_id`) VALUES
	('2019/ASP/10', 'Nethmina Rathnayake', 'nethminak123@gmail.com', '0710466562', '123456', 'Vavuniya', 6, 1),
	('2019/ASP/98', 'Yasassri', 'Yasassri@gmail.com', '0712345678', '123456', 'Vavuniya', 6, 1),
	('2019/IT/30', 'John', 'john@gmail.com', '0710940147', '123123', 'Vavuniya', 4, 5),
	('2019/PM/20', 'Nayani', 'nayani@gmail.com', '0779180569', '121212', 'Vavuniya', 6, 3);

-- Dumping structure for table universityofvavuniya_db.subject
DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `subject_hours` int DEFAULT NULL,
  `subject_credit` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.subject: ~0 rows (approximately)
INSERT INTO `subject` (`id`, `name`, `subject_hours`, `subject_credit`) VALUES
	('AMA3213', 'Analytical Dynamics', 45, 3),
	('CSC3213', 'Computer Architecture', 45, 3),
	('IT3213', 'ICT', 45, 3),
	('PM3213', 'Project Design', 45, 3),
	('PMA3213', 'Complex Variables', 45, 3);

-- Dumping structure for table universityofvavuniya_db.teacher
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table universityofvavuniya_db.teacher: ~0 rows (approximately)
INSERT INTO `teacher` (`id`, `user_id`, `password`, `name`) VALUES
	(1, 'St001', '123456', 'Staff Name 1'),
	(2, 'St002', '123123', 'Staff Name 2');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

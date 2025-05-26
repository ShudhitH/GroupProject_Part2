-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 12:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `reference_number` varchar(50) DEFAULT NULL,
  `reports_to` varchar(255) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `essential_qualifications` text DEFAULT NULL,
  `preferred_qualifications` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `logo_images` text DEFAULT NULL,
  `apply_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `type`, `experience`, `salary`, `description`, `summary`, `reference_number`, `reports_to`, `responsibilities`, `essential_qualifications`, `preferred_qualifications`, `benefits`, `logo_images`, `apply_link`) VALUES
(1, 'Software Developer', 'Full time', '2-3 years experience', '75000$-85000$ a year', 'We\'re seeking a passionate Software Developer...', 'Position Reference Number: SD289\r\nPosition Title: Software Developer', 'SD289', 'The Operate Directors : Mr Duc Toan', 'Design, develop, and maintain software applications based on business requirements.\r\nCollaborate with team members to define, design, and implement new features.\r\nAssist in the optimization and performance tuning of software applications.', 'Bachelor\'s in CS, 3+ years experience, OOP, Git, etc.\r\nProficiency in programming languages such as Java, C#, Python, JavaScript, or similar.\r\nFamiliarity with front-end (HTML, CSS, JavaScript) and back-end (Node.js, ASP.NET, etc.) technologies.', 'Experience with cloud platforms (AWS, Azure, etc.).\r\nKnowledge of DevOps practices and CI/CD pipelines.', 'Competitive salary and benefits package.\r\nOpportunities for professional development and training.\r\nFlexible work arrangements and work-life balance.', 'Csharp.logo.png,js.icon.png,python.logo.png', 'apply.php'),
(3, 'Data Analyst', 'Part-time', '1+ year', '$50,000 - $65,000', 'We are looking for a detail-oriented Data Analyst to help interpret complex datasets and provide actionable insights to support our decision-making process.', 'Analyze, interpret, and present data to help drive strategic decisions.', 'DA203', 'Head of Analytics', 'Collect, process, and analyze large datasets to provide actionable insights and support business decision-making.\nDesign and develop reports, dashboards, and data visualizations to communicate findings clearly to stakeholders.\nWork collaboratively with different departments to identify trends, forecast outcomes, and streamline data-driven strategies.', 'Proficiency in SQL and experience working with relational databases.\nStrong analytical skills with expertise in Excel and data visualization tools such as Power BI or Tableau.\nBachelor’s degree in Data Science, Statistics, Computer Science, or a related field.', 'Experience with programming languages such as Python or R for data analysis.\nKnowledge of machine learning techniques and statistical modeling.\nFamiliarity with cloud platforms like AWS, Azure, or Google Cloud for data management.', 'Opportunities to work on cross-functional projects in a data-driven organization.\nAccess to advanced analytics tools, resources, and ongoing professional development.\nSupportive and inclusive workplace culture with comprehensive health coverage and wellness incentives.', 'Excel.logo.png,numpy.png', 'apply.php?job_id=3'),
(4, 'Cybersecurity Analyst', 'Full-Time', '3+ years in cybersecurity or related IT role', '$90,000 - $110,000', 'As a Cybersecurity Analyst, you will be responsible for monitoring, assessing, and defending the organization\'s digital infrastructure. You will work with IT and development teams to ensure security best practices are implemented and followed. This position is critical in detecting and responding to potential threats, maintaining security policies, and safeguarding sensitive data.', 'Responsible for the proactive identification, analysis, and resolution of security vulnerabilities and incidents across all systems and networks.', 'CYB2025', 'Chief Information Security Officer', 'Monitor networks for security breaches\nInvestigate incidents and document security breaches\nInstall and use software to protect sensitive information\nRecommend and implement security enhancements\nConduct penetration testing', 'Bachelor\'s degree in Cybersecurity, Computer Science, or related field\nStrong understanding of firewalls, VPN, IDS/IPS, and endpoint security\nExperience with SIEM and security monitoring tools', 'Certified Ethical Hacker (CEH) or CISSP certification\nKnowledge of cloud security principles (AWS, Azure)\nExperience with regulatory frameworks (GDPR, HIPAA)', 'Health and dental insurance\n401(k) with company match\nPaid certifications and ongoing training\nFlexible remote work options', 'cyber1.png,cyber2.png', 'apply.php?job=CYB2025'),
(5, 'Web Designer', 'Full-time', '2+ years', '$70,000 - $90,000', 'This job is this', 'Design and maintain websites ensuring strong optimization and functionality.', 'WD102', 'Lead Designer', 'Teesting 1', 'Testing 2', 'Testing 3', 'Testing 4', 'html.icon.png,figma.icon.png\r\n', 'apply.php?job_id=2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- MySQL dump 10.19  Distrib 10.3.30-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: rushilsh_qualifind
-- ------------------------------------------------------
-- Server version	10.3.30-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_email` varchar(200) NOT NULL,
  `a_mbno` varchar(200) NOT NULL,
  `a_password` varchar(200) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2022 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`a_id`, `a_email`, `a_mbno`, `a_password`, `a_name`) VALUES (2021,'qualifind@gmail.com','9876543210','admin','Qualifind admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_email` varchar(200) NOT NULL,
  `c_cmnt` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`c_id`, `c_email`, `c_cmnt`) VALUES (1,'ankit@gmail.com','hieeeenankjdnakjsnd'),(2,'parthgoti999@gmail.com','hihghjgj lgfdfgyiuj oiuytfc'),(3,'parthgoti999@gmail.com','124654103545120 hgkhhjnkjgv nytujyyfhgbn kntgv'),(4,'bansari@gmail.com','uytrdfghjip9867tfv mo[90897867rfp9876trfd'),(5,'jainsaku153@gmail.com','lkjuhygfdcvboic m;po8tredcvbko0987tyfv moi76trfc'),(6,'ankit@gmail.com','hello from here'),(7,'mjpatel1932000@gmail.com','very nice '),(8,'ankit@gmail.com','how are you????');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_apply`
--

DROP TABLE IF EXISTS `job_apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_apply` (
  `ja_id` int(11) NOT NULL AUTO_INCREMENT,
  `j_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `q_id` int(11) DEFAULT NULL,
  `q_result` varchar(200) NOT NULL DEFAULT 'NA',
  `ja_date` date NOT NULL,
  `ja_status` varchar(200) NOT NULL DEFAULT 'Submitted',
  `j_cmt` varchar(200) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`ja_id`),
  KEY `j_id` (`j_id`),
  KEY `s_id` (`s_id`),
  KEY `q_id` (`q_id`),
  CONSTRAINT `job_apply_ibfk_1` FOREIGN KEY (`j_id`) REFERENCES `job_details` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `job_apply_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `job_apply_ibfk_3` FOREIGN KEY (`q_id`) REFERENCES `quiz` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_apply`
--

LOCK TABLES `job_apply` WRITE;
/*!40000 ALTER TABLE `job_apply` DISABLE KEYS */;
INSERT INTO `job_apply` (`ja_id`, `j_id`, `s_id`, `q_id`, `q_result`, `ja_date`, `ja_status`, `j_cmt`) VALUES (21,25,19,1,'0','2021-07-14','Submitted','<p>hii</p>'),(36,36,31,NULL,'NA','2021-07-15','Submitted','NA'),(37,38,31,NULL,'NA','2021-07-15','Submitted','NA'),(38,26,31,NULL,'NA','2021-07-15','Submitted','NA'),(39,27,31,NULL,'NA','2021-07-15','Submitted','NA'),(40,37,31,NULL,'NA','2021-07-15','Submitted','NA'),(41,39,31,NULL,'NA','2021-07-15','Submitted','NA'),(42,40,31,NULL,'NA','2021-07-15','Submitted','NA'),(52,49,31,NULL,'NA','2021-07-17','Submitted','NA'),(53,50,31,NULL,'NA','2021-07-17','Submitted','NA'),(55,44,31,NULL,'NA','2021-07-17','selected','NA'),(56,45,31,NULL,'NA','2021-07-17','Submitted','NA'),(57,46,31,2,'4','2021-07-17','selected','NA'),(61,48,31,NULL,'NA','2021-07-17','selected','NA'),(62,25,31,1,'1','2021-07-17','Submitted','NA');
/*!40000 ALTER TABLE `job_apply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_details`
--

DROP TABLE IF EXISTS `job_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_details` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT,
  `j_title` varchar(200) NOT NULL,
  `j_desc` text NOT NULL,
  `j_req` text NOT NULL,
  `j_eduex` text NOT NULL,
  `j_deadline` varchar(200) NOT NULL,
  `j_loc` varchar(200) NOT NULL,
  `j_vacancy` varchar(200) NOT NULL,
  `j_type` varchar(200) NOT NULL,
  `j_cat` varchar(200) NOT NULL,
  `j_minsalary` double NOT NULL,
  `j_maxsalary` double NOT NULL,
  `j_postdate` date NOT NULL DEFAULT current_timestamp(),
  `j_status` tinyint(1) NOT NULL DEFAULT 1,
  `r_id` int(11) NOT NULL,
  PRIMARY KEY (`j_id`),
  KEY `job_details_ibfk_1` (`r_id`),
  CONSTRAINT `job_details_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `rc_details` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_details`
--

LOCK TABLES `job_details` WRITE;
/*!40000 ALTER TABLE `job_details` DISABLE KEYS */;
INSERT INTO `job_details` (`j_id`, `j_title`, `j_desc`, `j_req`, `j_eduex`, `j_deadline`, `j_loc`, `j_vacancy`, `j_type`, `j_cat`, `j_minsalary`, `j_maxsalary`, `j_postdate`, `j_status`, `r_id`) VALUES (24,'Photographer','<p>Photographers utilize their creativity and composition skills alongside their technical expertise to capture photographs that tell a story or document an event. The majority of today&rsquo;s photographers work with digital cameras and editing software to capture subjects in commercial-quality images. Some travel to a location to shoot an event or scenery while others have their own studios for portraits, commercial shoots or artistic work.</p>','<ul>\r\n	<li>Digital photography</li>\r\n	<li>Customer service</li>\r\n	<li>Videography</li>\r\n	<li>Adobe&nbsp;Photoshop&reg;</li>\r\n	<li>Video editing</li>\r\n	<li>Social media</li>\r\n</ul>','postgraduate','2021-07-31','Ahmedabad','45','Internship','DesignandCreative',10000,30000,'2021-07-11',0,2),(25,'Building Inspector','<p>We are looking for a professional Real Estate Agent to be an intermediary between sellers and buyers.&nbsp;</p>\r\n\r\n<p>Real Estate Agent responsibilities include marketing listings and providing guidance to buyers and sellers.</p>\r\n\r\n<p>This is a great opportunity for someone looking to grow their career in real estate.</p>','<ul>\r\n	<li>Providing guidance and assisting sellers and buyers in marketing and purchasing property for the right price under the best terms</li>\r\n	<li>Provide guidance and assist sellers and buyers in marketing and purchasing property for the right price under the best terms</li>\r\n	<li>\r\n	<p>Perform comparative market analysis to estimate properties&rsquo; value</p>\r\n	</li>\r\n	<li>\r\n	<p>Display and market real property to possible buyers</p>\r\n	</li>\r\n</ul>','undergraduate','2021-07-31','Mumbai','20','FullTime','RealEstate',10000,35000,'2021-07-11',1,4),(26,'Photographer','<p>Photographers utilize their creativity and composition skills alongside their technical expertise to capture photographs that tell a story or document an event. The majority of today&rsquo;s photographers work with digital cameras and editing software to capture subjects in commercial-quality images. Some travel to a location to shoot an event or scenery while others have their own studios for portraits, commercial shoots or artistic work.</p>','<ul>\r\n	<li>Digital photography</li>\r\n	<li>Customer service</li>\r\n	<li>Videography</li>\r\n	<li>Adobe&nbsp;Photoshop&reg;</li>\r\n	<li>Video editing</li>\r\n	<li>Social media</li>\r\n</ul>','12','2021-07-31','Pune','10','FullTime','DesignandCreative',0,20000,'2021-07-11',1,2),(27,'Multimedia artist & animator','<p>These professionals create animations and special effects for movies, television, video games and other forms of media&mdash;both two-dimensional and three-dimensional. They work with teams of animators and artists to bring ideas to life using computer software or by writing their own computer codes. Some work in studios or offices, but many are self-employed and work from home.</p>','<ul>\r\n	<li>Adobe&nbsp;Photoshop&reg;</li>\r\n	<li>Animation</li>\r\n	<li>Graphic design</li>\r\n	<li>Motion graphics</li>\r\n	<li>Adobe Aftereffects&reg;</li>\r\n	<li>3D modeling</li>\r\n</ul>','diploma','2021-07-25','Mumbai','20','PartTime','DesignandCreative',25000,30000,'2021-07-11',1,2),(28,'Web Designer & Developer','<p>Creative Design &amp; Multimedia Institute(CDMI) is a reputed training institute in Surat for web design, Game design,Mobile App Development, Game Development ,Video Editing &amp; All types of IT Courses with 7 years of full-fledged, result-oriented training experience. We stepped in the market in 2014 with the goal to help students, working professionals and other interested candidates get that dream job or open that desired freelance business in some of the most popular Computer / IT fields. Our aim is to ease the hiring process for businesses and organizations by providing work-ready professionals who can contribute greatly to their success. Since then, we have worked hard to achieve this goal and dedicated our time and resources to train students extensively.</p>','<ul>\r\n	<li>goot knowledge of web</li>\r\n	<li>working with multitasking</li>\r\n	<li>MERN/MEAN stack</li>\r\n</ul>','undergraduate','2021-07-30','Ahmedabad','10','FullTime','DesignandDevelopment',15000,30000,'2021-07-11',1,2),(29,'Commercial Broke','<p>Today, [Maruti Broker] is thriving in over 100 countries and territories, and it has everything to do with our people. We&rsquo;re looking for our next super-star real estate agent to join us as we continue helping people buy, sell, and rent with confidence. As our real estate agent, you&rsquo;ll hit the ground running with sales and marketing tools, online resources, and lead generation, so you have everything you need to succeed in this industry.</p>','<ul>\r\n	<li>Responsiveness</li>\r\n	<li>Honesty and integrity</li>\r\n	<li>Knowledge of purchase process</li>\r\n	<li>Communication skills</li>\r\n	<li>Negotiation skills</li>\r\n</ul>','postgraduate','2021-08-03','Banglore','15','FullTime','RealEstate',25000,40000,'2021-07-11',1,4),(30,'Web Content Writer','<p>Here at XYZ Inc., we are the leading company in our industry in the Capital City area. We&#39;re pleased to have a 3.8 Glassdoor rating from our employees. We are hiring an experienced Content Writer to help us keep growing. If you&#39;re dedicated and ambitious, XYZ Inc. is an excellent place to grow your career. Don&#39;t hesitate to apply.</p>','<ul>\r\n	<li>Produce well-researched content for publication online and in print</li>\r\n	<li>Organize writing schedules to complete drafts of content or finished projects within deadlines</li>\r\n	<li>Utilize industry best practices and familiarity with the organization&#39;s mission to inspire ideas and content</li>\r\n	<li>Communicate and cooperate with a writing team, including a content manager, editors, and web publishers</li>\r\n</ul>','postgraduate','2021-07-28','Mumbai','5','PartTime','ContentWriter',15000,25000,'2021-07-11',0,4),(31,'UI/UX Web Designer','<p>We have a job opening for an UI/UX Web Designer. We are looking for someone who loves to work in UI/UX Web Designing and want to join talented and perfect community team. The profile demands passion for UI/UX Web Design and community spirit. This is an exciting opportunity for Designer enthusiasts who believe that code is poetry. Experience with an understanding of the entire app development process, including design, development, and deployment is preferred. Role &amp; Responsibilities Work on web &amp; app designing products. Work on web &amp; app designing clients projects. Work includes coding, handling support-requests, app debugging and project documentation. Requirements A motivated self-starter with strong leadership skills Perfection and detailing to work is a must. Person with good knowledge of Designing Logo and Web Layouts Can create great working and fast loading XHTML / CSS pages Dynamic template designing Knowledge of Adobe.</p>','<ul>\r\n	<li>UI/UX designer with good experiance</li>\r\n	<li>adobe xd</li>\r\n	<li>figma</li>\r\n	<li>css and scss</li>\r\n</ul>','undergraduate','2021-07-30','Banglore','15','PartTime','DesignandDevelopment',0,20000,'2021-07-11',1,2),(32,'Web Content Writer','<p>Here at XYZ Inc., we are the leading company in our industry in the Capital City area. We&#39;re pleased to have a 3.8 Glassdoor rating from our employees. We are hiring an experienced Content Writer to help us keep growing. If you&#39;re dedicated and ambitious, XYZ Inc. is an excellent place to grow your career. Don&#39;t hesitate to apply.</p>','<ul>\r\n	<li>Produce well-researched content for publication online and in print</li>\r\n	<li>Organize writing schedules to complete drafts of content or finished projects within deadlines</li>\r\n	<li>Utilize industry best practices and familiarity with the organization&#39;s mission to inspire ideas and content</li>\r\n	<li>Communicate and cooperate with a writing team, including a content manager, editors, and web publishers</li>\r\n	<li>Follow an editorial calendar, collaborating with other members of the content production team to ensure timely delivery of materials</li>\r\n</ul>','postgraduate','2021-07-28','Mumbai','5','PartTime','ContentWriter',15000,25000,'2021-07-11',1,4),(33,'Team Lead/Consultant-Learning','<p>In today&#39;s business environment, growth isn&#39;t just about building value-it&#39;s fundamental to long-term business survival. So how do organizations sustain themselves? The key is a new operating model-one that&#39;s anchored around the customer and propelled by intelligence to deliver exceptional experiences across the enterprise at speed and at scale. You will deliver breakthrough business outcomes for clients-by harnessing talent, data and intelligence to revolutionize their operating models. Operations is one of four services that make up one Accenture -the others are Strategy and Consulting, Interactive and Technology. Visit us at www.accenture.com</p>','<ul>\r\n	<li>Skill required: Learning Experience Design &amp; Development&nbsp;</li>\r\n	<li>Learning Content Development Designation: Management Level</li>\r\n	<li>Team Lead/Consultant Job Location: Mumbai Qualifications:</li>\r\n	<li>Any Graduation Years of Experience: 7-11 years</li>\r\n</ul>','undergraduate','2021-08-01','Mumbai','25','Internship','DesignandDevelopment',25000,45000,'2021-07-11',1,2),(34,'Technical Writer','<p>T<strong>echnical Writers</strong>&nbsp;are responsible for prepare instruction manuals and articles with the main goal to communicate complex,&nbsp;<strong>technical</strong>&nbsp;information more easily. They also develop, gather, and disseminate&nbsp;<strong>technical</strong>&nbsp;information among customers, designers, and manufacturers.</p>','<ul>\r\n	<li>Proven working experience in&nbsp;<strong>technical writing</strong>&nbsp;of software documentation.</li>\r\n	<li>Ability to deliver high quality documentation paying attention to detail.</li>\r\n	<li>Ability to quickly grasp complex&nbsp;<strong>technical</strong>&nbsp;concepts and make them easily understandable in text and pictures.</li>\r\n	<li>Excellent written skills in English.</li>\r\n</ul>','undergraduate','2021-07-31','Baroda','45','PartTime','ContentWriter',10000,15000,'2021-07-11',1,4),(35,'Director of Real Estate ','<p>The Director of Real Estate Development will have bottom-line profit and loss responsibility for project conceptualization, planning, permitting, market and financial analysis, financing, retail leasing, interface with design and construction and successfully development or redevelop hotel real estate.</p>','<ul>\r\n	<li>Participate in the identification, feasibility analysis and negotiation of real estate acquisitions</li>\r\n	<li>&nbsp;Source and analyze the feasibility of potential development sites and evaluate associated development schemes. &bull;</li>\r\n	<li>Development planning for successful development of hotel projects, which would include extensive financial investment analysis, pro-forma modeling of new developments, opportunistic investment strategies and potential public participation&nbsp;</li>\r\n	<li>Source acquisition opportunities, conceptual planning</li>\r\n</ul>','undergraduate','2021-07-26','Ahmedabad','12','FullTime','RealEstate',25000,35000,'2021-07-11',1,4),(36,'Digital Marketing','<p><strong>Roles and Responsibilities</strong></p>\r\n\r\n<ul>\r\n	<li>Planning digital marketing campaigns, including web, SEO/SEM, email, social media and display advertising</li>\r\n	<li>Measuring and reporting on the performance of all digital marketing campaign</li>\r\n	<li>To develop, implement, track, optimize maintain our digital marketing campaigns/ presence across all digital channels.</li>\r\n	<li>Plan and execute all digital marketing, including SEO/SEM, marketing database, email, social media and display advertising campaigns</li>\r\n	<li>Design, build and maintain our social media presence</li>\r\n</ul>','<ul>\r\n	<li>Proven working experience of 5-7 years in the field of digital marketing</li>\r\n	<li>Demonstrable experience leading and managing SEO/SEM, marketing database, email, social media and/or display advertising campaigns</li>\r\n	<li>Highly creative with experience in identifying target audiences and devising digital campaigns that engage, inform and motivate</li>\r\n	<li>Experience in optimizing landing pages and user funnels</li>\r\n	<li>Solid knowledge of website analytics tools</li>\r\n	<li>Working knowledge of ad serving tools</li>\r\n</ul>','undergraduate','2021-07-23','Pune','7','FullTime','SalesandMarketing',20000,30000,'2021-07-11',1,1),(37,'Executive Sales & Marketing','<ul>\r\n	<li>He/She should have experience in sales.</li>\r\n	<li>Responsible for business development and marketing and sales of the projects.</li>\r\n	<li>Must have knowledge of English and computers.</li>\r\n	<li>As the Sales Executive, you will be responsible to implement all sales activities related to the new product and maximize the sales performance for the respective territory.</li>\r\n	<li>Produce Creative Content ,Ideas, strategies to Impress the customer and cover the marketFind the opportunities in the market and use it properly.</li>\r\n</ul>','<ul>\r\n	<li>This position will help the individual to increase the skills in manpower handling, negotiation on price, better understanding on sales, to handle potential territory in a supervisory roles as a Sales Executive Responsible to achieve sales target by closing deals.</li>\r\n	<li>Responsible for generating sales with existing customers and developing New Leads, Clients and Customers.</li>\r\n</ul>','diploma','2021-07-16','Banglore','5','PartTime','SalesandMarketing',10000,20000,'2021-07-11',1,1),(38,'Freshers For a Sales/Marketing','<ul>\r\n	<li>Marketing/Advertising &amp; Branding</li>\r\n	<li>Communicate with target customers &amp; manage customer relationships</li>\r\n	<li>Manage Business Finances &amp; Operations</li>\r\n	<li>Learn competitive Business Management and</li>\r\n	<li>Building/Managing team</li>\r\n</ul>','<ul>\r\n	<li>Candidates only from Ahmedabad can apply</li>\r\n	<li>Good communicator &amp; Rapport builder</li>\r\n	<li>Provide deliverables under set timelines.</li>\r\n	<li>Career Oriented</li>\r\n	<li>Freshers can Apply</li>\r\n	<li>Immediate Joining</li>\r\n</ul>','12','2021-07-13','Ahmedabad','15','Internship','SalesandMarketing',5000,9000,'2021-07-11',1,1),(39,'Business Development Manager ','<ul>\r\n	<li>Lead Generation via Email campaigns, Cold Calling and Social Media Marketing</li>\r\n	<li>Finding Guests for podcast and advertisers for digital magazine</li>\r\n	<li>Revenue generation through Ads</li>\r\n	<li>Very good English - writing &amp; verbal</li>\r\n	<li>Note : Part-time and full time or freelancers welcome and salary paid accordingly</li>\r\n</ul>','<ul>\r\n	<li>MBA, Mass &amp; Journalism, BBA, Any other Technical stream</li>\r\n	<li>Knack of marketing, content creation through Emails, Social media, messenger</li>\r\n	<li>Well versed with Microsoft office - Basic Excel, Word, Powerpoint must</li>\r\n	<li>Know-how of Graphic designing with free tools like canvas</li>\r\n	<li>Google chrome extensions knowledge</li>\r\n	<li>Zoom Meeting organising knowledge</li>\r\n</ul>','10','2021-07-21','Vadodara','30','PartTime','SalesandMarketing',20000,40000,'2021-07-11',1,1),(40,'App Development','<p>As an Application Developer, you will lead IBM into the future by translating system requirements into the design and development of customized systems in an agile environment. The success of IBM is in your hands as you transform vital business needs into code and drive innovation. Your work will power IBM and its clients globally, collaborating and integrating code into enterprise systems. You will have access to the latest education, tools and technology, and a limitless career path with the world s technology leader. Come to IBM and make a global impact!</p>','<ul>\r\n	<li>Proven knowledge of Android SDK, different versions of Android, and how to deal with different screen sizes</li>\r\n	<li>Familiarity with RESTful APIs to connect Android applications to back-end services</li>\r\n	<li>Proven knowledge of Android UI design principles, patterns, and best practices</li>\r\n	<li>Experience with offline storage, threading, and performance tuning</li>\r\n	<li>Ability to design applications around natural user interfaces, such as touch</li>\r\n</ul>','undergraduate','2021-07-23','Ahmedabad','4','FullTime','MobileApplication',40000,60000,'2021-07-11',1,1),(41,'Trainee Mobile Application Developer','<ul>\r\n	<li>Must be capable to conversate to gather specs and handle end to end delivery &amp; Proficient in English.</li>\r\n	<li>You are a self-starter, have an earnest and persistent interest in hard technical challenges, and get excited about using new tools and implementing cutting edge standards.</li>\r\n	<li>We are looking for an Android &amp; iOS developer responsible for the development and maintenance of applications.</li>\r\n	<li>Experience with iOS frameworks such as Core Data, Core Animation, etc.</li>\r\n	<li>Work closely with the Team to design and development of the app.</li>\r\n</ul>','<ul>\r\n	<li>Should be quick learner of existing app or platform.</li>\r\n	<li>You should be able to Code, test, debug and implement complex software applications according to standards and guidelines.</li>\r\n	<li>Android Studio/Ios Development, Mobile Application Development, Cocoa Framework, Android SDK, Android Development, Mobile Application Developer.</li>\r\n	<li>Candidate should know overall Android Architecture, Lifecycle, APIs and Framework.</li>\r\n</ul>','diploma','2021-07-23','Mumbai','6','Internship','MobileApplication',20000,30000,'2021-07-11',0,1),(42,'Android/IOS App Developer','<ul>\r\n	<li>You will Design, develop and support SAP Composite Applications in SAP SUP (Sybase Unwired Platform), Sybase Afaria and Syclo s Agentry Mobile Platform.</li>\r\n	<li>Assist clients in selection and implementation of mobility products.</li>\r\n</ul>','<ul>\r\n	<li>Knowledge and experience on SAP Workflow</li>\r\n	<li>Advance ABAP BADI (Business Add-In)</li>\r\n	<li>Intermediate Document Extensions</li>\r\n	<li>ABAP Objects</li>\r\n	<li>Business Application Programming Interface</li>\r\n	<li>XI (Exchange Infrastructure)</li>\r\n</ul>','postgraduate','2021-07-31','Baroda','10','FullTime','MobileApplication',80000,90000,'2021-07-11',1,1),(43,'UI/UX Designer ','<p>Technoworld is looking for a&nbsp;UI/UX Designer .who can easily perform following duties:</p>\r\n\r\n<p>1. Ability to take the concepts of the product with domain knowledge and design the Product interface<br />\r\n2. Create creative ideas as appropriate to improve usability<br />\r\n3. Be able to understand domain knowledge</p>','<ul>\r\n	<li>Fresher/ Experience (6 months atleast )</li>\r\n	<li>UG in IT, computer</li>\r\n	<li>Portfolio of design projects</li>\r\n	<li>Knowledge of wireframe tools (e.g. Wireframe.cc and InVision)</li>\r\n	<li>Up-to-date knowledge of design software like Figma Adobe XD and Photoshop.</li>\r\n	<li>Identify and troubleshoot UX problems (e.g. responsiveness)</li>\r\n</ul>','undergraduate','2021-07-31','Ahmedabad','3','FullTime','InformationTechnology',40000,60000,'2021-07-14',0,3),(44,'Backend Developer','<ul>\r\n	<li>Understanding client requirements and functional specifications.</li>\r\n	<li>Should be able to understand and handle tasks independently.</li>\r\n	<li>Ability to work to deadlines &amp; as a team member.</li>\r\n	<li>Develop Node.js applications.</li>\r\n	<li>Develop Node.js Web APIs.</li>\r\n	<li>Scaling and optimizing Node.js applications.</li>\r\n	<li>Participate in sprint and design meetings.</li>\r\n	<li>Work with other developers to integrate front-end components and other backend APIs to improve existing system.</li>\r\n	<li>Create necessary documentation.</li>\r\n	<li>Work with code repository like GitHub to manage source code.</li>\r\n</ul>','<ul>\r\n	<li>Strong Knowledge on JavaScript.</li>\r\n	<li>Must have good knowledge of Object-Oriented JavaScript, ES6, or Typescript.</li>\r\n	<li>Strong understanding of Node.js</li>\r\n	<li>REST API, CRUD paradigm, JSON, XML, MVC.</li>\r\n	<li>Good Knowledge on GraphQL.</li>\r\n	<li>SQL/RDBMS (PostgreSQL) querying, stored procedures, indexes, etc.</li>\r\n	<li>Workings of Node.js and asynchronous programming</li>\r\n</ul>','undergraduate','2021-08-03','Banglore','10','FullTime','InformationTechnology',50000,70000,'2021-07-14',1,3),(45,'UI/UX Designer','<p>&nbsp;</p>\r\n\r\n<p><strong>We are looking for a UI/UX Designer to turn our software into easy-to-use products for our clients. UI/UX Designer responsibilities include gathering user requirements, designing graphic elements, and building navigation components.</strong></p>\r\n\r\n<p><strong>To be successful in this role, you should have experience with design software, wireframe, and Prototyping Tools. If you also have a portfolio of professional design projects that includes work with web/mobile applications, wed like to meet you</strong></p>','<ul>\r\n	<li>Knowledge of wireframe tools (e.g. Wireframe.cc and InVision)</li>\r\n	<li>Up-to-date knowledge of design software like Figma Adobe XD and Photoshop.</li>\r\n	<li>Identify and troubleshoot UX problems (e.g. responsiveness)</li>\r\n	<li>Adhere to style standards on fonts, colors, and images</li>\r\n</ul>','undergraduate','2021-07-30','Ahmedabad','9','FullTime','InformationTechnology',40000,55000,'2021-07-14',1,3),(46,'full stack developer','<ul>\r\n	<li>Participates in all phases of the product development lifecycle, including the analysis, design, test, and integration of products.</li>\r\n	<li>Strong writing and communication skills</li>\r\n	<li>Ability to work in an Agile /SCRUM environment</li>\r\n	<li>Well organized with a bias for action with minimal direction</li>\r\n</ul>','<ul>\r\n	<li>Software Developer who comes with at least 5 years industry experience</li>\r\n	<li>Must have 3+ years of hands-on experience with Node JS</li>\r\n	<li>Must have 1+ years of experience in serverless with Node JS</li>\r\n	<li>Experience in developing RESTful APIs</li>\r\n	<li>Experience with DB Design</li>\r\n	<li>Good understanding of SQL and No SQL</li>\r\n	<li>Basic knowledge in AWS, CICD with Circle CI</li>\r\n	<li>Well versed with ES6+ concepts and having hands-on knowledge of TypeScript</li>\r\n	<li>Take end-to-end ownership of development</li>\r\n</ul>','undergraduate','2021-08-07','Mumbai','8','FullTime','InformationTechnology',150000,200000,'2021-07-14',1,3),(47,'Technical Support Engineer','<ul>\r\n	<li>TSE will be responsible to provide chat and voice support to our international clients in US, Canada and UK.</li>\r\n	<li>TSEs should have the ability to handle multiple chats simultaneously.</li>\r\n	<li>Responsible to provide timely and effective resolutions to our clients on basic to complex technical support queries via chat and calls</li>\r\n	<li>Responsible for responding to customers in an efficient and professional manner</li>\r\n	<li>Handles and resolves technical queries; identifies and escalates accordingly</li>\r\n	<li>Meets expectations regarding productivity as defined by the process or manager</li>\r\n	<li>Escalates necessary cases to the right level within the defined LOB (Line Of Business)</li>\r\n	<li>Ensures compliance with all company and departmental policies, procedures, and Guidelines</li>\r\n</ul>','<ul>\r\n	<li>Excellent communication skills in English (both spoken and written)</li>\r\n	<li>Basic to advanced knowledge of computers (software)</li>\r\n	<li>Working knowledge of internet and networking</li>\r\n	<li>Typing speed - minimum 35 wpm with 100% accuracy</li>\r\n	<li>Attention to detail is a must along with accuracy in the chats</li>\r\n	<li>Ability to follow instructions as directed</li>\r\n	<li>Willingness to work in 24 x 7 work environment</li>\r\n	<li>Desired Skills:</li>\r\n	<li>Self-motivated with excellent interpersonal skills</li>\r\n	<li>Innovative and self-starter</li>\r\n	<li>Ability to work with minimum supervision</li>\r\n	<li>Detail and analytical orientation</li>\r\n	<li>Problem solving and conflict resolution skills</li>\r\n	<li>Demonstrated ability to work in a fast paced environment</li>\r\n</ul>','undergraduate','2021-07-24','Delhi','7','FullTime','InformationTechnology',90000,130000,'2021-07-14',1,3),(48,'Blockchain Developer','<p>Candidte&#39;s day to day responsibilites are:</p>\r\n\r\n<ul>\r\n	<li>Write and maintain blockchain smart contracts</li>\r\n	<li>&nbsp;Write end-to-end tests and block/unit tests for all blockchain codebases</li>\r\n	<li>&nbsp;Integrate smart contracts with our nodejs backend</li>\r\n	<li>&nbsp;Be on top the latest developments in Ethereum, Solidity and other cutting edge blockchain technologies</li>\r\n	<li>Work with internationally acclaimed 3rd party smart contract auditing services</li>\r\n</ul>','<ul>\r\n	<li>Solid understanding of and experience in BlockChain Development preferred&nbsp;</li>\r\n	<li>Blockchain application development experience on platforms such as Ethereum, Hyperledger, BigchainDb, Multi-Chain.&nbsp;&nbsp;</li>\r\n	<li>Experience in solution building on Blockchain technology.&nbsp;&nbsp;</li>\r\n	<li>Experience on development tools such as Geth, Hyperledger Fabric/Sawtooth, Composer, Solidity Remix Functional&nbsp;&nbsp;</li>\r\n	<li>Basic understanding of Web applications architecture and protocols.&nbsp;</li>\r\n	<li>Any additional expertise with Python, containerization (Docker) and additional Cloud exposure also a huge plus</li>\r\n	<li>Any previous integration expertise, Strong in Agile, Banking or Financial Service development expertise, as well as software development in a large Enterprise environment, also required Security Architecture / Cryptography</li>\r\n	<li>Front-end development experience in HTML, CSS, JavaScript, ES6/TypeScript Angular, Node.js, ReactJS .&nbsp;</li>\r\n</ul>','undergraduate','2021-07-29','Pune','10','Internship','InformationTechnology',50000,60000,'2021-07-14',1,3),(49,'Quality Engineer - Civil ','<p>&nbsp;</p>\r\n\r\n<p>Executes the specific inspection on material equipment &amp; construction installation activities on site<br />\r\nCheck the preparation of foundation<br />\r\nCheck sub-grade dry density<br />\r\nCheck after concrete puring<br />\r\nOrderly collect check &amp; manage document certifying test</p>','<ul>\r\n	<li>Must be in 4th year of UG or completed UG</li>\r\n	<li>Must have the knowledge of CAD/CAM</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>','undergraduate','2021-08-05','Ahmedabad','2','Internship','Construction',20000,30000,'2021-07-15',1,3),(50,'Project Head - Civil ','<ul>\r\n	<li>Handling Industrial Projects , Project/Site management</li>\r\n	<li>Fire &amp; Safety, Power &amp; Water supply department etc. Planning,Project Management, Contracts Administration &amp; Management</li>\r\n	<li>Site &amp; Construction</li>\r\n	<li>Monitoring project budgets<br />\r\n	&nbsp;</li>\r\n</ul>','<ul>\r\n	<li>Must have an experience of 5+ years&nbsp;</li>\r\n	<li>Must have completed atleast UG in Civil Engineering&nbsp;</li>\r\n	<li>Must have good communication skills&nbsp;</li>\r\n</ul>','undergraduate','2021-08-10','Pune','1','FullTime','Construction',150000,200000,'2021-07-15',1,3),(51,'Quantity Surveyor / Billing Engineer','<p>We are seeking an experienced quantity surveyor / billing engineer (civil) to be part of our Project Management team who :</p>\r\n\r\n<ul>\r\n	<li>Should be able to prepare rate analysis for civil construction items as per CPWD/DSR format.</li>\r\n	<li>Should be experienced in preparing, checking and certifying civil construction running and final bills.</li>\r\n	<li>Should be experienced with reconciliation of cement, steel and other free supply material.</li>\r\n	<li>Should be able to take off accurate quantities from construction / GFC drawings.</li>\r\n	<li>Should have strong knowledge of various thumb rules and ratios for civil construction items such as cement consumption, reinforcement consumption, etc.</li>\r\n	<li>Having resourcefulness and contacts with suppliers, vendors and contractors of various civil construction trade items will be of an added advantage.</li>\r\n	<li>Should be highly meticulous and thorough in his/her work.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>','<ul>\r\n	<li>Candidate should have a minimum of 7 to 8 years of quantity surveying experience in civil contracting (construction company) or consultancy organisations.</li>\r\n	<li>Should have a thorough theoretical and practical/field knowledge of civil construction activities like RCC work, road and infrastructure work, building work, structural steel work, architectural and finishing items, plumbing and sanitary items, aluminium section work, etc.</li>\r\n	<li>Should be able to work with various design disciplines like structural engineers, architects, etc. and should be able to independently prepare an accurate quantity takeoff (BOQ bill of quantities). Quantity take-off must be supported by measurement sheets and hand sketches.</li>\r\n	<li>Should be proficient in spreadsheet / Microsoft excel functions. Should have a good proficiency in reviewing and taking measurements/dimensions from AutoCAD drawing files.</li>\r\n	<li>Should have a degree in Civil Engineering</li>\r\n</ul>','undergraduate','2021-07-25','Mumbai','1','FullTime','Construction',130000,150000,'2021-07-15',1,3),(52,'Appraiser','<p>We are looking for a diligent Real Estate Appraiser to produce credible and viable results for clients and other intended users. You will be responsible for aggregating, analysing, interpreting and reporting on appraisal data.</p>','<ul>\r\n	<li>Conduct formal appraisals of real property or land before it is sold, mortgaged, taxed, insured, or developed</li>\r\n	<li>Evaluate properties to establish market values and property ratings using internal and external sources</li>\r\n	<li>Make on site visits, inspect property and interview clients</li>\r\n	<li>Examine all variables that impact property&rsquo;s present or future value (comparable home sales, previous sales records, future developments etc)</li>\r\n	<li>Prepare reports that fully explain assessment results and outline methods used</li>\r\n</ul>','postgraduate','2021-07-30','Pune','30','FullTime','RealEstate',35000,55000,'2021-07-15',1,4);
/*!40000 ALTER TABLE `job_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_round`
--

DROP TABLE IF EXISTS `job_round`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_round` (
  `jr_id` int(11) NOT NULL AUTO_INCREMENT,
  `j_id` int(11) NOT NULL,
  `r_num` int(11) NOT NULL,
  `r_title` varchar(200) NOT NULL,
  PRIMARY KEY (`jr_id`),
  KEY `j_id` (`j_id`),
  CONSTRAINT `j_id` FOREIGN KEY (`j_id`) REFERENCES `job_details` (`j_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_round`
--

LOCK TABLES `job_round` WRITE;
/*!40000 ALTER TABLE `job_round` DISABLE KEYS */;
INSERT INTO `job_round` (`jr_id`, `j_id`, `r_num`, `r_title`) VALUES (1,44,1,'tech 1'),(2,44,2,'tech 2'),(4,25,1,'Technical-1'),(5,25,2,'HR '),(6,44,3,'HR round 2'),(7,46,1,'Round 1'),(8,46,2,'Final Round');
/*!40000 ALTER TABLE `job_round` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_saved`
--

DROP TABLE IF EXISTS `job_saved`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_saved` (
  `js_id` int(11) NOT NULL AUTO_INCREMENT,
  `j_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`js_id`),
  KEY `j_id` (`j_id`),
  KEY `s_id` (`s_id`),
  CONSTRAINT `job_saved_ibfk_1` FOREIGN KEY (`j_id`) REFERENCES `job_details` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `job_saved_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_saved`
--

LOCK TABLES `job_saved` WRITE;
/*!40000 ALTER TABLE `job_saved` DISABLE KEYS */;
INSERT INTO `job_saved` (`js_id`, `j_id`, `s_id`) VALUES (70,42,31);
/*!40000 ALTER TABLE `job_saved` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_skill`
--

DROP TABLE IF EXISTS `job_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_skill` (
  `jsk_id` int(11) NOT NULL AUTO_INCREMENT,
  `sk_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  PRIMARY KEY (`jsk_id`),
  KEY `job_skill_ibfk_1` (`sk_id`),
  KEY `job_skill_ibfk_2` (`j_id`),
  CONSTRAINT `job_skill_ibfk_1` FOREIGN KEY (`sk_id`) REFERENCES `skill` (`sk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `job_skill_ibfk_2` FOREIGN KEY (`j_id`) REFERENCES `job_details` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_skill`
--

LOCK TABLES `job_skill` WRITE;
/*!40000 ALTER TABLE `job_skill` DISABLE KEYS */;
INSERT INTO `job_skill` (`jsk_id`, `sk_id`, `j_id`) VALUES (22,31,25),(23,26,25),(24,22,26),(25,20,26),(26,22,27),(27,19,27),(28,12,28),(29,2,28),(30,24,28),(31,22,29),(32,34,29),(33,19,30),(34,21,31),(35,19,32),(36,28,33),(37,19,34),(38,34,34),(39,30,35),(40,23,35),(41,31,36),(42,33,36),(43,21,37),(44,19,38),(45,33,39),(46,28,40),(47,28,42),(48,29,42),(49,25,42),(50,8,44),(51,7,44),(52,3,44),(53,6,44),(54,10,44),(55,9,44),(56,22,45),(57,21,45),(58,6,46),(60,10,46),(61,9,46),(62,7,46),(63,8,46),(64,2,46),(65,1,46),(66,19,47),(67,34,48),(68,7,48),(69,9,48),(70,35,48),(71,31,52),(72,34,52),(73,19,52),(74,16,52);
/*!40000 ALTER TABLE `job_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES (2,114815720,291695862,'hello'),(3,114815720,291695862,'hello '),(4,114815720,291695862,'would you like to join us'),(5,291695862,114815720,'where are you from'),(6,114815720,291695862,'im from google and tech'),(7,291695862,114815720,'great'),(8,229324176,593967619,'hey there'),(9,229324176,593967619,'im ankit'),(10,593967619,229324176,'Hii'),(11,229324176,593967619,'great'),(12,229324176,593967619,'thanks'),(13,593967619,229324176,'Welcome'),(14,678552075,593967619,'Hello parth '),(15,678552075,593967619,'ðŸ˜…ðŸ˜…ðŸ˜…'),(16,593967619,678552075,'Hello'),(17,678552075,593967619,'Mene nayi company start ki hai'),(18,678552075,593967619,'Google'),(19,678552075,593967619,'Join karega'),(20,678552075,593967619,'???? '),(21,593967619,678552075,'Yes Sir !'),(22,678552075,593967619,'Sahi hai'),(23,678552075,593967619,'Chat matlab '),(24,678552075,593967619,'Chat matlab '),(25,593967619,678552075,'Are jorr bhai'),(26,678552075,593967619,'Niche ja rahi hai na'),(27,593967619,678552075,'ha '),(28,678552075,593967619,'Scroll down and top'),(29,678552075,593967619,'Great'),(30,593967619,678552075,'yes'),(31,114815720,593967619,'Heyaa'),(32,593967619,114815720,'Hey'),(33,593967619,114815720,'Online to tha'),(34,868666573,114815724,'hello'),(35,114815724,868666573,'hello'),(36,868666573,114815724,'how arev  v u ?'),(37,114815724,868666573,'helllo brother'),(38,114815724,868666573,'helllo brother'),(39,114815724,868666573,'kese ho'),(40,868666573,114815724,'600ea35c-02b7-4fb2-b4ce-b83d6a3af434'),(41,868666573,114815724,'join for meeting'),(42,868666573,114815724,'600ea35c-02b7-4fb2-b4ce-b83d6a3af434'),(43,868666573,114815724,'600ea35c-02b7-4fb2-b4ce-b83d6a3af434'),(44,114815724,868666573,'hello  hello  how arev v u ?  helllo brother  helllo brother  kese ho  600ea35c-02b7-4fb2-b4ce-b83d6a3af434  join for meeting  600ea35c-02b7-4fb2-b4ce-b83d6a3af434  600ea35c-02b7-4fb2-b4ce-b83d6a3af434'),(45,868666573,114815724,'600ea35c-02b7-4fb2-b4ce-b83d6a3af434'),(46,868666573,114815724,'hi'),(47,868666573,114815724,'hii'),(48,114815724,868666573,'hello'),(49,868666573,114815724,'b852101c-30db-4ffa-af27-238b7c684d4c'),(50,868666573,114815724,'hello ..................'),(51,114815724,868666573,'hello '),(52,114815724,868666573,'great'),(53,868666573,114815724,'no'),(54,114815724,868666573,'lo'),(55,114815724,868666573,'..'),(56,868666573,114815724,'still d is showing'),(57,640548291,114815724,'hii'),(58,114815724,640548291,'hello'),(59,114815724,640548291,'im ankit'),(60,640548291,114815724,'ok'),(70,723783840,114815723,'7de61eeb-b360-402e-ab70-8b941fa41bcc');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `q_id` int(11) NOT NULL,
  `q_title` varchar(200) NOT NULL,
  `q_total` varchar(200) NOT NULL,
  `q_date` date NOT NULL,
  `j_id` int(11) NOT NULL,
  PRIMARY KEY (`q_id`),
  KEY `quiz_ibfk_1` (`j_id`),
  CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`j_id`) REFERENCES `job_details` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` (`q_id`, `q_title`, `q_total`, `q_date`, `j_id`) VALUES (1,'Building Inspector Quiz','6','2021-07-11',25),(2,'Full Stack Developer','10','2021-07-15',46);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_question`
--

DROP TABLE IF EXISTS `quiz_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_question` (
  `qu_id` int(11) NOT NULL AUTO_INCREMENT,
  `qu_sn` varchar(200) NOT NULL,
  `qu_que` text NOT NULL,
  `qu_opta` text NOT NULL,
  `qu_optb` text NOT NULL,
  `qu_optc` text NOT NULL,
  `qu_optd` text NOT NULL,
  `qu_ans` varchar(200) NOT NULL,
  `q_id` int(11) NOT NULL,
  PRIMARY KEY (`qu_id`),
  KEY `quiz_question_ibfk_1` (`q_id`),
  CONSTRAINT `quiz_question_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `quiz` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_question`
--

LOCK TABLES `quiz_question` WRITE;
/*!40000 ALTER TABLE `quiz_question` DISABLE KEYS */;
INSERT INTO `quiz_question` (`qu_id`, `qu_sn`, `qu_que`, `qu_opta`, `qu_optb`, `qu_optc`, `qu_optd`, `qu_ans`, `q_id`) VALUES (1,'1','Which of the following best describes you?','Measure twice; cut once','YOLO(you only live once)','Both','None of this','2',1),(2,'2','Which of the following would you be most likely to say?','Winning isnâ€™t everything; itâ€™s the only thing','Thereâ€™s no â€œyouâ€ in team','Thereâ€™s no â€œiâ€ in team','All of this','4',1),(3,'3','Which of the following statement is (are) false',' VA loans are insured loans','  Both A and B','FHA loans are guaranteed loans','None of the above','1',1),(4,'4','A second mortgage is','  A lien on real estate that has a prior mortgage on it','  A lien on real estate that has a prior mortgage on it','Always made by the seller','Smaller in amount than a first mortgage','1',1),(5,'5','A large final payment on a mortgage loan is?','  An escalator','A balloon','An amortization','  A package','3',1),(6,'6','A mortgaged property can be ?','  Sold without the consent of the mortgagee','  Conveyed by the grantors making a deed to the grantee','  Both A and B','None','1',1),(7,'1','What is RESTful?','API','Website','Programming language','markup language','1',2),(8,'2','PHP runs on','own device','client side','browser','server side','4',2),(9,'3','What does LAMP stack stands for?','Linux, Apache, MongoDB, PHP','Linux, Apache, Mysql, PHP','Linux, Apache, Mysql, Perl','Linux, Apache, MERN, PHP','2',2),(10,'4','MERN stack is the group of which technologies','Java','PHP','Javascript','Perl','3',2),(11,'5','Which is the world largest software registery library?','npm','dpm','lct','ovm','1',2),(12,'6','What allows JavaScript to run without a browser?','Angular.js','AJAX','Node.js','JQuery','3',2),(13,'7','What is the interactive shell for MongoDB called?\r\n','mongodb','dbmongo','mongo','none','3',2),(14,'8','which stores are used to store info about networks, such as social connection','key value','graph','wide column','document','2',2),(15,'9','Which version of PHP introduced the concept called late static binding?','PHP 5.1','PHP 5','PHP 4','PHP 5.3','4',2),(16,'10',' The main purpose of a â€œLive Wireâ€ in NetScape is to','Create linkage between client side and server side','Permit server side, JavaScript code, to connect to RDBMS',' Support only non relational database',' To interpret JavaScript code','2',2),(17,'10','Which attribute is used to specify that the script is executed when the page has finished parsing? (only for external scripts)','parse','async','defer','type','3',2);
/*!40000 ALTER TABLE `quiz_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rc_details`
--

DROP TABLE IF EXISTS `rc_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rc_details` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(200) NOT NULL,
  `r_email` varchar(200) NOT NULL,
  `r_password` varchar(200) NOT NULL,
  `r_mobno` varchar(200) NOT NULL,
  `r_wpno` varchar(200) NOT NULL,
  `r_cemail` varchar(200) DEFAULT NULL,
  `r_cname` varchar(200) DEFAULT NULL,
  `r_cdesc` text DEFAULT NULL,
  `r_cwblink` varchar(200) DEFAULT NULL,
  `r_img` text DEFAULT 'default.png',
  `unique_id` int(255) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  UNIQUE KEY `r_wpno` (`r_wpno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rc_details`
--

LOCK TABLES `rc_details` WRITE;
/*!40000 ALTER TABLE `rc_details` DISABLE KEYS */;
INSERT INTO `rc_details` (`r_id`, `r_name`, `r_email`, `r_password`, `r_mobno`, `r_wpno`, `r_cemail`, `r_cname`, `r_cdesc`, `r_cwblink`, `r_img`, `unique_id`, `status`) VALUES (1,'Sakshi Jain','jainsaku153@gmail.com','abcd','200170116504','200170116504',NULL,NULL,NULL,NULL,'1626350602_profile.png',114815721,'Offline now'),(2,'Ankit Chotaliya','chotaliyaankit31@gmail.com','abcd','190170116010','190170116010',NULL,NULL,NULL,NULL,'1626371165_programmer.png',114815722,'Offline now'),(3,'Bansari Thakkar','bansari.thakkar10@gmail.com','abcd','200170116506','200170116506','thakkarbansari2001@gmail.com','Technoworld Pvt Ltd','Technoworld Pvt Ltd is one of the leading pioneer company of Gujarat which provides various IT solutions and going to kickstart into  the construction bussiness now.',NULL,'default.png',114815723,'Offline now'),(4,'Parth ','parthgoti999@gmail.com','abcd','190170116017','190170116017','abc@gmail.com','Google','Google\'s generation of page titles and descriptions (or \"snippets\") is completely automated and takes into account both the content of a page as well as references to it that appear on the web.','https://www.google.co.in/','default.png',114815724,'Offline now');
/*!40000 ALTER TABLE `rc_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_star` int(11) NOT NULL,
  `review_cmt` varchar(200) NOT NULL,
  `r_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `r_id` (`r_id`),
  KEY `s_id` (`s_id`),
  CONSTRAINT `r_id` FOREIGN KEY (`r_id`) REFERENCES `rc_details` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `s_id` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `round_apply`
--

DROP TABLE IF EXISTS `round_apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `round_apply` (
  `ra_id` int(11) NOT NULL AUTO_INCREMENT,
  `jr_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `s_status` int(11) NOT NULL,
  `r_num` int(11) NOT NULL,
  PRIMARY KEY (`ra_id`),
  KEY `j_id` (`j_id`),
  KEY `s_id` (`s_id`),
  KEY `jr_id` (`jr_id`),
  CONSTRAINT `round_apply_ibfk_1` FOREIGN KEY (`j_id`) REFERENCES `job_details` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `round_apply_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `round_apply_ibfk_3` FOREIGN KEY (`jr_id`) REFERENCES `job_round` (`jr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round_apply`
--

LOCK TABLES `round_apply` WRITE;
/*!40000 ALTER TABLE `round_apply` DISABLE KEYS */;
INSERT INTO `round_apply` (`ra_id`, `jr_id`, `j_id`, `s_id`, `s_status`, `r_num`) VALUES (16,1,44,31,1,1),(17,2,44,31,0,2),(18,6,44,31,0,3),(19,7,46,31,1,1),(20,8,46,31,1,2),(21,4,25,31,0,1),(22,5,25,31,0,2);
/*!40000 ALTER TABLE `round_apply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill` (
  `sk_id` int(11) NOT NULL,
  `sk_name` varchar(200) NOT NULL,
  PRIMARY KEY (`sk_id`),
  UNIQUE KEY `sk_name` (`sk_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` (`sk_id`, `sk_name`) VALUES (28,'Android'),(26,'Arificial Intelligence'),(34,'Blockchain Developer'),(13,'C'),(14,'C#'),(12,'C++'),(19,'Content Writing'),(6,'Core PHP'),(2,'CSS'),(35,'Cyber Security'),(17,'Dancing'),(23,'Data Science'),(31,'Digital Marketing'),(15,'Flutter'),(27,'Full Stack Developer'),(21,'Graphic designing'),(1,'HTML'),(29,'IOS'),(11,'Java'),(3,'JS'),(5,'Laravel'),(25,'Machine Learning'),(33,'Meme Creater'),(9,'Mongodb'),(10,'Mysql'),(8,'Node JS'),(20,'Photography'),(22,'Photoshop'),(4,'PHP'),(7,'React JS'),(18,'Singing'),(30,'Tally'),(16,'Travelling'),(32,'Video Editing'),(24,'Wordpress');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_achievement`
--

DROP TABLE IF EXISTS `st_achievement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_achievement` (
  `sa_id` int(11) NOT NULL AUTO_INCREMENT,
  `sa_title` varchar(200) NOT NULL,
  `sa_time` varchar(200) NOT NULL,
  `sa_level` varchar(200) NOT NULL,
  `sa_certificate` text NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`sa_id`),
  KEY `st_achievement_ibfk_1` (`s_id`),
  CONSTRAINT `st_achievement_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_achievement`
--

LOCK TABLES `st_achievement` WRITE;
/*!40000 ALTER TABLE `st_achievement` DISABLE KEYS */;
/*!40000 ALTER TABLE `st_achievement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_adetails`
--

DROP TABLE IF EXISTS `st_adetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_adetails` (
  `sad_id` int(11) NOT NULL AUTO_INCREMENT,
  `sad_desc` text NOT NULL,
  `sad_lang` varchar(200) NOT NULL,
  `sad_resume` varchar(200) NOT NULL,
  `sad_wsample` varchar(200) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`sad_id`),
  UNIQUE KEY `sad_wsample` (`sad_wsample`),
  KEY `st_adetails_ibfk_1` (`s_id`),
  CONSTRAINT `st_adetails_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_adetails`
--

LOCK TABLES `st_adetails` WRITE;
/*!40000 ALTER TABLE `st_adetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `st_adetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_background`
--

DROP TABLE IF EXISTS `st_background`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_background` (
  `sb_id` int(11) NOT NULL AUTO_INCREMENT,
  `sb_qualify` varchar(200) NOT NULL,
  `sb_clg` text NOT NULL,
  `sb_passyr` varchar(200) NOT NULL,
  `sb_result` varchar(200) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`sb_id`),
  KEY `st_background_ibfk_1` (`s_id`),
  CONSTRAINT `st_background_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_background`
--

LOCK TABLES `st_background` WRITE;
/*!40000 ALTER TABLE `st_background` DISABLE KEYS */;
INSERT INTO `st_background` (`sb_id`, `sb_qualify`, `sb_clg`, `sb_passyr`, `sb_result`, `s_id`) VALUES (13,'SSC','I.P.Savani High School','2022-07','98%',31),(14,'HSC / Diploma','VGEC','2022-06','98%',31);
/*!40000 ALTER TABLE `st_background` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_details`
--

DROP TABLE IF EXISTS `st_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_details` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(200) NOT NULL,
  `s_email` varchar(200) NOT NULL,
  `s_password` varchar(200) NOT NULL,
  `s_mbno` varchar(200) NOT NULL,
  `s_wpno` varchar(200) NOT NULL,
  `s_img` text DEFAULT 'default.png',
  `unique_id` int(255) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `s_email` (`s_email`),
  UNIQUE KEY `s_mbno` (`s_mbno`),
  UNIQUE KEY `s_wpno` (`s_wpno`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_details`
--

LOCK TABLES `st_details` WRITE;
/*!40000 ALTER TABLE `st_details` DISABLE KEYS */;
INSERT INTO `st_details` (`s_id`, `s_name`, `s_email`, `s_password`, `s_mbno`, `s_wpno`, `s_img`, `unique_id`, `status`) VALUES (19,'Dhruv','pgoti45@gmail.com','abcd','07031111200','5625142325','default.png',1107417872,'Active now'),(27,'Monika','monosandip1970@gmail.com','Monika@1970','123456789','123456789','default.png',452863325,'Active now'),(28,'Chhaya','www.chhayabthakkar@gmail.com','Chhaya@1975','987654321','987654321','default.png',879269938,'Active now'),(29,'Pradip','pradipradio@gmail.com','Pradip@123','123987465','123987465','default.png',998211020,'Active now'),(31,'ravi','ankitchotaliya007@gmail.com','Ravi@123','987987987','987987987','1626371453_woman.png',1111020983,'Active now'),(32,'Meet Patel','mjpatel1932000@gmail.com','Meet@1903','9773256504','9773256504','default.png',825834451,'Active now'),(33,'Urvu','uthakkar370@gmail.com','Sat#2329','9429738648','9429738648','default.png',1225347913,'Active now'),(34,'12345','gggggg@gg.bbb','Abcde@098','9999999999999999','99999999999999','default.png',269891807,'Active now');
/*!40000 ALTER TABLE `st_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_ploc`
--

DROP TABLE IF EXISTS `st_ploc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_ploc` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_name` varchar(200) NOT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`sp_id`),
  KEY `st_ploc_ibfk_1` (`s_id`),
  CONSTRAINT `st_ploc_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_ploc`
--

LOCK TABLES `st_ploc` WRITE;
/*!40000 ALTER TABLE `st_ploc` DISABLE KEYS */;
/*!40000 ALTER TABLE `st_ploc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_skill`
--

DROP TABLE IF EXISTS `st_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_skill` (
  `st_sk` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `sk_id` int(11) NOT NULL,
  PRIMARY KEY (`st_sk`),
  KEY `st_skill_ibfk_1` (`s_id`),
  KEY `st_skill_ibfk_2` (`sk_id`),
  CONSTRAINT `st_skill_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `st_skill_ibfk_2` FOREIGN KEY (`sk_id`) REFERENCES `skill` (`sk_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_skill`
--

LOCK TABLES `st_skill` WRITE;
/*!40000 ALTER TABLE `st_skill` DISABLE KEYS */;
INSERT INTO `st_skill` (`st_sk`, `s_id`, `sk_id`) VALUES (28,31,6),(29,31,19),(30,31,25);
/*!40000 ALTER TABLE `st_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `st_workexp`
--

DROP TABLE IF EXISTS `st_workexp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `st_workexp` (
  `sw_id` int(11) NOT NULL AUTO_INCREMENT,
  `sw_name` varchar(200) NOT NULL,
  `sw_stime` varchar(200) NOT NULL,
  `sw_etime` varchar(200) NOT NULL,
  `sw_desg` varchar(200) NOT NULL,
  `sw_link` text DEFAULT NULL,
  `s_id` int(11) NOT NULL,
  PRIMARY KEY (`sw_id`),
  KEY `st_workexp_ibfk_1` (`s_id`),
  CONSTRAINT `st_workexp_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `st_details` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `st_workexp`
--

LOCK TABLES `st_workexp` WRITE;
/*!40000 ALTER TABLE `st_workexp` DISABLE KEYS */;
INSERT INTO `st_workexp` (`sw_id`, `sw_name`, `sw_stime`, `sw_etime`, `sw_desg`, `sw_link`, `s_id`) VALUES (8,'amazon','2021-07','2021-08','SDE 2',NULL,31);
/*!40000 ALTER TABLE `st_workexp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'rushilsh_qualifind'
--

--
-- Dumping routines for database 'rushilsh_qualifind'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-21 15:30:16

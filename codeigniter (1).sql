-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2016 at 11:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `petitionId` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `userId`, `petitionId`, `comment`) VALUES
(1, 1, 12, 'Good one'),
(2, 1, 12, 'Hello Good nice one'),
(3, 1, 8, 'Uber Sucks.'),
(4, 1, 7, 'Next time you come again.');

-- --------------------------------------------------------

--
-- Table structure for table `petitions`
--

CREATE TABLE IF NOT EXISTS `petitions` (
  `petitionId` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(20000) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`petitionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `petitions`
--

INSERT INTO `petitions` (`petitionId`, `heading`, `category`, `description`, `image`) VALUES
(7, 'President of India – Save Grassroots Innovators & Researcher, Make self Dependant India & Decrease Import', 'politics', 'Our India is dependent on technologically developed country, therefore import increasing day by day, at result we are poor in defense and finance sectors, to resolve this problem we should have to fulfill at technological level.\r\nThe key point, our government should have to provide self dependant platform to the Grassroots Innovators and Researchers in the view of employment.\r\nIf our government connect Grassroots Innovators and Researchers in the main stream of employment than future will rise in innovation or research, in this way scientific temper will be increase in our India, we will fulfill our technological requirement properly.\r\nIn this way dependency of India on other country will finish, and import will be drastically decrease and India will be powerful in defense & finance sector.', 'ypY1GPCQ_400x400.jpg'),
(8, 'Stop Using Surge Pricing To Loot Your Customers #StopSurge', 'business', 'Uber claims surge pricing is for the customer’s benefit, to ensure that they have cabs.\r\nA cab driver ended my friend’s trip halfway through when he asked to wait for couple of minutes. He had just stepped out to get some cash from an ATM. The cab driver asked him to rebook… this time with 2.6x surge pricing.  \r\nUber claims that it uses surge pricing when there is a shortage of cabs.\r\nI had more than 8 Uber cabs available around me and still had to pay 3.8x surge pricing (Which could be clearly seen in the screenshots)\r\nUber claims surge pricing attracts more drivers during peak hours.\r\nI had to pay 1.5x surge pricing on a Wednesday afternoon; clearly not peak hour timings.', 'uber.png'),
(9, 'TRAI: Don''t allow differential pricing of services on the Internet. Let the consumers choose how they want to use Internet. #netneutrality', 'business', 'Until now, you and I could use the internet data we paid for, to do anything on the internet. If telephone companies get their way, they will dictate what, how and when to browse the internet. And this could happen very soon. This is really scary!\r\nAs you are reading this, mobile operators like Vodafone, Airtel Idea are trying to pressurise the Indian government to regulate certain Apps and services like Whatsapp, Youtube, Skype etc. This means that we will be charged separately for using them even if we have paid for the internet data packs. Together we can stop this.\r\nTelecom Regulatory Authority (TRAI) is the only body which has the power to settle this issue once and for all. TRAI is coming up with a consultation paper by the end of February that can decide the fate of internet usage in India. This is about the internet which has become such an integral part of our lives and its time to make our voices heard.', 'neutrality2-11-480x480.jpg'),
(10, 'We Need a Reliable Police Helpline for Women', 'other', 'I was stuck in a scary situation on the road with my family. In desperation, I called the 100 police helpline. No response. I called the number four times. No response.\r\nI am a young girl who could have been hurt or killed by rowdies. My entire family was in danger. Sign my petition asking for a reliable police helpline, so that no woman is in this situation.\r\nWe lost 8000 rupees but escaped unharmed. But the police wasn''t there for us that day. We filed an FIR after the incident, but the crime wasn''t prevented. No action has been taken since then.\r\nA reliable police helpline is a basic necessity in any country where women study, work and contribute as independent individuals.', 'a7d55617627029_562bc70661149.jpg'),
(11, 'Vote to End the Sports Blackout Rule', 'sports', 'The NFL makes almost $9 billion a year in revenue, Commissioner Roger Goodell makes almost $44 million in annual salary, and the league -- believe it or not, considered a nonprofit by the U.S. government -- is the most profitable sports entity in the entire world.\r\nAnd yet, despite the league''s wealth, fans of the game continue to pay because of an outdated "blackout" rule supported by the NFL. This rule punishes fans if a team doesn''t sell enough tickets for a game by barring games from being shown on television. For folks who can''t afford expensive tickets to a game or travel to stadiums, the rule only serves to hurt fans -- while NFL owners and executives continue to make big bucks.', '119187_8678.jpg'),
(12, 'Make it easier for researchers to study the effects of medicinal marijuana', 'education', 'Hundreds of thousands of veterans are affected by PTSD. It’s crippling, it can be life-threatening, and it’s treatable -- researchers believe cannabis could be the key to finding a life-saving treatment. The only problem is, they can’t get the marijuana they need to conduct their research.\r\nWe can’t let this potentially life-changing treatment be stalled any longer, but as of now, there are too many roadblocks to the studies needed to prove cannabis’ effectiveness. Currently, all U.S. clinical trials involving cannabis must purchase their research cannabis from the federal government, which only grows it at the National Institute on Drug Abuse (NIDA) at the University of Mississippi. But Ole Miss is unable to provide the right strains researchers need. This leaves valuable research hanging, and wastes precious time.\r\nJust last July, the Colorado Board of Health declined to include post-traumatic stress disorder (PTSD) in its medical marijuana program, citing lack of research as the main reason. We want to break the NIDA’s monopoly on supplying the necessary cannabis, and we know how to do it. If the federal government allows Colorado regulators to oversee cannabis growth and testing for research purposes, scientists would have access to the right strains, and plenty of them.\r\nNow, more than ever, these studies are crucial so we can normalize medicinal marijuana use and bring it out of the shadows. In March 2014, renowned psychiatrist Dr. Sue Sisley garnered NIDA approval for a large-scale study of marijuana to treat PTSD. Almost two years have gone by, and her study is still on hold. Meanwhile, the Veterans Administration estimates that 11-20% of soldiers who served in the recent Iraq and Afghanistan wars have PTSD, and a total of 7.7 million adults suffer from the disorder. These people are suffering, and they deserve to know if cannabis can bring them relief.', 'download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `responses_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `petition_id` int(11) NOT NULL,
  `like` int(11) DEFAULT NULL,
  `sign` int(11) DEFAULT NULL,
  PRIMARY KEY (`responses_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`) VALUES
(1, 'Abhinav Rai', 'abhinavrai23@timepass.com', '123456'),
(2, 'Rajat', 'rajatsri94@gmail.com', '123456'),
(3, 'Abhinav Rai', 'raiabhinavrai1994@gmail.com', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

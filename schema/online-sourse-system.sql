-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2012 at 06:01 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online-sourse-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `payment` float NOT NULL,
  `segment_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `payment`, `segment_id`) VALUES
(1, 'GRE', '', 10000, 1),
(2, 'MBA', '', 8000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `one-blank_completion_questions`
--

CREATE TABLE IF NOT EXISTS `one-blank_completion_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `blank_one_options` text NOT NULL,
  `blank_one_correct_answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL DEFAULT 'No',
  `for_mock` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sequence_in_practice` int(11) NOT NULL,
  `sequence_in_mock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `one-blank_completion_questions`
--

INSERT INTO `one-blank_completion_questions` (`id`, `question`, `blank_one_options`, `blank_one_correct_answer`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`, `sequence_in_practice`, `sequence_in_mock`) VALUES
(1, 'Who am I?', 'a|b|c|d|e', 'c', 'A', 'D', 'Yes', 'Yes', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `one-blank_sentence_completion_questions`
--

CREATE TABLE IF NOT EXISTS `one-blank_sentence_completion_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `first_correct_answer` text NOT NULL,
  `second_correct_answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `one-blank_sentence_completion_questions`
--

INSERT INTO `one-blank_sentence_completion_questions` (`id`, `question`, `options`, `first_correct_answer`, `second_correct_answer`) VALUES
(2, 'Who was the (1) ________ ?', 'last prophet|last king|last Zombie|last mohican|last cop|last man', 'last prophet', 'last Zombie');

-- --------------------------------------------------------

--
-- Table structure for table `quantitative_comparison_questions`
--

CREATE TABLE IF NOT EXISTS `quantitative_comparison_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity_a` text NOT NULL,
  `quantity_b` text NOT NULL,
  `options` text NOT NULL,
  `correct_answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL,
  `for_mock` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `quantitative_comparison_questions`
--

INSERT INTO `quantitative_comparison_questions` (`id`, `quantity_a`, `quantity_b`, `options`, `correct_answer`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`) VALUES
(8, 'changed A', 'changed A', 'change my|change hi|change all|change my', 'change hi', 'A', 'A', 'Yes', 'Yes'),
(9, 'q1', 'q1', 'test a|test b|test c|test d', 'test c', 'A', 'A', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `quantitative_numeric_entry_questions_fraction_answer`
--

CREATE TABLE IF NOT EXISTS `quantitative_numeric_entry_questions_fraction_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `numerator` text NOT NULL,
  `denominator` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL,
  `for_mock` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quantitative_numeric_entry_questions_fraction_answer`
--

INSERT INTO `quantitative_numeric_entry_questions_fraction_answer` (`id`, `question`, `numerator`, `denominator`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`) VALUES
(1, 'a + b', '10', '20', 'A', '', 'Yes', 'Yes'),
(2, 'test one', 'nu 1', 'de 1', 'A', '', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `quantitative_numeric_entry_questions_one_answer`
--

CREATE TABLE IF NOT EXISTS `quantitative_numeric_entry_questions_one_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL,
  `for_mock` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `quantitative_numeric_entry_questions_one_answer`
--

INSERT INTO `quantitative_numeric_entry_questions_one_answer` (`id`, `question`, `answer`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`) VALUES
(3, 'test', 'ans test', 'A', 'A', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `quantitative_select-many_choice_questions`
--

CREATE TABLE IF NOT EXISTS `quantitative_select-many_choice_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `correct_answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL,
  `for_mock` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quantitative_select-many_choice_questions`
--

INSERT INTO `quantitative_select-many_choice_questions` (`id`, `question`, `options`, `correct_answer`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`) VALUES
(1, ' q t', 'konok|habib |edited|knk|u', 'knk|', 'A', 'A', 'Yes', 'Yes'),
(2, 'test new ', 'test a|test b|test c|test d|test e', 'test d|test c|', 'A', 'A', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `quantitative_select-one_choice_questions`
--

CREATE TABLE IF NOT EXISTS `quantitative_select-one_choice_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `correct_answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL,
  `for_mock` enum('Yes','No') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `quantitative_select-one_choice_questions`
--

INSERT INTO `quantitative_select-one_choice_questions` (`id`, `question`, `options`, `correct_answer`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`) VALUES
(2, 'test one quantitative', 'my a| my b|my c|my d|my e', 'my c', 'A', 'A', 'Yes', 'Yes'),
(3, 'hi ', 'i |am k|knk|hi |ll', '', 'A', 'A', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `question-categories`
--

CREATE TABLE IF NOT EXISTS `question-categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `question_table` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `question-categories`
--

INSERT INTO `question-categories` (`id`, `question_type_id`, `name`, `description`, `question_table`) VALUES
(1, 1, 'Select One Answer Choice', '', 'select-one_choice_questions'),
(2, 1, 'Select One or More Answer Choice', '', 'select-many_choice_questions'),
(3, 1, 'Select-in-Passage', '', 'select-in_passage_questions'),
(4, 2, 'Three-Blank Text Completion Question', '', 'three-blank_completion_questions'),
(5, 2, 'Two-Blank Text Completion Question', '', 'two-blank_completion_questions'),
(6, 2, 'Single-Blank Text Completion Question', '', 'one-blank_completion_questions'),
(7, 3, 'Sentence Equivalence Question', '', 'one-blank_sentence_completion_questions'),
(8, 4, 'Quantitative Comparison Questions', 'Questions of this type ask you to compare two quantities — Quantity A and Quantity B — and then determine which of four statements describes the comparison.', 'quantitative_comparison_questions'),
(9, 5, 'Multiple-choice Questions — Select One Answer Choice', 'These questions are multiple-choice questions that ask you to select only one answer choice from a list of five choices.', 'quantitative_select-one_choice_questions'),
(10, 5, 'Multiple-choice Questions — Select One or More Answer Choices', 'These questions are multiple-choice questions that ask you to select one or more answer choices from a list of choices. A question may or may not specify the number of choices to select.', 'quantitative_select-many_choice_questions'),
(11, 6, 'Numeric Entry Questions Integer or Decimal Answer', 'Questions of this type ask you either to enter the answer as an integer or a decimal in a single answer box or to enter it as a fraction in two separate boxes — one for the numerator and one for the denominator. In the computer-based test, the computer mouse and keyboard are used to enter the answer.', 'quantitative_numeric_entry_questions_one_answer'),
(12, 6, 'Numeric Entry Questions Fraction Answer', 'Questions of this type ask you either to enter the answer as an integer or a decimal in a single answer box or to enter it as a fraction in two separate boxes — one for the numerator and one for the denominator. In the computer-based test, the computer mouse and keyboard are used to enter the answer.', 'quantitative_numeric_entry_questions_fraction_answer');

-- --------------------------------------------------------

--
-- Table structure for table `question-types`
--

CREATE TABLE IF NOT EXISTS `question-types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `segment_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `question-types`
--

INSERT INTO `question-types` (`id`, `segment_id`, `name`, `description`) VALUES
(1, 1, 'Reading Comprehension Question', ''),
(2, 1, 'Text Completion Question', ''),
(3, 1, 'Sentence Equivalence', ''),
(4, 3, 'Quantitative Comparison Questions', 'Questions of this type ask you to compare two quantities — Quantity A and Quantity B — and then determine which of four statements describes the comparison.'),
(5, 3, 'Multiple-choice Questions', 'These questions are multiple-choice questions that ask you to select only one or many answer choice from a list of five choices.'),
(6, 3, 'Numeric Entry Questions', 'Questions of this type ask you either to enter the answer as an integer or a decimal in a single answer box or to enter it as a fraction in two separate boxes — one for the numerator and one for the denominator. In the computer-based test, the computer mouse and keyboard are used to enter the answer.');

-- --------------------------------------------------------

--
-- Table structure for table `question_subset_for_mock`
--

CREATE TABLE IF NOT EXISTS `question_subset_for_mock` (
  `subset_id` int(11) NOT NULL,
  `question_category_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_subset_for_mock`
--


-- --------------------------------------------------------

--
-- Table structure for table `question_under_question-categories`
--

CREATE TABLE IF NOT EXISTS `question_under_question-categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `question_under_question-categories`
--

INSERT INTO `question_under_question-categories` (`id`, `category_id`, `question_id`) VALUES
(59, 4, 8),
(60, 4, 9),
(61, 3, 1),
(62, 3, 2),
(63, 3, 3),
(64, 7, 1),
(65, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE IF NOT EXISTS `segments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`id`, `course_id`, `name`, `description`) VALUES
(1, 1, 'Verbal', 'Combination of different types of questions on english language skill'),
(2, 1, 'Analytical', 'Test of one''s analysis skill'),
(3, 1, 'Quantitative', 'For determining one''s math solving ability'),
(4, 1, 'Vocabulary', 'For testing memory on word stock');

-- --------------------------------------------------------

--
-- Table structure for table `select-in_passage_questions`
--

CREATE TABLE IF NOT EXISTS `select-in_passage_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `correct_answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `select-in_passage_questions`
--

INSERT INTO `select-in_passage_questions` (`id`, `question`, `options`, `correct_answer`) VALUES
(3, 'This is Saleh . A very unpredictable man . The greatest Diversity & Monotony is here .', 'This is Saleh| A very unpredictable man|The greatest Diversity & Monotony is here', 'The greatest Diversity & Monotony is here');

-- --------------------------------------------------------

--
-- Table structure for table `select-many_choice_questions`
--

CREATE TABLE IF NOT EXISTS `select-many_choice_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `correct_answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL DEFAULT 'No',
  `for_mock` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sequence_in_practice` int(11) NOT NULL,
  `sequence_in_mock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `select-many_choice_questions`
--

INSERT INTO `select-many_choice_questions` (`id`, `question`, `options`, `correct_answer`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`, `sequence_in_practice`, `sequence_in_mock`) VALUES
(2, 'Who am I ?', 'a|o|a|t|w', 'o|t|a|', 'B', 'C', 'Yes', 'Yes', 1, 1),
(3, 'new ques', 'one|two| tree|four| five', 'two|four|', 'A', 'A', 'Yes', 'Yes', 0, 0),
(4, 'sample ques two', 'my one|my two|my three|my four|my five', 'my three|my five|', 'A', 'A', 'Yes', 'Yes', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `select-one_choice_questions`
--

CREATE TABLE IF NOT EXISTS `select-one_choice_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `correct_answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL DEFAULT 'No',
  `for_mock` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sequence_in_practice` int(11) NOT NULL,
  `sequence_in_mock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `select-one_choice_questions`
--

INSERT INTO `select-one_choice_questions` (`id`, `question`, `options`, `correct_answer`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`, `sequence_in_practice`, `sequence_in_mock`) VALUES
(23, 'Who is the writer of River God?', 'Wilber Smith|Frederich Forsith|Dan Brown|Paul Mathew|Jefry Archer', 'Wilber Smith', 'A', 'B', 'Yes', 'Yes', 1, 1),
(24, 'who am I?', 'a|d|a|t|y', 'a', 'C', 'B', 'Yes', 'Yes', 0, 0),
(26, 'capital of bangladesh', 'dubai|dhaka|dilli|newyourk|bangcok', 'dhaka', 'A', 'A', 'Yes', 'Yes', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `set_for_mock`
--

CREATE TABLE IF NOT EXISTS `set_for_mock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subset_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `set_for_mock`
--


-- --------------------------------------------------------

--
-- Table structure for table `set_for_practice`
--

CREATE TABLE IF NOT EXISTS `set_for_practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `question_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `set_for_practice`
--


-- --------------------------------------------------------

--
-- Table structure for table `subset`
--

CREATE TABLE IF NOT EXISTS `subset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `subset`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_question_table`
--

CREATE TABLE IF NOT EXISTS `temp_question_table` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `options` text NOT NULL,
  `blank_one_options` text NOT NULL,
  `blank_two_options` text NOT NULL,
  `blank_three_options` text NOT NULL,
  `correct_answer` text NOT NULL,
  `correct_answers` text NOT NULL,
  `blank_one_correct_answer` text NOT NULL,
  `blank_two_correct_answer` text NOT NULL,
  `blank_three_correct_answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `question_category` varchar(200) NOT NULL,
  `question_type` varchar(200) NOT NULL,
  `question_segment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_question_table`
--

INSERT INTO `temp_question_table` (`question_id`, `user_id`, `question`, `options`, `blank_one_options`, `blank_two_options`, `blank_three_options`, `correct_answer`, `correct_answers`, `blank_one_correct_answer`, `blank_two_correct_answer`, `blank_three_correct_answer`, `question_set_for_practice`, `question_set_for_mock`, `question_category`, `question_type`, `question_segment`) VALUES
(7, 1, 'Who is this?', '', 'a|b|c', 'e|d|f', 'h|g|i', '', '', 'b', 'd', 'g', '', 'C', 'three-blank_completion_questions', 'Text Completion Question', 'Verbal');

-- --------------------------------------------------------

--
-- Table structure for table `three-blank_completion_questions`
--

CREATE TABLE IF NOT EXISTS `three-blank_completion_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `blank_one_options` text NOT NULL,
  `blank_two_options` text NOT NULL,
  `blank_three_options` text NOT NULL,
  `blank_one_correct_answer` text NOT NULL,
  `blank_two_correct_answer` text NOT NULL,
  `blank_three_correct_answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `three-blank_completion_questions`
--

INSERT INTO `three-blank_completion_questions` (`id`, `question`, `blank_one_options`, `blank_two_options`, `blank_three_options`, `blank_one_correct_answer`, `blank_two_correct_answer`, `blank_three_correct_answer`) VALUES
(8, 'Who was the (1) ________ emperor when the (2) ________ attacks Rome (3) ________ ?', 'former|present|last', 'greeks|faraos|nordicks', 'province|state|region', 'last', 'nordicks', 'province'),
(9, 'Where did the (1) ________ of panipath took (2) ________ in (3) ________ ?', 'battle|sign|agreement', 'heart|place|fury', 'India|Pakistan|Bangladesh', 'battle', 'place', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `two-blank_completion_questions`
--

CREATE TABLE IF NOT EXISTS `two-blank_completion_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `blank_one_options` text NOT NULL,
  `blank_two_options` text NOT NULL,
  `blank_one_correct_answer` text NOT NULL,
  `blank_two_correct_answer` text NOT NULL,
  `question_set_for_practice` varchar(4) NOT NULL,
  `question_set_for_mock` varchar(4) NOT NULL,
  `for_practice` enum('Yes','No') NOT NULL DEFAULT 'No',
  `for_mock` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sequence_in_practice` int(11) NOT NULL,
  `sequence_in_mock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `two-blank_completion_questions`
--

INSERT INTO `two-blank_completion_questions` (`id`, `question`, `blank_one_options`, `blank_two_options`, `blank_one_correct_answer`, `blank_two_correct_answer`, `question_set_for_practice`, `question_set_for_mock`, `for_practice`, `for_mock`, `sequence_in_practice`, `sequence_in_mock`) VALUES
(1, 'Who is this?', 'a|s|e|a', 'f|a|f|m', 'e', 'm', '', 'B', 'No', 'Yes', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_basic_info`
--

CREATE TABLE IF NOT EXISTS `user_basic_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_num` int(15) NOT NULL,
  `user_status` enum('Admin','Moderator','Registered') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_basic_info`
--

INSERT INTO `user_basic_info` (`id`, `email`, `password`, `phone_num`, `user_status`) VALUES
(1, 'salehwithDM@gmail.com', 'ghunpoka', 1725566632, 'Admin'),
(2, 'rabbyalam@gmail.com', 'rabby29', 1710358519, 'Admin'),
(3, 'cse_konok@yahoo.com', 'konok123', 1710358518, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_general_info`
--

CREATE TABLE IF NOT EXISTS `user_general_info` (
  `general_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_basic_id` int(11) NOT NULL,
  `user_full_name` varchar(200) NOT NULL,
  `user_address` text NOT NULL,
  `user_photo_link` varchar(200) NOT NULL,
  PRIMARY KEY (`general_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_general_info`
--

INSERT INTO `user_general_info` (`general_info_id`, `user_basic_id`, `user_full_name`, `user_address`, `user_photo_link`) VALUES
(1, 1, 'A.T.M. Saleh', 'Room-3011 , Dr. M.A. Rashid Hall , BUET , Dhaka', ''),
(2, 2, 'Rabby Alam', 'Room-3003 , Dr. M.A. Rashid Hall , BUET , Dhaka', ''),
(3, 3, 'Konok Habibullah Araphat', 'Room-3003 , Dr. M.A. Rashid Hall , BUET , Dhaka', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_registered_courses`
--

CREATE TABLE IF NOT EXISTS `user_registered_courses` (
  `registered_course_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `approval_status` enum('pending','processing','approved') NOT NULL DEFAULT 'pending',
  `only_for_test` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`registered_course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_registered_courses`
--

INSERT INTO `user_registered_courses` (`registered_course_id`, `user_id`, `course_id`, `approval_status`, `only_for_test`) VALUES
(1, 1, 1, 'approved', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user_taken_exam`
--

CREATE TABLE IF NOT EXISTS `user_taken_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_set` varchar(4) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `question_table` varchar(200) NOT NULL,
  `given_answer` varchar(200) NOT NULL,
  `is_correct` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_answered` enum('Yes','No') NOT NULL DEFAULT 'No',
  `answer_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `user_taken_exam`
--

INSERT INTO `user_taken_exam` (`id`, `user_id`, `question_id`, `question_set`, `course_name`, `question_table`, `given_answer`, `is_correct`, `is_answered`, `answer_time`) VALUES
(27, 1, 2, 'C', '', 'select-many_choice_questions', '0', 'No', 'Yes', '2012-09-10 18:46:32'),
(28, 3, 24, 'B', '', 'select-one_choice_questions', '0', 'No', 'Yes', '2012-09-11 12:05:01'),
(29, 3, 23, 'B', '', 'select-one_choice_questions', '0', 'No', 'Yes', '2012-09-11 12:05:02'),
(30, 3, 1, 'B', '', 'two-blank_completion_questions', '0', 'Yes', 'Yes', '2012-09-11 12:05:03'),
(31, 3, 24, 'B', '', 'select-one_choice_questions', '0', 'No', 'Yes', '2012-09-11 12:05:13'),
(32, 3, 6, 'D', '', 'three-blank_completion_questions', '0', 'No', 'Yes', '2012-09-11 12:13:05'),
(33, 3, 2, 'C', '', 'select-many_choice_questions', '0', 'No', 'Yes', '2012-09-11 12:13:09'),
(34, 3, 7, 'C', '', 'three-blank_completion_questions', '0', 'Yes', 'Yes', '2012-09-11 12:13:12'),
(35, 3, 1, 'D', '', 'one-blank_completion_questions', '0', 'Yes', 'Yes', '2012-09-11 12:13:14'),
(36, 3, 1, 'D', '', 'one-blank_completion_questions', '0', 'Yes', 'Yes', '2012-09-11 12:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `wordlist`
--

CREATE TABLE IF NOT EXISTS `wordlist` (
  `word` text NOT NULL,
  `meaning` text NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wordlist`
--

INSERT INTO `wordlist` (`word`, `meaning`, `value`) VALUES
('abase', 'lower; degrade; humiliate; make humble; make (oneself) lose self-respect', 0),
('abash', 'embarrass', 0),
('abate', 'subside or moderate', 0),
('abbreviate', 'shorten', 0),
('brandish', 'wave around (a weapon); flourish', 0),
('bravado', 'swagger; assumed air of defiance; false show of bravery', 0),
('swagger', 'walk or behave with an over-confident manner', 0),
('brawn', 'human muscle; muscular strength; sturdiness', 0),
('brawny', 'muscular; having well-developed muscles', 0),
('sturdy', 'strong and firm (in the body)', 0),
('cloying', 'distasteful (because excessive); excessively sweet or sentimental; V. cloy: become unpleasant through too much sweetness or excess', 0),
('coagulate', 'congeal; thicken; clot; N. coagulant', 0),
('clot', 'half-solid lump formed from a liquid (or blood); V.', 0),
('clique', 'small exclusive group of people', 0),
('codify', 'arrange (laws or rules) as a code; classify; N. code: system of words used instead of ordinary writing; collection of laws, rules, established social customs', 0),
('disingenuous', 'not naive; not candid; sophisticated; worldly wise; OP. ingenuous', 0),
('disinter', 'dig up; unearth; OP. inter', 0),
('disinterested', 'unprejudiced; free from bias and self-interest; objective', 0),
('disjunction', 'act or state of separation; disunity; CF. disjunctive: expressing a choice between two ideas; CF. conjunction; CF. conjunctive', 0),
('dislodge', 'remove (forcibly); force out of a position; Ex. dislodge the food caught in his throat; CF. lodge', 0),
('eddy', 'swirling current of water, air, etc.; V.', 0),
('edict', 'decree (especially one issued by a sovereign); official command', 0),
('edifice', 'building (of imposing size)', 0),
('effective', 'effectual; producing a strong response; striking; in operation; in effect; Ex. effective speech/photograph', 0),
('figure', 'written symbols; number; amount represented in numbers; outline or silhouette of a thing or human body; person (well-known); impression; diagram; pattern; group in a dance; Ex. figure of speech; V. calculate with numbers; adorn with figures; appear; consider; Ex. My name did not figure in the list.', 0),
('figurine', 'small ornamental statuette(very small statue)', 0),
('freebooter', 'pirate or plunderer who makes war in order to grow rich', 0),
('filibuster', 'block legislation or prevent action in a lawmaking body by making very slow long speeches; N; freebooter', 0),
('galaxy', 'large isolated system of stars, such as the Milky Way; collection of brilliant personalities', 0),
('gale', 'windstorm; gust of wind; emotional outburst (laughters, tears); Ex. gale of laughter', 0),
('gall', 'bitterness of feeling; nerve; effrontery; CF. gall bladder', 0),
('galley', 'low ship with sails (rowed along by slaves)', 0),
('hallowed', 'blessed; consecrated; Ex. hallowed ground; V. hallow: set apart as holy', 0),
('hallucination', 'delusion; false idea; false perception of objects with a compelling sense of their reality; objects so perceived; V. hallucinate; ADJ. hallucinatory', 0),
('halting', 'hesitant; faltering; not fluent; Ex. halting steps/voice; V. halt: proceed or act with uncertainty; falter; hesitate; waver; stop', 0),
('illusory', 'illusive; deceptive; not real', 0),
('imbalance', 'lack of balance or symmetry; disproportion', 0),
('imbecility', 'weakness of mind; state of being an imbecile; N. imbecile: stupid person; fool', 0),
('jaunt', 'trip; short journey', 0),
('jaunty', 'cheerful and pleased with life; lighthearted; animated; easy and carefree; dapper in appearance; Ex. jaunty person/hat', 0),
('jollity', 'gaiety; cheerfulness; ADJ. jolly: merry; gay', 0),
('kindred', 'related; belonging to the same group; similar in nature or character; Ex. kindred languages; N: relative; kin; kinship', 0),
('kinetic', 'producing motion; of motion', 0),
('kleptomaniac', 'person who has a compulsive desire to steal', 0),
('larceny', 'theft; Ex. petit larceny', 0),
('largess', 'generous gift (given to people who do not have enough)', 0),
('lust', 'intense sexual desire; intense eagerness; V.', 0),
('latent', 'present but not yet noticeable or active; dormant; hidden; N. latency; CF. potential', 0),
('laud', 'praise; N. ADJ. laudable: praiseworthy; ADJ. laudatory: expressing praise', 0),
('magisterial', 'authoritative; imperious; commanding; of a magistrate; Ex. magisterial study of Roman law; Ex. magisterial manner', 0),
('magistrate', 'official with power to administer the law', 0),
('nicety', 'precision; accuracy; minute distinction or difference; Ex. to a nicety: exactly; precisely; Ex. distinguish between niceties', 0),
('niggardly', 'meanly stingy; parsimonious; N. niggard: stingy person', 0),
('niggle', 'spend too much time on minor points (esp. when finding fault); find fault; Ex. niggle over details; ADJ. niggling', 0),
('nihilist', 'one who considers traditional beliefs to be groundless and existence meaningless; absolute skeptic; revolutionary terrorist; CF. nihilism: belief that nothing has meaning or value; belief that destruction of existing political or social institutions is necessary for future improvement', 0),
('ominous', 'threatening; of an evil omen', 0),
('omnipotent', 'all-powerful; having unlimited power', 0),
('parchment', 'writing material made from the skin of a sheep or goat', 0),
('pall', 'become boring; grow tiresome', 0),
('palpitate', 'throb; beat rapidly; flutter; tremble; Ex. Her heart began to palpitate.', 0),
('paltry', 'insignificant; petty; trifling; contemptible; Ex. paltry sum; CF. trash', 0),
('quandary', 'dilemma; state of uncertainty; Ex. She is in a quandary about whether to go.', 0),
('quarantine', 'isolation of a person, place, or ship to prevent spread of infection; V: isolate in quarantine', 0),
('quarry', 'person or animal of pursuit; victim; object of a hunt; prey', 0),
('ramshackle', '(of a building or vehicle) poorly constructed; rickety; falling apart', 0),
('rickety', '(of buildings) likely to break or fall apart; of rickets; CF. rickets; CF. vitamin D', 0),
('ransack', 'search thoroughly; pillage (going through a place); Ex. Enemy soldiers ransacked the town.', 0),
('rancid', 'having the odor of stale or decomposing fat; rank', 0),
('stamp', 'step on heavily (so as to crush or extinguish); put an end to; imprint or impress with a mark, design, or seal; shape with a die; characterize; Ex. machine stamping out car bodies; Ex. newspaper stamping him as a liar; N. stamping; implement used to stamp; impression stamped; mark; Ex. Her remarks bear the stamp of truth.', 0),
('scourge', 'ash; whip (formerly used for punishment); source of severe punishment; V: whip; afflict', 0),
('tantrum', 'fit of bad temper; fit of petulance; caprice; Ex. The child went into tantrums.', 0),
('taper', 'very thin candle; gradual decrease in the width of a long object; V. make or become gradually narrower toward one end\r\n', 0),
('tarantula', 'venomous spider\r\n', 0),
('untoward', 'unexpected and adverse; unfortunate or unlucky; Ex. untoward encounter', 0),
('unwarranted', 'unjustified; having no justification; groundless; baseless; undeserved', 0),
('vanguard', 'forerunners; foremost position of an army; advance forces; foremost position in a trend or movement; CF. rearguard\r\n', 0),
('vantage', 'position giving an advantage (such as a strategic point); CF. vantagepoint\r\n', 0),
('waylay', 'ambush; lie in wait for and attack\r\n', 0),
('wean', 'accustom a baby not to nurse; accustom (the young of a mammal) to take nourishment other than by suckling; give up a cherished activity; cause to gradually leave (an interest or habit); Ex. wean oneself from cigarettes\r\n', 0),
('Xanadu', 'an imaginary exotic, beautiful, idyllic place first mentioned in Saint ', 0),
('Xanadu', 'an imaginary exotic, beautiful, idyllic place first mentioned in Saint Coleridge’s Kuba Khan', 0),
('Xylem', 'plant tissue that conducts water and mineral salts from the roots to all other parts', 0),
('yawn', 'to open the mouth wide usually as an involuntary reaction to fatigue or boredom\r\n', 0),
('yield', 'to surrender or relinquish to the physical control of another:hand over possession of\r\n', 0),
('zeal', 'eagerness and ardent interest in pursuit of something:FERVOR\r\n', 0),
('zigzag', 'one of a series of short sharp turns, angles, or alterations in a course; also :something having the form or character of such a series\r\n', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

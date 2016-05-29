-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2016 at 09:25 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `a1_active_users`
--

CREATE TABLE `a1_active_users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `expires` bigint(20) NOT NULL,
  `updated_Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='A1 - Active user''s history';

--
-- Dumping data for table `a1_active_users`
--

INSERT INTO `a1_active_users` (`id`, `user_id`, `session_id`, `expires`, `updated_Timestamp`) VALUES
(27, 12, 'ba1272k1chj06lpegkgtgiu883', 1464507049, '2016-05-29 07:00:49'),
(26, 11, 'k6h8599unbgcnino7f09vpsjf2', 1464434340, '2016-05-28 10:49:00'),
(25, 17, 'k6h8599unbgcnino7f09vpsjf2', 1464433648, '2016-05-28 10:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `a1_question_bank`
--

CREATE TABLE `a1_question_bank` (
  `question_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `question` varchar(4000) NOT NULL,
  `opt1` varchar(1000) NOT NULL,
  `opt2` varchar(1000) NOT NULL,
  `opt3` varchar(1000) NOT NULL,
  `opt4` varchar(1000) NOT NULL,
  `correct_answer` varchar(1000) NOT NULL,
  `inserted_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Question Bank';

--
-- Dumping data for table `a1_question_bank`
--

INSERT INTO `a1_question_bank` (`question_id`, `subject_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `correct_answer`, `inserted_timestamp`, `user_id`) VALUES
(10, 12, 'The left associative dot operator (.) is used in PHP for', 'multiplication', 'concatenation', 'separate object and its member', 'delimiter', 'separate object and its member', '2016-05-28 11:44:03', 11),
(11, 12, 'Which of the following function returns the number of characters in a string variable?', 'count($variable)', 'len($variable)', 'strcount($variable)', 'strlen($variable)', 'strlen($variable)', '2016-05-28 11:47:14', 11),
(12, 12, 'Identify the variable scope that is not supported by PHP', 'Local variables', 'Function parameters', 'Hidden variables', 'Global variables', 'Hidden variables', '2016-05-28 11:48:25', 11),
(13, 12, 'Which of following commenting is supported by Php.', 'Single line c++ syntax â€“ //', 'Shell syntax â€“ #', 'Both of above', 'None of above', 'Both of above', '2016-05-28 11:49:31', 11),
(14, 12, 'Which of the following function is used for terminate the script execution in PHP?', 'break()', 'quit()', 'die()', 'leave()', 'die()', '2016-05-28 11:50:13', 11),
(15, 12, 'What is the return value of this substr function? \r\n&lt;?php\r\n$rest = substr(&quot;abcdef&quot;, -1);\r\n$rest = substr(&quot;abcdef&quot;, 0, -1);\r\n?&gt;', 'f,abcde', 'a,fedcb', 'b,abcdef', 'a,abcde', 'f,abcde', '2016-05-28 11:51:35', 11),
(16, 12, 'Which of the following variables is not a predefined variable?', '$get', '$ask', '$request', '$post', '$ask', '2016-05-28 11:52:13', 11),
(17, 12, 'A variable $word is set to â€œHELLO WORLDâ€, which of the following script returns in title case?', 'echo ucwords($word)', 'echo ucwords(strtolower($word)', 'echo ucfirst($word)', 'echo ucfirst(strtolower($word)', 'echo ucwords(strtolower($word)', '2016-05-28 11:54:14', 11),
(18, 12, 'In PHP, which of the following function is used to insert content of one php file into another php file before server executes it?', 'include[]', '#include()', 'include()', '#include{}', 'include()', '2016-05-28 11:56:05', 11),
(19, 12, 'Which of the following is not a session function?', 'sesion_decode', 'session_destroy', 'session_id', 'session_pw', 'session_pw', '2016-05-28 11:57:04', 11),
(20, 12, 'On failure of which statement the script execution stops displaying error/warning message?', 'include ()', 'require ()', 'Both of above', 'None of above', 'require ()', '2016-05-28 11:58:23', 11),
(21, 12, 'The most portable version of PHP tag that is compatible to embed in XML or XHTML too is:', '&lt;? ?&gt;', '&lt;script language=â€phpâ€&gt; &lt;/script&gt;', '&lt;% %&gt;', '&lt;?php ?&gt;', '&lt;?php ?&gt;', '2016-05-28 11:59:18', 11),
(22, 12, 'How to add 1 to the variable $count?', 'incr count;', '$count++;', '$count =+1;', 'incr $count;', '$count++;', '2016-05-28 12:01:13', 11),
(23, 12, 'Which of the following method sends input to a script via a URL?', 'get', 'post', 'Both', 'None', 'get', '2016-05-28 12:01:49', 11),
(24, 12, 'The function setcookie( ) is used to', 'Enable or disable cookie support', 'Declare cookie variables', 'Store data in cookie variable', 'All of the above', 'Store data in cookie variable', '2016-05-28 12:03:06', 11),
(25, 13, 'Which of the following is true about variable naming conventions in JavaScript?', 'You should not use any of the JavaScript reserved keyword as variable name', 'JavaScript variable names should not start with a numeral (0-9).', 'Both of the above.', 'None of the above.', 'Both of the above.', '2016-05-29 07:01:15', 12),
(26, 13, 'Which of the following is the correct syntax to create a cookie using JavaScript?', 'document.cookie = ''key1 = value1; key2 = value2; expires = date'';', 'browser.cookie = ''key1 = value1; key2 = value2; expires = date'';', 'window.cookie = ''key1 = value1; key2 = value2; expires = date'';', 'navigator.cookie = ''key1 = value1; key2 = value2; expires = date'';', 'document.cookie = ''key1 = value1; key2 = value2; expires = date'';', '2016-05-29 07:01:39', 12),
(27, 13, 'Which of the following type of variable is visible only within a function where it is defined?', 'global variable', 'local variable', 'Both of the above.', 'None of the above.', 'local variable', '2016-05-29 07:02:05', 12),
(28, 13, 'Which of the following function of Number object forces a number to display in exponential notation?', 'toExponential()', 'toFixed()', 'toPrecision()', 'toLocaleString()', 'toExponential()', '2016-05-29 07:02:28', 12),
(29, 13, 'Which of the following function of String object returns the character at the specified index?', 'charAt()', 'charCodeAt()', 'concat()', 'indexOf()', 'charAt()', '2016-05-29 07:02:54', 12),
(30, 14, 'Which of the following is correct about custom attributes in HTML5?', 'A custom data attribute starts with data- and would be named based on your requirement.', 'You would be able to get the values of these attributes using JavaScript APIs or CSS in similar way as you get for standard attributes.', 'Both of the above.', 'None of the above.', 'Both of the above.', '2016-05-29 07:03:35', 12),
(31, 14, 'How to delete a local storage data in HTML5?', 'To clear a local storage setting you would need to call localStorage.remove(''key''); where ''key'' is the key of the value you want to remove.', 'If you want to clear all settings, you need to call localStorage.clear() method.', 'Both of the above.', 'None of the above.', 'Both of the above.', '2016-05-29 07:04:35', 12),
(32, 14, 'Which of the following attribute specifies if the user can edit the element''s content or not?', 'editable', 'contenteditable', 'contextmenu', 'content', 'contenteditable', '2016-05-29 07:04:58', 12),
(33, 14, 'Which of the following attribute triggers event when an element is dragged?', 'ondragleave', 'ondrag', 'ondragend', 'ondragenter', 'ondrag', '2016-05-29 07:05:20', 12),
(34, 14, 'Which of the following attribute triggers events when a form changes?', 'onchange', 'onedit', 'onformchange', 'onforminput', 'onformchange', '2016-05-29 07:05:42', 12),
(35, 18, 'Which of the following selector selects all paragraph elements with a lang attribute?', 'p[lang]', 'p[lang=&quot;fr&quot;]', 'p[lang~=&quot;fr&quot;]', 'p[lang|=&quot;fr&quot;]', 'p[lang]', '2016-05-29 07:06:27', 12),
(36, 18, 'Which of the following is a true about CSS style overriding?', 'Any inline style sheet takes highest priority. So, it will override any rule defined in tags or rules defined in any external style sheet file.', 'Any rule defined in tags will override rules defined in any external style sheet file.', 'Any rule defined in external style sheet file takes lowest priority, and rules defined in this file will be applied only when above two rules are not applicable.', 'All of the above.', 'All of the above.', '2016-05-29 07:07:33', 12),
(37, 18, 'Which of the following defines a measurement in screen pixels?', 'px', 'vh', 'vw', 'vmin', 'px', '2016-05-29 07:07:54', 12),
(38, 18, 'Which of the following property is used to control the scrolling of an image in the background?', 'background-attachment', 'background', 'background-repeat', 'background-position', 'background-attachment', '2016-05-29 07:08:15', 12),
(39, 18, 'Which of the following property is used to align the text of a document?', 'text-indent', 'text-align', 'text-decoration', 'text-transform', 'text-align', '2016-05-29 07:08:37', 12),
(40, 18, 'Which of the following property is used to set the width of an image border?', 'border', 'height', 'width', '-moz-opacity', 'border', '2016-05-29 07:09:04', 12),
(41, 18, 'Which of the following property of a table element allows browsers to speed up layout of a table by using the first width properties it comes across for the rest of a column rather than having to load the whole table before rendering it?', ':table-layout', ':border-spacing', ':caption-side', ':empty-cells', ':table-layout', '2016-05-29 07:09:28', 12),
(42, 18, 'Which of the following property changes the width of left border?', ':border-bottom-width', ':border-top-width', ':border-left-width', ':border-right-width', ':border-left-width', '2016-05-29 07:09:59', 12),
(43, 18, 'Which of the following property specifies whether a long point that wraps to a second line should align with the first line or start underneath the start of the marker of a list?', 'list-style-type', 'list-style-position', 'list-style-image', 'list-style', 'list-style-position', '2016-05-29 07:10:20', 12),
(44, 18, 'Which of the following defines a relative measurement for the height of a font in em spaces?', '%', 'cm', 'em', 'ex', 'em', '2016-05-29 07:10:44', 12),
(45, 18, 'Which of the following property is used to create a small-caps effect?', 'font-family', 'font-style', 'font-variant', 'font-weight', 'font-variant', '2016-05-29 07:11:13', 12),
(46, 18, 'Which of the following property is used to set the text direction?', 'color', 'direction', 'letter-spacing', 'word-spacing', 'direction', '2016-05-29 07:11:33', 12),
(47, 18, 'Which of the following property is used to control the flow and formatting of text?', 'white-space', 'text-shadow', 'text-decoration', 'text-transform', 'white-space', '2016-05-29 07:11:53', 12),
(48, 15, 'Which of the following is correct about Bootstrap?', 'Bootstrap''s responsive CSS adjusts to Desktops,Tablets and Mobiles.', 'Provides a clean and uniform solution for building an interface for developers.', 'It contains beautiful and functional built-in components which are easy to customize.', 'All of the above.', 'All of the above.', '2016-05-29 07:12:22', 12),
(49, 15, 'Which of the following class styles a table as a nice basic table with stripes on rows?', '.table', '.table-striped', '.table-bordered', '.table-hover', '.table-striped', '2016-05-29 07:12:45', 12),
(50, 15, 'Which of the following class is required to be added to form tag to make it inline?', '.inline', '.form-inline', '.horizontal', 'None of the above.', '.form-inline', '2016-05-29 07:13:05', 12),
(51, 15, 'Which of the following bootstrap style can be used to customize .pagination links?', '.disabled, .active', '.pagination-active, .pagination-disabled', '.menu-active, .menu-disabled', 'None of the above.', '.disabled, .active', '2016-05-29 07:13:31', 12),
(52, 15, 'Using which of the following ways you can add header to a panel?', 'Use .panel-heading class to easily add a heading container to your panel.', 'Use any &lt;h1&gt;-&lt;h6&gt; with a .panel-title class to add a pre-styled heading.', 'Both of the above.', 'None of the above.', 'Both of the above.', '2016-05-29 07:14:15', 12),
(53, 19, 'Which of the following is correct about jQuery?', 'jQuery is a fast and concise JavaScript Library created by John Resig in 2006 with a nice motto - Write less, do more.', 'jQuery simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.', 'jQuery is a JavaScript toolkit designed to simplify various tasks by writing less code.', 'All of the above.', 'All of the above.', '2016-05-29 07:14:44', 12),
(54, 19, 'Which built-in method calls a function for each element in the array?', 'while()', 'loop()', 'forEach()', 'None of the above.', 'forEach()', '2016-05-29 07:15:04', 12),
(55, 19, 'Which of the following jQuery selector selects all elements available in a DOM?', '$(''*'')', '$(''?'')', '$(''#'')', 'None of the above.', '$(''*'')', '2016-05-29 07:15:24', 12),
(56, 19, 'Which of the following jQuery method gets attributes of an element?', 'attr()', 'getAttr()', 'getAttributes()', 'None of the above.', 'attr()', '2016-05-29 07:15:46', 12),
(57, 19, 'Which of the following jQuery method set the value of an element?', 'setContent( val )', 'val( val )', 'setValue( val )', 'None of the above.', 'val( val )', '2016-05-29 07:16:07', 12),
(58, 17, 'What combination of technologies gives AJAX its name?', 'ASP and XAML', 'Asynchronous JavaScript and XML', 'Autonomic Computing and DHTML', 'Atlas and XML', 'Asynchronous JavaScript and XML', '2016-05-29 07:16:41', 12),
(59, 17, 'Which of these technologies is used by AJAX?', 'COBOL', 'Javascript', 'Pascal', 'C++', 'Javascript', '2016-05-29 07:17:07', 12),
(60, 17, 'How can we cancel the XMLHttpRequest in AJAX?', 'die()', 'cancel()', 'abort()', 'stop()', 'abort()', '2016-05-29 07:17:39', 12),
(61, 17, 'How many update panel can be used per page?', '1', 'As many as possible', '0', '9', 'As many as possible', '2016-05-29 07:18:00', 12),
(62, 17, 'Which of the following is not one of the protocols used by Ajax?', 'Passing values and function names through session variables', 'HTTPâ€™s GET or POST', 'XMLHttpRequest for placing a request with the web server', 'Uses JSON to communicate between the client and server', 'Passing values and function names through session variables', '2016-05-29 07:18:23', 12),
(63, 13, 'Which of the following function of String object extracts a section of a string and returns a new string?', 'slice()', 'split()', 'replace()', 'search()', 'slice()', '2016-05-29 07:18:50', 12),
(64, 13, 'Which of the following function of String object returns the calling string value converted to upper case?', 'toLocaleUpperCase()', 'toUpperCase()', 'toString()', 'substring()', 'toUpperCase()', '2016-05-29 07:19:12', 12),
(65, 13, 'Which of the following function of Array object returns a new array comprised of this array joined with other array(s) and/or value(s)?', 'concat()', 'pop()', 'push()', 'some()', 'concat()', '2016-05-29 07:19:30', 12),
(66, 13, 'Which of the following function of Array object calls a function for each element in the array?', 'concat()', 'every()', 'filter()', 'forEach()', 'forEach()', '2016-05-29 07:19:54', 12),
(67, 13, 'Which of the following function of Array object removes the first element from an array and returns that element?', 'reverse()', 'shift()', 'slice()', 'some()', 'shift()', '2016-05-29 07:20:12', 12),
(68, 13, 'Inside which HTML element do we put the JavaScript?', '&lt;script href=&quot; abc.js&quot;&gt;', '&lt;script name=&quot; abc.js&quot;&gt;', '&lt;script src=&quot; abc.js&quot;&gt;', 'None of the above.', '&lt;script src=&quot; abc.js&quot;&gt;', '2016-05-29 07:20:37', 12),
(69, 13, 'Which is the correct way to write a JavaScript array?', 'var txt = new Array(1:&quot;tim&quot;,2:&quot;kim&quot;,3:&quot;jim&quot;)', 'var txt = new Array:1=(&quot;tim&quot;)2=(&quot;kim&quot;)3=(&quot;jim&quot;)', 'var txt = new Array(&quot;tim&quot;,&quot;kim&quot;,&quot;jim&quot;)', 'var txt = new Array=&quot;tim&quot;,&quot;kim&quot;,&quot;jim&quot;', 'var txt = new Array(&quot;tim&quot;,&quot;kim&quot;,&quot;jim&quot;)', '2016-05-29 07:21:04', 12),
(70, 13, 'If para1 is the DOM object for a paragraph, what is the correct syntax to change the text within the paragraph?', 'para1=&quot;New Text&quot;', 'para1.value=&quot;New Text&quot;;', 'para1.firstChild.nodeValue= &quot;New Text&quot;;', 'para1.nodeValue=&quot;New Text&quot;;', 'para1.value=&quot;New Text&quot;;', '2016-05-29 07:21:26', 12),
(71, 13, 'Which of the following event fires when the form element loses the focus: &lt;button&gt;, &lt;input&gt;, &lt;label&gt;, &lt;select&gt;, &lt;textarea&gt;?', 'onfocus', 'onblur', 'onclick', 'ondblclick', 'onblur', '2016-05-29 07:21:45', 12),
(72, 13, 'The _______ method of an Array object adds and/or removes elements from an array.', 'reverse', 'shift', 'slice', 'splice', 'splice', '2016-05-29 07:22:08', 12);

-- --------------------------------------------------------

--
-- Table structure for table `a1_subjects`
--

CREATE TABLE `a1_subjects` (
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `inserted_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Subject list';

--
-- Dumping data for table `a1_subjects`
--

INSERT INTO `a1_subjects` (`subject_id`, `subject`, `inserted_timestamp`, `user_id`) VALUES
(19, 'JQUERY', '2016-05-28 11:41:28', 11),
(18, 'CSS', '2016-05-28 11:41:22', 11),
(17, 'AJAX', '2016-05-28 11:41:16', 11),
(15, 'BOOTSTRAP', '2016-05-28 11:41:08', 11),
(14, 'HTML', '2016-05-28 11:41:03', 11),
(13, 'JAVASCRIPT', '2016-05-28 11:40:43', 11),
(12, 'PHP', '2016-05-28 10:49:23', 11);

-- --------------------------------------------------------

--
-- Table structure for table `a1_users`
--

CREATE TABLE `a1_users` (
  `ID` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailID` varchar(255) NOT NULL,
  `hashpass` varchar(255) NOT NULL,
  `inserted_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Registration table';

--
-- Dumping data for table `a1_users`
--

INSERT INTO `a1_users` (`ID`, `name`, `emailID`, `hashpass`, `inserted_timestamp`) VALUES
(14, 'test', 'test6@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 10:11:48'),
(13, 'test', 'test5@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 10:10:52'),
(12, 'test', 'test4@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 10:09:59'),
(11, 'test', 'test3@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 10:08:35'),
(10, 'test', 'test2@test.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 10:06:18'),
(9, 'test', 'test1@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 09:54:41'),
(8, 'test', 'test@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 09:45:53'),
(15, 'test', 'test7@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 10:18:15'),
(16, 'test', 'test8@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 10:20:44'),
(17, 'test', 'test9@gmail.com', 'daef4953b9783365cad6615223720506cc46c5167cd16ab500fa597aa08ff964eb24fb19687f34d7665f778fcb6c5358fc0a5b81e1662cf90f73a2671c53f991', '2016-05-28 10:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `a1_user_answers`
--

CREATE TABLE `a1_user_answers` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `user_answer` varchar(1000) NOT NULL,
  `correct_answer` varchar(1000) NOT NULL,
  `inserted_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a1_active_users`
--
ALTER TABLE `a1_active_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a1_question_bank`
--
ALTER TABLE `a1_question_bank`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `a1_subjects`
--
ALTER TABLE `a1_subjects`
  ADD UNIQUE KEY `subject` (`subject`),
  ADD UNIQUE KEY `subject_id` (`subject_id`);

--
-- Indexes for table `a1_users`
--
ALTER TABLE `a1_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `emailID` (`emailID`);

--
-- Indexes for table `a1_user_answers`
--
ALTER TABLE `a1_user_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a1_active_users`
--
ALTER TABLE `a1_active_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `a1_question_bank`
--
ALTER TABLE `a1_question_bank`
  MODIFY `question_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `a1_subjects`
--
ALTER TABLE `a1_subjects`
  MODIFY `subject_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `a1_users`
--
ALTER TABLE `a1_users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `a1_user_answers`
--
ALTER TABLE `a1_user_answers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

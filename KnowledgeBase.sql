-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2015 at 04:21 PM
-- Server version: 5.6.25
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KnowledgeBase`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text,
  `created` timestamp NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `user_id`, `comment`, `created`) VALUES
(10, 21, 1, 'This is an interesting article. It helped me to learn how to print to pdfs. ', '2015-12-07 04:08:54'),
(11, 21, 3, 'Yes, it is a great article', '2015-12-07 04:09:24'),
(17, 21, 1, 'Thank you for this information', '2015-12-08 15:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `doc_path` varchar(250) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `doc_path`, `created`) VALUES
(1, 'Sample Document One', 'documents/sample document one.pdf', '2015-12-08 15:56:53'),
(2, 'Sample Document Two', 'documents/sample document two.pdf', '2015-12-08 15:57:10'),
(3, 'Sample Document Three', 'documents/sample document three.pdf', '2015-12-08 15:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `glossary`
--

CREATE TABLE IF NOT EXISTS `glossary` (
  `id` int(11) unsigned NOT NULL,
  `term` varchar(50) DEFAULT NULL,
  `definition` text
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glossary`
--

INSERT INTO `glossary` (`id`, `term`, `definition`) VALUES
(1, 'Acrobat', 'Acrobat, a document exchange software from Adobe Systems, provides a platform-independent means of creating, viewing, and printing documents. Acrobat can convert a DOS, Windows, UNIX or Macintosh documents into a Portable Document Format (PDF) which can be displayed on any computer with an Acrobat reader. The Acrobat reader can be downloaded free from the Adobe website.'),
(2, 'Boolean value', 'Boolean value, also known as boolean datatype, is a primitive datatype having two values: one and zero (sometimes called true and false). It is the special case of a binary numeric datatype of only one digit, or bit, and can also be represented in any other radix by restricting the range of allowed values for certain operations. This datatype is used in boolean and other operations such as: and (AND, &, *), or (OR, |, +), exclusive or/not equivalent (xor, NEQV, ^), equal (EQV, =, ==) and not (NOT, ~, !) which correspond to some of the operations of Boolean algebra and arithmetic.'),
(3, 'Call-by-Reference', 'an evaluation strategy in computer programming, in which a function is passed an implicit reference such as argument''s address to its argument rather than the argument value itself. The called function then can directly access the argument through such reference.'),
(4, 'Class', 'In the context of object oriented computer language, is the prototype for an object in an object-oriented language; analogous to a derived type in a procedural language. A class may also be considered to be a set of objects which share a common structure and behaviour. The structure of a class is determined by the class variables which represent the state of an object of that class and the behaviour is given by a set of methods associated with the class.'),
(5, 'Cloud computing', 'Shared computing services provided on demand by computers accessed over the Internet.'),
(6, 'Commercial Software', 'Commercial software is a computer software sold for commercial purposes or that serves commercial purposes. The most famous examples of commercial software are the products offered on the IBM PC and clones in the 1980s and 90s, including famous programs like Lotus 123, Word Perfect and the various parts that make up Microsoft Office. Commercial software may be re-packaged in boxes and sold in retail stores or directly from vendors. Downloadable software over the Internet for commercial purpose is becoming popular.'),
(7, 'Emulation', 'Emulation refers to the capabilities of a program or device to imitate another program or device. Emulation attempts to model, to various degrees, the state of the device being emulated. Emulation tricks other systems into believing that the device is really some other emulated device. A example of emulation is to mimic the experience of running arcade games or console games on personal computers. In a networked environment, a computer acts as if it is another kind of computer or terminal. For example, a PC user opens a remote terminal session to a Unix, so it may run a program that emulates an Unix terminal.'),
(8, 'Linux ', 'Linux, also known as GNU/Linux, is a free and open source Unix-like computer operating system. Unlike proprietary operating systems such as Windows or Mac OS, all of Linux underlying source code is available to the general public for anyone to use, modify, and redistribute freely. Linux has gained the support of major corporations such as IBM, Sun Microsystems, Hewlett-Packard, and Novell for use in servers and is gaining popularity in the desktop market. It is used in systems ranging from supercomputers to mobile phones.'),
(9, 'Middleware ', 'Middleware is a type of computer software that connects software components or applications. It is used most often to support complex, distributed applications. It includes web servers, application servers, content management systems, and similar tools that support application development and delivery. Middleware is especially integral to modern information based on XML, SOAP, Web services, and service-oriented architecture.'),
(10, 'Multithreading', 'Multithreading typically refers to sharing a single CPU between multiple tasks (or "threads") in a way designed to minimise the time required to switch threads. This is accomplished by sharing as much as possible of the program execution environment between the different threads so that very little state needs to be saved and restored when changing thread. Multiple threads can be executed in parallel on many computer systems. This multithreading generally occurs by time slicing, wherein a single processor switches between different threads--in which case the processing is not literally "simultaneous", for the single processor is only really doing one thing at a time. On a multiprocessor system, threading can be achieved via multiprocessing, wherein different threads can run simultaneously on different processors.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(250) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `slug` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `updated`, `slug`) VALUES
(21, 'How to Print to PDF on Any Computer', 'All modern computers, smartphones, and tablets can now easily print web pages and other documents to PDF files without any extra software. Microsoft added this to Windows 10, and Apple added it to iOS 9.\r\n\r\nPDF is a standard, portable document format that works across all devices. Itâ€™s ideal for archiving and sharing web pages and other documents. Itâ€™s just more compatible than other types of documents, like Microsoftâ€™s XPS document format.\r\n\r\nWindows 10\r\nRELATED ARTICLE\r\n10 Overlooked New Features in Windows 10\r\nWindows 10 includes some flashy new features like Task View virtual desktops, Cortana, the Edge browser, a Start menu, and apps... [Read Article]\r\nWindows 10 finally adds a built-in PDF printer to Windows. In any application â€” from Windows desktop apps to those new Windows Store apps â€” just select the â€œPrintâ€ option in the menu. Youâ€™ll see â€œMicrosoft Print to PDFâ€ appear in the list of installed printers. Select that printer and click the â€œPrintâ€ button. Youâ€™ll then be asked to provide a name and location for your new PDF file.', '2015-12-07 04:02:29', '2015-12-07 04:02:52', ''),
(22, 'How to Track Your Windows 10 PC or Tablet If You Ever Lose It', 'Windows 10â€™s first big update in November 2015 added a device-tracking feature. You can now enable GPS tracking and remotely locate a lost Windows 10 tablet or laptop just like youâ€™d track a smartphone, tablet, or MacBook.\r\n\r\nPreviously, this required third-party software like Prey. Now, itâ€™s integrated for everyone to use with a Microsoft account. It is off by default, so you will have to enable it before you lose your device.\r\n\r\nLimitations\r\nRELATED ARTICLE\r\nWhatâ€™s New in Windows 10â€™s First Big Update (Which Arrives Today)\r\nThe first big update to Windows 10, which should be arriving today via Windows Update, fixes a lot of problems... [Read Article]\r\nBefore you enable this feature, be aware that it has some limitations. This is only a device-tracking solution, and it wonâ€™t allow you to remotely wipe or lock your PC. You also wonâ€™t be able to play an alarm or snap a photo of the person using your device with the webcam. It will only show you your deviceâ€™s locationâ€“ thatâ€™s it! Microsoft may add more features to this in the future, but it hasnâ€™t yet.\r\n\r\nThis also wonâ€™t work quite as well as a lost-smartphone-tracking solution. You can have your computer automatically check in and report its location, but it needs to be powered on and connected to the Internet to do so. A smartphone with a cellular data connection is always-on, always-connected, and can be more easily tracked.\r\n\r\nItâ€™s also possible for a thief to wipe your device, restoring it to factory settings. This will stop you from tracking that device. Windows 10 doesnâ€™t offer the factory-reset-protection iPhones, iPads, and even modern Android devices do.\r\n', '2015-12-07 04:03:52', NULL, ''),
(23, 'How to Enable Full-Disk Encryption on Windows 10', 'Windows 10 sometimes uses encryption by default, and sometimes it doesnâ€™t â€” itâ€™s complicated. Hereâ€™s how to check if your Windows 10 PCâ€™s storage is encrypted and how to encrypt it if it isnâ€™t. Encryption isnâ€™t just about stopping the NSA â€” itâ€™s about protecting your sensitive data in case you ever lose your PC.\r\n\r\nUnlike all other modern consumer operating systems â€” Mac OS X, Chrome OS, iOS, and Android, â€“Windows 10 still doesnâ€™t offer integrated encryption tools to everyone. You may have to pay for the Professional edition of Windows 10 or use a third-party encryption solution.\r\n\r\nDevice Encryption\r\nRELATED ARTICLE\r\nWindows 8.1 Will Start Encrypting Hard Drives By Default: Everything You Need to Know\r\nWindows 8.1 will automatically encrypt the storage on modern Windows PCs. This will help protect your files in case someone... [Read Article]\r\nMany new PCs that ship with Windows 10 will automatically have â€œDevice Encryptionâ€ enabled. This feature was first introduced in Windows 8.1, and there are specific hardware requirements for this.\r\n\r\nThereâ€™s another limitation, too â€” it only actually encrypts your drive if you sign into Windows with a Microsoft account. Your recovery key is then uploaded to MIcrosoftâ€™s servers. This will help you recover your files if you ever canâ€™t log into your PC. (This is also why the FBI likely isnâ€™t too worried about this feature, but weâ€™re just recommending encryption as a means to protect your data from laptop thieves here. If youâ€™re worried about the NSA, you may want to use a different encryption solution.)\r\n\r\nTo check if Device Encryption is enabled, open the Settings app, navigate to System > About, and look for a â€œDevice encryptionâ€ setting at the bottom of the About pane. If you donâ€™t see anything about Device Encryption here, your PC doesnâ€™t support Device Encryption and itâ€™s not enabled.', '2015-12-07 04:04:28', NULL, ''),
(24, 'How to Add More Remote File Systems to Your Chromebookâ€™s Files App', 'By default, the Files app on Chrome OS provides access to your Google Drive storage online and the Downloads folder, which is your Chromebookâ€™s local storage. But Googleâ€™s made it possible to extend the Files app with more cloud storage services and remote file servers, including Windows file shares.\r\n\r\nSet this up and youâ€™ll have easy access to other remote file systems. Theyâ€™ll appear in the Files app and in your Chromebookâ€™s standard â€œOpenâ€ and â€œSaveâ€ dialogs. You can drag-and-drop files between them, too.\r\n\r\nHow It Works\r\nYouâ€™ll need to find new types of file systems in the Chrome Web Store. These are Chrome apps that use the â€œchrome.fileSystemProviderâ€ API to integrate with the operating system, just like Google Drive does by default. This was introduced with Chrome OS 40.\r\n\r\nHow to Find More File System Providers\r\nTo find more file system providers, first open the â€œFilesâ€ app on your Chromebook. Youâ€™ll find it under the launcher menu â€” just tap the â€œSearchâ€ button on the keyboard and search for â€œFilesâ€ or click â€œAll Appsâ€ and look for the icon.\r\n\r\nGoogle has made this more obvious now with a quick link in the Files app. Click â€œAdd  new servicesâ€ in the sidebar and select â€œInstall new from the webstoreâ€ to go directly to the Chrome Web Store.', '2015-12-07 04:04:59', NULL, ''),
(25, 'How to Manage Files from the Linux Terminal: 11 Commands You Need to Know', 'To use the Linux terminal like a pro, youâ€™ll need to know the basics of managing files and navigating directories. True to the Unix philosophy, each command does one thing and does it well.\r\n\r\nMidnight Commander, a full-featured file manager for the Linux terminal, acts as a powerful front end to all these commands.\r\n\r\nls â€“ List Files\r\nThe ls command lists the files in a directory. By default, ls lists files in the current directory.\r\n\r\n\r\n\r\nYou can also list files recursively â€” that is, list all files in directories inside the current directory â€” with ls -R.\r\n\r\n\r\n\r\nls can also list files in another directory if you specify the directory. For example, ls /home will list all files in the /home directory.\r\n\r\ncd â€“ Change Directory\r\nThe cd command changes to another directory. For example, cd Desktop will take you to your Desktop directory if youâ€™re starting from your home directory.\r\n\r\n\r\n\r\nYou can also specify a full path to a directory, such as cd /usr/share to go to the /usr/share directory on the file system.\r\n\r\ncd .. will take you up a directory.\r\n\r\n\r\n\r\nrm â€“ Remove Files\r\nThe rm command removes files. Be careful with this command â€” rm doesnâ€™t ask you for confirmation.\r\n\r\n\r\n\r\nFor example, rm file would delete the file named â€œfileâ€ in the current directory. Like with other commands, you could also specify a full path to a file: rm /path/to/file would delete the file at /path/to/file on your file system.\r\n\r\nrmdir â€“ Remove Directories\r\nThe rmdir command removes an empty directory. rmdir directory would delete the directory named â€œdirectoryâ€ in the current directory.\r\n\r\nIf the directory isnâ€™t empty, you can use a recursive rm command to remove the directory and all files in it. rm -r directory would delete the directory named â€œdirectoryâ€ and all files in it. This is a dangerous command that could easily delete a lot of important files, so be careful when using it. It wonâ€™t ask for confirmation.\r\n\r\n\r\n\r\nmv â€“ Move Files\r\nThe mv command moves a file to a new location. This is also the command youâ€™ll use to rename files. For example, mv file newfile would take the file named â€œfileâ€ in the current directory and move it to the file named â€œnewfileâ€ in the current directory â€” renaming it, in other words.\r\n\r\n\r\n\r\nLike with other commands, you can include full paths to move files to or from other directories. For example, the following command would take the file named â€œfileâ€ in the current directory and place it in the /home/howtogeek folder:\r\n\r\nmv file /home/howtogeek\r\n\r\ncp â€“ Copy Files\r\nThe cp command works the same way as the mv command, except it copies the original files instead of moving them.\r\n\r\nYou can also do a recursive copy with cp -r. This copies a directory and all files inside it to a new location. For example, the following command places a copy of the /home/howtogeek/Downloads directory into the /home/chris directory:\r\n\r\ncp -r /home/howtogeek/Downloads /home/chris\r\n\r\nmkdir â€“ Make Directories\r\nThe mkdir command makes a new directory. mkdir example will make a directory with the name â€œexampleâ€ in the current directory.\r\n\r\n\r\n\r\nln â€“ Create Links\r\nThe ln command creates links. The most commonly used type of link is probably the symbolic link, which you can create with ln -s.\r\n\r\nFor example, the following command creates a link to our Downloads folder on our Desktop:\r\n\r\nln -s /home/howtogeek/Downloads /home/howtogeek/Desktop', '2015-12-07 04:05:58', NULL, ''),
(26, 'How to Create ISO Files From Discs on Windows, Mac, and Linux', 'ISO files are disc images â€” complete images of a CD or DVD bundled in a single file. This file can then be â€œmountedâ€ and made available as a virtual CD or DVD, allowing you to convert physical discs to virtual ones.\r\n\r\nThis is particularly useful if you want to use old game or software discs on a modern computer that doesnâ€™t have a disc drive. Note that some DRM copy protection schemes wonâ€™t work with ISO files unless you jump through additional hoops.\r\n\r\nWindows\r\nRELATED ARTICLE\r\nHow to Use CDs, DVDs, and Blu-ray Discs on a Computer Without a Disc Drive\r\nPhysical disc drives are going the way of the dodo. Modern laptops â€” and even many modern desktop PCs â€”... [Read Article]\r\nWindows doesnâ€™t have a built-in way to easily create ISO files, although modern versions of Windows â€” Windows 8, 8.1, and 10 â€” can all natively mount ISO files without any additional software.\r\n\r\nTo actually create an ISO file from your own physical disc, youâ€™ll need to get a third-party program that can do so. There are many, many tools for this â€” and many of them are packed with junkware. Beware!\r\n\r\nInfraRecorder does a fine job of this and is free, open-source software that doesnâ€™t include junkware. Insert a disc, click the â€œRead Discâ€ button, and select a source drive to read from and destination ISO file to create.\r\n\r\nAnd, as usual when downloading Windows freeware, Ninite is a safe place to get a variety of other tools for doing this, such as ImgBurn and CDBurnerXP. Some of these programs â€” like ImgBurn â€” do include junkware in their installers if you get them from elsewhere.', '2015-12-07 04:06:56', NULL, ''),
(27, 'How to Convert a PDF File to Editable Text Using the Command Line in Linux', 'There are various reasons why you might want to convert a PDF file to editable text. Maybe you need to revise an old document and all you have is the PDF version of it. Converting PDF files in Windows is easy, but what if youâ€™re using Linux?\r\n\r\nRELATED ARTICLE\r\nConvert PDF Files to Word Documents and Other Formats\r\nMost of us know easy ways to turn a Word or other text document into a PDF, but what if... [Read Article]\r\nNo worries. Weâ€™ll show you how to easily convert PDF files to editable text using a command line tool called pdftotext, that is part of the â€œpoppler-utilsâ€ package. This tool may already be installed. To check if pdftotext is installed on your system, press â€œCtrl + Alt + Tâ€ to open a terminal window. Type the following command at the prompt and press â€œEnterâ€.\r\n\r\ndpkg â€“s poppler-utils\r\n\r\nNOTE: When we say to type something in this article and there are quotes around the text, DO NOT type the quotes, unless we specify otherwise.', '2015-12-07 04:07:32', NULL, ''),
(28, 'How to Make Any Computer Boot Up or Shut Down on a Schedule', 'Windows, Mac OS X, and Linux all allow you to schedule boot-ups, shut-downs, and wake-ups. You can have your computer automatically power up in the morning and automatically shut down at night, if youâ€™d like.\r\n\r\nThis is less necessary than ever thanks to sleep mode â€” a typical laptop just enters low-power sleep mode it can quickly resume from when itâ€™s not being used â€” but may still be useful for desktop PCs.', '2015-12-07 04:08:15', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `state`, `username`, `email`, `password`, `full_name`, `department`, `position`, `pic`) VALUES
(1, 1, 1, 'admin', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', 'Joe Doe', 'Technical Writing', 'KB Administrator', 'img/profile/1.jpg'),
(2, 0, 1, 'testuser', 'testuser@mail.com', '5d9c68c6c50ed3d02a2fcf54f63993b6', 'Jenna Tester', 'Software Quality Assurance', 'Automation QA Engeer', 'img/profile/2.jpg'),
(3, 0, 1, 'asdf', 'asdf@mail.com', '6a204bd89f3c8348afd5c77c717a097a', 'John Jeferson', 'Software Development', 'Software QA', 'img/profile/3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glossary`
--
ALTER TABLE `glossary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `glossary`
--
ALTER TABLE `glossary`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

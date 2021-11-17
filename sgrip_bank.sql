SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `accountdetails` (
  `sno` int(11) NOT NULL,
  `accID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `accountdetails` (`sno`, `accID`, `name`, `email`, `balance`) VALUES
(1, 1288, 'Garima', 'grsingh@gmail.com', 6000),
(2, 7654, 'Suhina', 'ss2410@gmail.com', 7000),
(3, 2354, 'Eashan', 'eashan@gmail.com', 550),
(4, 1122, 'Suyash', 'yash11@yahoo.com', 9500),
(5, 9450, 'Shiva', 'shiv2021@gmail.com', 3450),
(6, 7518, 'Raavi', 'raavi78@gmail.com', 9630),
(7, 5555, 'Pawan', 'pw23@gmail.com', 8880),
(8, 5567, 'Shubh', 'shubh1122@gmail.com', 9999),
(9, 1851, 'Shriya', 'srt@yahoo.com', 8900),
(10, 6613, 'Eshna', 'ers@gmail.com', 7865),
(11, 9014, 'Kartik', 'kittu56@gmail.com', 6600);

CREATE TABLE `history` (
  `sno` int(11) NOT NULL,
  `payer` text NOT NULL,
  `payerAcc` int(11) NOT NULL,
  `payee` text NOT NULL,
  `payeeAcc` int(11) NOT NULL,
  `amount` double NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `history` (`sno`, `payer`, `payerAcc`, `payee`, `payeeAcc`, `amount`, `time`) VALUES
(1, 'Suhina', 7654, 'Eashan', 2354, 100, '2021-11-09 23:00:01'),
(2, 'Garima', 1288, 'Eshna', 6613, 200, '2021-10-14 19:30:22');

ALTER TABLE `accountdetails`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `history`
  ADD PRIMARY KEY (`sno`);
ALTER TABLE `accountdetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `history`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

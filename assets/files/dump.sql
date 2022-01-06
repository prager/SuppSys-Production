-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: db5000371745.hosting-data.io
-- Generation Time: Oct 20, 2020 at 09:32 PM
-- Server version: 5.7.30-log
-- PHP Version: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs359694`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id_sessions` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `session_id` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(42) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `logged` tinyint(4) NOT NULL DEFAULT '0',
  `date_logged_in` int(11) NOT NULL DEFAULT '0',
  `date_logged_out` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `gear`
--

CREATE TABLE `gear` (
  `id_gear` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `id_gear_set` int(11) DEFAULT NULL,
  `description` varchar(128) COLLATE utf8_bin NOT NULL,
  `location` varchar(512) COLLATE utf8_bin NOT NULL,
  `qty` mediumint(9) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gear`
--

INSERT INTO `gear` (`id_gear`, `type`, `id_gear_set`, `description`, `location`, `qty`) VALUES
(2, 1, NULL, 'M+gVJAZ0/o3XW/EnwWyuFQ==', 'Bin 3', 8),
(3, 1, NULL, 'd5bbme7yutWnoja1cH3gFUsQHJXzMF9/rDcPp7R53cY=', 'Issued', 3),
(6, 1, NULL, 'BrXtXe3H6yA5I9AmTH4Ksvbr8XzNKhfRyWgb4DaJsdY=', 'Bin 10', 3),
(9, 1, NULL, 'VTwB35JGAM9Re2P4lF5NECok2UgThlLpMzaDAir68q8=', 'Bin 3', 20),
(11, 1, NULL, 'SHUNnBRLNwPsbCVVV9iT/A==', 'Bin 6', 54),
(12, 1, NULL, 'osR5s+Z48VvzkqyrCaP5kYAq8Y+pWkfjZcDjC76OulI=', 'Bin 1', 7),
(13, 1, NULL, 'UxsGP/ZwL477luMxM8FCFgbFgKiElAtDHHV2j9N1kWA=', 'Issued', 0),
(14, 1, NULL, 'UxsGP/ZwL477luMxM8FCFuGPPam0iTeMLXmfEyYmF1s=', 'Bin 23', 1),
(15, 1, NULL, 'VTwB35JGAM9Re2P4lF5NEKxmJBA6szweGuJn1zaTB6s=', 'Bin 3', 8),
(16, 1, NULL, 'uRojOrgrxBbt4/dAH//QTw==', 'Bin 16', 2),
(18, 1, NULL, '8ao50vTXo6XRLW9H96xE2ZNn/JULSOFdOiUyriybxqQ=', 'Bin 2', 7),
(21, 1, NULL, 'x+D6mId7rie9+KJpAMhiOYU8VhEVP3DuNEIIIu7p178=', 'Bin 7', 29),
(22, 1, NULL, 'I9XN8VVO3gdBLsfznbVeEo7Yo9EKWR4EXrbD8BoBLZU=', 'Bin 7', 20),
(23, 1, NULL, '6/ozoQ51FSqtVuRd4HYjtra0ErR4qKFGAnJLFfZgNts=', 'Bin 9', 5),
(24, 1, NULL, 'zCgNE+FmBleh3B60EoD1EQ==', 'Bin 8', 0),
(25, 1, NULL, '9PFvYaNybPWh3ycfbhi/2YyhBc7Cp0tsSTtQLtoJ7t8=', 'Shelve 1 / Pos 3', 7),
(26, 1, NULL, 'BcFpbEiSlaD/Jd+5pL3f5o3Npj8RLYEGdysloMNRHgI=', 'Bin 12', 21),
(27, 1, NULL, 'g5O5hZ8N6wMuhROwDZ/fUcLXo0LhE1YV/r6OXa5RRBU=', 'Bin 13', 27),
(28, 1, NULL, '/ihvR3dU3iIgJktcxf1vblsRdwHeUhdhcuSth9LF7uw=', 'Bin 15 / A-room', 9),
(29, 1, NULL, 'xbL8ya67y2Fj+IXjxjwrB2Cdb+qZyBKkrrvdU5OA0do=', 'Bin 11', 5),
(31, 1, NULL, '2Msjbng4aIu6CyedTLvBbapLNt24yosypj0P1yuuviQ=', 'Bin 21', 2),
(32, 1, NULL, 'RlmjpnO5GR29waEwJ6vbmg==', 'Bin 17', 5),
(33, 1, NULL, 'sAN2cLyLaQ07Y0FhNCKS36RGZ5I7t4U5AUwc+ohc0cE=', 'Issued', 0),
(34, 1, NULL, 'jQNoIrsdToZFex3r9S9uSwc9YbfdJKlTx/GcLs9qhzY=', 'Bin 49', 12),
(35, 1, NULL, 'bsBXSOeWIqIuVgRbI5bzqrG+PY+NJv6Cr6QFSCq3opE=', 'Bin 40', 21),
(36, 1, NULL, 'P9mEnRgKaJhz1RtNTUIj4tX9zw2cxi3YNoS3zsCNSXM=', 'Bin 40', 19),
(37, 1, NULL, 'OywfZCKVW7U12zOREBTjNhhaifoWjqng/T0naeBdEs8=', 'Shelve 1 Pos 10', 0),
(38, 1, NULL, 'OywfZCKVW7U12zOREBTjNu2fCq3Kk69O9Oa/1HNpVhY=', 'Shelve 1 Pos 10', 0),
(39, 1, NULL, 'OywfZCKVW7U12zOREBTjNtEGEkz7p0b0QE4Q+B+nnNI=', 'Shelve 1 Pos 10', 1),
(40, 1, NULL, 'OywfZCKVW7U12zOREBTjNpD39odkuKK595CLWJOUZd0=', 'Shelve 1 Pos 11', 0),
(41, 1, NULL, 'h9/ErcFW/C4ZbFDE4nJ3GWXsoUu9UVh3zadqCTVtFr4=', 'Shelve 1 Pos 4', 3),
(42, 1, NULL, 'h9/ErcFW/C4ZbFDE4nJ3GVzcUCAWXDTgqgsjDhBnF2E=', 'Shelve 1', 5),
(43, 1, NULL, 'h9/ErcFW/C4ZbFDE4nJ3GXWbkuHNJ4YBUBVjM+81T1Y=', 'Shelve 1 Pos 5-7', 2),
(44, 1, NULL, 'h9/ErcFW/C4ZbFDE4nJ3GaCSCTqyJerwWX12XOjCKiE=', 'Issued', 1),
(45, 1, NULL, 'SixDfsRaa0wN5J2JFhiBXQ==', 'Bin 30', 3),
(46, 1, NULL, 'BuhN4LBa555CLSR5+7S3YobLEaJiYT8BvBAaQ5yv7og=', 'Issued', 2),
(47, 1, NULL, 'tEJnd1QUdx5SrYb1e46HZM6MAISZU44PhaezgHOVZrk=', 'Issued', 5),
(48, 1, NULL, '26AIBMyE3Ydz4FY5oagegg==', 'Shelve 2 Pos 4', 14),
(49, 1, NULL, 'y5MbII3nYBnuaXH5sPISGGuq/ZwdcTTmk5+3DAcjEhc=', 'Bin 10', 2),
(50, 1, NULL, 'MrCtuSRQcBBuNe7u1vlT+b/gxTq0g975LSTKV+jxJMk=', 'Bin 21', 9),
(51, 1, NULL, 'Z3zVDuA9o5l1Qj6GY67OrogOuhL7GpvUEadrtJe5wxQ=', 'Bin 44', 49),
(52, 1, NULL, 'LciH5xAUfcD55XncmXRz8vFYb+TVQntkAJckSdnMkTE=', 'Bin 11', 2),
(53, 1, NULL, 'ONgYYD+Wp/pvXxgTy2y99v0GdDR814QfOYHs7fCwWzY=', 'Issued', 4),
(54, 1, NULL, 'x1No74ZbEW0k6At03Rn1zw==', 'Issued', 1),
(55, 1, NULL, 'OlXW5IQJk8WO+MyApq33Qw==', 'Bin 30', 4),
(56, 1, NULL, 'VG+KP3J7y29IVfmakZlzfw==', 'A-Room', 10),
(57, 1, NULL, 'AWmwMx/mXqWuqHic8tiotw==', 'Issued', 2),
(58, 1, NULL, 'Lcosl0asApbn8TrjrI1T6g==', 'ARC', 53),
(59, 1, NULL, 'gGrKWJyACS41ss5Joupebg==', 'Connex 5', 1),
(60, 1, NULL, 'Z17FS3C+izD7qOaAPCq/ZQ==', 'Connex 5', 7),
(61, 1, NULL, 'phsge9zxgPFt+bvRShzkWw==', 'Connex 5', 1),
(62, 1, NULL, 'WuTgHAgVXQ7Eeqydcg+RdDXPF2Y1lY8KC1a5HLvxWWlaRS+kvpA3DM5T8iYM5zyM', 'Issued', 0),
(63, 1, NULL, 'M4Lq2Vnq63dMDy07a8FS+g==', 'Bin 28', 16),
(65, 1, NULL, 'pv9/LA03Bf+LwqgvlhVDdCkdDVIvR7KOiVBEfK72BPI=', 'Issued', 3),
(66, 1, NULL, 'C+FodmctjFf1/+DEYD6mlg==', 'Bin 12', 2),
(67, 1, NULL, 'YdSopG51ME6yoU77Nr5IZZkHi4Y/8xFL+7wML9Hbbr8=', 'Issued', 0),
(68, 1, NULL, 'YdSopG51ME6yoU77Nr5IZXVlPaDbcoejuOTqg9fSiXo=', 'Bin 16', 4),
(69, 1, NULL, 'YdSopG51ME6yoU77Nr5IZQpr6TRTpXGaf5Owj8F2Eyk=', 'Bin 16', 5),
(70, 1, NULL, 'oq8v9wL1DdJjveKkBZOUbzAzvj+1HG1dLoBSzdxDJBU=', 'Supp 245', 56),
(71, 1, NULL, 'VTwB35JGAM9Re2P4lF5NEIvTJ58KX62IaAbJ6Fl/SS0=', 'Supp Room', 42),
(72, 1, NULL, 'VTwB35JGAM9Re2P4lF5NEKys/fq/fRFwBhh5lL9mKhg=', 'Supply Room', 6),
(73, 1, NULL, 'SIwwsUe1HLThDcqOtMSb66MSREaQW8wbwixf9UDpUuc=', 'Shelve 1', 6),
(74, 1, NULL, 'SIwwsUe1HLThDcqOtMSb6+Qn1noN9Z6bYUChHwHLd9g=', 'Shelve 1', 0),
(75, 1, NULL, 'SIwwsUe1HLThDcqOtMSb65kU9pqJEleSLNDv+jlmwvI=', 'Bin 30', 1),
(76, 1, NULL, 'coKgvquwa5tacqPA5JoCNXmQhZt/y9pNwBzLRRBwODI=', 'Issued', 0),
(77, 1, NULL, 'fIUcZ+AB2FYm0lqJRVoiXA==', 'Shelve 2', 4),
(78, 1, NULL, 'hgiXwbVnoUiOPeIPOmfLVA==', 'Bin 15', 28),
(79, 1, NULL, 'q77VMFMqxL3og4MbG9q5yA==', 'Bin 20', 5),
(80, 1, NULL, 'XswKav8RfIvXaw/azG/hMw==', 'Issued', 56),
(81, 1, NULL, '7bzdRvmiaDe1WgeaoZj/Yw==', 'Bin 25', 44),
(82, 1, NULL, 'kJAMTOu1gG1l00LkdVr8/Q==', 'Bin 26', 17),
(83, 1, NULL, 'UMCtkrlbxX6la4K2jHV1Mw==', 'Bin 26', 35),
(84, 1, NULL, '2TWivyvW+mJ8CIKlVQIIDA==', 'Bin 27', 22),
(85, 1, NULL, 'pqStbvbzIbWpfQgscLKTR5odl6btqVUwTJONJrlooTI=', 'Bin 28', 29),
(86, 1, NULL, 'JuRBaMssx6kSO9wARFW0kD85GmbUkb9almHkRt6SAZc=', 'Bin 47', 0),
(87, 1, NULL, 'd5bbme7yutWnoja1cH3gFV1KIqEm7034E3tDNcN4IXg=', 'Issued', 2),
(88, 1, NULL, 'V+TWixJcmiE/Nj6fBn0AbaQobwXi2Sd5pwRSDch3g2s=', 'Issued', 33),
(89, 1, NULL, '2GjhLRBgM3/nsuEwvu+Hyg==', 'Issued', 1),
(90, 1, NULL, 'OxK0lTgbjcG+b4XGhbs9bw==', 'Issued', 3),
(91, 1, NULL, 'HNrJwx5GyO2iErxGjcM/XfpvTFPX00LDi+xKkw14PRg=', 'Issued', 3),
(92, 1, NULL, 'LD6g2fYpxb0ag0FlSYvnQzVbpovhNEVI9QXLa6jbCr0=', 'Issued', 0),
(93, 1, NULL, '296tMAJkrqNskwIZ9hGXSg==', 'A-room', 3),
(94, 1, NULL, 'GKfoEfhumYkjv2H3NZmzDw==', 'Issued', 0),
(95, 1, NULL, 'YHnYu+iTiJp/hbrFkXHmu2wRvXxncN398w5ZGYGnxME=', 'Issued', 3),
(96, 1, NULL, 'BuhN4LBa555CLSR5+7S3YpOz9Q9LufrDtpnjeUvy40U=', 'Issued', 0),
(97, 1, NULL, 'lwcJlg004GrwJKQDgYEUUOFsngywUVM21JEs8znthKc=', 'Issued', 0),
(98, 1, NULL, 'cpBubG2ylOwZhNUbNo2ZVg==', 'Issued', 12),
(99, 1, NULL, 'LsggWeRsptklb0TERLK31vS43bMBstjoTBlrtVWem4k=', 'Issued', 0),
(100, 1, NULL, 'hERez+HHcHb7UpvtXA+tds4Yyx0gGqj7ukuSnUqc+i0=', 'Issued', 0),
(101, 1, NULL, 'KVv08BqHj9tFUbwjgKXPAqlxlNsTVxH6k1o7YRu6n8E=', 'Issued', 41),
(102, 1, NULL, 'ITyS1qhtzv2cnbEvnANV9QRWULF8A5GIUDs+PiVGM6Y=', 'Issued', 29),
(103, 1, NULL, 'u4RJ9RCl+747oL+zm0DLDZ9Xb8jmBO0S+EYTQYL7oiE=', 'Issued', 42),
(104, 1, NULL, '1m6Tlqwm8PgF7K4O5ORFGyOJl0Jep1VgQdsgTgJpnG0=', 'Issued', 3),
(105, 1, NULL, 'HNrJwx5GyO2iErxGjcM/XTE498SLfmkU5wgFZ0dhFhk=', 'Issued', 0),
(106, 1, NULL, 'lztY8b9U+eLwkmsHU7J0iw4Iu0euaz37BzW7fhLyGfE=', 'Issued', 0),
(108, 1, NULL, 'gCGdwTw4anOxEVDMt/mTDg==', 'Issued', 73),
(109, 1, NULL, 'bnW2L4ZVyPY5pU16RW2l1VZnoAZE8hdPy0huMGGGwyo=', 'Issued', 0),
(110, 1, NULL, 'Se2X5xX4RvdBThgV05VybZ2tEnVxbQv4dsbBNt+ABSI=', 'Issued', 0),
(111, 1, NULL, 'AJAOEJGxdDeQatZLqkgwzg==', 'Issued', 0),
(112, 1, NULL, '122p6suzJwB4kg+hqrr7STeyFQ73GQN8bygONPaUVeY=', 'Issued', 1),
(113, 1, NULL, 'QL+TgzgK9PuCFVJZzqZ8UUn7rwTVqaOQ51u+Rnd+0eQ=', 'Issued', 33),
(114, 1, NULL, 'SIwwsUe1HLThDcqOtMSb677YTqaTEoowU//J5/P6W90=', 'Issued', 1),
(115, 1, NULL, 'VBDQbQYdHi5tQhcxlJAzWA==', 'Issued', 0),
(116, 1, NULL, 'bnW2L4ZVyPY5pU16RW2l1WHgDdHLAN9v429VKcfNc5E=', 'Issued', 0),
(117, 1, NULL, 'op3r01gRmZ5u6sf46ztvBYOLvKp1XuovYOy0NrS2YE0=', 'Issued', 0),
(118, 1, NULL, 'oro7jdy2S5SKQ1AHJ/A2OA==', 'Issued', 9),
(119, 1, NULL, 'KFi64viuyghYdXscMhXyrq5O1hXX9sWeMdFMCLtelkI=', 'Issued', 8),
(120, 1, NULL, 'YuYZinkdfigqtN0pMPX+lw==', 'Issued', 1),
(121, 1, NULL, 'DQyUV9o4qENJY1URtlEd6Mknr3ZK2/zYk0Vwp/Tqd8E=', 'Issued', 0),
(122, 1, NULL, 'op3r01gRmZ5u6sf46ztvBStcRyXzDKJvIITtbhppLqA=', 'Issued', 0),
(123, 1, NULL, 'diA/+7uFl2D7GD8N/Q0Mmw==', 'Misc', 23),
(124, 1, NULL, '1CRahSViD5bBTPHe1C6clOoUTAkH8WRaZJECkSLFQN8tsFoWcAOi0pH2GFMy4t6I', 'Issued', 8),
(125, 1, NULL, 'HUid+4G6RKlX3tpGCPP9R9+D/WtxSE/mr/xK3CPkosc=', 'Issued', 3),
(126, 1, NULL, 'S4DEUw6H5G4A17wK2hw+6pvRumGFIwz1t01YoIZZ8Vg=', 'Issued', 0),
(127, 1, NULL, 'z5ZUdiw1BU1FjoRDjDk8We8CjlemkqmjMbrZEkDKU9k=', 'Bin 29', 48),
(128, 1, NULL, 'pm0f6coIOsA+t7nurrZXHv8aI/iT3rswstciFntERtc=', 'Shelve #2 Pos 3', 78),
(129, 1, NULL, 'xaQEduP7vnR11suedclJTghWT9KTHsEwjXINtCWfOgI=', 'Issued', 20),
(130, 1, NULL, '5A4NsPPgpvWZ1sI+i/mPBw==', 'Issued', 48),
(132, 1, NULL, 'y5MbII3nYBnuaXH5sPISGJTmeF71x90XWRKwWzDb7p4=', 'Issued', 26),
(133, 1, NULL, 'BqI6yFPVftBu1QEKxR2pnzbFi15RTThZ5dukzDwv5DnukYGkqEVPdgYGtlLSU5Ri', 'Issued', 25),
(135, 1, NULL, 'bnW2L4ZVyPY5pU16RW2l1Xz6G9ZFiBVik53HguJBfqk=', 'Bin 43', 2),
(136, 1, NULL, 'ADBpSSt3YnBnp1zYOmc/ZZtH0cZT3GsXjicXneyfkNo=', 'Issued', 1),
(137, 1, NULL, 'RiW2OUEMOamhSmUNxTZ5lg==', 'Issued', 19),
(138, 1, NULL, 'Gk5WHbcn1O9dsjVJUy1GvV0CBULXWh/AAOwQnSzG748=', 'Issued', 1),
(139, 1, NULL, 'bjQ5d4gkTFavo5Fh9ezUZfxcX0rIv00cUAyloQ0/qG8=', 'Issued', 0),
(140, 1, NULL, 'EQd132vzxrHHlBS7VTziZP786po3lz8IF6/ZwQPVC/Y=', 'Issued', 29),
(141, 1, NULL, 'I9XN8VVO3gdBLsfznbVeEh6zGsmoG7+5UDcGE97wmVc=', 'Issued', 9),
(142, 1, NULL, 'h9/ErcFW/C4ZbFDE4nJ3GQmZ0AtM9i+viLsmXSF+u5o=', 'Issued', 0),
(143, 1, NULL, 'T8JO4p+kVdlz/tHH6xAgyw==', 'Bin 4', 12),
(144, 1, NULL, 'xuYnqZnSjnrBdJh6YOdr1w==', 'Issued', 0),
(145, 1, NULL, 'eOU50YBAQr1L9rR8XFJXcS38Yfd3WEPEP+rmX8U+L90=', 'Shelve 1 / Pos 7', 25),
(146, 1, NULL, 'sAN2cLyLaQ07Y0FhNCKS30+159hWJ75uUfw+Qj+a5o4=', 'Bin 22', 15),
(147, 1, NULL, 'sAN2cLyLaQ07Y0FhNCKS38fR7g/e/8qXVy8qdSdOZFA=', 'Bin 23', 18),
(148, 1, NULL, 'sAN2cLyLaQ07Y0FhNCKS3196LZeQ7Dpz8pEkBMfELDw=', 'Bin 43', 7),
(151, 1, NULL, 'JTg+B1whO1Cr+dC36sFDRQ==', 'Connex 5', 1),
(152, 1, NULL, 'h9/ErcFW/C4ZbFDE4nJ3GWre/V/WtaLvsfTwavbGcAI=', 'Issued', 0),
(153, 3, NULL, 'M4Lq2Vnq63dMDy07a8FS+g==', 'Box 1', 24),
(154, 3, NULL, 'HUid+4G6RKlX3tpGCPP9R0uYszc4YeZwCT/c3U7x2r8=', 'Box 1', 27),
(155, 3, NULL, '4LrNdshTYXYQqPMJ45aozA==', 'Box 1', 17),
(156, 3, NULL, '9/ilTam9fgX5ymNMUEFeWA==', 'Box 1', 3),
(157, 3, NULL, '/rEf1mkAwTXqFefTq0Eprw==', 'Box 1', 3),
(158, 3, NULL, 'M+gVJAZ0/o3XW/EnwWyuFQ==', 'Box 1', 7),
(159, 3, NULL, '0pA6d4+ff8k41yzGhh2fog==', 'Box 1', 1),
(160, 3, NULL, '6ZUbMBZ1k33o8WGFIQ0YJw==', 'Box 1', 2),
(161, 3, NULL, 'SHUNnBRLNwPsbCVVV9iT/A==', 'Box 1', 3),
(162, 3, NULL, 'woGXdFn2dx4zSzy7J2ECV+TKTEvXqyWiabzY3umQ014=', 'Box 1', 3),
(164, 3, NULL, 'HUid+4G6RKlX3tpGCPP9R9+D/WtxSE/mr/xK3CPkosc=', 'Box 1', 2),
(165, 3, NULL, 'aIS0/Znc7DTmIObMhXtgGb6x17DAEtq4/sG/vFAUQc0=', 'Box 1', 4),
(166, 3, NULL, 'bsvUm5y5qIklSbFkGGMisf54owDSX8EuVvypl7cwpnk=', 'Box 1', 2),
(167, 3, NULL, 'op263yqiZU+V8Adi/JuatFs9yQeqMouSpEeej4sQ6Js=', 'Box 1', 2),
(168, 3, NULL, 'yQijmyuvQ/YwGqv04oB7DQ==', 'Box 1', 1),
(169, 3, NULL, '3z7vFGntcCM7bnmWc4rgNkaVOlt4Y/636B2ybQ707NA=', 'Box 1', 1),
(170, 3, NULL, 'VTwB35JGAM9Re2P4lF5NEJRLAxxK165rzhBIT6Ykb98=', 'Box 1', 3),
(171, 3, NULL, 'xuYnqZnSjnrBdJh6YOdr1w==', 'Box 1', 1),
(172, 3, NULL, 'ADBpSSt3YnBnp1zYOmc/ZUQloLOMCUv4ICV1btgfsLc=', 'Box 1', 1),
(173, 3, NULL, 'Oqb6yfHkioXjbsVzr6YZagkGHZiV5A/75Y2lsnXuo34=', 'Box 1', 1),
(174, 3, NULL, 'MrCtuSRQcBBuNe7u1vlT+b/gxTq0g975LSTKV+jxJMk=', 'Box 1', 1),
(175, 3, NULL, '6ZUbMBZ1k33o8WGFIQ0YJw==', 'Box 1', 1),
(176, 3, NULL, 'pV/eygltecdPGfWSWOMH981iZv7mSTX64hhuQsC9Vk0=', 'Box 1', 1),
(177, 1, NULL, 'h9/ErcFW/C4ZbFDE4nJ3GfFheq73rT1BD2fxn1IsNjs=', 'Bin 30', 2),
(178, 1, NULL, 'SIwwsUe1HLThDcqOtMSb66+GFVEyroyGTbDM3EqtOSI=', 'Shelve 1 / Bin 30', 10),
(179, 1, NULL, 'A+lDnjncWWvDWF13qTSZPzZHPoOgGx9YrCofIvJtzCs=', 'Shelve 1', 2),
(180, 1, NULL, '8W1b6/iHc8LzwXnHNHCY63gmGTl4zUUhWPBayf4Hwoc=', 'Issued', 0),
(181, 1, NULL, '69VHmCsx7ECZyiQcfnJynk7q94JDlQmUcbux7nsSlBI=', 'Bin 30', 40),
(182, 1, NULL, 'sqjrDUUKAZJzUlGnYqwdvNV91z6jylp4rPsNT24JM9KVCKQcqD0zizMR0Ut77nSq', 'TBD', 34),
(183, 1, NULL, '3/Gv9VJwPJQVRJEAy5tOSJEJnOSG+S/tMoxU5/Kaa99LDSTPVE3XMBm12JN6JXRG', 'Connex 5', 95),
(184, 1, NULL, 'SIwwsUe1HLThDcqOtMSb66Vg4/utDJcae9HCB22ZKn0=', 'Issued', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gear_sets`
--

CREATE TABLE `gear_sets` (
  `id_gear_sets` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `id_member` int(11) NOT NULL DEFAULT '0',
  `gear_set` varchar(1024) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `date_issued` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gear_sets`
--

INSERT INTO `gear_sets` (`id_gear_sets`, `id_parent`, `id_member`, `gear_set`, `description`, `date_issued`) VALUES
(8, 0, 0, '12:51:46:28:79:3:126:90:31:26:106:125:95:78:121:104:59:55:24:32:14:48:84:132:133:103:72:80:39:102:29', '+B8FWtufZM7xFbxjM4316w==', 0),
(10, 0, 0, '22:50:12:11:18:2:9:51:47:26:52:29:53:49:54:55:56:16:57:24:32:27:58:39:28:79', 'v0TWmexvUFyHmrN2RBDs5Q==', 0),
(11, 0, 0, '22:50:12:11:18:2:9:51:26:52:29:53:55:56:16:57:24:32:27:58:39:67:70:90:100:63:28:31:40:79:25:93:65:78:13:102:46:183', 'nd48srUfnu1dvc219uJ9wQ==', 0),
(12, 0, 0, '67:70:51:22:50:26:25:78:44:73:59:32:48:49:18:2:9:58:80:52:39:35:23:16:29:97', 'qXmBO5ksNZHqa0GMdPEZrw==', 0),
(13, 0, 0, '67:70:90:95:46:28:79:3:126:31:26:106:12:93:65:104:55:77:32:13:140:130:48:84:133:2:9:101:94:102:23:16:29:182', 'ia1u6+5NuW5eC4KyY3Xfgg==', 0),
(14, 0, 0, '68:70:46:28:79:3:50:26:106:25:12:47:55:24:32:13:48:83:49:18:2:9:38:102:88:29:118:119', 'ZEVoxdVLnF2ONNfuZIEXSw==', 0),
(15, 0, 0, '67:70:12:95:49:18:96:28:3:26:25:93:55:24:32:13:48:84:2:9:40:79:90:29:97:183', '30hdNkbXkEGM55/Hvl316Q==', 0),
(16, 0, 0, '69:70:22:50:26:25:12:47:11:61:111:36:32:13:48:82:49:2:9:35:23:29:112:55:183', 'q0onX+Ag+/4NKkOk1Z5vmw==', 0),
(17, 0, 0, '68:70:46:28:79:50:31:12:95:65:91:89:43:11:55:77:13:48:84:49:18:2:71:80:38:102:88:16:183:22', 'Z2ID3kyvpFnEl78sZ6s7Vg==', 0),
(18, 0, 0, '69:70:22:12:86:41:75:45:48:49:2:9:61', 'KrB4AvAU6KzhN43bbdHd9g==', 0),
(19, 0, 0, '68:70:50:12:62:49:18:46:28:22:11:55:24:115:32:48:2:80:39:88:16:29:79:116:31:26:78:13:117:84:103:182', 'Y/3hcgrJhaDpSZL5k+43KQ==', 0),
(20, 0, 0, '68:70:28:22:50:26:54:25:47:11:57:55:6:13:48:83:49:129:2:9:58:80:52:38:29', 'J8KatIo9L04IHMftDDdsEg==', 0),
(21, 0, 0, '69:70:46:22:50:26:12:47:65:78:55:66:32:48:83:49:18:2:9:38:23:29:183', 'rnfkwiOXkp6Ypv0+5P4PxQ==', 0),
(22, 0, 0, '67:70:12:47:49:46:22:50:98:55:48:2:9:26:25:65:78:99:32:13:84:29:183', 'Fe+PupXT5kPGbdaYPmYzTQ==', 0),
(23, 0, 0, '67:70:51:28:79:3:50:31:26:25:12:47:78:43:114:45:11:60:32:6:49:18:2:9:58:80:52:94:16:29', 'PR5h47SAst/aYCORztozGQ==', 0),
(24, 0, 0, '68:70:51:28:79:3:50:31:26:25:12:86:78:114:11:60:32:6:49:18:2:9:58:80:52:94:88:16:29', 'mLNdqZ5qzHJ6jooYNoqIMg==', 0),
(25, 0, 0, '68:70:87:50:90:12:95:49:18:71:46:105:89:104:55:32:48:103:101:88:29:28:79:31:26:106:65:78:60:109:108:39:102:16:13', '8Bts83K3veKGyDdfBD170A==', 0),
(26, 0, 0, '68:70:22:50:90:12:47:11:49:18:2:9:80:46:89:55:110:51:28:79:31:26:25:65:78:59:111:32:13:82:39:102:16:29:183', 'CshRmX1pViAWAiVVeKBkxw==', 0),
(27, 0, 0, '68:70:3:50:12:11:18:2:9:51:28:79:31:26:25:47:93:78:44:114:60:32:13:48:84:49:58:52:94:16:29', '/MLpFLa19yv04ZDlvqkSVQ==', 0),
(30, 0, 0, '67:70:46:28:25:78:11:36:6:85:49:18:2:58:94:35:23:29:183', '0833fJ1yXUq8Hv3eBeKw0g==', 0),
(31, 0, 0, '67:70:46:22:126:90:125:95:93:91:11:104:55:99:13:48:84:49:133:2:103:15:72:101:102:88:40:183', 'sTBw6SbS6g3MMFTGXP3t1w==', 0),
(32, 0, 0, '68:70:50:12:47:49:18:9:46:87:26:25:55:24:32:48:2:29:89:11:6:13:83:52:88:38:183', 'mnLewWyI56HHn3lE65FUdg==', 0),
(33, 0, 0, '67:70:51:79:3:50:26:25:12:47:93:78:11:57:32:13:48:49:18:2:9:52:39:23:16:29:183', 'Z93kZGW1PzN4IbWNH6Lxbw==', 0),
(34, 0, 0, '68:70:95:46:22:50:126:26:125:12:47:89:66:32:110:84:49:132:2:103:15:72:80:101:35:23:29:25:93:14:48:18:40', 'ZASHlzyug4lzp/4re4DAaQ==', 0),
(35, 0, 0, '68:70:51:28:22:26:25:47:43:73:11:36:32:27:6:48:84:49:129:2:9:52:40:35:23:16:29', '8KZKE5GFpGR1Z5xKi83/gg==', 0),
(37, 0, 0, '68:70:38:59:3:90:26:54:25:12:47:78:11:6:13:48:83:18:2:9:58:80:52:182', 'T/teYKdx1FYsGUuoBj9nlQ==', 0),
(38, 0, 0, '67:70:28:79:22:50:31:26:25:12:47:78:44:114:120:45:11:59:77:32:6:13:48:84:49:18:2:9:58:80:52:39:16:29', 'TWyiftTu9pibXwUNmav64w==', 0),
(39, 0, 0, '67:70:51:28:79:22:50:31:26:54:25:12:47:65:78:91:11:60:66:32:13:117:48:84:49:18:2:9:58:80:52:40:102:88:16:29:182', '/AAj8yIEAq3RqpX+M1L+XQ==', 0),
(41, 0, 0, '67:70:62:49:87:125:18:103:71:46:28:79:126:26:25:89:11:55:77:32:48:124:58:101:40:102:23:29:183', 'JyCyWQSLvvVpffTqhZy+0w==', 0),
(42, 0, 0, '68:70:46:28:79:3:31:106:12:47:91:89:11:55:111:32:13:109:48:49:18:2:80:39:102:88:16:29:26:130:124', 'eIwziwu6Skhr3Be0uZizew==', 0),
(43, 0, 0, '67:70:46:3:50:12:47:11:55:13:49:18:71:88:112:28:79:31:24:48:40:102:16:26:65:78:57:32:113:83:29:183', 'CkZZQpnQFiGGLsffMQejNQ==', 0),
(44, 0, 0, '67:70:51:46:28:79:3:50:31:26:106:25:12:47:93:65:78:11:57:99:36:32:6:13:113:48:49:18:2:9:80:94:102:35:23:16:29:182:183', 'hidypH1qI/I3B3v39nzaMA==', 0),
(45, 0, 0, '67:70:46:28:79:50:26:106:12:47:91:55:24:32:49:18:2:9:40:88:29:183', 'uWUu+I7kZlAwAuVTE/yLHg==', 0),
(46, 0, 0, '68:70:46:28:79:3:31:26:106:125:33:93:78:11:32:49:18:2:9:38:16:29:119:183', 'o12XwShUQ8UJzt3AHJTDxw==', 0),
(47, 0, 0, '28:22:50:26:76:25:12:47:78:74:11:77:6:18:2:71:52:40:29:79:59:16:51:32:13:48:58:80:81:182', '8HWHJ2g/8J6CWRnU49F0yg==', 0),
(48, 0, 0, '46:69:3:50:90:26:70:12:47:93:89:11:55:24:32:6:13:48:82:49:18:2:9:52:23:29:183', 'nJA8r6Xm9XF6rgVPejQtiw==', 0),
(49, 0, 0, '51:46:79:69:3:50:31:92:70:25:12:86:93:65:78:105:89:11:61:55:24:32:13:48:82:49:18:2:9:101:94:102:23:16:29:183', 'jWDE6V0bGMWEIVxSJECaVA==', 0),
(50, 0, 0, '46:28:79:31:12:47:93:114:55:2:9:94:102:16:182:183:50', 'h2kVErO0is4HWgltVuslnQ==', 0),
(51, 0, 0, '51:46:3:50:26:12:11:32:49:18:2:9:101:38:102:29:33:13', 'v57rE6ONaNMG1W4lyE1F4A==', 0),
(52, 0, 0, '51:46:28:22:50:26:12:47:93:78:11:77:32:6:48:49:18:2:15:58:101:52:16:29', 'UfBbmADK2/L0pClC52yKPw==', 0),
(53, 0, 0, '40:51:79:22:50:26:76:25:12:47:93:11:57:77:13:48:81:49:18:2:9:52:16:29', 'h9U9xqfYoxU9kx1y9swNfQ==', 0),
(54, 0, 0, '3:50:26:12:47:93:89:11:55:24:32:6:13:48:82:49:18:2:9:52:23:29:28:79:54:59:77:39:16:183', 'chqlOVFb0TfAY78+FEwYNw==', 0),
(56, 0, 0, '51:28:87:26:12:33:93:78:42:120:11:36:32:48:83:49:18:2:9:52:39:35:23:16:29:183', 'JGRkOlqENzSKww0dcXBi5A==', 0),
(57, 0, 0, '51:28:87:26:12:33:93:78:42:120:11:36:32:48:83:49:18:2:9:52:39:35:23:16:29:25:6', 'k8G/za9TJGiJsem0l1tgRg==', 0),
(58, 0, 0, '51:28:79:22:50:31:26:25:12:93:78:42:74:11:59:32:6:13:48:49:18:2:9:58:80:52:39:16:29', 'ipOJJHx1Kg/UNHNIiy8I9w==', 0),
(59, 0, 0, '87:26:54:25:47:11:77:32:13:122:49:18:9:58:52:40:16:29', 'yr27D2nFqY9oAcws/su2Sg==', 0),
(60, 0, 0, '51:3:26:25:57:77:36:32:13:48:9:58:52:35:23:29:79:93:78:123:16', 'aZ7uu2BqSou6H3sDXMe4GA==', 0),
(62, 0, 0, '22:26:47:78:44:60:77:32:13:49:18:52:29', 'njaUyR56HSEiWOqqpUsufA==', 0),
(63, 0, 0, '51:46:28:79:50:31:26:106:47:93:91:11:59:77:32:117:48:18:9:108:39:88:23:16:29:13', 'DSd7LlTvoRzrTeU1oFA6VQ==', 0),
(64, 0, 0, '51:28:22:26:25:12:33:93:78:44:114:45:11:36:32:48:81:49:18:2:9:52:94:35:23:16:29:183', 'tb3yCsmVVWe+Bd1pSNP9Fg==', 0),
(65, 0, 0, '51:28:22:31:26:54:25:12:97:11:60:77:32:13:122:48:84:49:18:2:9:58:52:39:88:16:29', 'hNp43Y6oYT6DQ2yMujatCg==', 0),
(66, 0, 0, '46:22:50:26:12:47:78:91:11:57:55:32:13:48:83:49:18:2:9:88:29:183', 'SNigk0jBXppZBDrhFDi96A==', 0),
(67, 0, 0, '51:3:26:25:93:78:36:32:48:84:49:18:2:9:39:35:23:16:29:28:33:43:120:45:183', 'HwsbxhfjP/VbRf12+P+P6Q==', 0),
(68, 0, 0, '51:28:3:26:25:12:33:93:78:42:11:36:32:48:83:49:18:2:9:52:38:35:23:16:29:120:45:74:183', 'U1i5AIeJaS5S1JL+zJnXOA==', 0),
(69, 0, 0, '51:28:3:50:26:12:47:93:78:43:73:120:45:11:36:32:48:81:49:18:2:9:52:94:35:23:16:29', '9NSjDwomkMTsFaEeoGwgkA==', 0),
(71, 0, 0, '46:50:12:62:11:55:99:32:6:13:48:49:18:34:2:9:80:23:29', 'eGXITItWHkYYQd1Aa9DCXQ==', 0),
(72, 0, 0, '12:51:22:26:25:78:120:11:36:32:48:84:49:2:9:52:94:35:23:29:28:127:33:152:114:18:128:183', 'o5lSE5IwlrPrPndDfkkPSA==', 0),
(73, 0, 0, '51:28:79:127:3:26:25:12:33:93:78:42:120:45:11:36:21:32:48:82:49:18:2:9:52:38:35:23:16:128:29:75:183', 'LBmfaWkSg7VZpg+VYDVz9g==', 0),
(74, 0, 0, '51:28:127:3:26:12:33:93:78:42:120:11:36:21:32:48:83:49:18:2:9:52:38:35:23:16:128:29:75:45:183', 'HRsbzxESubfBo9imMPyvCw==', 0),
(76, 0, 0, '51:28:79:127:3:26:25:12:33:93:78:120:45:11:36:21:32:48:84:49:18:2:9:52:40:35:23:16:128:29:114:183', 'DKMof2o5rVjlJ0ADdy705Q==', 0),
(77, 0, 0, '51:28:79:127:3:26:25:12:33:93:78:43:74:120:45:11:36:21:32:48:82:49:18:2:9:52:38:35:23:16:128:29:183', '4YJwAl915khVLIaWWDv8VA==', 0),
(78, 0, 0, '51:79:22:50:31:26:25:12:47:78:42:74:120:11:60:77:32:6:48:83:49:18:2:72:58:52:16:29:13', 'Cs2cjv4Rv/W7yHTetCKVxw==', 0),
(79, 0, 0, '51:79:3:50:90:25:12:47:93:78:44:73:11:24:32:13:48:84:49:18:34:2:9:58:52:39:35:23:16:29:183', 'sxPUr30/YdZiCdwaNRxJxg==', 0),
(80, 0, 0, '129:46:28:3:93:65:11:55:63:48:2:9:39:88:16:12:13:135:102', 'SXL7A8Cy27ZcNU+6NpGbDA==', 0),
(81, 0, 0, '51:28:22:50:26:25:12:47:78:73:11:36:32:48:84:49:18:2:9:52:38:35:23:16:29', 'AefDHY0a7U35bqPbyvPFSA==', 0),
(83, 0, 0, '51:28:3:26:25:12:47:93:78:42:74:120:45:11:36:32:48:83:123:137:2:9:52:94:35:23:16:29:183', 'HQ3uED7rQJ0poiEBXmgYJQ==', 0),
(84, 0, 0, '22:50:54:12:11:18:2:15:51:28:31:26:138:25:47:93:78:55:77:32:6:14:48:49:58:80:40:102:16:29:139:183', '4WKzayXiCIHN5MJS4s5Mzw==', 0),
(85, 0, 0, '28:79:22:50:31:26:106:54:138:25:12:47:93:78:59:36:32:6:13:49:18:2:9:58:52:39:35:23:16:29:182', 's8fhE8m0BiUCDqI33U0c4Q==', 0),
(86, 0, 0, '51:46:28:79:3:31:26:76:138:12:33:93:78:43:11:77:36:32:48:82:49:18:2:39:35:23:16:29:9:183', 'yWITcV5HI4nQG2lXz2Wl8A==', 0),
(87, 0, 0, '51:28:26:25:12:33:93:78:11:36:32:48:84:49:129:2:9:52:39:35:23:16:29', 'rlk7NQ6RNdYeeCw8N4jmYQ==', 0),
(88, 0, 0, '3:25:43:73:120:45:49:129:2:58:80:52:38', 'ryLU1mE74YX4knCTAsg0rA==', 0),
(89, 0, 0, '46:28:79:3:50:90:31:25:12:47:91:89:11:55:77:48:132:18:2:9:80:94:102:88:16', 'flPQG1YOpcAa86Bc7yeMbw==', 0),
(90, 0, 0, '50:125:95:132:133:9:51:141:11:36:48:81:103:80:35:23:142:120:13', 'fpTxEqqTfQp76zHx/QWBcg==', 0),
(91, 0, 0, '51:28:79:3:31:26:25:12:47:93:78:43:74:11:60:77:36:32:48:83:49:18:2:9:58:80:52:39:35:23:16:29:183', 'mWBJ6FF28J0/PziZuHif0Q==', 0),
(92, 0, 0, '28:26:54:78:32:14:83:58:38:16:29', 'Lw6o6RffFfXoLG2fNWXFyQ==', 0),
(93, 0, 0, '51:28:79:22:50:31:26:25:12:47:78:114:11:57:77:32:6:49:18:2:9:58:80:52:94:16:29:183', '+UeNu34P3QYJuaHnR98qtA==', 0),
(94, 0, 0, '51:28:22:50:31:26:25:12:47:78:114:11:36:32:48:84:49:18:2:9:58:52:40:35:23:16:29:43:34', 'dzNkNJAzfjoC4odtIq/yTg==', 0),
(95, 0, 0, '46:28:79:50:31:26:125:47:95:93:65:78:91:89:104:55:66:32:13:139:63:48:84:133:103:71:101:40:102:88:16:29:22', '21HDHreJmHErGntYwrvxmA==', 0),
(96, 0, 0, '3:120:45:11:63:18:2:93:152:57:77:32:13:139:84:9:52:39:29:183', 'AKr0EyZR7B82RvwPHw+xAA==', 0),
(97, 0, 0, '51:79:50:26:25:12:47:93:44:114:120:11:59:77:36:32:84:49:18:2:71:58:52:39:35:23:16:29:48', 'DFWo2NrSvyQxnia/c2GGdQ==', 0),
(98, 0, 0, '51:79:3:50:26:12:47:74:120:11:32:49:18:2:58:16:29:28:13:39:25:43:183:48', '2ArPAyQzwz5afOwRATZfwA==', 0),
(99, 0, 0, '51:79:50:31:26:12:47:43:74:11:59:32:48:84:49:18:34:2:71:58:52:16:29', 'D1VgYPzk9gxiKQ6/UL4o/w==', 0),
(102, 0, 0, '28:22:90:31:54:25:12:62:47:65:11:55:66:13:49:18:2:9:58:80:38:16', '+kMaR5M3IPQF34EBVwWE9A==', 0),
(103, 0, 0, '28:79:50:26:76:138:25:12:47:93:78:11:77:32:14:48:84:49:34:2:52:94:102:29', '/JUteyscOJ5fAOk9c4CFgg==', 0),
(104, 0, 0, '51:28:22:26:25:12:11:32:27:13:48:84:49:52:38:16:29:180:183', 'U5g+hzSyspGRgLBnWIScqA==', 0),
(105, 0, 0, '51:28:79:127:22:25:146:78:42:74:45:11:32:49:2:9:52:39:29', 'QJ+nYM4WTkRf6AizC9TNlQ==', 0),
(106, 0, 0, '183', 'yO8Rt0orZ8reAhGFY76gzg==', 0),
(107, 0, 0, '51:28:79:127:3:26:12:33:93:78:43:73:45:11:36:21:32:48:84:49:18:2:9:38:35:23:16:128:29', '3kssAOD/K5CZE6DYxWmXbA==', 0),
(108, 0, 0, '51:28:3:50:26:12:47:93:78:120:45:11:36:32:48:81:49:18:2:9:94:35:23:16:29', 'v9SLd0hOTu8xFCOgRH6I9Q==', 0),
(109, 0, 0, '51:28:79:127:22:26:25:12:148:93:78:11:24:36:32:48:84:49:18:2:9:58:52:38:35:23:128:29:184', 'rIpwQUvalI7wCHCeLxJEpA==', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gear_types`
--

CREATE TABLE `gear_types` (
  `id_gear_types` int(11) NOT NULL,
  `description` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gear_types`
--

INSERT INTO `gear_types` (`id_gear_types`, `description`) VALUES
(1, 'Issue'),
(2, 'Other'),
(3, 'Turn-In'),
(4, 'Boat Gear'),
(5, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_members` int(11) NOT NULL,
  `fname` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `lname` varchar(128) COLLATE utf8_bin NOT NULL,
  `gear` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_members`, `fname`, `lname`, `gear`) VALUES
(4, 'hqF5T9tbItGz6ZaH1TfA1w==', '4WKzayXiCIHN5MJS4s5Mzw==', 84),
(6, 'w1TIMI4uDUizetV++EUKIw==', 'chqlOVFb0TfAY78+FEwYNw==', 54),
(7, 'VchWVsoNQpU0seQD1Zhjfw==', 'OwOZVFIg4txOWl8pFErq1w==', 43),
(8, '12letIOnkLOZbRuh3zeSqw==', 'OwOZVFIg4txOWl8pFErq1w==', 102),
(9, 'V8sehID62H9TJ9WspBoRUw==', 'QHRixfbFo0VpsY85d2OxvQ==', 103),
(10, 'W1QYx/pz99X1icBGyiTPWw==', 'eGXITItWHkYYQd1Aa9DCXQ==', 71),
(11, 'vg6TVApbHjE8p/yWg/ry6A==', 'v57rE6ONaNMG1W4lyE1F4A==', 51),
(12, '9J0BGBdrJhfPyunPcd4j1w==', '2ArPAyQzwz5afOwRATZfwA==', 98),
(13, 'w1TIMI4uDUizetV++EUKIw==', '+B8FWtufZM7xFbxjM4316w==', 8),
(14, 'vg6TVApbHjE8p/yWg/ry6A==', 'h2kVErO0is4HWgltVuslnQ==', 50),
(15, 'p71ZwV9XPebV84dB4RAmmw==', 'UfBbmADK2/L0pClC52yKPw==', 52),
(18, 'vg6TVApbHjE8p/yWg/ry6A==', 'ipOJJHx1Kg/UNHNIiy8I9w==', 58),
(19, 'V8sehID62H9TJ9WspBoRUw==', 'nJA8r6Xm9XF6rgVPejQtiw==', 48),
(20, 'rEx2hiTAnOQ1MFnMBv9sqw==', 'yr27D2nFqY9oAcws/su2Sg==', 59),
(22, 'p71ZwV9XPebV84dB4RAmmw==', 'KrB4AvAU6KzhN43bbdHd9g==', 18),
(23, 'ylTWhCiTvN4bYKR2Lza/vg==', 'aZ7uu2BqSou6H3sDXMe4GA==', 60),
(24, 'rEx2hiTAnOQ1MFnMBv9sqw==', 'njaUyR56HSEiWOqqpUsufA==', 62),
(25, 'w1TIMI4uDUizetV++EUKIw==', 'mnLewWyI56HHn3lE65FUdg==', 32),
(26, 'W1QYx/pz99X1icBGyiTPWw==', 'hNp43Y6oYT6DQ2yMujatCg==', 65),
(27, 'w1TIMI4uDUizetV++EUKIw==', 'jWDE6V0bGMWEIVxSJECaVA==', 49),
(28, '33BoAu8tYiXiFiSfKu89AA==', 'Cs2cjv4Rv/W7yHTetCKVxw==', 78),
(29, 'V8sehID62H9TJ9WspBoRUw==', '+UTlTXzPQmjMtYKB0RK84w==', 63),
(30, 'w1TIMI4uDUizetV++EUKIw==', '30hdNkbXkEGM55/Hvl316Q==', 15),
(32, 'w1TIMI4uDUizetV++EUKIw==', 'JyCyWQSLvvVpffTqhZy+0w==', 41),
(33, 'w1TIMI4uDUizetV++EUKIw==', 'hidypH1qI/I3B3v39nzaMA==', 44),
(34, 'w1TIMI4uDUizetV++EUKIw==', '+UeNu34P3QYJuaHnR98qtA==', 93),
(35, 'ylTWhCiTvN4bYKR2Lza/vg==', 'T/teYKdx1FYsGUuoBj9nlQ==', 37),
(36, 'w1TIMI4uDUizetV++EUKIw==', 'sxPUr30/YdZiCdwaNRxJxg==', 79),
(37, 'w1TIMI4uDUizetV++EUKIw==', 'SXL7A8Cy27ZcNU+6NpGbDA==', 80),
(38, 'w1TIMI4uDUizetV++EUKIw==', 'yWITcV5HI4nQG2lXz2Wl8A==', 86),
(39, 'w1TIMI4uDUizetV++EUKIw==', 'eIwziwu6Skhr3Be0uZizew==', 42),
(40, 'w1TIMI4uDUizetV++EUKIw==', 'uWUu+I7kZlAwAuVTE/yLHg==', 45),
(41, 'w1TIMI4uDUizetV++EUKIw==', 'o12XwShUQ8UJzt3AHJTDxw==', 46),
(42, 'w1TIMI4uDUizetV++EUKIw==', 'AefDHY0a7U35bqPbyvPFSA==', 81),
(43, 'w1TIMI4uDUizetV++EUKIw==', 'ZASHlzyug4lzp/4re4DAaQ==', 34),
(46, 'VchWVsoNQpU0seQD1Zhjfw==', '8KZKE5GFpGR1Z5xKi83/gg==', 35),
(47, 'w1TIMI4uDUizetV++EUKIw==', 'sTBw6SbS6g3MMFTGXP3t1w==', 31),
(48, 'p71ZwV9XPebV84dB4RAmmw==', 'Z93kZGW1PzN4IbWNH6Lxbw==', 33),
(49, 'w1TIMI4uDUizetV++EUKIw==', 's8fhE8m0BiUCDqI33U0c4Q==', 85),
(51, 'p71ZwV9XPebV84dB4RAmmw==', 'ryLU1mE74YX4knCTAsg0rA==', 88),
(52, 'w1TIMI4uDUizetV++EUKIw==', 'ia1u6+5NuW5eC4KyY3Xfgg==', 13),
(53, 'w1TIMI4uDUizetV++EUKIw==', 'flPQG1YOpcAa86Bc7yeMbw==', 89),
(54, 'w1TIMI4uDUizetV++EUKIw==', '/AAj8yIEAq3RqpX+M1L+XQ==', 39),
(55, 'w1TIMI4uDUizetV++EUKIw==', 'TWyiftTu9pibXwUNmav64w==', 38),
(56, 'p71ZwV9XPebV84dB4RAmmw==', 'fpTxEqqTfQp76zHx/QWBcg==', 90),
(57, 'w1TIMI4uDUizetV++EUKIw==', 'q0onX+Ag+/4NKkOk1Z5vmw==', 16),
(58, 'w1TIMI4uDUizetV++EUKIw==', 'mWBJ6FF28J0/PziZuHif0Q==', 91),
(59, 'w1TIMI4uDUizetV++EUKIw==', 'qXmBO5ksNZHqa0GMdPEZrw==', 12),
(60, 'w1TIMI4uDUizetV++EUKIw==', 'Fe+PupXT5kPGbdaYPmYzTQ==', 22),
(61, 'p71ZwV9XPebV84dB4RAmmw==', '0833fJ1yXUq8Hv3eBeKw0g==', 30),
(62, 'm9dr4WYITj2wVUwzuCkjIw==', 'PR5h47SAst/aYCORztozGQ==', 23),
(63, 'w1TIMI4uDUizetV++EUKIw==', 'SNigk0jBXppZBDrhFDi96A==', 66),
(64, 'm9dr4WYITj2wVUwzuCkjIw==', 'mLNdqZ5qzHJ6jooYNoqIMg==', 24),
(65, 'w1TIMI4uDUizetV++EUKIw==', 'ZEVoxdVLnF2ONNfuZIEXSw==', 14),
(66, 'w1TIMI4uDUizetV++EUKIw==', 'dzNkNJAzfjoC4odtIq/yTg==', 94),
(67, 'w1TIMI4uDUizetV++EUKIw==', 'J8KatIo9L04IHMftDDdsEg==', 20),
(68, 'w1TIMI4uDUizetV++EUKIw==', '21HDHreJmHErGntYwrvxmA==', 95),
(69, 'w1TIMI4uDUizetV++EUKIw==', 'AKr0EyZR7B82RvwPHw+xAA==', 96),
(70, 'w1TIMI4uDUizetV++EUKIw==', 'X+0k19ev1yjDuGrmO0nQbQ==', 97),
(71, 'w1TIMI4uDUizetV++EUKIw==', 'rlk7NQ6RNdYeeCw8N4jmYQ==', 87),
(72, 'w1TIMI4uDUizetV++EUKIw==', 'Y/3hcgrJhaDpSZL5k+43KQ==', 19),
(73, 'w1TIMI4uDUizetV++EUKIw==', 'D1VgYPzk9gxiKQ6/UL4o/w==', 99),
(74, 'p71ZwV9XPebV84dB4RAmmw==', 'D1VgYPzk9gxiKQ6/UL4o/w==', 27),
(77, 'w1TIMI4uDUizetV++EUKIw==', 'CshRmX1pViAWAiVVeKBkxw==', 26),
(78, 'w1TIMI4uDUizetV++EUKIw==', '8Bts83K3veKGyDdfBD170A==', 25),
(79, 'w1TIMI4uDUizetV++EUKIw==', 'U5g+hzSyspGRgLBnWIScqA==', 104),
(80, 'w1TIMI4uDUizetV++EUKIw==', 'rnfkwiOXkp6Ypv0+5P4PxQ==', 21),
(81, 'w1TIMI4uDUizetV++EUKIw==', 'nJVm1wwizyAvwZUV1zM5mQ==', 68),
(82, 'w1TIMI4uDUizetV++EUKIw==', 'Z2ID3kyvpFnEl78sZ6s7Vg==', 17),
(83, 'PK8PImJ5g0UvBHviG4ue8A==', 'h9U9xqfYoxU9kx1y9swNfQ==', 53),
(84, 'w1TIMI4uDUizetV++EUKIw==', 'HwsbxhfjP/VbRf12+P+P6Q==', 67),
(85, 'p71ZwV9XPebV84dB4RAmmw==', '5ROohhPD1jimnnHauhcE6A==', 0),
(86, 'w1TIMI4uDUizetV++EUKIw==', 'nd48srUfnu1dvc219uJ9wQ==', 11),
(87, 'w1TIMI4uDUizetV++EUKIw==', 'v0TWmexvUFyHmrN2RBDs5Q==', 10),
(88, 'w1TIMI4uDUizetV++EUKIw==', '8HWHJ2g/8J6CWRnU49F0yg==', 47),
(89, 'GZzB52SXOIiDjJV7MZ9uVA==', 'k8G/za9TJGiJsem0l1tgRg==', 57),
(90, 'ylTWhCiTvN4bYKR2Lza/vg==', 'JGRkOlqENzSKww0dcXBi5A==', 56),
(91, 'QHE8eZt/3gRQqcOkkzuHXQ==', 'tb3yCsmVVWe+Bd1pSNP9Fg==', 64),
(92, 'w1TIMI4uDUizetV++EUKIw==', 'ZTtNc14uLgi9Wd2LcrQt4Q==', 69),
(94, 'rEx2hiTAnOQ1MFnMBv9sqw==', '4YJwAl915khVLIaWWDv8VA==', 77),
(95, 'W1QYx/pz99X1icBGyiTPWw==', 'DKMof2o5rVjlJ0ADdy705Q==', 76),
(97, 'pDNYjbvZPw4WwStxkx82TQ==', 'D1VgYPzk9gxiKQ6/UL4o/w==', 74),
(98, 'V8sehID62H9TJ9WspBoRUw==', 'LBmfaWkSg7VZpg+VYDVz9g==', 73),
(100, 'zog+iygb/2KSOuAxu/RjLg==', 'HQ3uED7rQJ0poiEBXmgYJQ==', 83),
(102, 'w1TIMI4uDUizetV++EUKIw==', 'Lw6o6RffFfXoLG2fNWXFyQ==', 92),
(103, 'V8sehID62H9TJ9WspBoRUw==', 'o5lSE5IwlrPrPndDfkkPSA==', 72),
(104, 'V8sehID62H9TJ9WspBoRUw==', 'QJ+nYM4WTkRf6AizC9TNlQ==', 105),
(105, 'GZzB52SXOIiDjJV7MZ9uVA==', 'yO8Rt0orZ8reAhGFY76gzg==', 106),
(106, 'VwbjsIa1pllCUF6kj+V9DA==', '3kssAOD/K5CZE6DYxWmXbA==', 107),
(108, 'VchWVsoNQpU0seQD1Zhjfw==', 'v9SLd0hOTu8xFCOgRH6I9Q==', 108),
(109, 'rEx2hiTAnOQ1MFnMBv9sqw==', 'rIpwQUvalI7wCHCeLxJEpA==', 109);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `part_no` varchar(128) DEFAULT NULL,
  `supp_part_no` varchar(512) DEFAULT NULL,
  `description` varchar(512) NOT NULL,
  `supplier` varchar(1024) NOT NULL,
  `order_date` int(11) DEFAULT '0',
  `date_received` int(11) DEFAULT '0',
  `doc_no` varchar(512) DEFAULT NULL,
  `invoice_no` varchar(512) DEFAULT NULL,
  `qty` mediumint(9) NOT NULL,
  `price` double DEFAULT '0',
  `remarks` varchar(1024) DEFAULT NULL,
  `url` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `part_no`, `supp_part_no`, `description`, `supplier`, `order_date`, `date_received`, `doc_no`, `invoice_no`, `qty`, `price`, `remarks`, `url`) VALUES
(1, 'N/A', 'N/A', 'zfxKKETKoVDlysLsk41i4+QNgl4Oa4MgUwqz+8ZtK98=', '5vp+3UtOCinv26/Lt3eKPw==', 1591167600, 1594105200, '47QDCC20MFGM1', 'S1389228', 20, 26.02, 'GPC', 'https://www.streichers.com/'),
(2, 'N/A', 'Model # 7018447', 'zI7+vEYfwkeQGd0HgUzzHd8ISa6YPTXHE0a6tJEgAx0=', 'G1fzA53DkO0DfgY0oESltwUotlP5mjfl0s9b6YW2Em4=', 1591167600, 1591167600, 'N/A', 'N/A', 2, 0, 'Via GPC. No pack. slip in package. Bold Lock brand', ''),
(3, '', '', 'qFlpjnjGzJXuImb8ifxWVQ==', 'Z5O09z9Kq5E75g9TwSM+OqjsHskkvdUIWOPMpNtNkC4=', 1591167600, 1591167600, '', 'PO # 47QDCC20MDA6V', 1, 0, 'Via GPC. In custody of SPC Gonzales', ''),
(4, '3FVT5-SP47W117D0014-GH-LPC-T243', '', 'F01HgE1mBzt7qQ9LIuvQmVIDFo50UpddICDsKB15waDbW6USQQc9JFoL/DxzivyTaTmLTs4MovSr86b2+621UA==', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1577952000, 1591167600, 'W62P4J00102260', '559190', 25, 100.35, 'FedMall order', 'https://www.gharmorsystems.com/'),
(5, '3FVT5-SP47W117D0014-GH-TRC-L-T243', '', 'F01HgE1mBzt7qQ9LIuvQmVX83w6MWomGEbn5W6hhy6ErvDTF3Mn/O67ttzaoQw+49HSCdxkLK1Ng9+qgd3hVlA==', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1577952000, 1591167600, 'W62P4J00092248', '558782', 25, 285.99, 'Fedmall order', 'https://www.gharmorsystems.com/'),
(6, '3FVT5-SP47W117D0014-GH-HX03-IIIA-F-T243', '', 'F01HgE1mBzt7qQ9LIuvQmcJF15NEGTUEehrSEVFOPj7MZyagxYnJCZSbtZG1J/op59mvNfEq7U7D7kxO/ZIhBw==', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1577952000, 1591167600, 'W62P4J00092246', '558782', 4, 990.68, 'Fedmall order', 'https://www.gharmorsystems.com/'),
(7, '3FVT5-SP47W117D0014-GH-HX03-IIIA-F-T243', '', 'F01HgE1mBzt7qQ9LIuvQmcJF15NEGTUEehrSEVFOPj7MZyagxYnJCZSbtZG1J/op59mvNfEq7U7D7kxO/ZIhBw==', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1577952000, 1591167600, 'W62P4J00102258', '559190', 1, 990.68, 'Fedmall order', 'https://www.gharmorsystems.com/'),
(8, '3FVT5-SP47W117D0014-GH-HX03-IIIA-M-T243', '', 'F01HgE1mBzt7qQ9LIuvQmcJF15NEGTUEehrSEVFOPj7kQW4pMviagXPNNqVI7mko0AVZAN/B5zNc9LifPpYTqg==', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1577952000, 1591167600, 'W62P4J00102259', '559190', 20, 990.68, 'Fedmall order', 'https://www.gharmorsystems.com/'),
(9, '3FVT5-SP47W117D0014-GH-STP-5X8-T243', '', 'F01HgE1mBzt7qQ9LIuvQmVGYkw6aRJV4AG8xa0+5i0P9iej25yPyk/DXPi6Jlv+k', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1577952000, 1583823600, 'W62P4J00092247', '558782', 25, 41.93, 'FedMall Order', 'https://www.gharmorsystems.com/'),
(10, '1TAJ4-SP47W119D0015-STRI030-00-REF', '', 'bO+kJxfGXUXH1E+ThCDcfK2/aX4qNuAMAwfhqmrOlu3MjW/m2IH7USFOCo7+42Vz', 'GmcYOZsGM+Fs+FQ5ohseiNjbDTazKDFp/NwJeHDj6W0=', 1591945200, 1592982000, 'W62P4J0164AALE', '625461', 6, 78.69, 'Received', ''),
(11, '3FVT5-SP47W117D0014-52412-T243', '', 'W5IeLHxzkDIJRcG+VTjvfJ4D+cEglCi8FZ/B+ai05dps/XyAhoX6tJ2ZTD128GRM', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1591945200, 1594105200, 'W62P4J0164AACE', '625461', 25, 125.13, 'Received', ''),
(12, '3FVT5-SP47W117D0014-FX-PG12-1-OCCS-T243', '', 'LaLJMe3LNYBxZCgC5NKpLrnxNUmdVQj82+qer9RlWyyhVNpz7OZH04rnMvnmXWAS', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1591945200, 1599721200, 'W62P4J0164AAPE', '625461', 12, 59.65, 'Received', ''),
(13, '3FVT5-SP47W117D0014-PC-9005LTCUQ-T243', '', 'oMklCRp1aVhlFvy8aIHc5d+eMa24CrjPNIoU2Eb1OqLjCAPlDavtWkn9NC3TlMGr', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1591945200, 0, 'W62P4J0164AABE', '625461', 40, 178.18, 'Will ship by end of Aug', ''),
(14, '80U97-SP47W119D0014-AFTAC-26428', '', 'XiDpBpfhqwrnKQPuX7vDsLWAsuTYsyA/6n37vh+nr3GS0g8I0yD61f8KgVL8q8PF', 'DRwq8mUEeWYdBQWv3PLY5A==', 1591945200, 0, 'W62P4J0164AASE', '625461', 3, 651.76, 'CK status: rejected unable to procure FedMall Ticket # 8006567659', ''),
(15, '5NXV5-GSA_5NXV5-FMRA40013NPY5', '', 'A/Fx+DPGXBtCj7u6v5x/TK2bEInlIqCq8XROTZqKPSQ=', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1591945200, 1593673200, 'W62P4J0164AADE', '625461', 5, 151.07, 'Received', ''),
(16, '5NXV5-GSA_5NXV5-FMRAKTI-73813', '', 'Oay2h3Oidbs8r+wc36U80ouaIK0dz/NKgtWg0cb/4Fk=', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1591945200, 1593673200, 'W62P4J0164AAJE', '625461', 6, 111.98, 'Received', ''),
(17, 'NSN #: 7110013838102', '', 'NnifBhP4tgZ6z/zJ9ijet+i4gW6uyuHm/mnMNmtMI3M=', 'PARRGBw7PWm2BgaqMmwWQg==', 1591945200, 1596697200, 'W62P4J0164AAUE', '625461', 3, 2589.43, 'Received', ''),
(18, '4J007-SPMLW113DE023-35992718', '', 'fTH8yl4hjL0CZe+K6LFPCxaZAoQBAxK4zdR+5ZGBpl4=', 'CeQzPtTM9nszO+H8oU74+ck5GU49H/yMxlTCVgc53sY=', 1591945200, 1595574000, 'W62P4J0164AATE', '625461', 6, 322.76, 'Received', ''),
(19, '1HEN9-SP47W116D0018-N541950', '', 'YR50C93PaHic09/6D/dQ33aSfITfXtys53wwYJAuwjipdSpfo4717VPdRqY0Ny7r', 'PJfrqXwKfataaPRzVosDkjqqMyelc0jYz3LyPE04Wg4=', 1591945200, 1593673200, 'W62P4J0164AAFE', '625461', 61, 3.15, 'Received', ''),
(20, '32WG2-SP47W116D0009-MIL-D-MTG-147483', '', 'j8veaHmfydLoyFTUeZJryPdVNOhwJpdDCkb+PjcCKtBPTMpBV3teLj9+3lXZX4FXHtfb4jBfK4V0912RoIfiXQ==', 'GWTbo/Ip3KKkHRCKWRksUSo32FTxapBvHFjjBf6MCo65AyECcf0f7qFYU4d63Fsc', 1591945200, 0, 'W62P4J0164AAKE', '625461', 10, 16.25, 'Out of stock; no ETA', ''),
(21, '32WG2-SP47W116D0009-MIL-D-TD-887062', '', '/48YPh39R2aWzHh/nlX8KhmV9Ho0it3d/M0nCgqOEuUw7VAMe8cgT71XLHPJvDj/6CP5GGx/Vv23qwIF5wcvGw==', 'GWTbo/Ip3KKkHRCKWRksUSo32FTxapBvHFjjBf6MCo65AyECcf0f7qFYU4d63Fsc', 1592290800, 1593673200, 'W62P4J0164AAVE', '625461', 10, 536.25, 'Received', ''),
(22, '32WG2-SP47W116D0009-MIL-E-AZT-1006503', '', 'iijKWY+mVjbgqAhA8oI3qjEGKs896PIptmOSG4FIPYhXInknZ4MqRFxeb2fIy0oL', 'GWTbo/Ip3KKkHRCKWRksUSo32FTxapBvHFjjBf6MCo65AyECcf0f7qFYU4d63Fsc', 1591945200, 1592982000, 'W62P4J0164AAGE', '625461', 22, 7.33, 'Received', ''),
(23, '32WG2-SP47W116D0009-MIL-E-RSR-1175823', '', '4mnlWFAevOguAFJwEI2kD6/lHSxOcFn6tkvvvbsh7PbgEF1GROCZHVSCa9alFJT8N8q9lhmGlB4SYnjQ7xVITg==', 'GWTbo/Ip3KKkHRCKWRksUSo32FTxapBvHFjjBf6MCo65AyECcf0f7qFYU4d63Fsc', 1591945200, 1599116400, 'W62P4J0164AAME', '625461', 5, 658.03, 'Received', ''),
(24, '32WG2-SP47W116D0009-MIL-E-SY-1238093', '', 'fOhRyLy8tb+G9qjsKYSjHFceQC2bAYQKMLAciBK3JXw=', 'GWTbo/Ip3KKkHRCKWRksUSo32FTxapBvHFjjBf6MCo65AyECcf0f7qFYU4d63Fsc', 1591945200, 0, 'W62P4J0164AARE', '625461', 3, 391.82, 'Est Ship after 20200810', ''),
(25, 'NSN #: 4210011088717', '', '+RtJ8AAeAy6bK0iwtkHyzA==', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1591945200, 1596783600, 'W62P4J0164AAEE', '625461', 9, 311.84, 'Received (Connex #10)', ''),
(26, 'NSN #: 4933012697608', '', 'zFKKDuZqiMnNwK7jhrD3RJ6T24tjYYiWPYDuYudtE60=', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1591945200, 1592463600, 'W62P4J0164AANE', '625461', 48, 6.84, 'Received', ''),
(27, 'NSN #: 6850015716727', '', 'ii0xRjXBebVoCB7x/7TWwg==', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1591945200, 1592463600, 'W62P4J0164AAQE', '625461', 50, 23.08, 'Received', ''),
(28, '3WYK5-SP47W119D0001-ZPKT6155', '', 'FauQ+U6HeF5vmAJmVqjd8VH0MarDFdoJDeQ7smHls3E=', 'Nn2/K5XA72g46QVCRneJvY4uLMjjAgxJyXOSBAeby2E=', 1591945200, 1592982000, 'W62P4J0164AAHE', '625461', 1, 133.47, 'Received', ''),
(29, '1JFW6-SP47W118D0034-100003-2', '', 'oSs7NF8ygh9Xf8sQXJoNbAUDC5SnJ7D5QWnoVcB/WOU=', 'IkQi8qQlQwHjWWnqRMSU9g==', 1591254000, 0, 'W62P4J01569110', '598710', 50, 20.19, 'Delayed (email 20200810 11:26)', ''),
(30, '3FVT5-SP47W117D0014-ASP-52435-T50', '', 'kyzHUS1wx2HShvoEHHRQ7A==', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1591254000, 1593673200, 'W62P4J01569111', '598710', 25, 67.53, 'Received', ''),
(31, '3FVT5-SP47W117D0014-H-7432-ADD-T3', '', '7himxfjpQzgChwnWuO3L+Vh7iz+0yyJqmTO3EU6ew3IJbiBZzsjrG0nh/CvJfAD2', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1591254000, 1593154800, 'W62P4J01569112', '598710', 3, 354.75, 'Received', ''),
(33, '5NXV5-GSA_5NXV5-25270', '', 'mjNAxkDPCgdkj3nWivPBsMURd4ulf3WkXmIjBmvo31w+F6J0COnHqopZfY0pOjNm', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1591254000, 1592982000, 'W62P4J01569113', '598710', 50, 1.83, 'Received', ''),
(34, '7510012360059', '', 'awwEnLhgqWOBHv40Pe0cW9/tABXSYaAvhm08eA8GJMY=', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1591254000, 1592463600, 'W62P4J01569114', '598710', 15, 6.28, 'Received', ''),
(35, '7510013750502', '', 'jUuPUsthdpCaaUaOrb5nCA==', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1591254000, 1593154800, 'W62P4J01569115', '598710', 19, 1.67, 'Received', ''),
(36, '3A6S9-SP47W118D0033-BSXVL705VM10', '', 'Jj+VR3xZP2Jd3+sPbESP3W/xf3dieC6PTJeg7nUORbA=', '2PlZO08rrchDKqCkUBPO7cahXO7iOGXbKLb4CMPgWxU=', 1591254000, 1596783600, 'W62P4J01569116', '598710', 6, 454.17, 'Received', ''),
(37, '3A6S9-SP47W118D0033-EKL19209', '', 'MtMsJyJoCRio8Aku8siQNRNnaZh+4pmqGYszTzS9qWSm2/sEDiONDFzYesKoU4yQyf7aJbWq6nc1uUF3ysXjRHM17QOyCrNkULyW4FInjCo=', '2PlZO08rrchDKqCkUBPO7cahXO7iOGXbKLb4CMPgWxU=', 1591254000, 0, 'W62P4J01569117', '598710', 1, 1153.72, 'Delayed (email 20200807 1:31 PM)', ''),
(38, '3A6S9-SP47W118D0033-EKL20442', '', '2nZvjge2duktlInFmxbjO9FUUhP14lBLfCxRiIttn4rSNOgIvKii/X2PSTBNBya3r/S4at05YOTwq+X82VAqHg==', '2PlZO08rrchDKqCkUBPO7cahXO7iOGXbKLb4CMPgWxU=', 1591254000, 1594364400, 'W62P4J01569118', '598710', 1, 442.34, 'Received', ''),
(39, '3A6S9-SP47W118D0033-QB75R', '', 'X97Aw++giVqiTAke6DVbMJwIbQVi7Pa6eqCRDJEh8ZXxglAb1+ZZGgBahhuNrJH2', '2PlZO08rrchDKqCkUBPO7cahXO7iOGXbKLb4CMPgWxU=', 1591254000, 1596783600, 'W62P4J01569119', '598710', 1, 2343.78, 'Received', ''),
(40, '32WG2-SP47W116D0009-MIL-D-CWR-48941', '', 'qx74tBPrdsDX5L3Lr/Aenz8wPwvk9VGLMXgMqbtQphaBHqs5POFN9lQ88SCRPVnkkCmnXd+kpVP3G6zeSvtDzm0rAknKdmbMyMVgKCWV11g=', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1591254000, 1594796400, 'W62P4J01569120', '598710', 9, 55.15, 'Received', ''),
(41, '7530002223521', '', 'g0UwB+AFq0GdrfcKsPXdlg==', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1591254000, 1592982000, 'W62P4J01569121', '598710', 25, 4.81, 'Received', ''),
(42, '1T5U0-SP47W118D0025-RN0023', '', '/p7KuhMjF4AW1ovxYYfTZg==', 'dCmkelUge5gKAWLY1k9Z8i8EMeWVmsfMa6DG3XiHrwo=', 1591254000, 1595833200, 'W62P4J01569122', '598710', 107, 3.62, 'Received', ''),
(43, 'NSN: 8465015501224', '', 'EISU+wnCUUIfmqaEABW9hdFPZYqlnHdzEOCrvr/djLk=', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1578556800, 0, 'W62P4J00092255', '558782', 107, 0.97, 'FedMall - Cancelled (requested)', ''),
(44, '5NXV5-GSA_5NXV5-FMRA21503JN78 ', '', 'jdi3yrX2u0JXfuF6hJ+okDl2+9DEnXubCUezN3B5SM8=', 'TZby8Ck0kGTQkcpIhGYp9NCyTNqCqnWGFDQeBjEgUsQ=', 1593154800, 1594105200, 'W62P4J0178AACE', '643797', 1, 89.1, 'Received', ''),
(45, 'B271898-SEV138', '', 'gzRDsFPjFszVDBvFmjw0jBAwJ3rHjyeBkk539YEAM9ztp4Ah1Gi+qb7RkETgHQSMJgCDMLkaluiWRfRxBJ3Eyg==', 'taZwtCdKxGl57cu6bXT6EOQcIglMAtxxwE57+Ty+OlI=', 1584946800, 1585119600, '', 'CS4138', 4, 495.03, 'GPC', ''),
(46, 'OTC1500A', '', '0TFDfhn/q8MYMhlbKIsITA==', 'ypas23kIvWhZkqNrT+j22dELbXWEQnkhmKZ7CaRfCGA=', 1591167600, 0, '', '47QDCC20MDA6V', 2, 230.41, '', 'GPC'),
(47, 'SIG-A8', '', 'uPJ6vr3TutMDRKqVw8AQagiawODCeL9dBiyRxMX2SKM=', 'XGP0EIDqPYB5UDmV/i72fZkgxWvKBfG6HFAA0KRYfCU=', 1583136000, 1584514800, '', '47QDCC20M8HLK', 160, 23.72, 'GPC', ''),
(48, '5NXV5-GSA_5NXV5-FMRA276-16', '', '3IkDbDg8yS6+DxY1PES+LC6fk7CdJ6EmVG2J5vnknps=', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1594623600, 1595833200, 'W62P4J0195AAEE', '646138', 7, 88.6, 'Received', ''),
(49, '5NXV5-GSA_5NXV5-FMRASF680', '', 'fqsW9YXZM9Ya2Zl33AMdifu/zUqR/c9kLqbiF4cjvwiw0VdTxa/3Tu8s8rnT4CBD', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1594623600, 1596783600, 'W62P4J0195AAFE', '646138', 1, 257.32, 'Received (no doc#)', ''),
(50, '5NXV5-GSA_5NXV5-FMRAST650P', '', 'pIIb2WvxePxuyN65P1OsbCLprvC109fNPuzYeFMyjIJiekZXFFTHm8Pu6csWqxrv', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1594623600, 1596783600, 'W62P4J0195AAGE', '646138', 3, 123.81, 'Received (no doc#)', ''),
(51, '5MVW7-SP47W117D0046-BG-000-11236-001', '', 'SBvi+Wbx3RJposZsUHYNa9PnLFf/g+xl3mj0xj2WSWU=', 'Ji+YfxZK55TjcsqkmxBJbCoqAnYcDdkbccgIyPbUA1E=', 1594623600, 1597388400, 'W62P4J0195AAHE', '646138', 3, 561.77, 'Received', ''),
(52, '32WG2-SP47W116D0009-MIL-D-CWR-63609', '', 'h0V+J8usApFT9gbdqhSP0pw1t83rGi2iG/KYhnj1WecAg7vw2tfydnTFzUGitGSbrGcbNSVEYT2EdfBHh7bRz1/JKRp8yEK/mysXwzpCE5g=', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1594623600, 0, 'W62P4J0195AAJE', '646138', 3, 142.77, 'Est Ship 20200716', ''),
(53, '32WG2-SP47W116D0009-MIL-D-SY-446822', '', 'cSr/KwP+NXkOzszpcubstQfVWet2b3mz/JXtxi+nJDei+0RTYPR7tqeJLl46xUgUomilhhnBGXuvjtf2Qecy2g==', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1594623600, 0, 'W62P4J0195AAKE', '646138', 4, 20.11, 'FedMall - Shipped 20200722', ''),
(54, '32WG2-SP47W116D0009-MIL-E-SY-1217869', '', 'oOc8FElKigXhzHRfW7Ot+e9KeIYTXGFbs7a5cT7etFgks5oLvzJiAQRVVvNN0aJ4wAqHVh5ixSeW6VMtycamtw==', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1594623600, 1597302000, 'W62P4J0195AALE', '646138', 1, 4079.39, 'Received', ''),
(55, '32WG2-SP47W116D0009-MIL-E-SY-1235213', '', '4x6bEKDeO01k+zP+DSnONKhadRItzzSEkNjz9+pclwh/4FAnSvkRKdK9yv/gzwldpg+U7otDa60tOd60KcLEfsy26FEQUXz0Lgi99yryovo=', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1594623600, 1597302000, 'W62P4J0195AAME', '646138', 3, 1883, 'Received', ''),
(56, '32WG2-SP47W116D0009-MIL-F-A-1343806', '', '69VHmCsx7ECZyiQcfnJynnQG4fjWr1KCOA6ngWQw8Nr85oa+6q5WyBmJU9BQotF+gY9JPT8VGU4SW1xcaeJRSSGLFPWF3FKFVspfp/2uqI8=', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1594623600, 1595919600, 'W62P4J0195AANE', '646138', 40, 21.45, 'Received', ''),
(57, '32WG2-SP47W116D0009-MIL-F-A-1345877', '', 'sqjrDUUKAZJzUlGnYqwdvGzgU8vgSSgc1620Dp2l1Os/oP01gDcyY8c2F4ECnG10', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1594623600, 0, 'W62P4J0195AAPE', '646138', 25, 252.99, '24 received / 1 awaiting', ''),
(58, 'NSN# 6530015127801', '', 'XSxtYv3jJSK41lTXG+pWEkmtmE6jFsaE7hry/agwYww=', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1594623600, 0, 'W62P4J0195AADE', '646138', 3, 472.98, 'Est Shipping Date 20200921; price change (?) per email 20201002 - will inquire with vendor', ''),
(59, '0BG37-SP47W119D0009-720345155332', '', 's+xrJn5wCV6Yzusn2bZgWjaRRS6e6u9WATshOwIbvhQ=', 'L62PXVo46Gkm+ckW1yUi7jhpY7ZLN4Tbisc7Lx1JAgQ=', 1594623600, 1595833200, 'W62P4J0195AAAE', '646138', 73, 2.83, 'Received', ''),
(60, '0BG37-SP47W119D0009-720345688687', '', 'SG5ZMwt2tKHpSePGmDZ4R+r+/OszuBt1GBEoNOBxUqQB6wQC8vcWip+gMA9aJncVYv3DPiqyj1Uc6oI/pavHiQ==', 'L62PXVo46Gkm+ckW1yUi7jhpY7ZLN4Tbisc7Lx1JAgQ=', 1594623600, 1595833200, 'W62P4J0195AABE', '646138', 80, 4.24, 'Received', ''),
(61, '0BG37-SP47W119D0009-720345688694', '', 'SG5ZMwt2tKHpSePGmDZ4R+r+/OszuBt1GBEoNOBxUqQUkUI7si4mtLL/nbehwZ0rTCR5hI6PSuWL6XzfTa75bA==', 'L62PXVo46Gkm+ckW1yUi7jhpY7ZLN4Tbisc7Lx1JAgQ=', 1594623600, 1598338800, 'W62P4J0195AACE', '646138', 160, 4.24, 'Received', ''),
(62, '4WQA9-SP47W120D0008-S-17551PW', '', 'c3tlECJ82ixkh2RB1p5XP4fvKV85KJ6P9Ojh/3SUqDGWabMbzdVtrCJCS3FsPwpu', 'YwgxOCkm74qc+bf/8FGt5JxA2Rp/srrSaLp7Yw1wjvM=', 1594710000, 1595833200, 'W62P4J0196AAAE', '643993', 1, 195.11, 'Received', ''),
(63, '5NXV5-GSA_5NXV5-FMRA276-16', '', 'yd12cN0aMd//iS2WZ1gmA8PeCThzv+di2sa2e4oRMPY=', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1595833200, 0, 'W62P4J0209AAAE', '663873', 7, 88.6, 'Shipped 20200728', ''),
(64, '5NXV5-GSA_5NXV5-FMRASF680', '', 'fqsW9YXZM9Ya2Zl33AMdifu/zUqR/c9kLqbiF4cjvwiw0VdTxa/3Tu8s8rnT4CBD', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1595833200, 1599202800, 'W62P4J0209AABE', '663873', 1, 257.32, 'Received (Connex #10)', ''),
(65, '5NXV5-GSA_5NXV5-FMRAST650P', '', 'pIIb2WvxePxuyN65P1OsbCLprvC109fNPuzYeFMyjIJEv+y023eeJeBZKiYIvvg3', 'TZby8Ck0kGTQkcpIhGYp9I/n0gu4PDiAMEKoJDKjmps=', 1595833200, 1597215600, 'W62P4J0209AACE', '663873', 2, 123.81, 'Received', ''),
(66, '5MVW7-SP47W117D0046-BG-000-11236-001', '', 'Hg5v60eP3+JHcVg0LF7qGu1kpbi7aw7UuA4IOjzIcxQ=', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1595833200, 1597388400, 'W62P4J0209AADE', '663873', 3, 561.77, 'Received', ''),
(67, '32WG2-SP47W116D0009-MIL-D-SY-446822', '', 'cSr/KwP+NXkOzszpcubstQfVWet2b3mz/JXtxi+nJDei+0RTYPR7tqeJLl46xUgUomilhhnBGXuvjtf2Qecy2g==', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1595833200, 0, 'W62P4J0209AAEE', '663873', 2, 20.11, 'Ship Date 20200806', ''),
(68, '32WG2-SP47W116D0009-MIL-E-SY-1217869', '', 'oOc8FElKigXhzHRfW7Ot+YsPTLxwzKuKiMFFs7ayfDupoio9/mXIYYQemU+1bfApJNLR8ddQ/4wKA/aQr1VEHA==', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1595833200, 1599721200, 'W62P4J0209AAFE  ', '663873', 1, 4079.39, 'Received', ''),
(69, '32WG2-SP47W116D0009-MIL-E-SY-1235213', '', '4x6bEKDeO01k+zP+DSnONKhadRItzzSEkNjz9+pclwh/4FAnSvkRKdK9yv/gzwldpg+U7otDa60tOd60KcLEfj7vcy/0Ow3qdoyVZvE0M0Q=', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1595833200, 1599721200, 'W62P4J0209AAGE', '663873', 2, 1883, 'Received', ''),
(70, '32WG2-SP47W116D0009-MIL-F-A-1345877', '', 'sqjrDUUKAZJzUlGnYqwdvGzgU8vgSSgc1620Dp2l1OsB/FEho3jR/WDYgKdgMkLB', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1595833200, 1597215600, 'W62P4J0209AAHE', '663873', 17, 252.99, 'Received', ''),
(71, 'KCC 03046', '', 'GIv9QM13KMnux2mkWpvT5lJ56wA30Ksq1UgNbPWTvTA=', 'F7SM86sO9l2mdfBRzl5PNA==', 1596524400, 1596870000, '', '4721170005239', 4, 0, 'GPC', ''),
(72, '', '', 'aHtbhRJh1p9nPTSOwfxk9jpzrtEl7dZg7FswJT+2dCM=', '6aJ5ilkfnb1/h3hUCETo+ovMqDHLOKlRoIzXdF/Rzlc=', 1594710000, 1596783600, '', '47QDCC20MJX3K', 10, 0, 'GPC', ''),
(73, 'BTZ-42425-4', '', 'WHdmshK4d0qqLGzhpF3+6dPmWJXF6q579li0+Qwlj6A=', 'ZdesQo4ZWaZXrbnzUpOnJSLCYALcGy1JmX/maJ2EMIM=', 1595919600, 1596783600, '', '33708', 3, 0, 'GPC', ''),
(74, '1JFW6-SP47W118D0034-ZT-57', '', 'vHTxORyLnVHDjZ2on09HYyITFvK7q32SkmzoxJFRLB2pImdELunHCwtf6dH3iNgY', 'IkQi8qQlQwHjWWnqRMSU9g==', 1598252400, 0, 'W62P4J0237AABE', '672451', 112, 7.43, 'FedMall - Est Ship 20200924', ''),
(75, '3FVT5-SP47W117D0014-AELTKXTHAL3AR6-T243', '', '1OpA3XZYC+SEgUOTlYj0X7viXzW1M2bOnRDPFEJBbg5OSy+WN7eGag49Lc4+4IYkKzis12nGya9RrQADWlo2+w==', 'xNi5UgpPxdh33MhA/BofbvWGKXDl8GV3G8uUZmkD/Ok=', 1598252400, 0, 'W62P4J0237AAAE', '672451', 7, 1208.79, 'Need sizes', ''),
(76, '06850-SP47W120D0010-MB-298-1671R', '', 'DggaAbxHYjYsIFkhAavZQZxXV8pLzRUeqCxKXqKwkKXdqWqZ9gkOTy2F1NrQ81ZQ', 'qBTlL83wFvOrbR5bwWlgs5LePysTVu8/yM7IHgUzvvujxk4f8sc/6Sr1nG9/1LVo', 1600671600, 0, 'W62P4J0265AACE', '727449', 10, 86.89, 'Shipped 20200924', ''),
(77, '32WG2-SP47W116D0009-MIL-D-CWR-48941', '', 'qx74tBPrdsDX5L3Lr/Aenz8wPwvk9VGLMXgMqbtQphaBHqs5POFN9lQ88SCRPVnkkCmnXd+kpVP3G6zeSvtDzm0rAknKdmbMyMVgKCWV11g=', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1600671600, 0, 'W62P4J0265AAEE', '727449', 5, 55.15, 'Shipped 20200927', ''),
(78, '3WYK5-SP47W119D0001-ZSAF3500BL', '', 'Jj+VR3xZP2Jd3+sPbESP3W/xf3dieC6PTJeg7nUORbA=', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1600671600, 0, 'W62P4J0265AAAE', '727449', 10, 630.03, 'Shipped 20201006', ''),
(79, '32WG2-SP47W116D0009-MIL-E-SPR-1188679', '', 'EAajzpxWF7RTPNYwfI5wydY8Es6sqYjKAB4kqdLCssI=', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1600671600, 0, 'W62P4J0265AADE', '727449', 10, 71.12, 'Shipped 20200927', ''),
(80, '32WG2-SP47W116D0009-MIL-F-AC-1348296', '', 'XiDpBpfhqwrnKQPuX7vDsLWAsuTYsyA/6n37vh+nr3GS0g8I0yD61f8KgVL8q8PF', 'Itx+gMPCwn+CKr8y3UOYAQ==', 1600671600, 0, 'W62P4J0265AABE', '727449', 3, 612.26, 'Shipped 20200927', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `type_code` tinyint(4) NOT NULL,
  `role` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `pass` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `fname` varchar(32) COLLATE utf8_bin NOT NULL,
  `lname` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `facebook` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `twitter` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `linkedin` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `googleplus` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `street` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `state` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `authorized` tinyint(4) NOT NULL DEFAULT '0',
  `verifystr` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `email_key` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `image_loc` varchar(512) COLLATE utf8_bin NOT NULL DEFAULT '/assets/img/team-member.gif',
  `profile` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `type_code`, `role`, `pass`, `username`, `fname`, `lname`, `email`, `facebook`, `twitter`, `linkedin`, `googleplus`, `phone`, `street`, `city`, `state`, `zip`, `authorized`, `verifystr`, `email_key`, `active`, `image_loc`, `profile`, `type`) VALUES
(1, 99, NULL, '$2y$12$Co6ZKSIRVmluLIDBZ50jPePsXULfB3ze9S3MrhVLI9921J2NZEzta', 'helos', 'Harold', 'Hecker', 'jkulisek.us@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'https://suppsys.jlkconsulting.info/index.php/public_ctl/confirm_reg/007d0630cb2cf0a4369b34ad', '007d0630cb2cf0a4369b34ad', 1, '/assets/img/team-member.gif', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id_sessions`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `gear`
--
ALTER TABLE `gear`
  ADD PRIMARY KEY (`id_gear`),
  ADD KEY `type` (`type`),
  ADD KEY `id_gear_set` (`id_gear_set`);

--
-- Indexes for table `gear_sets`
--
ALTER TABLE `gear_sets`
  ADD PRIMARY KEY (`id_gear_sets`);

--
-- Indexes for table `gear_types`
--
ALTER TABLE `gear_types`
  ADD PRIMARY KEY (`id_gear_types`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_members`),
  ADD KEY `gear` (`gear`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_types` (`type_code`),
  ADD KEY `id_user_types_2` (`type_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  MODIFY `id_sessions` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gear`
--
ALTER TABLE `gear`
  MODIFY `id_gear` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `gear_sets`
--
ALTER TABLE `gear_sets`
  MODIFY `id_gear_sets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `gear_types`
--
ALTER TABLE `gear_types`
  MODIFY `id_gear_types` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_members` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

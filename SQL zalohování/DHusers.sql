-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost
-- Vytvořeno: Úte 27. led 2026, 11:48
-- Verze serveru: 10.5.25-MariaDB
-- Verze PHP: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `vyuka14`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `DHusers`
--

CREATE TABLE `DHusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `DHusers`
--

INSERT INTO `DHusers` (`id`, `username`, `password_hash`, `created_at`, `role`) VALUES
(1, 'aaaaa', '$2y$12$x5tRSP8YctwkFBvsO/3ny.q.qAaXKgFMhXnhsYrdonNTC3Vdhehe6', '2026-01-20 11:05:42', 'user'),
(2, 'TEST', '$2y$12$5rxvF1pqe.DTVjVf/Lf98Ogi1pQ6kiea7CYjHiSqG11j.mjBtkjpG', '2026-01-20 11:17:11', 'user'),
(3, 'TES', '$2y$12$GUH4RTg3Fj1ox7ZvvTqEW.yJlyBwUmLf9HMz94L7Ko/SxnzZp4x7q', '2026-01-20 11:17:33', 'user'),
(4, 'ddd', '$2y$12$nuWhmfq7BZ.Lwie8kFwl2uVRgjlx9gLeFCa4JN2SM2pGcgdfYg0Py', '2026-01-20 11:17:48', 'user'),
(5, 'aaaa', '$2y$12$yJ1EsY/bCcscb6sLdw9drup/YVW9k8XZ2AGcGsde.0yxKJckfdORG', '2026-01-20 11:24:21', 'user'),
(8, 'asdasdfgasdf', '$2y$12$HoQn3pfm7FpVKEayNX2AGOJaaL6tGDqEW7G2xCKz4SLd2HdJXpf46', '2026-01-20 11:24:50', 'user'),
(9, 'testtest', '$2y$12$d6aD8hpkb4Mo0YWf1C8jf.zLyF/uC9I8.8al.62fLjmEaCWRKPS2W', '2026-01-20 11:31:51', 'user'),
(10, 'Dymytro', '$2y$12$EkvzsI2EEUb8n.7oFFByAOnnXH6gNjkKfk7Gw.osURDgtKcljiwpC', '2026-01-20 16:32:16', 'user'),
(11, 'David T', '$2y$12$b4DaPX3ZqHQ8AIKrrJ4ky.HZZ.a9iv3N/Zs4tCgpFEcLrLD6vFjNW', '2026-01-27 11:03:59', 'user'),
(12, 'admin', '$2y$12$46rfDNU/9Rp10HWch0fMA.YhEmg8dt4mgIIs7izVcyXvjr6TQ9BV6', '2026-01-27 11:22:06', 'admin'),
(15, 'admin1', '$2y$12$Elh0mS1XDuaLONn6ffC1cOlXEy9iHvaTT.uawXyCIYmKm4TQnHOqa', '2026-01-27 11:31:26', 'user');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `DHusers`
--
ALTER TABLE `DHusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `DHusers`
--
ALTER TABLE `DHusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

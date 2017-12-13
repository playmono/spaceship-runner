CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `name` varchar(3) NOT NULL,
  `score` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

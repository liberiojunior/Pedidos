SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tpa_oo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `preco_compra` double NOT NULL,
  `preco_venda` double NOT NULL,
  `foto` varchar(20) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `quantidade`, `descricao`, `preco_compra`, `preco_venda`, `foto`) VALUES
(1, 205, '�gua Mineral 1L', 2, 2.5, 'agua.jpg'),
(2, 125, 'Coca Cola 2L ', 2.5, 4.75, 'coca2.jpg'),
(3, 201, 'Sukita de Laranja 1,5L', 2.1, 4.1, 'sukita.jpg'),
(4, 298, 'Pespi 2L', 2.5, 4.75, 'pepsi.jpg'),
(5, 350, 'Coca Cola 1,5L', 2.2, 4.15, 'coca.jpg'),
(6, 125, 'H2OH 1L', 2, 3.15, 'h2oh.jpg'),
(7, 300, 'Gatoraide 660 ML', 1.5, 2.75, 'gatorade.jpg'),
(8, 110, 'Energetico Monster 550 ML', 2.15, 3.15, 'moster.jpg'),
(9, 67, 'Energetico Fusion 550 ML', 2.2, 3.5, 'fusion.jpg'),
(10, 189, 'Galao de Agua Natural 10L', 11.5, 15.65, 'galao.jpg'),
(11, 210, 'Energetico RedBull 660 ML', 2.6, 3.85, 'redbull.jpg'),
(12, 410, 'Skol Beats Azul 500 ML', 2.2, 3.5, 'skolbeats3.jpg'),
(13, 225, 'Skol Beats Azul 770 ML', 3, 4.5, 'skolbeats2.jpg'),
(14, 310, 'Skol Beats Vermelha 770 ML', 3, 4.5, 'skolbeats.jpg'),
(15, 90, 'Cerveja Corona 660 ML', 4.5, 5.75, 'corona.jpg'),
(16, 67, 'Cerveja Bohemia 770 ML', 4.2, 6.75, 'bohemia.jpg'),
(17, 389, 'Cerveja Brahma Lata 500 ML', 2.75, 3.75, 'brahma.jpg'),
(18, 310, 'Cerveja Brahma Malzbier Lata 500 ML', 2.9, 3.9, 'brahma2.jpg'),
(19, 315, 'Cerveja Brahma Latao 660 ML', 2.4, 3.9, 'brahma3.jpg'),
(20, 195, 'Cerveja Budweiser 770 ML', 3.2, 4.5, 'bwdueiser.jpg'),
(21, 110, 'Cerveja Budweiser Lata 500 ML', 2.8, 3.85, 'bwdueiser2.jpg'),
(22, 100, 'Cerveja Caracu Lata 500 ML', 2.1, 3.3, 'caracu.jpg'),
(23, 450, 'Cerveja Skol Latao 770 ML', 2.8, 3.85, 'skol.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
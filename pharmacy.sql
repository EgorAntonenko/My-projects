-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Гру 18 2023 р., 11:01
-- Версія сервера: 10.4.28-MariaDB
-- Версія PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `pharmacy`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `Category_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`Category_id`, `Name`) VALUES
(1, 'Антибіотики'),
(2, 'Ліки від застуди'),
(3, 'При болю і спазмах'),
(4, 'Ліки для шлунка, кишечника, печінки'),
(5, 'Ліки від алергії'),
(6, 'Ліки для серця і судин');

-- --------------------------------------------------------

--
-- Структура таблиці `goods`
--

CREATE TABLE `goods` (
  `Good_id` bigint(20) UNSIGNED NOT NULL,
  `Category_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Info` varchar(500) NOT NULL,
  `Manufactory_id` bigint(20) UNSIGNED NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Price` int(20) NOT NULL,
  `Quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `goods`
--

INSERT INTO `goods` (`Good_id`, `Category_id`, `Name`, `Info`, `Manufactory_id`, `Image`, `Price`, `Quantity`) VALUES
(2, 1, 'Ципрофлоксацин Євро', 'Лікарський засіб: ЦИПРОФЛОКСАЦИН (CIPROFLOXACINUM)\r\nФорма випуску: табл. в/о 500 мг блістер\r\nГрупа: антибактеріальні засоби з групи хінолонів\r\nПідгрупа: фторхінолони ', 1, 'https://liki24.com/image/catalog/product/newupload/305425-ciprofloksacin-evro-tabl-po-500-mg-blister-10-1.png?w=900&h=900', 70, 100),
(4, 1, 'Азитроміцин-Астрафарм', 'Лікарський засіб: АЗИТРОМІЦИН-АСТРАФАРМ (AZITHROMYCINUM-ASTRAPHARM)\r\nФорма випуску: капсули по 500 мг № 3 (3х1) у блістерах\r\nГрупа: макроліди, лінкозаміди і стрептограміни\r\nПідгруппа: макроліди\r\nСклад: 1 капсула містить азитроміцину (у формі азитроміцину дигідрату у перерахуванні на 100 % речовину) 500 мг (AZITHROMYCINUM) ', 2, 'https://liki24.com/image/catalog/product/newupload//3669-azitromicin-astrafarm-kaps-500-mg-3-astrafarm-ooo-1.jpg?w=900&h=900', 74, 100),
(6, 2, 'Бронхипрет сироп', 'Лікарський засіб: БРОНХИПРЕТ (BRONCHIPRET)\r\nФорма випуску: сироп по 50 мл або по 100 мл у флаконі, по 1 флакону в картонній коробці\r\nГрупа: інші препарати, що застосовуються у разі кашлю та застудних захворювань\r\nПідгруппа: інші препарати, що застосовуються у разі кашлю та застудних захворювань\r\nСклад: 10 г (що відповідає 8,92 мл) сиропу містять 1,5 г екстракту трави чебрецю рідкого (1: (2-2,5)) (Нerba Thymi vulgaris) /(екстрагент: амонію розчин 10 %/гліцерин 85 %/етанол 90 %/вода очищена (1:20:', 4, 'https://liki24.com/image/catalog/product/newupload//3265-bronhipret-sirop-fl-100-ml-bionorica-1.jpg?w=900&h=900', 199, 200),
(7, 2, 'Респіброн табл', '\r\n\r\nЛікарський засіб: РЕСПІБРОН (RESPIBRON)\r\nЛікарська форма. Таблетки сублінгвальні.\r\nОсновні фізико-хімічні властивості:крyглi плacкi білуваті таблетки з рискою з одного боку, з коричневими вкрапленнями, з легким характерним запахом.\r\nФармакотерапевтична група.Імуностимулятори. Код АТХ L03A X.\r\n', 4, 'https://liki24.com/image/catalog/product/newupload/3006-respibron-tabl-sublingval-10-bruschettini-1.png?w=900&h=900', 391, 30),
(8, 3, 'Солпадеїн Актив', 'Лікарський засіб: СОЛПАДЕЇН АКТИВ (SOLPADEIN ACTIVE)\r\nФорма випуску: таблетки шипучі № 12 (4х3) у стрипах\r\nГрупа: інші анальгетики та антипіретики\r\nПідгруппа: аніліди\r\nСклад: 1 таблетка містить 500 мг парацетамолу, 65 мг кофеїну (PARACETAMOLUM)', 3, 'https://liki24.com/image/catalog/product/newupload//7098-solpadein-aktiv-tabl-ship-strip-v-korobke-12-1.jpg?w=900&h=900', 129, 25),
(9, 3, 'Німесил гран', 'Лікарський засіб: НІМЕСИЛ (NIMESIL)\r\nФорма випуску: гран. д/п сусп. д/перор. заст.\r\nГрупа: нестероїдні протизапальні та протиревматичні засоби\r\nПідгрупа: інші нестероїдні протизапальні і протиревматичні засоби\r\nСклад: Німесулід - 100 м (NIMESULIDUM) ', 3, 'https://liki24.com/image/catalog/product/newupload//50981-nimesil-gran-dp-susp-dperor-prim-100-mg-paket-odnodoz-2-g-30-1.png?w=900&h=900', 15, 900),
(10, 4, 'Ренні без цукру табл', 'Лікарський засіб: РЕННІ БЕЗ ЦУКРУ (RENNIE SUGAR FREE)\r\nФорма випуску: таблетки жувальні з м\'\'ятним смаком; по 6 таблеток у блістері, по 2 або 4 блістери в картонній коробці; по 12 таблеток у блістері, по 1 або 2 блістери в картонній коробці\r\nГрупа: антациди\r\nПідгруппа: комбіновані препарати та комплексні сполуки алюмінію, кальцію і магнію', 2, 'https://liki24.com/image/catalog/product/newupload/75374-atoksil-gel-gel-stik-paketik-20-orisil-farm-ooo-1.png?w=900&h=900', 206, 85),
(11, 4, 'Атоксіл гель', 'Склад одного стік-пакета, 20 г гелю:\r\n\r\nАктивні компоненти: діоксид кремнію високодисперсний – 1,6 г\r\n\r\nДопоміжні компоненти\r\n\r\nвода очищена, загущувач натрій-карбоксиметилцелюлоза, консервант сорбат калію, регулятор кислотності лимонна кислота, підсолоджувач сукралоза, ароматизатор «Банан»', 1, 'https://liki24.com/image/catalog/product/newupload/75374-atoksil-gel-gel-stik-paketik-20-orisil-farm-ooo-1.png?w=900&h=900', 396, 120),
(12, 5, 'Аква Маріс спрей', '\"Аква Маріс ® спрей назальний\" підтримує нормальний фізіологічний стан слизової оболонки порожнини носа.', 3, 'https://liki24.com/image/catalog/product/newupload/8175-133166022793130750.PNG?w=900&h=900', 240, 45),
(13, 6, 'Нормовен табл', 'Лікарський засіб: НОРМОВЕН (NORMOVEN)\r\nФорма випуску: таблетки, вкриті плівковою оболонкою, по 10 таблеток у блістері, по 3 блістери в пачці; по 10 таблеток у блістері, по 6 блістерів в пачці\r\nГрупа: капіляростабілізуючі засоби\r\nПідгруппа: біофлавоноїди\r\nСклад: 1 таблетка містить флавоноїдної фракції 500 мг, яка містить діосміну 450 мг, гесперидину 50 мг (Diosminum)', 4, 'https://liki24.com/image/catalog/product/newupload//3642-normoven-tabl-pplen-obolochkoj-450-mg-50-mg-blister-60-kievskij-vitaminnyj-zavod-pao-1.png?w=900&h=900', 353, 35);

-- --------------------------------------------------------

--
-- Структура таблиці `manufactures`
--

CREATE TABLE `manufactures` (
  `Manufactory_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `manufactures`
--

INSERT INTO `manufactures` (`Manufactory_id`, `Name`) VALUES
(1, 'Юнік'),
(2, 'Bionorica'),
(3, 'Acino'),
(4, 'Здоров\'я');

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `Order_id` bigint(20) UNSIGNED NOT NULL,
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `Good_id` bigint(20) UNSIGNED NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Full_Price` int(20) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`Order_id`, `User_id`, `Good_id`, `Quantity`, `Full_Price`, `Date`) VALUES
(1, 13, 4, 5, 370, '2023-11-29'),
(2, 13, 11, 3, 255, '2023-11-22'),
(5, 5, 8, 90, 500, '2023-11-04'),
(6, 4, 2, 152, 5, '2023-11-26'),
(8, 4, 2, 2, 5, '2023-11-29');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `User_id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` int(20) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Admin_status` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`User_id`, `Name`, `Email`, `Phone`, `Date_of_birth`, `Address`, `Password`, `Admin_status`) VALUES
(4, 'admin', 'admin@gmail.com', 681303788, '2005-05-06', 'Darvina 11', 'qwerty12345', 1),
(5, 'Fadil', 'Fadil@gmail.com', 681353784, '2008-09-09', 'Darvina 9', 'qwerty', 0),
(6, 'Nessa', 'Nessa@gmail.com', 681313755, '2013-11-06', 'Shevchenka 6', 'asdfgh', 0),
(7, 'Robbie', 'Robbie@gmail.com', 681354209, '2014-11-04', 'Shevchenka 22', '1241351325', 0),
(8, 'ernust87', 'ernust88@gmail.com', 681303742, '2015-11-10', 'Італійський бул., 4', 'rwersdfdsf', 0),
(9, 'Isabela', 'Isabela@gmail.com', 487990757, '2016-11-22', 'Велика Арнаутська, 29', 'cdgfdstgdfsg', 0),
(10, 'Laura', 'Laura@gmail.com', 623040506, '2005-11-20', 'Chycherina St, 43', 'fsdfsdf22', 0),
(11, 'Priapus1999', 'Priapus@gmail.com', 800500003, '1999-08-10', 'Київська вул., 77', 'rfsrew32', 0),
(12, 'Eadgar', 'Eadgar@gmail.com', 500451000, '2008-07-14', 'вул. Стадіонна, 1', 'fsadfsdf33', 0),
(13, 'Drusus', 'Drusus@gmail.com', 503185026, '2006-12-12', 'вул. Артема, 3', 'asd123asd', 0);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_id`),
  ADD UNIQUE KEY `Category_id` (`Category_id`);

--
-- Індекси таблиці `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`Good_id`),
  ADD UNIQUE KEY `Good_id` (`Good_id`),
  ADD KEY `Category_id` (`Category_id`,`Manufactory_id`),
  ADD KEY `goods_ibfk_2` (`Manufactory_id`);

--
-- Індекси таблиці `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`Manufactory_id`),
  ADD UNIQUE KEY `Manufactory_id` (`Manufactory_id`);

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD UNIQUE KEY `Order_id` (`Order_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Good_id` (`Good_id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_id` (`User_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `goods`
--
ALTER TABLE `goods`
  MODIFY `Good_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблиці `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `Manufactory_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `User_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `categories` (`Category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`Manufactory_id`) REFERENCES `manufactures` (`Manufactory_id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Good_id`) REFERENCES `goods` (`Good_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

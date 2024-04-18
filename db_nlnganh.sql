-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2024 lúc 05:03 PM
-- Phiên bản máy phục vụ: 8.0.34
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_nlnganh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id_category` int UNSIGNED NOT NULL,
  `category_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id_category`, `category_name`) VALUES
(20, 'Áo Sơ Mi '),
(21, 'Áo Thun'),
(22, 'Quần Dài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `order_quantity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_price` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `order_code` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `order_quantity`, `order_name`, `order_price`, `order_code`) VALUES
(28, 43, '1', 'ASM tay ngắn Regular B2', '330000', '8519'),
(29, 48, '1', 'Quần Jeans ống rộng', '349000', '8519'),
(30, 44, '1', 'ASM tay dài Regular B4', '350000', '5904'),
(31, 49, '1', 'Quần tây lửng ống rộng', '265000', '5904'),
(32, 47, '2', 'Áo thun phom regular trơn', '199000', '5904'),
(33, 44, '1', 'ASM tay dài Regular B4', '350000', '7050');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Triadmin', 'Tripham');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_info_cart`
--

CREATE TABLE `tbl_info_cart` (
  `id_cart` int NOT NULL,
  `email_cart` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name_cart` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone_number_cart` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address_cart` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note_cart` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `code_order` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `payment` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `location` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_info_cart`
--

INSERT INTO `tbl_info_cart` (`id_cart`, `email_cart`, `name_cart`, `phone_number_cart`, `address_cart`, `note_cart`, `code_order`, `payment`, `location`) VALUES
(29, '', 'Phạm Hửu Trí', '', 'Ấp 11 thị trấn vĩnh viễn', '', '7050', 'momo_wallet', 'nhà riêng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int UNSIGNED NOT NULL,
  `name_product` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code_product` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price_product` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `number_product` int NOT NULL,
  `desc_product` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `detail_product` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_product` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `create_date` date NOT NULL,
  `id_category` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `name_product`, `code_product`, `price_product`, `number_product`, `desc_product`, `detail_product`, `image_product`, `create_date`, `id_category`) VALUES
(42, 'ASM tay dài Regular B4', 'BAE00001', '350000', 20, 'Đặc điểm nổi bật của sản phẩm Kiểu dáng xinh xắn, trẻ trung, chuẩn girl thời thượng  Dày dặn, không sợ lộ hàng, tạo cảm giác tự tin cho người mặc  Màu sắc nịnh da, tôn dáng, che khuyết điểm  Đường may tỉ mỉ, không bụi vải, không chỉ thừa  Dễ dàng giặt ủi, lành tính, thân thiện với làn da', 'ĐƠN GIẢN NHƯNG KHÔNG ĐƠN ĐIỆU\r\n \r\n\r\n \r\n\r\nHiểu tâm lý chị em đi làm phải áp lực vì bao nhiêu là deadline và ánh mắt phán xét nên GU sản xuất ngay chiếc áo sơ mi vừa chuẩn công sở, vừa mặc thiệt xinh, thiệt mát, thiệt thoải mái thì làm việc mới hăng hái, tự tin.\r\n\r\n\r\nEm sơ mi xịn sò với chất lụa trơn tru, mềm mịn, không nhăn, lên người phát ta nói cực sang luôn, bảo đảm mặc vào chỉ có từ thích tới thích!!! \r\n\r\n \r\n\r\nCận cảnh màu áo cưng không chịu được luôn í. Chưa hết, tách mix mê mệt á. Mix với quần tây, chân váy đều \"hợp rơ\" hết sẩy con bà bảy.  Đơn giản mà xinh nín thở, thanh lịch, không lỗi mốt, chuẩn công sở là duyệt bất chấp!! \r\n\r\n \r\n\r\nCác chị nhanh tay rinh ngay kẻo lỡ nha!', 'public/uploads/2-TRANG-BAE00001.jpg', '2024-03-15', 20),
(43, 'ASM tay ngắn Regular B2', 'BAE00004', '330000', 20, 'Đặc điểm nổi bật của sản phẩm Kiểu dáng xinh xắn, trẻ trung, chuẩn girl thời thượng  Dày dặn, không sợ lộ hàng, tạo cảm giác tự tin cho người mặc  Màu sắc nịnh da, tôn dáng, che khuyết điểm  Đường may tỉ mỉ, không bụi vải, không chỉ thừa  Dễ dàng giặt ủi, lành tính, thân thiện với làn da', 'SƠ MI TAY NGẮN HIỆN ĐẠI TRẺ TRUNG\r\n \r\n\r\n \r\n\r\nCòn gì tuyệt vời hơn khi diện những trang phục thoải mái và thoáng mát trong những ngày đến công sở.\r\n\r\n \r\n\r\nMột chiếc áo sơ mi tay ngắn, lụa ngọc trai mềm mại, mịn mát như làn nước nhẹ nhàng lướt qua làn da sẽ là người bạn đồng hành cùng phái đẹp cho những chuyến đi chơi cùng bạn bè, gia đình.\r\n\r\n \r\n\r\nChỉ cần bạn chọn cho mình một mẫu áo sơ mi tay ngắn phù hợp, bạn đã có thể mix & match với chân váy, quần Jean, quần short, đôi giày thể thao, sandal cao gót hoặc giày lười để đem đến set đồ hoàn hảo đi làm, đi chơi,...\r\n\r\n \r\n\r\nThiết kế và ứng dụng linh hoạt của mẫu áo sơ mi tay ngắn GUMAC sẽ là must have item cho nàng!', 'public/uploads/2-trang-bae00004.jpg', '2024-03-15', 20),
(44, 'ASM tay dài Regular B4', 'BAE00003', '350000', 20, 'Đặc điểm nổi bật của sản phẩm Kiểu dáng xinh xắn, trẻ trung, chuẩn girl thời thượng  Dày dặn, không sợ lộ hàng, tạo cảm giác tự tin cho người mặc  Màu sắc nịnh da, tôn dáng, che khuyết điểm  Đường may tỉ mỉ, không bụi vải, không chỉ thừa  Dễ dàng giặt ủi, lành tính, thân thiện với làn da', 'LỘ DIỆN SƠ MI “BẤT HỦ” NHÀ GU!\r\n\r\n \r\n\r\n \r\n\r\nNếu chị đẹp còn băn khoăn mặc gì mỗi sáng, hãy tham khảo ngay các cách phối đồ với chiếc áo sơ mi công sở cơ bản, chất lụa ngọc trai cao cấp, chuẩn chất lượng sang - đẹp - bền hàng đầu này nhé.\r\n\r\n \r\n\r\nPhối cùng quần Âu đa kiểu dáng: mang lại vẻ chỉn chu chốn công sở.\r\n\r\n \r\n\r\nPhối cùng chân váy dài: nét yêu kiều, duyên dáng cho chị em xuống phố hẹn hò.\r\n\r\n \r\n\r\nMix set gì cũng đủ thanh lịch và đủ linh hoạt để chị em thể hiện phong cách thời trang vừa đa dạng vừa thời thượng.\r\n\r\n \r\n\r\nCòn chần chừ gì mà không sở hữu ngay thiết kế độc quyền của GU cho giao mùa đầy cảm hứng mặc đẹp nhé chị em! Shopping ngay!', 'public/uploads/2-TRANG-BAE00003.jpg', '2024-03-15', 20),
(45, 'Áo sơ mi kiểu bo tay', 'LAE0301', '229000', 20, 'Đặc điểm nổi bật của sản phẩm Kiểu dáng xinh xắn, trẻ trung, chuẩn girl thời thượng  Dày dặn, không sợ lộ hàng, tạo cảm giác tự tin cho người mặc  Màu sắc nịnh da, tôn dáng, che khuyết điểm  Đường may tỉ mỉ, không bụi vải, không chỉ thừa  Dễ dàng giặt ủi, lành tính, thân thiện với làn da', 'HACK TUỔI VỚI SƠ MI FORM LỬNG TRẺ TRUNG\r\n \r\n\r\n \r\nThật là thiếu sót nếu không giới thiệu đến chị em một chiếc áo sơ mi với form lửng trẻ trung, với chất liệu lụa ngọc trai sang trọng, mát mẻ ngày hè.\r\n\r\n \r\nNếu đã có quá nhiều những chiếc sơ mi cơ bản đi làm thì chị em nay có thể thử chiếc sơ mi mới mẻ này.\r\n\r\n \r\nVì là form lửng nên ngoài việc sơ vin chị em còn có thể mặc thả form phối cùng quần Jean, short hay váy ngắn. Lâu lâu thay đổi phong cách đi làm cho hack tuổi chị em ha!', 'public/uploads/2-TRANG-LAE0301.jpg', '2024-03-15', 20),
(46, 'Áo thun phom slim trơn', 'ATE03031', '199000', 20, 'Đặc điểm nổi bật của sản phẩm Kiểu dáng chuẩn style girl Hàn  Mềm mại, dễ chịu và tôn dáng khi mặc  Chất liệu thông thoáng, đem lại sự thoải mái suốt ngày dài  Bền đẹp, không nhão, không xù lông khi sử dụng  Sản xuất tại xưởng 10 năm kinh nghiệm tại TP Hồ Chí Minh', 'Ngại mặc hở, ngại mặc ôm, ngại mặc áo thun quá dày, không thấm hút, làm nóng bức, gây ra mùi cơ thể.\r\n\r\n \r\n\r\nThì em áo thun mới nhất nhà GU chính là giải pháp: mềm, mịn, mát, nhanh khô, co giãn tốt. Với ba màu vàng, tím, be - những màu sắc tươi sáng đảm bảo cho chị em diện hè không bị bắt nắng.\r\n\r\n \r\n\r\nÁo trơn nên mặc được nhiều dịp, chị em thích thì nhắn GU liền nha!', 'public/uploads/2-vang-ate03031.jpg', '2024-03-15', 21),
(47, 'Áo thun phom regular trơn', 'ATE03030', '199000', 20, 'Đặc điểm nổi bật của sản phẩm Kiểu dáng chuẩn style girl Hàn  Mềm mại, dễ chịu và tôn dáng khi mặc  Chất liệu thông thoáng, đem lại sự thoải mái suốt ngày dài  Bền đẹp, không nhão, không xù lông khi sử dụng  Sản xuất tại xưởng 10 năm kinh nghiệm tại TP Hồ Chí Minh', 'MẠNH DẠN SẢN XUẤT SỐ LƯỢNG LỚN, VÌ EM NÀY CỰC KỲ DỄ MẶC\r\n \r\n\r\n \r\n\r\nÁo thun trơn mặc mọi lúc mọi nơi, ở nhà, đi học, đi làm, đi cà phê, đi du lịch, đi đâu đều có thể diện được.\r\n\r\n \r\n\r\nVới 3 màu cam, hồng, xanh - những gam màu nổi bật cho ngày hè thêm tươi tắn, năng lượng. Các chị em có thể mua mặc nhóm với nhau, dễ mặc và phù hợp với mọi dáng người.\r\n\r\n \r\n\r\nGiờ là hiểu lý do GU sản xuất số lượng lớn luôn rồi nhen, không kén thời điểm, không kén người mặc, thích thì nhắn GU liền nha!', 'public/uploads/2-xanh-ate03030.jpg', '2024-03-15', 21),
(48, 'Quần Jeans ống rộng', 'QJE03038', '349000', 20, 'Đặc điểm nổi bật của sản phẩm Quần jean nữ cao cấp với sự chỉn chu đến từng đường kim mũi chỉ, đem lại form chuẩn tuyệt đối  Sợi vải Jean chắc chắn, liên kết chặt chẽ với độ bền cao, mềm mại và thân thiện cho da  Sản phẩm basic, chất liệu bền bỉ, thoải mái cho đôi chân của bạn  Bề mặt jean dày đẹp, có độ cứng cáp, giúp tôn dáng người mặc  Thiết kế theo phong cách mới, kiểu dáng trẻ trung, khéo léo tôn dáng', 'TOP 1 MẪU QUẦN JEAN ỐNG RỘNG ĐƯỢC YÊU THÍCH CỦA NĂM\r\n \r\n\r\n \r\n\r\nQuần Jean gì mà nhìn thanh lịch quá ta ơi. Form ống rộng, có may dây kéo baget và túi hàm ếch tiện lợi, thời thượng. Chất Jean thì mềm mại, thấm hút tốt và đã được xử lý co rút và định hình tốt, giúp bền form hơn rất nhiều.\r\n\r\n \r\n\r\nĐường may và sợi vải chắc chắn, thân thiện với người dùng.\r\n\r\n \r\n\r\n \r\n\r\nKiểu dáng basic không cầu kỳ và rườm rà giúp chị em tha hồ mix với áo thun, sơ mi, áo kiểu,... và thoải mái vận động.', 'public/uploads/2-XANH-QJE03038.jpg', '2024-03-15', 22),
(49, 'Quần tây lửng ống rộng', 'QE03020', '265000', 20, 'Đặc điểm nổi bật của sản phẩm Thiết kế chuẩn tôn dáng, thu hút mọi ánh nhìn  Bề mặt vải mềm và nhẹ giúp cho khách hàng cảm thấy vô cùng thoải mái  Quần Âu chuẩn form phụ nữ Á Đông, khéo léo che đi khuyết điểm vùng bụng và đôi chân người mặc  Ít nhăn nhàu trong quá trình sử dụng, dễ dàng giặt sạch và ủi thẳng mà không tốn quá nhiều thời gian  Màu sắc nhã nhặn, dễ lên đồ, phù hợp với đặc thù công việc cũng như mục đích sử dụng của từng người', 'TRỜI NẮNG TRỜI MƯA, CỨ MẶC QUẦN LỬNG LÀ CHÂN ÁI!\r\n \r\n\r\n \r\n\r\nTrời nóng thì quần lửng form suông vừa mát vừa dễ chịu, trời mưa ngập đường thì quần lửng không cần xắn lên, chạy xe thoải mái.\r\n\r\n \r\n\r\nHơn nữa xu hướng trang phục công sở hiện đại năm 2024 lại rất ưa chuộng những chiếc quần như này, vừa lịch sự lại vừa Fashion.\r\n\r\n \r\n\r\nMàu đen nên chị em thoải mái phối màu, thích cá tính thì áo kiểu, thích đơn giản thì áo thun trắng, kết hợp thêm một vài phụ kiện như mắt kính, khăn cổ…\r\n\r\n \r\n\r\nRất lâu nhà GU mới ra mắt một chiếc quần Form lửng như này, chị em thích thì nhắn tin cho GU liền nha!\r\n\r\n\r\n', 'public/uploads/2-DEN-QE03020.jpg', '2024-03-15', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `phone_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci,
  `surname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `password`, `user_name`, `created_date`, `phone_number`, `surname`, `name`) VALUES
(29, '123', 'phamhuutri101@gmail.com', '2024-03-31', '0704796583', 'Phạm ', 'Phạm Hửu Trí'),
(30, 'Tripham1080', 'trib2000144@student.ctu.edu.vn', '2024-04-01', '0704796583', 'Phạm ', 'Trí');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_info_cart`
--
ALTER TABLE `tbl_info_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `id_categoty` (`id_category`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id_category` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_info_cart`
--
ALTER TABLE `tbl_info_cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category_product` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

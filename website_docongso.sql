-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 09, 2021 lúc 05:32 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_docongso`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_affiliate_partner`
--

CREATE TABLE `tbl_affiliate_partner` (
  `id` int(11) NOT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_rose` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_affiliate_partner`
--

INSERT INTO `tbl_affiliate_partner` (`id`, `avatar`, `firstname`, `lastname`, `email`, `profession`, `address`, `phone`, `password`, `total_rose`, `status`, `created_at`, `updated_at`) VALUES
(1, '1616818054lap-trinh-vien.jpg', 'Hoàng', 'Hoè', 'hoangbug123@gmail.com', 'developer', 'số 9, ngõ 268 ngọc hồi, thanh trì, hà nội', '0385522987', '1223', 11610, 1, '2021-03-27 11:07:34', '2021-03-27 11:07:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` int(11) NOT NULL,
  `cate_blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_blog` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `cate_blog_id`, `user_id`, `title`, `main_image`, `description`, `content_blog`, `views`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'Mừng 8/3 - LOZA Sale Up To 50% Toàn Bộ Sản Phẩm', '1617038218anh-sale-83.png', 'Nhân dịp chào mừng ngày quốc tế phụ nữ 8/3, LOZA tung ƯU ĐÃI HẤP DẪN - SALE UP TO 50% Toàn bộ sản phẩm như một món quà tri ân để dành tặng tới một nửa thế giới. Rất nhiều thiết kế xinh xắn đã lên kệ tại tất cả các showrooms của LOZA, cùng tìm hiểu xem mùng 8/3 năm nay, LOZA sẽ mang đến những khuyến mại HOT gì nhé!', '<p>Nhân dịp chào mừng ngày quốc tế phụ nữ 8/3, LOZA tung <strong>ƯU ĐÃI HẤP DẪN - SALE UP TO 50%</strong> Toàn bộ sản phẩm như một món quà tri ân để dành tặng tới một nửa thế giới. Rất nhiều thiết kế xinh xắn đã lên kệ tại tất cả các showrooms của LOZA, cùng tìm hiểu xem mùng 8/3 năm nay, LOZA sẽ mang đến những khuyến mại HOT gì nhé!<br>&nbsp;</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/05032021/1614907467_anh-sale-83.png\" alt=\"\"></figure><p>&nbsp;</p><p>- Áo phông đồng giá chỉ&nbsp;</p><p><strong>198K</strong></p><p>, mua càng nhiều&nbsp;</p><p><strong>ƯU ĐÃI</strong></p><p>&nbsp;càng lớn</p><p>-&nbsp;</p><p><strong>Giảm giá ngay 10%</strong></p><p>&nbsp;cho tất cả những sản phẩm nằm trong BST mới ra mắt trong tháng 03&nbsp;</p><p>-&nbsp;</p><p><strong>Sale Up To 50%</strong></p><p>&nbsp;toàn bộ sản phẩm váy đầm với những thiết kế vô cùng xinh xắn và trẻ trung</p><p>-&nbsp;</p><p><strong>Giảm giá lên đến 30%</strong></p><p>&nbsp;cho toàn bộ dòng sơ mi thiết kế, bao gồm cả những thiết kế vừa mới lên kệ</p><p>- Chân váy đồng giá chỉ từ&nbsp;</p><p><strong>189K&nbsp;</strong></p><p>- Mức giá vô cùng hấp dẫn dành riêng cho dịp&nbsp;</p><p><strong>8/3</strong></p><p>!!</p><p>- Chỉ từ&nbsp;</p><p><strong>350K</strong></p><p>&nbsp;nàng đã có thể sở hữu ngay cho mình một thiết kế quần âu cao cấp&nbsp;</p><p>-&nbsp;</p><p><strong>Sale Up To 50%</strong></p><p>&nbsp;toàn bộ dòng sản phẩm áo khoác Thu - Đông, áo jacket đồng giá chỉ từ&nbsp;</p><p><strong>249K</strong></p><p>, áo len đồng giá chỉ từ&nbsp;</p><p><strong>149K</strong></p><p>-&nbsp;</p><p><strong>Ưu đãi lên tới 50%</strong></p><p>&nbsp;với toàn bộ dòng sản phẩm vest cao cấp</p><p>-&nbsp;</p><p><strong>Giảm giá lên tới 20%</strong></p><p>&nbsp;áp dụng với BST đầm trung niên mới nhất&nbsp;</p><p>- Đầm trung niên lẻ size sale đồng giá&nbsp;</p><p><strong>299K - 399K</strong></p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853627_dam-suong-tron-mau-1.jpg\" alt=\"Đầm suông phối nơ xinh xắn\"></figure><p>Đầm suông phối nơ xinh xắn</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853750_dam-xoe-tron-mau-1.jpg\" alt=\"Đầm đính ngọc thanh lịch\"></figure><p>Đầm đính ngọc thanh lịch</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853779_dam-xoe-tron-mau-2.jpg\" alt=\"Đầm xòe trơn màu\"></figure><p>Đầm xòe trơn màu</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853817_so-mi-da-bao-1.jpg\" alt=\"Sơ mi da báo sang chảnh\"></figure><p>Sơ mi da báo sang chảnh</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853839_so-mi-ke.jpg\" alt=\"Set đồ công sở trẻ trung\"></figure><p>Set đồ công sở trẻ trung</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853871_so-mi-hoa-tiet-3.jpg\" alt=\"Sơ mi họa tiết ấn tượng\"></figure><p>Sơ mi họa tiết ấn tượng</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853903_ao-phong-ngan-tay-06.jpg\" alt=\"Áo phông màu tím trendy\"></figure><p>Áo phông màu tím trendy</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853922_ao-phong-ngan-tay-01.jpg\" alt=\"Áo phông màu đen cá tính\"></figure><p>Áo phông màu đen cá tính</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614853942_ao-phong-ngan-tay-19.jpg\" alt=\"Áo phông màu xanh dịu mát\"></figure><p>Áo phông màu xanh dịu mát</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614854021_dam-trung-nien-xoe-3.jpg\" alt=\"Đầm trung niên tay cánh tiên\"></figure><p>Đầm trung niên tay cánh tiên</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614854036_dam-trung-nien-xoe-2.jpg\" alt=\"Đầm hoa trung niên tay lỡ\"></figure><p>Đầm hoa trung niên tay lỡ</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614854051_dam-trung-nien-xoe-1.jpg\" alt=\"Đầm trung niên đắp voan\"></figure><p>Đầm trung niên đắp voan</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/04032021/1614854147_ao-len-35.jpg\" alt=\"Áo len sale chỉ 199K\"></figure><p>Áo len sale chỉ 199K</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/05032021/1614908412_ao-vest-nu-dep-2.jpg\" alt=\"Áo vest Hàn Quốc sale 30%\"></figure><p>Áo vest Hàn Quốc sale 30%</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/05032021/1614908488_ao-khoac-da.jpg\" alt=\"Áo khoác sale 50%\"></figure><p>Áo khoác sale 50%</p><p>Nhanh chân ghé ngay&nbsp;</p><p><a href=\"https://loza.vn/showroom\"><strong>showroom của LOZA</strong></a></p><p>&nbsp;để tận hưởng những&nbsp;</p><p><strong>ƯU ĐÃI HẤP DẪN</strong></p><p>&nbsp;nhất chỉ&nbsp;</p><p><strong>dành riêng cho dịp 8/3</strong></p><p>&nbsp;nàng nhé. Ngoài ra, các nàng cũng có thể đặt hàng qua&nbsp;</p><p><strong>website và fanpage</strong></p><p>&nbsp;chính thức của LOZA. Đừng quên chương trình chỉ kéo dài đến ngày&nbsp;</p><p><strong>08/03/2021</strong></p><p>&nbsp;với ưu đãi và số lượng sản phẩm giới hạn, bỏ qua dịp này là nàng sẽ phải tiếc hùi hụi đó nha! Cuối cùng, LOZA xin gửi lời chúc 8/3 tới một nửa thế giới yêu thương, chúc các nàng lúc nào cũng thật xinh đẹp, tự tin và tỏa sáng dù ở bất cứ nơi đâu!</p>', 15, 1, '2021-03-27 10:08:24', '2021-03-30 00:16:58'),
(3, 1, 2, 'Chào hè 2021 với BST áo phông ngắn tay trẻ trung và năng động', '1617038127ao-phong-01.jpg', 'Hè 2020, LOZA cho ra mắt dòng sản phẩm áo phông nữ cao cấp với những ưu điểm vượt trội cả về kiểu dáng, chất liệu cho đến màu sắc. Tiếp nối thành công ấy, hè 2021 tiếp tục cho ra mắt BST áo phông ngắn tay mới với những thiết kế vô cùng trẻ trung và hiện đại giúp tôn lên nét đẹp năng động và khỏe khoắn của những cô gái thế hệ mới. Cùng theo dõi bài viết dưới đây để xem hè năm nay LOZA sẽ mang tới những chiếc áo phông như thế nào nhé!', '<p>Hè 2020, LOZA cho ra mắt dòng sản phẩm áo phông nữ cao cấp với những ưu điểm vượt trội cả về kiểu dáng, chất liệu cho đến màu sắc. Tiếp nối thành công ấy, hè 2021 tiếp tục cho ra mắt BST <a href=\"https://loza.vn/tags/ao-phong-coc-tay\"><strong>áo phông ngắn tay</strong></a> mới với những thiết kế vô cùng trẻ trung và hiện đại giúp tôn lên nét đẹp năng động và khỏe khoắn của những cô gái thế hệ mới. Cùng theo dõi bài viết dưới đây để xem hè năm nay LOZA sẽ mang tới những chiếc áo phông như thế nào nhé!<br>&nbsp;</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25022021/1614216812_ao-phong-ngan-tay-01.jpg\" alt=\"Áo phông ngắn tay màu đen\"></figure><p>Áo phông ngắn tay màu đen</p><p>Không thể vắng mặt trong tủ đồ của các tín đồ thời trang chính là một chiếc&nbsp;</p><p><strong>áo phông ngắn tay</strong></p><p>&nbsp;mang gam màu đen cá tính. Chiếc áo này có hình in màu trắng vô cùng dễ thương, nổi bật trên nền áo đen. Với item này, các nàng chỉ cần kết hợp với quần short và layer thêm một chiếc dây lưng nhỏ xinh là đã có được một set đồ ưng ý. Diện đi học, đi chơi hay đi hẹn hò là chuẩn xinh</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25022021/1614216835_ao-phong-ngan-tay-02.jpg\" alt=\"Áo phông ngắn tay in hình sắc màu\"></figure><p>Áo phông ngắn tay in hình sắc màu</p><p>Đơn giản, dễ mặc, chiếc&nbsp;</p><p><strong>áo phông ngắn tay&nbsp;</strong></p><p>này ghi điểm bởi nét thanh lịch nhưng không kém phần phóng khoáng. Áo được làm từ chất liệu thun cotton với khả năng thấm hút mồ hôi tốt nên các nàng có thể hoàn toàn tự tin diện chiếc áo này trong những ngày hè nắng nóng. Tùy theo sở thích và hoàn cảnh mà các nàng có thể thả buông hoặc sơ vin áo phông theo ý thích</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25022021/1614216848_ao-phong-ngan-tay-03.jpg\" alt=\"Áo phông ngắn tay thêu hình\"></figure><p>Áo phông ngắn tay thêu hình</p><p>Những cô nàng yêu thời trang sẽ tinh ý nhận ra sự xuất hiện dày đặc của gam màu xanh lá trên khắp các diễn đàn thời trang trong thời gian gần đây. Không chỉ hợp xu hướng thời trang mà gam màu xanh này còn mang đến cảm giác rất mát mẻ cho người nhìn, đặc biệt là trong những ngày thời tiết nắng nóng. Bổ sung ngay chiếc áo hot trend này vào tủ đồ thôi nào!</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25022021/1614216863_ao-phong-ngan-tay-05.jpg\" alt=\"Áo phông ngắn tay in hình chậu cây\"></figure><p>Áo phông ngắn tay in hình chậu cây</p><p>BST&nbsp;</p><p><strong>áo phông ngắn tay</strong></p><p>&nbsp;mới nhất của LOZA đều sở hữu những thiết kế vô cùng xinh xắn giúp tôn lên nét đẹp đầy ngọt ngào và tươi trẻ của phái đẹp. Nếu yêu thích style khỏe khoắn thì các nàng có thể mix cùng quần short còn những cô gái chuộng style kẹo ngọt thì đừng ngần ngại mix cùng chân váy nhé. Muốn set đồ trông thật nổi bật thì không thể nào thiếu những món phụ kiện đi cùng như túi xách, mũ, giày,... đâu nàng nha</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25022021/1614216874_ao-phong-ngan-tay-06.jpg\" alt=\"Áo phông ngắn tay màu tím\"></figure><p>Áo phông ngắn tay màu tím</p><p>Chẳng thể nào hạ nhiệt, gam màu tím của chiếc&nbsp;</p><p><strong>áo phông ngắn tay</strong></p><p>&nbsp;này vẫn đem lại sức hút không tưởng cho các cô gái từ năm này qua năm khác. Chiếc áo này ghi điểm ở phần hình in khá bắt mắt và nổi bật. Áo có form dáng rộng vừa phải nên không hề gây ra cảm giác gò bó hay bí bức mỗi khi diện item này lên người. Với set đồ này thì mix cùng một đôi sneaker sẽ là chuẩn xinh</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25022021/1614216883_ao-phong-ngan-tay-08.jpg\" alt=\"Áo phông ngắn tay hình con ngựa\"></figure><p>Áo phông ngắn tay hình con ngựa</p><p>Dù là màu sắc và kiểu dáng như nào thì áo phông vẫn làm tốt nhiệm vụ \"hack tuổi\" của mình. Chỉ cần diện mẫu&nbsp;</p><p><strong>áo phông ngắn tay</strong></p><p>&nbsp;này lên người là bất cứ cô gái nào trông cũng trẻ ra cả vài tuổi. Đặt biệt khi diện cùng quần short màu trắng như bạn mẫu nhà LOZA đang mặc đó nha. Áo có đặc tính thấm hút mồ hôi tốt nên ngoài diện đi làm, đi học thì các nàng cũng có thể diện khi tham gia các hoạt động thể thao thường ngày</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25022021/1614216892_ao-phong-ngan-tay-09.jpg\" alt=\"Áo phông ngắn tay trendy\"></figure><p>Áo phông ngắn tay trendy</p><p>Nếu như vào thời điểm đông lạnh, các cô gái thường ưu tiên lựa chọn những gam màu trung tính như nâu, be thì sang đến hè thì những màu sắc nổi bật lại còn tần suất xuất hiện dày đặc trong tủ đồ hơn. Chiếc&nbsp;</p><p><strong>áo phông ngắn tay</strong></p><p>&nbsp;này không mang thiết kế quá cầu kỳ nhưng cũng đủ để nàng ghi điểm trong mắt người đối diện. Nếu đang lên plan cho chuyến du lịch hè này thì đừng ngần ngại rủ hội bạn thân mua chung áo nhóm để mặc nàng nhé!</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25022021/1614216903_ao-phong-ngan-tay-10.jpg\" alt=\"Áo phông ngắn tay hình con sóc\"></figure><p>Áo phông ngắn tay hình con sóc</p><p>Với những môi trường làm việc không đòi hỏi quá khắt khe trong việc lựa chọn trang phục đi làm thì các nàng hoàn toàn có thể yên tâm diện chiếc&nbsp;</p><p><strong>áo phông ngắn tay</strong></p><p>&nbsp;xinh xắn này nha. Áo được làm từ vải thun cotton mềm mịn với độ co giãn 04 chiều nên các nàng có thể diện liên tục cả ngày mà không hề cảm thấy khó chịu hay gò bó. Mix cùng quần jeans hoặc chân váy để có được set đồ thanh lịch nhất nhé</p>', 18, 1, '2021-03-27 10:09:31', '2021-03-30 00:15:27'),
(4, 1, 2, 'Áo thun cộc tay - Item nhất định phải có trong tủ đồ hè 2021', '1617038371ao-thun-coc-tay-01.jpg', 'Trẻ trung, phóng khoáng nhưng vẫn giữ được nét thanh lịch và tinh tế cần có và như một lẽ đương nhiên, áo thun cộc tay trở thành item nhất định phải có trong tủ đồ mỗi khi hè sang. Cùng tham khảo bài viết dưới đây để tìm cho mình một item \"chân ái\" nàng nhé', '<p>Trẻ trung, phóng khoáng nhưng vẫn giữ được nét thanh lịch và tinh tế cần có và như một lẽ đương nhiên, <a href=\"https://loza.vn/tags/ao-thun-coc-tay\"><strong>áo thun cộc tay</strong></a> trở thành item nhất định phải có trong tủ đồ mỗi khi hè sang. Cùng tham khảo bài viết dưới đây để tìm cho mình một item \"chân ái\" nàng nhé<br>&nbsp;</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25032021/1616658180_ao-phong-ngan-tay-20.jpg\" alt=\"Áo thun trắng in hình độc đáo\"></figure><p>Áo thun trắng in hình độc đáo</p><p>Áo thun trắng là item cơ bản nhất mà bất cứ tín đồ thời trang nào cũng phải sắm đến vài chiếc để diện mỗi khi hè sang. Dù có thiết kế khá đơn giản nhưng item này vẫn đủ sức để đem lại cho người mặc vẻ ngoài ấn tượng, thu hút. Vào những ngày lười mix đồ thì&nbsp;</p><p><strong>áo thun cộc tay</strong></p><p>&nbsp;màu trắng sẽ là item lý tưởng dành cho bạn đó nha</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25032021/1616658202_ao-phong-ngan-tay-06.jpg\" alt=\"Áo thun tím trẻ trung\"></figure><p>Áo thun tím trẻ trung</p><p>Nếu năm ngoái chưa kịp sắm cho mình một chiếc áo thun màu tím hot trend thì năm nay hãy tranh thủ bổ sung ngay một chiếc vào tủ đồ bởi gam màu này chẳng có dấu hiệu hạ nhiệt mà ngược lại ngày càng được giới trẻ ưa chuộng hơn. Chỉ cần lên đồ với một chiếc quần short trắng là bạn đã có ngay một outfit cá tính, năng động</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25032021/1616658214_ao-phong-ngan-tay-11.jpg\" alt=\"Áo thun vàng rực rỡ\"></figure><p>Áo thun vàng rực rỡ</p><p>Công thức diện&nbsp;</p><p><strong>áo thun cộc tay</strong></p><p>&nbsp;với quần short trắng tuy không quá mới lạ nhưng chỉ cần layer thêm thắt lưng bản nhỏ là set đồ của bạn trông đã bắt mắt hơn khá nhiều. Nếu có ý định diện áo thun đến công sở thì bạn chỉ cần thay đổi chút outfit với quần vải ống suông hoặc quần jeans ống loe là đẹp chuẩn thanh lịch</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25032021/1616658225_ao-phong-ngan-tay-03.jpg\" alt=\"Áo thun xanh mát mẻ\"></figure><p>Áo thun xanh mát mẻ</p><p>Những cô nàng không có thói quen sơ vin khi diện&nbsp;</p><p><strong>áo thun cộc tay&nbsp;</strong></p><p>thì hoàn toàn có thể thả buông áo nha, không hề luộm thuộm chút nào mà ngược lại còn mang đến cho người mặc vẻ ngoài vô cùng phóng khoáng và thời thượng. Mùa hè rồi, thoải mái diện cùng dép mules hay sandal cói...&nbsp;</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25032021/1616658236_ao-phong-ngan-tay-08.jpg\" alt=\"Áo thun đen cá tính\"></figure><p>Áo thun đen cá tính</p><p>Giống như mọi item khác</p><p><strong>&nbsp;áo thun cộc tay&nbsp;</strong></p><p>cũng có vô vàn kiểu dáng và màu sắc khác nhau nhưng áo thun đen vẫn luôn giữ một \"vị trí cố định\" trong tủ đồ của các cô gái bởi chẳng cần mix&amp;match cầu kì, chỉ cần diện lên là xinh hết nấc. Mặc đi làm, đi học hay hẹn hò cũng đều được nha</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25032021/1616658246_ao-phong-ngan-tay-12.jpg\" alt=\"Áo thun đỏ tôn da\"></figure><p>Áo thun đỏ tôn da</p><p>Những ngày nắng nóng sắp tới sẽ chẳng còn là cơn ác mộng đáng sợ nữa nếu bạn sở hữu một áo&nbsp;</p><p><strong>áo thun cộc tay</strong></p><p>&nbsp;dáng slimfit với chất liệu thun cotton thoáng mát, co giãn và thấm hút mồ hôi tốt. Với kiểu áo này bạn cũng có thể thay đổi style rất linh hoạt tuỳ theo hoàn cảnh</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25032021/1616658259_ao-phong-ngan-tay-19.jpg\" alt=\"Áo thun xanh dương năng động\"></figure><p>Áo thun xanh dương năng động</p><p>Chẳng bao giờ phải lo về khoản lỗi mốt nên các nàng cứ thoải mái sắm đủ kiểu&nbsp;</p><p><strong>áo thun cộc tay</strong></p><p>&nbsp;với những màu sắc và thiết kế khác nhau để diện cả hè nhé. Nếu muốn vẻ ngoài thêm phần cool ngầu thì các nàng có thể mặc cùng quần jogger túi hộp hay quần jeans rách...</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/25032021/1616658279_ao-phong-ngan-tay-10.jpg\" alt=\"Áo thun trắng cơ bản\"></figure><p>Áo thun trắng cơ bản</p><p>Các nàng cũng không thể bỏ qua chiếc&nbsp;</p><p><strong>áo thun cộc tay</strong></p><p>&nbsp;xinh xẻo này đâu nhé. Nàng nào mê phong cách hiền hòa, trang nhã thì mặc cùng chân váy là chuẩn nhất. Còn muốn thêm nét năng động, phong cách cho bộ đồ của mình thì chẳng có gì hợp hơn quần short&nbsp;</p>', 25, 1, '2021-03-27 10:10:35', '2021-03-30 00:19:31'),
(5, 1, 2, 'Gợi ý mặc đẹp với đầm cổ tròn tay cộc hot hit hè 2021', '1617038275dam-co-tron-tay-coc-15.jpg', 'Hè đến, thời tiết nóng bức, \"thở\" thôi cũng thấy mệt rồi nữa là việc phải chọn đồ mỗi ngày ra đường. Nếu không biết phải mặc gì thì cứ chọn một outfit đơn giản với váy đầm là bạn đã có được vô vàn outfit lung linh và ấn tượng rồi. Tham khảo bài viết để có thêm nhiều ý tưởng mặc đẹp ngày hè với đầm cổ tròn tay cộc nhé', '<p>Hè đến, thời tiết nóng bức, \"thở\" thôi cũng thấy mệt rồi nữa là việc phải chọn đồ mỗi ngày ra đường. Nếu không biết phải mặc gì thì cứ chọn một outfit đơn giản với váy đầm là bạn đã có được vô vàn outfit lung linh và ấn tượng rồi. Tham khảo bài viết để có thêm nhiều ý tưởng mặc đẹp ngày hè với <a href=\"https://loza.vn/tags/dam-co-tron\"><strong>đầm cổ tròn tay cộc</strong></a> nhé<br>&nbsp;</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/23032021/1616465819_dam-xoe-tron-mau-2.jpg\" alt=\"Đầm xòe tay bồng\"></figure><p>Đầm xòe tay bồng</p><p>Một chiếc&nbsp;</p><p><strong>đầm cổ tròn tay cộc</strong></p><p>&nbsp;mang gam màu xanh pastel là item lý tưởng cho những nàng thích style đơn giản, tinh tế, đặc biệt phù hợp để diện vào những ngày hè nắng nóng sắp tới. Chỉ cần mix thêm một vài món phụ kiện như hoa tai, túi xách, sandals... là đẹp chuẩn nàng thơ</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/23032021/1616465859_dam-suong-tron-mau-1.jpg\" alt=\"Đầm dáng suông phối nơ\"></figure><p>Đầm dáng suông phối nơ</p><p>Sắm đồ để diện hè thì không thể bỏ qua gam màu hồng kẹo ngọt, đáng yêu nha. Thiết kế dáng suông của chiếc&nbsp;</p><p><strong>đầm cổ tròn tay cộc</strong></p><p>&nbsp;này giúp những nàng có thân hình mũm mĩm giấu nhẹm được nhược điểm một cách khéo léo. Diện đi làm hay đi chơi cũng đều nổi bật</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/23032021/1616465909_dam-do-tay-coc-1.jpg\" alt=\"Đầm đỏ xếp eo\"></figure><p>Đầm đỏ xếp eo</p><p>Chọn một chiếc&nbsp;</p><p><strong>đầm cổ tròn tay cộc</strong></p><p>&nbsp;mang tone màu đỏ nịnh mắt với điểm nhấn chính quanh phần eo để đi dự tiệc, đảm bảo cô gái nào cũng sẽ trở thành tâm điểm của buổi party đó nha. Đâu chỉ diện được đi chơi, hội chị em công sở thì có thể nhắm ngay item này diện đi làm bởi nó sẽ giúp nàng đạt 10 điểm outfit thanh lịch luôn nha</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/23032021/1616465879_dam-xoe-tron-mau-6.jpg\" alt=\"Đầm xòe xếp ly\"></figure><p>Đầm xòe xếp ly</p><p>Nếu muốn làm mới vẻ ngoài của mình thì các nàng đừng ngại chọn những items có gam màu sáng như gam màu cam hot trend này nhé. Phom dáng xòe rộng rãi, thoải mái của chiếc&nbsp;</p><p><strong>đầm cổ tròn tay cộc</strong></p><p>&nbsp;này mang đến cho các tín đồ thời trang vẻ ngoài thanh thoát, yêu kiều. Tự tin sải bước với một đôi giày cao gót là nàng đã có được một outfit thu hút không tưởng</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/23032021/1616465927_dam-xoe-tron-mau-1.jpg\" alt=\"Đầm xòe phối voan\"></figure><p>Đầm xòe phối voan</p><p>Tưởng chừng những chiếc đầm có gam màu tối sẽ khiến ngoại hình của các nàng như \"dừ\" đi vài phần nhưng thực tế item màu tông màu tím than này đã chứng minh rằng nó không chỉ tôn lên vẻ đẹp sang xịn của người mặc mà cón giúp nàng có thể ăn gian được tuổi tác một cách dễ dàng. Nhấn nhá thêm một chút phụ kiện để vẻ ngoài càng thêm lung linh nhé</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/23032021/1616466037_dam-xoe-co-tron-1.jpg\" alt=\"Đầm đỏ đính hoa\"></figure><p>Đầm đỏ đính hoa</p><p>Không lấy làm lạ khi đầm đỏ mặt trong danh sách những items kinh điển, có thể diện từ năm này qua năm khác mà chẳng hề lỗi mốt. Gam màu đỏ ấn tượng kết hợp với form dáng xòe bay bổng tạo hiệu ứng cho vóc dáng thêm phần mi nhon, hoàn toàn chinh phục được những cô nàng mũm mĩm</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/23032021/1616466147_dam-xoe-co-tron-3.jpg\" alt=\"Đầm body màu vàng bò\"></figure><p>Đầm body màu vàng bò</p><p>Nhắc đến item tôn dáng \"thần thánh\" thì không thể không nhắc đến đầm body, chẳng thế mà những cô nàng có vóc dáng gợi cảm và quyến rũ phải có ít nhất vài ba item này trong tủ đồ. Chiếc&nbsp;</p><p><strong>đầm cổ tròn tay cộc&nbsp;</strong></p><p>này không chỉ có thiết kế nổi bật mà gam màu vàng bò cũng vô cùng tôn da</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/23032021/1616466082_dam-xoe-co-tron-2.jpg\" alt=\"Đầm xòe phối họa tiết kẻ\"></figure><p>Đầm xòe phối họa tiết kẻ</p><p>Vào những ngày hè oi bức, không có gì thoải mái hơn khi được diện một chiếc&nbsp;</p><p><strong>đầm cổ tròn tay cộc</strong></p><p>&nbsp;mang chất liệu vải thoáng mát, dễ chịu với khả năng thấm hút mồ hôi tốt. Nếu \"lười\" diện những đôi giày kín chân thì bạn cũng có thể chọn sandals để vừa tôn chân dài lại vừa thoải mái nha</p>', 3, 1, '2021-03-27 10:12:11', '2021-03-30 00:17:55'),
(6, 1, 2, 'Tham khảo 03 tips mix đồ đẹp với quần tây cho nàng công sở hè 2021', '1617038323quan-au-1.jpg', 'Chọn quần tây thì dễ nhưng lên đồ với quần tây sao cho đẹp thì không phải ai cũng biết. Cùng tham khảo 03 gợi ý mặc đẹp với quần tây mà LOZA chia sẻ dưới đây để có thêm thật nhiều ý tưởng lên đồ mỗi ngày nhé!', '<p>Chọn quần tây thì dễ nhưng lên đồ với quần tây sao cho đẹp thì không phải ai cũng biết. Cùng tham khảo 03 gợi ý mặc đẹp với <a href=\"https://loza.vn/tags/quan-tay\"><strong>quần tây</strong></a> mà LOZA chia sẻ dưới đây để có thêm thật nhiều ý tưởng lên đồ mỗi ngày nhé!<br><br><strong>1. Mix quần tây với áo sơ mi cổ đức</strong><br>&nbsp;</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616382007_so-mi-hoa-tiet-3.jpg\" alt=\"Quần tây dáng côn đứng\"></figure><p>Quần tây dáng côn đứng</p><p>Nếu muốn style thời trang công sở không còn bị gắn mác một màu và đứng tuổi thì các nàng hãy tự tin diện set đồ này ngay nhé. Bộ đôi&nbsp;</p><p><strong>quần tây</strong></p><p>&nbsp;và sơ mi họa tiết cổ đức mang đến cho người mặc vẻ ngoài cá tính nhưng vẫn giữ được nét sang chảnh, thu hút cần có. Đừng quên mix cùng một đôi giày cao gót để đôi chân thêm phần thon dài nhé</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616382022_so-mi-5.jpg\" alt=\"Quần tây màu xanh pastel\"></figure><p>Quần tây màu xanh pastel</p><p>Sự kết hợp giữa hai gam màu đen và xanh dương tưởng chừng như không ăn nhập nhưng thực tế lại đem đến cho người mặc vẻ ngoài vô cùng ấn tượng. Chỉ cần sơ vin gọn gàng và kết hợp cùng một chiếc belts cùng màu là nàng đã có ngay một outfit ưng mắt</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616382036_so-mi-11.jpg\" alt=\"Quần tây màu đen trơn\"></figure><p>Quần tây màu đen trơn</p><p>Nhắc đến item không thể không có trong tủ đồ của các cô gái văn phòng thì không thể không nhắc đến&nbsp;</p><p><strong>quần tây</strong></p><p>&nbsp;màu đen. Chiếc quần này có thể kết hợp được với mọi loại trang phục kể cả những items khó mix đồ nhất như sơ mi da báo</p><p><strong>2. Mix quần tây với áo sơ mi cổ nơ</strong></p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616382050_so-mi-10.jpg\" alt=\"Quần tây màu cafe độc lạ\"></figure><p>Quần tây màu cafe độc lạ</p><p>Một gợi ý mix đồ đẹp khác với&nbsp;</p><p><strong>quần tây</strong></p><p>&nbsp;mà bạn có thể áp dụng ngay đó là mix với sơ mi cổ nơ. Tone màu cafe nhã nhặn của chiếc quần này mang lại cho người mặc vẻ ngoài vô cùng trẻ trung và rạng rỡ. Dù diện chiếc quần này đi làm hay đi chơi thì các nàng cũng có thể dễ dàng thu hút được ánh nhìn của mọi người xung quanh</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616382067_so-mi-ke.jpg\" alt=\"Quần tây cạp cách điệu\"></figure><p>Quần tây cạp cách điệu</p><p>Những cô nàng theo đuổi phong cách sang chảnh thì nên học theo cách mix&amp;match này nha. Hai gam màu đen, trắng tuy quen thuộc nhưng lại luôn tạo được dấu ấn riêng cho mỗi set đồ. Vì chiếc quần này có phần cạp cách điệu nên các nàng đừng quên sơ vin để khoe khéo được phần cạp nha</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616382108_quan-au-mau-ghi-1.jpg\" alt=\"Quần tây màu ghi nhã nhặn\"></figure><p>Quần tây màu ghi nhã nhặn</p><p>Bên cạnh những mẫu sơ mi họa tiết cá tính thì những mẫu sơ mi trơn màu cũng được phái đẹp yêu thích không kém. Chẳng cần tốn thời gian chọn lựa trang phục để mặc cùng, chỉ cần một chiếc quần tây trơn màu như này là nàng đã có được một bộ đồ đẹp chuẩn phong cách rồi nha</p><p><strong>3. Mix quần tây với áo sơ mi trắng</strong></p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616382120_so-mi-3.jpg\" alt=\"Quần tây màu rêu tôn da\"></figure><p>Quần tây màu rêu tôn da</p><p>Nếu muốn diện những chiếc&nbsp;</p><p><strong>quần tây</strong></p><p>&nbsp;có tone màu độc lạ mà không biết cách phối màu sao cho ton-sur-ton thì lựa chọn sơ mi trắng sẽ là chuẩn nhất. Item này có thể kết hợp được với mọi gam màu từ nóng đến lạnh. Ngoài giày cao gót thì các nàng cũng có thể diện cùng sandals quai mảnh để thêm phần tôn chiều cao nhé</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616382133_so-mi-8.jpg\" alt=\"Quần tây basic\"></figure><p>Quần tây basic</p><p>Những thiết kế&nbsp;</p><p><strong>quần tây</strong></p><p>&nbsp;ống côn đứng luôn được biết đến với khả năng che khuyết điểm \"thần thánh\" nên vì thế mà trong tủ đồ của bất cứ cô nàng nào cũng phải có đến vài ba chiếc quần mang form dáng này. Ngoài gam màu đen truyền thống thì những chiếc quần mang gam màu ghi thanh lịch cũng rất được săn đón</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/22032021/1616383004_so-mi-2.jpg\" alt=\"Quần tây ống đứng\"></figure><p>Quần tây ống đứng</p><p>Để có một bộ cánh ưng ý mà chẳng cần tốn thời gian mix &amp; match cầu kì mỗi sáng thì sơ mi trắng &amp;&nbsp;</p><p><strong>quần tây</strong></p><p>&nbsp;đen sẽ là sự lựa chọn tối ưu cho các nàng công sở. Chỉ cần layer thêm chút phụ kiện như hoa tai, khăn lụa, kẹp tóc... là bạn đã được cộng điểm ấn tượng rồi đó nha</p>', 3, 1, '2021-03-27 10:16:24', '2021-03-30 00:18:43'),
(7, 1, 2, 'Tổng hợp những mẫu áo phông cổ tròn hot hit hè 2021', '1617038251ao-phong-co-tron-111.jpg', 'Chẳng có gì quá khó hiểu khi áo phông trở thành món đồ thời trang không thể thiếu trong tủ đồ của bất cứ cô gái thế hệ mới nào. Không chỉ dễ mặc mà item này còn phù hợp với nhiều phong cách khác nhau từ cô nàng bánh bèo cho đến cô nàng cá tính. Cùng xem hết bài viết để cập nhật những mẫu áo phông cổ tròn hot nhất mùa hè năm nay nhé', '<p>Chẳng có gì quá khó hiểu khi áo phông trở thành món đồ thời trang không thể thiếu trong tủ đồ của bất cứ cô gái thế hệ mới nào. Không chỉ dễ mặc mà item này còn phù hợp với nhiều phong cách khác nhau từ cô nàng bánh bèo cho đến cô nàng cá tính. Cùng xem hết bài viết để cập nhật những mẫu <strong>áo phông cổ tròn</strong> hot nhất mùa hè năm nay nhé<br>&nbsp;</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/15032021/1615791383_ao-phong-ngan-tay-20.jpg\" alt=\"Áo phông trắng in hình\"></figure><p>Áo phông trắng in hình</p><p>Nhắc đến item có thể diện xuyên mùa nóng thì không thể nào không nhắc đến&nbsp;</p><p><strong>áo phông cổ tròn</strong></p><p>. Được làm từ chất liệu thun cotton thoáng mát, với bề mặt vải mềm mịn cùng khả năng thấm hút mồ hôi tốt, chiếc áo này sẽ cùng bạn \"chinh chiến\" qua những ngày nóng gay gắt của mùa hè. Diện cùng chân váy kẻ thì xinh khỏi bàn</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/15032021/1615791396_ao-phong-ngan-tay-06.jpg\" alt=\"Áo phông màu tím hot hit\"></figure><p>Áo phông màu tím hot hit</p><p>Nếu muốn có vẻ ngoài thanh lịch mà vẫn hack tuổi thì các nàng hãy kết thân với&nbsp;</p><p><strong>áo phông cổ tròn</strong></p><p>&nbsp;ngay từ hôm nay nhé. Dù gây sốt suốt cả mùa hè năm ngoái nhưng đến năm nay thì độ hot của gam màu tím vẫn chẳng hề hạ nhiệt. Đảm bảo khi diện item này lên người, bạn sẽ thu hút được ánh nhìn của mọi người xung quanh</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/15032021/1615791410_ao-phong-ngan-tay-03.jpg\" alt=\"Áo phông màu xanh tươi mát\"></figure><p>Áo phông màu xanh tươi mát</p><p>BST&nbsp;</p><p><strong>áo phông cổ tròn</strong></p><p>&nbsp;của LOZA không chỉ đa dạng về mẫu mã mà màu sắc cũng vô cùng phong phú với đủ tone màu từ nóng đến lạnh để các nàng có thể thỏa thích lựa chọn. Dù lười mix đồ đến đâu thì chỉ cần lên đồ đơn giản với một chiếc quần short trắng là bạn cũng đã có một set đồ năng động, cá tính</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/15032021/1615791422_ao-phong-ngan-tay-01.jpg\" alt=\"Áo phông màu đen cá tính\"></figure><p>Áo phông màu đen cá tính</p><p>Sức hút mà gam màu đen mang lại cho phái đẹp là điều không thể bàn cãi bởi thế mà trong tủ đồ của bất cứ cô gái nào cũng đều có sự xuất hiện của một chiếc áo phông mang tone màu cơ bản này. Chính những hình in độc đáo trên áo đã góp phần tạo nên điểm nhấn đắt giá cho set đồ, đồng thời còn giúp người mặc thể hiện được nét cá tính riêng biệt của chính mình</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/15032021/1615791441_ao-phong-ngan-tay-16.jpg\" alt=\"Áo phông màu vàng năng động\"></figure><p>Áo phông màu vàng năng động</p><p>Bên cạnh những items như quần short, chân váy chữ A mà LOZA gợi ý thì các nàng cũng có thể layer chiếc&nbsp;</p><p><strong>áo phông cổ tròn</strong></p><p>&nbsp;này với chân váy midi, chân váy xòe hay quần jeans... Mỗi sự kết hợp khác nhau đều đem đến cho người mặc vẻ ngoài ấn tượng khác nhau. Nếu đang lên plan cho chuyến du lịch sắp tới của mình thì đừng bỏ qua item xinh xắn này nhé</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/15032021/1615791462_ao-phong-ngan-tay-19.jpg\" alt=\"Áo phông màu xanh trẻ trung\"></figure><p>Áo phông màu xanh trẻ trung</p><p>Không phân chia rõ độ tuổi như các item khác, phải nói rằng áo phông là item dễ mặc nhất, hợp từ những cô nàng tuổi teen cho tới các cô nàng công sở thế hệ 8x,9x... Với những môi trường công sở không quá yêu cầu khắt khe trong việc chọn lựa trang phục tới chỗ làm thì áo phông sẽ là sự ưu tiên hàng đầu trong những ngày hè oi bức</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/15032021/1615791496_ao-phong-ngan-tay-09.jpg\" alt=\"Áo phông màu tím nhã nhặn\"></figure><p>Áo phông màu tím nhã nhặn</p><p>Nếu muốn diện áo phông đến chỗ làm thì các nàng hãy ưu tiên lựa chọn những items có màu sắc nhã nhặn nha. Chỉ cần lên đồ đơn giản với chân váy midi là các nàng đã có một outfit thanh lịch, trẻ trung. Ngoài sneaker thì các nàng cũng có thể kết hợp với một đôi sandals nhé</p><figure class=\"image\"><img src=\"https://loza.vn/uploads/media/15032021/1615791472_ao-phong-ngan-tay-12.jpg\" alt=\"Áo phông màu đỏ nổi bật\"></figure><p>Áo phông màu đỏ nổi bật</p><p>Combo&nbsp;</p><p><strong>áo phông cổ tròn</strong></p><p>&nbsp;+ quần short trắng vừa trẻ trung lại năng động, chỉ cần mix thêm 1 đôi sneaker nữa là bạn đã có ngay bộ đồ mặc đi chơi cuối tuần rồi. Nếu thích vẻ ngoài trông phá cách hơn thì hãy thử khoác thêm một chiếc áo sơ mi bên ngoài, đảm bảo bạn sẽ phải bất ngờ với sự thay đổi nho nhỏ này đó nha</p>', 50, 1, '2021-03-27 10:20:01', '2021-03-30 00:17:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `name_brand` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên nhãn hiệu',
  `avatar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` double NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'trạng thái',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `name_brand`, `avatar`, `views`, `status`, `created_at`) VALUES
(2, 'Chanel', '1617037558unnamed.png', 0, 1, '2021-03-26 23:29:35'),
(3, 'Prada', '1617037994prada.jpg', 0, 1, '2021-03-26 23:29:46'),
(4, 'Adidas', '1617037842adidas-3-la.jpg', 0, 1, '2021-03-26 23:29:59'),
(5, 'Biluxury', '1617037938logo--1-.png', 0, 1, '2021-03-27 10:06:22'),
(6, 'Coach', '1617038022db28c99444af60cdda23ab34d42c2b6e.jpg', 0, 1, '2021-03-27 10:06:38'),
(7, 'Louis Vuitton', '1617014894louis-vuitton.jpg', 0, 1, '2021-03-29 17:48:14'),
(8, 'Zara', '1617014922zara.jpg', 0, 1, '2021-03-29 17:48:42'),
(9, 'Hennes & Mauritz', '1617014967HM.png', 0, 1, '2021-03-29 17:49:27'),
(10, 'Hermès', '1617014983hermes.png', 0, 1, '2021-03-29 17:49:43'),
(11, 'Gucci', '1617015007gucci.jpg', 0, 1, '2021-03-29 17:50:07'),
(13, 'Burberry', '1617015049burberry.jpg', 0, 1, '2021-03-29 17:50:49'),
(15, 'Armani', '1617015098armani.jpg', 0, 1, '2021-03-29 17:51:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_blogs`
--

CREATE TABLE `tbl_category_blogs` (
  `id` int(11) NOT NULL,
  `name_cate` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên danh mục',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_blogs`
--

INSERT INTO `tbl_category_blogs` (`id`, `name_cate`, `status`, `created_at`) VALUES
(1, 'Thời trang Nam', 1, '2021-03-27 10:05:19'),
(2, 'Thời trang Nữ', 1, '2021-03-27 10:05:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_products`
--

CREATE TABLE `tbl_category_products` (
  `id` int(11) NOT NULL,
  `gender_product` tinyint(2) NOT NULL DEFAULT 0,
  `items` tinyint(2) NOT NULL,
  `name_cate` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên danh mục',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_products`
--

INSERT INTO `tbl_category_products` (`id`, `gender_product`, `items`, `name_cate`, `status`, `created_at`) VALUES
(1, 1, 2, 'Đầm nữ', 1, '2021-03-26 23:30:41'),
(2, 1, 5, 'Giày nữ', 1, '2021-03-26 23:31:41'),
(3, 1, 6, 'Đồng hồ nữ', 1, '2021-03-26 23:32:49'),
(4, 1, 6, 'Thắt lưng nữ', 1, '2021-03-26 23:33:15'),
(5, 1, 6, 'Ví nữ', 1, '2021-03-26 23:33:29'),
(6, 2, 1, 'Vest nam', 1, '2021-03-27 10:03:22'),
(7, 2, 1, 'Sơ Mi Công Sở', 1, '2021-03-27 10:03:41'),
(8, 2, 3, 'Quần Âu', 1, '2021-03-27 10:03:57'),
(9, 2, 6, 'Cà vạt', 1, '2021-03-27 10:04:14'),
(10, 2, 6, 'Thắt lưng nam', 1, '2021-03-27 10:05:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_change_code`
--

CREATE TABLE `tbl_change_code` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_code` tinyint(2) NOT NULL DEFAULT 0 COMMENT ' 1: freeship, 2: giảm tiền',
  `money_xu` double NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_change_code`
--

INSERT INTO `tbl_change_code` (`id`, `cate_id`, `title`, `type_code`, `money_xu`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 'Freeship', 1, 35000, 1, '2021-03-27 11:06:31', '2021-03-27 11:06:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `product_sets_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comments_detail`
--

CREATE TABLE `tbl_comments_detail` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `sub_images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nội dung liên hệ',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_decentralization`
--

CREATE TABLE `tbl_decentralization` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decentralization` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_decentralization`
--

INSERT INTO `tbl_decentralization` (`id`, `title`, `decentralization`, `status`, `created_at`, `updated_at`) VALUES
(1, 'category', ' <li class=\"has-submenu <?php if (isset($_GET[\'page\']) && $_GET[\'page\'] == \'categoryProduct\' || $_GET[\'page\'] == \'categoryBlogs\' || $_GET[\'page\'] == \'brand\') {echo \'active\';} ?>\">\r\n                    <a href=\"#\"><i class=\"fas fa-list-ul\"></i>Danh mục</a>\r\n                    <ul class=\"submenu\">\r\n                        <li><a href=\"index.php?page=categoryProduct&method=viewCateProduct\">Danh mục sản phẩm</a></li>\r\n                        <li><a href=\"index.php?page=categoryBlogs&method=viewCateBlogs\">Danh mục Blogs</a></li>\r\n                        <li><a href=\"index.php?page=brand&method=listBrand\">Danh sách thương hiệu</a></li>\r\n                    </ul>\r\n                </li>', 1, '2021-03-24 17:12:30', '2021-03-24 17:12:30'),
(2, 'product', '<li class=\"has-submenu <?php if (isset($_GET[\'page\']) && $_GET[\'page\'] == \'product\') {echo \'active\';} ?>\">\r\n                    <a href=\"index.php?page=product\"><i class=\"ion ion-ios-paper\"></i>Sản phẩm</a>\r\n                    <ul class=\"submenu\" style=\"left: 0;\">\r\n                        <li><a href=\"index.php?page=product&method=productSet\">Sản phẩm theo bộ</a></li>\r\n                        <li><a href=\"index.php?page=product&method=productOne\">Sản phẩm đơn</a></li>\r\n                        <li><a href=\"#\">...</a></li>\r\n                    </ul>\r\n                </li>', 1, '2021-03-24 17:12:33', '2021-03-24 17:12:33'),
(3, 'affiliate', ' <li class=\"has-submenu <?php if (isset($_GET[\'page\']) && $_GET[\'page\'] == \'affiliate\') {echo \'active\';} ?>\">\r\n                    <a href=\"index.php?page=affiliate\"><i class=\"fas fa-user-friends\"></i>Affiliate</a>\r\n                    <ul class=\"submenu\" style=\"left: 0;\">\r\n                        <li><a href=\"index.php?page=affiliate&method=viewAffiliate\">Các chương trình Affiliate</a></li>\r\n                        <li><a href=\"index.php?page=affiliate&method=accountAffiliate\">Quản lý tài khoản Affiliate</a></li>\r\n                        <li><a href=\"index.php?page=affiliate&method=roseAffiliate\">Tỉ lệ hoa hồng Affiliate</a></li>\r\n                        <li><a href=\"#\">...</a></li>\r\n                    </ul>\r\n                </li>', 1, '2021-03-24 17:13:34', '2021-03-24 17:13:34'),
(4, 'blog', '   <li class=\"has-submenu <?php if (isset($_GET[\'page\']) && $_GET[\'page\'] == \'blog\') {echo \'active\';} ?>\">\r\n                    <a href=\"index.php?page=blog\"><i class=\"fas fa-book-reader\"></i>Blog</a>\r\n                    <ul class=\"submenu\" style=\"left: 0;\">\r\n                        <li><a href=\"index.php?page=blog&method=viewsBlog\">Quản lý các bài viết</a></li>\r\n                        <li><a href=\"https://developers.facebook.com/tools/comments/1096164877550920/approved/descending/\" target=\"_blank\">Quản lý comment bài viết</a></li>\r\n                        <li><a href=\"#\">...</a></li>\r\n                    </ul>\r\n                </li>', 1, '2021-03-24 17:13:35', '2021-03-24 17:13:35'),
(5, 'manage_orders', '<li class=\"has-submenu <?php if (isset($_GET[\'page\']) && $_GET[\'page\'] == \'manage_orders\') {echo \'active\';} ?>\">\r\n                    <a href=\"index.php?page=manage_orders\"><i class=\"fas fa-shopping-cart\"></i>Quản lý các đơn hàng</a>\r\n                    <ul class=\"submenu\" style=\"left: 0;\">\r\n                        <li><a href=\"index.php?page=manage_orders&method=viewsManageOrders&status=1\">Đơn hàng chờ xử lý</a></li>\r\n                        <li><a href=\"index.php?page=manage_orders&method=viewsManageOrders&status=2\">Đơn hàng đã hủy</a></li>\r\n                        <li><a href=\"index.php?page=manage_orders&method=viewsManageOrders&status=3\">Đơn hàng đã xác nhận</a></li>\r\n                        <li><a href=\"index.php?page=manage_orders&method=viewsManageOrders&status=4\">Đơn hàng chưa giao hàng</a></li>\r\n                        <li><a href=\"index.php?page=manage_orders&method=viewsManageOrders&status=5\">Đơn hàng đang giao hàng</a></li>\r\n                        <li><a href=\"index.php?page=manage_orders&method=viewsManageOrders&status=6\">Đơn hàng đã giao hàng</a></li>\r\n                        <li><a href=\"index.php?page=manage_orders&method=viewsManageOrders&status=7\">Đơn hàng đã hoàn tất</a></li>\r\n                    </ul>\r\n                </li>', 1, '2021-03-24 17:15:50', '2021-03-24 17:15:50'),
(6, 'manage_comment', ' <li class=\"has-submenu <?php if (isset($_GET[\'page\']) && $_GET[\'page\'] == \'manage_comment\') {echo \'active\';} ?>\">\r\n                    <a href=\"index.php?page=manage_comment\"><i class=\" fas fa-comments\"></i>Quản lý comment sản phẩm</a>\r\n                </li>', 1, '2021-03-24 17:16:10', '2021-03-24 17:16:10'),
(7, 'manage_userAdmin', '<li class=\'has-submenu <?php if(isset($_GET[\"page\"]) && $_GET[\"page\"] == \"manage_userAdmin\") {echo \"active\";} ?>\'>\r\n                    <a href=\"index.php?page=manage_userAdmin\"><i class=\"fas fa-user-cog\"></i>Quản lý User Admin</a>\r\n                    <ul class=\"submenu\" style=\"left: 0;\">\r\n                        <li><a href=\"index.php?page=manage_userAdmin&method=approvalUser\">User chờ phê duyệt</a></li>\r\n                        <li><a href=\"index.php?page=manage_userAdmin&method=authorizationUser\">Phân quyền các User</a></li>\r\n                    </ul>\r\n                </li>', 1, '2021-03-24 17:16:12', '2021-03-24 17:16:12'),
(8, 'manage_code', ' <li class=\"has-submenu <?php if (isset($_GET[\'page\']) && $_GET[\'page\'] == \'manage_code\') {echo \'active\';} ?>\">\r\n                    <a href=\"index.php?page=manage_code\"><i class=\"fas fa-chess-board\"></i>Quản lý mã code</a>\r\n                    <ul class=\"submenu\">\r\n                        <li><a href=\"index.php?page=manage_code&method=viewCode\">Các mã code</a></li>\r\n                    </ul>\r\n                </li>', 1, '2021-03-26 17:26:24', '2021-03-26 17:26:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_decentralization_user`
--

CREATE TABLE `tbl_decentralization_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `decentralization_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_decentralization_user`
--

INSERT INTO `tbl_decentralization_user` (`id`, `user_id`, `decentralization_id`, `status`, `create_at`, `updated_at`) VALUES
(140, 2, 1, 1, '2021-03-27 00:04:23', '2021-03-27 00:04:23'),
(141, 2, 2, 1, '2021-03-27 00:04:23', '2021-03-27 00:04:23'),
(142, 2, 3, 1, '2021-03-27 00:04:23', '2021-03-27 00:04:23'),
(143, 2, 4, 1, '2021-03-27 00:04:23', '2021-03-27 00:04:23'),
(144, 2, 5, 1, '2021-03-27 00:04:23', '2021-03-27 00:04:23'),
(145, 2, 6, 1, '2021-03-27 00:04:23', '2021-03-27 00:04:23'),
(146, 2, 7, 1, '2021-03-27 00:04:23', '2021-03-27 00:04:23'),
(147, 2, 8, 1, '2021-03-27 00:04:23', '2021-03-27 00:04:23'),
(151, 1, 1, 1, '2021-03-30 10:01:37', '2021-03-30 10:01:37'),
(152, 1, 2, 1, '2021-03-30 10:01:37', '2021-03-30 10:01:37'),
(153, 1, 3, 1, '2021-03-30 10:01:37', '2021-03-30 10:01:37'),
(154, 1, 4, 1, '2021-03-30 10:01:37', '2021-03-30 10:01:37'),
(155, 1, 5, 1, '2021-03-30 10:01:37', '2021-03-30 10:01:37'),
(156, 1, 6, 1, '2021-03-30 10:01:37', '2021-03-30 10:01:37'),
(157, 1, 8, 1, '2021-03-30 10:01:37', '2021-03-30 10:01:37'),
(158, 3, 1, 1, '2021-03-30 10:02:13', '2021-03-30 10:02:13'),
(159, 3, 2, 1, '2021-03-30 10:02:13', '2021-03-30 10:02:13'),
(160, 3, 3, 1, '2021-03-30 10:02:13', '2021-03-30 10:02:13'),
(161, 3, 4, 1, '2021-03-30 10:02:13', '2021-03-30 10:02:13'),
(162, 3, 5, 1, '2021-03-30 10:02:13', '2021-03-30 10:02:13'),
(163, 3, 6, 1, '2021-03-30 10:02:13', '2021-03-30 10:02:13'),
(164, 3, 8, 1, '2021-03-30 10:02:13', '2021-03-30 10:02:13'),
(165, 4, 1, 1, '2021-03-30 10:02:22', '2021-03-30 10:02:22'),
(166, 4, 2, 1, '2021-03-30 10:02:22', '2021-03-30 10:02:22'),
(167, 4, 3, 1, '2021-03-30 10:02:22', '2021-03-30 10:02:22'),
(168, 4, 4, 1, '2021-03-30 10:02:22', '2021-03-30 10:02:22'),
(169, 4, 5, 1, '2021-03-30 10:02:22', '2021-03-30 10:02:22'),
(170, 4, 6, 1, '2021-03-30 10:02:22', '2021-03-30 10:02:22'),
(171, 4, 8, 1, '2021-03-30 10:02:22', '2021-03-30 10:02:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_images`
--

CREATE TABLE `tbl_detail_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_images` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ảnh phụ sản phẩm',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_images`
--

INSERT INTO `tbl_detail_images` (`id`, `product_id`, `sub_images`, `status`, `created_at`) VALUES
(1, 12, '1616780759anh1.png', 1, '2021-03-27 00:45:59'),
(2, 12, '1616780759anh2.png', 1, '2021-03-27 00:45:59'),
(3, 12, '1616780759anh3.png', 1, '2021-03-27 00:45:59'),
(4, 11, '1616780816anh5.png', 1, '2021-03-27 00:46:56'),
(5, 11, '1616780816anh6.png', 1, '2021-03-27 00:46:56'),
(6, 11, '1616780816anh7.png', 1, '2021-03-27 00:46:56'),
(7, 16, '1616780863anh3.png', 1, '2021-03-27 00:47:43'),
(8, 16, '1616780863anh4.png', 1, '2021-03-27 00:47:43'),
(9, 16, '1616780863anh5.png', 1, '2021-03-27 00:47:43'),
(30, 14, '1616781130anh1.png', 1, '2021-03-27 00:52:10'),
(31, 14, '1616781130anh2.png', 1, '2021-03-27 00:52:10'),
(32, 14, '1616781130anh3.png', 1, '2021-03-27 00:52:10'),
(33, 19, '1616781166anh4.png', 1, '2021-03-27 00:52:46'),
(34, 19, '1616781166anh5.png', 1, '2021-03-27 00:52:46'),
(35, 19, '1616781166anh6.png', 1, '2021-03-27 00:52:46'),
(67, 21, '1616808939anh1.png', 1, '2021-03-27 08:35:39'),
(68, 21, '1616808939anh2.png', 1, '2021-03-27 08:35:39'),
(69, 21, '1616808939anh3.png', 1, '2021-03-27 08:35:39'),
(70, 21, '1616808939anh4.png', 1, '2021-03-27 08:35:39'),
(87, 20, '1616809263anh1.png', 1, '2021-03-27 08:41:03'),
(88, 20, '1616809263anh2.png', 1, '2021-03-27 08:41:03'),
(89, 20, '1616809263anh3.png', 1, '2021-03-27 08:41:03'),
(90, 20, '1616809263anh4.png', 1, '2021-03-27 08:41:03'),
(105, 17, '1616809725anh1.png', 1, '2021-03-27 08:48:45'),
(106, 17, '1616809725anh2.png', 1, '2021-03-27 08:48:45'),
(107, 17, '1616809725anh3.png', 1, '2021-03-27 08:48:45'),
(111, 18, '1616809885385-022dlw-1585040495.jpg', 1, '2021-03-27 08:51:25'),
(112, 18, '1616809885anh1.png', 1, '2021-03-27 08:51:25'),
(113, 18, '1616809885anh2.png', 1, '2021-03-27 08:51:25'),
(114, 15, '1616809940anh1.png', 1, '2021-03-27 08:52:20'),
(115, 15, '1616809940anh2.png', 1, '2021-03-27 08:52:20'),
(116, 15, '1616809940anh3.png', 1, '2021-03-27 08:52:20'),
(150, 59, '1616817580ARTL22714.png', 1, '2021-03-27 10:59:40'),
(151, 59, '1616817580ARTL22718.png', 1, '2021-03-27 10:59:40'),
(152, 59, '1616817580ARTL22719.png', 1, '2021-03-27 10:59:40'),
(153, 59, '1616817580ARTL22720.png', 1, '2021-03-27 10:59:40'),
(154, 13, '1617039322anh5.png', 1, '2021-03-30 00:35:22'),
(155, 13, '1617039322anh6.png', 1, '2021-03-30 00:35:22'),
(156, 13, '1617039322anh7.png', 1, '2021-03-30 00:35:22'),
(157, 13, '1617039322dong-ho-freelook-fl1100571-1588559892.jpg', 1, '2021-03-30 00:35:22'),
(158, 13, '1617039322srwatch-sl22034302-1572335729.jpg', 1, '2021-03-30 00:35:22'),
(159, 35, '1617073855anh1.png', 1, '2021-03-30 10:10:55'),
(160, 35, '1617073855anh2.png', 1, '2021-03-30 10:10:55'),
(161, 35, '1617073855anh3.png', 1, '2021-03-30 10:10:55'),
(162, 34, '1617073902anh1.png', 1, '2021-03-30 10:11:42'),
(163, 34, '1617073902anh2.png', 1, '2021-03-30 10:11:42'),
(164, 34, '1617073902anh3.png', 1, '2021-03-30 10:11:42'),
(165, 33, '1617073949385-022dlw-1585040495.jpg', 1, '2021-03-30 10:12:29'),
(166, 33, '1617073949anh1.png', 1, '2021-03-30 10:12:29'),
(167, 33, '1617073949anh2.png', 1, '2021-03-30 10:12:29'),
(168, 28, '1617073984385-022dlw-1585040495.jpg', 1, '2021-03-30 10:13:04'),
(169, 28, '1617073984anh1.png', 1, '2021-03-30 10:13:04'),
(170, 28, '1617073985anh2.png', 1, '2021-03-30 10:13:05'),
(171, 28, '1617073985anh3.png', 1, '2021-03-30 10:13:05'),
(172, 23, '1617074020385-022dlw-1585040495.jpg', 1, '2021-03-30 10:13:40'),
(173, 23, '1617074020anh1.png', 1, '2021-03-30 10:13:40'),
(174, 23, '1617074020anh2.png', 1, '2021-03-30 10:13:40'),
(175, 23, '1617074020anh3.png', 1, '2021-03-30 10:13:40'),
(176, 23, '1617074020anh4.png', 1, '2021-03-30 10:13:40'),
(177, 23, '1617074020anh5.png', 1, '2021-03-30 10:13:40'),
(178, 22, '1617074078anh1.png', 1, '2021-03-30 10:14:38'),
(179, 22, '1617074078anh2.png', 1, '2021-03-30 10:14:38'),
(180, 22, '1617074078anh3.png', 1, '2021-03-30 10:14:38'),
(181, 22, '1617074078anh4.png', 1, '2021-03-30 10:14:38'),
(182, 22, '1617074078anh5.png', 1, '2021-03-30 10:14:38'),
(183, 22, '1617074078anh6.png', 1, '2021-03-30 10:14:38'),
(184, 32, '1617074130anh1.png', 1, '2021-03-30 10:15:30'),
(185, 32, '1617074130anh2.png', 1, '2021-03-30 10:15:30'),
(186, 32, '1617074130anh3.png', 1, '2021-03-30 10:15:30'),
(187, 27, '1617074159anh1.png', 1, '2021-03-30 10:15:59'),
(188, 27, '1617074159anh2.png', 1, '2021-03-30 10:15:59'),
(189, 27, '1617074159anh3.png', 1, '2021-03-30 10:15:59'),
(190, 27, '1617074159anh4.png', 1, '2021-03-30 10:15:59'),
(191, 27, '1617074159anh5.png', 1, '2021-03-30 10:15:59'),
(192, 27, '1617074159anh6.png', 1, '2021-03-30 10:15:59'),
(193, 27, '1617074159anh7.png', 1, '2021-03-30 10:15:59'),
(194, 27, '1617074159anh8.png', 1, '2021-03-30 10:15:59'),
(195, 24, '1617074197anh1.png', 1, '2021-03-30 10:16:37'),
(196, 24, '1617074197anh2.png', 1, '2021-03-30 10:16:37'),
(197, 24, '1617074197anh3.png', 1, '2021-03-30 10:16:37'),
(198, 24, '1617074197anh4.png', 1, '2021-03-30 10:16:37'),
(199, 29, '1617074225anh1.png', 1, '2021-03-30 10:17:05'),
(200, 29, '1617074225anh2.png', 1, '2021-03-30 10:17:05'),
(201, 29, '1617074225anh3.png', 1, '2021-03-30 10:17:05'),
(202, 29, '1617074225anh4.png', 1, '2021-03-30 10:17:05'),
(203, 29, '1617074225anh5.png', 1, '2021-03-30 10:17:05'),
(204, 25, '1617074265anh6.png', 1, '2021-03-30 10:17:45'),
(205, 25, '1617074265anh7.png', 1, '2021-03-30 10:17:45'),
(206, 25, '1617074265anh8.png', 1, '2021-03-30 10:17:45'),
(207, 25, '1617074265anh19psd.png', 1, '2021-03-30 10:17:45'),
(208, 30, '1617074294anh1.png', 1, '2021-03-30 10:18:14'),
(209, 30, '1617074294anh2.png', 1, '2021-03-30 10:18:14'),
(210, 30, '1617074294anh3.png', 1, '2021-03-30 10:18:14'),
(211, 30, '1617074294anh4.png', 1, '2021-03-30 10:18:14'),
(212, 30, '1617074294anh5.png', 1, '2021-03-30 10:18:14'),
(213, 30, '1617074294anh6.png', 1, '2021-03-30 10:18:14'),
(214, 30, '1617074294anh7.png', 1, '2021-03-30 10:18:14'),
(215, 30, '1617074294anh8.png', 1, '2021-03-30 10:18:14'),
(216, 30, '1617074294anh19psd.png', 1, '2021-03-30 10:18:14'),
(217, 31, '1617074325anh1.png', 1, '2021-03-30 10:18:45'),
(218, 31, '1617074325anh2.png', 1, '2021-03-30 10:18:45'),
(219, 31, '1617074325anh3.png', 1, '2021-03-30 10:18:45'),
(220, 26, '1617074353anh1.png', 1, '2021-03-30 10:19:13'),
(221, 26, '1617074353anh2.png', 1, '2021-03-30 10:19:13'),
(222, 26, '1617074353anh3.png', 1, '2021-03-30 10:19:13'),
(223, 26, '1617074353anh4.png', 1, '2021-03-30 10:19:13'),
(224, 26, '1617074353anh5.png', 1, '2021-03-30 10:19:13'),
(225, 26, '1617074353anh6.png', 1, '2021-03-30 10:19:13'),
(226, 26, '1617074353anh7.png', 1, '2021-03-30 10:19:13'),
(227, 26, '1617074353anh8.png', 1, '2021-03-30 10:19:13'),
(228, 26, '1617074353anh9.png', 1, '2021-03-30 10:19:13'),
(229, 36, '1617076043anh1.png', 1, '2021-03-30 10:47:23'),
(230, 36, '1617076043anh2.png', 1, '2021-03-30 10:47:23'),
(231, 36, '1617076043anh3.png', 1, '2021-03-30 10:47:23'),
(232, 58, '1617076069anh1.png', 1, '2021-03-30 10:47:49'),
(233, 58, '1617076069anh2.png', 1, '2021-03-30 10:47:49'),
(234, 57, '1617076137anh1.png', 1, '2021-03-30 10:48:57'),
(235, 57, '1617076137anh2.png', 1, '2021-03-30 10:48:57'),
(236, 56, '1617076221D890-11B-1-370x370.jpg', 1, '2021-03-30 10:50:21'),
(237, 56, '1617076221day-lung-ca-sau-da-bung-dla1500-04b-t-cf-1-370x370.jpg', 1, '2021-03-30 10:50:21'),
(238, 56, '1617076221day-lung-ca-sau-da-bung-dla1900-07b-b-d-1-370x370.jpg', 1, '2021-03-30 10:50:21'),
(239, 55, '1617076297D890-11B-1-370x370.jpg', 1, '2021-03-30 10:51:37'),
(240, 55, '1617076297day-lung-ca-sau-da-bung-dla1500-04b-t-cf-1-370x370.jpg', 1, '2021-03-30 10:51:37'),
(241, 55, '1617076297day-lung-ca-sau-da-bung-dla1900-07b-b-d-1-370x370.jpg', 1, '2021-03-30 10:51:37'),
(242, 55, '1617076297day-lung-ca-sau-day-lien-dla2100-03v-t-d-5-370x370.jpg', 1, '2021-03-30 10:51:37'),
(243, 55, '1617076297day-lung-da-bo-cao-cap-d890-12v-1-370x370.jpg', 1, '2021-03-30 10:51:37'),
(244, 49, '1617076359anh-6.png', 1, '2021-03-30 10:52:39'),
(245, 49, '1617076359anh4.png', 1, '2021-03-30 10:52:39'),
(246, 49, '1617076359anh5.png', 1, '2021-03-30 10:52:39'),
(247, 48, '1617076393anh1.png', 1, '2021-03-30 10:53:13'),
(248, 48, '1617076393anh2.png', 1, '2021-03-30 10:53:13'),
(249, 47, '1617076447anh4.png', 1, '2021-03-30 10:54:07'),
(250, 47, '1617076447brooks-brothers-giam-gia-2019-02-suit-nam-50.jpg', 1, '2021-03-30 10:54:07'),
(251, 47, '1617076447l-094438-dong-phuc-cong-so-nam-02.jpg', 1, '2021-03-30 10:54:07'),
(252, 46, '1617076473anh4.png', 1, '2021-03-30 10:54:33'),
(253, 46, '1617076473brooks-brothers-giam-gia-2019-02-suit-nam-50.jpg', 1, '2021-03-30 10:54:33'),
(254, 46, '1617076473l-094438-dong-phuc-cong-so-nam-02.jpg', 1, '2021-03-30 10:54:33'),
(255, 37, '1617076511anh-6.png', 1, '2021-03-30 10:55:11'),
(256, 37, '1617076511anh4.png', 1, '2021-03-30 10:55:11'),
(257, 37, '1617076511anh5.png', 1, '2021-03-30 10:55:11'),
(258, 39, '1617076537anh-6.png', 1, '2021-03-30 10:55:37'),
(259, 39, '1617076537anh4.png', 1, '2021-03-30 10:55:37'),
(260, 39, '1617076537anh5.png', 1, '2021-03-30 10:55:37'),
(261, 39, '1617076537anh7.png', 1, '2021-03-30 10:55:37'),
(262, 39, '1617076537anh8.png', 1, '2021-03-30 10:55:37'),
(263, 41, '1617076560anh-6.png', 1, '2021-03-30 10:56:00'),
(264, 41, '1617076560anh4.png', 1, '2021-03-30 10:56:00'),
(265, 41, '1617076560anh5.png', 1, '2021-03-30 10:56:00'),
(266, 44, '1617076587anh4.png', 1, '2021-03-30 10:56:27'),
(267, 38, '1617076610anh1.png', 1, '2021-03-30 10:56:50'),
(268, 38, '1617076610anh2.png', 1, '2021-03-30 10:56:50'),
(269, 38, '1617076610anh3.png', 1, '2021-03-30 10:56:50'),
(270, 40, '1617076636anh1.png', 1, '2021-03-30 10:57:16'),
(271, 40, '1617076636anh2.png', 1, '2021-03-30 10:57:16'),
(272, 40, '1617076636anh3.png', 1, '2021-03-30 10:57:16'),
(273, 43, '1617076802unnamed.jpg', 1, '2021-03-30 11:00:02'),
(274, 53, '1617076820dBxjhYG6ecLpMKsmTyHP.jpg', 1, '2021-03-30 11:00:20'),
(275, 52, '1617076837cavat-xanh-caro-717x1024.jpg', 1, '2021-03-30 11:00:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_orders`
--

CREATE TABLE `tbl_detail_orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name_size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` double NOT NULL COMMENT 'giá thời điểm mua',
  `total_money` double NOT NULL COMMENT 'tổng tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_orders`
--

INSERT INTO `tbl_detail_orders` (`order_id`, `product_id`, `name_size`, `quantity`, `price`, `total_money`) VALUES
(1, 31, 'S', 1, 559000, 559000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_detail_size`
--

CREATE TABLE `tbl_detail_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name_size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên size',
  `quantity` int(10) NOT NULL COMMENT 'số lượng trong kho',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'trạng thái',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_detail_size`
--

INSERT INTO `tbl_detail_size` (`id`, `product_id`, `name_size`, `quantity`, `status`, `created_at`) VALUES
(39, 11, 'XS', 0, 1, '2021-03-27 00:08:06'),
(40, 11, 'S', 7, 1, '2021-03-27 00:08:06'),
(41, 11, 'M', 3, 1, '2021-03-27 00:08:06'),
(42, 11, 'L', 50, 1, '2021-03-27 00:08:06'),
(43, 11, 'XL', 30, 1, '2021-03-27 00:08:06'),
(44, 11, 'XXL', 10, 1, '2021-03-27 00:08:06'),
(45, 12, '34', 0, 1, '2021-03-27 00:08:06'),
(46, 12, '35', 25, 1, '2021-03-27 00:08:06'),
(47, 12, '36', 10, 1, '2021-03-27 00:08:06'),
(48, 12, '37', 3, 1, '2021-03-27 00:08:06'),
(49, 12, '38', 6, 1, '2021-03-27 00:08:06'),
(50, 12, '39', 5, 1, '2021-03-27 00:08:06'),
(51, 12, '40', 30, 1, '2021-03-27 00:08:06'),
(52, 12, '41', 40, 1, '2021-03-27 00:08:06'),
(53, 12, '42', 50, 1, '2021-03-27 00:08:06'),
(54, 12, '43', 0, 1, '2021-03-27 00:08:06'),
(55, 13, 'default', 15, 1, '2021-03-27 00:08:06'),
(56, 14, 'default', 33, 1, '2021-03-27 00:08:06'),
(57, 15, 'default', 0, 1, '2021-03-27 00:08:06'),
(58, 16, 'XS', 1, 1, '2021-03-27 00:16:10'),
(59, 16, 'S', 3, 1, '2021-03-27 00:16:10'),
(60, 16, 'M', 5, 1, '2021-03-27 00:16:10'),
(61, 16, 'L', 7, 1, '2021-03-27 00:16:10'),
(62, 16, 'XL', 0, 1, '2021-03-27 00:16:10'),
(63, 16, 'XXL', 0, 1, '2021-03-27 00:16:10'),
(64, 17, '34', 0, 1, '2021-03-27 00:16:10'),
(65, 17, '35', 2, 1, '2021-03-27 00:16:10'),
(66, 17, '36', 3, 1, '2021-03-27 00:16:10'),
(67, 17, '37', 4, 1, '2021-03-27 00:16:10'),
(68, 17, '38', 5, 1, '2021-03-27 00:16:10'),
(69, 17, '39', 60, 1, '2021-03-27 00:16:10'),
(70, 17, '40', 25, 1, '2021-03-27 00:16:10'),
(71, 17, '41', 30, 1, '2021-03-27 00:16:10'),
(72, 17, '42', 0, 1, '2021-03-27 00:16:10'),
(73, 17, '43', 0, 1, '2021-03-27 00:16:10'),
(74, 18, 'default', 50, 1, '2021-03-27 00:16:10'),
(75, 19, 'default', 27, 1, '2021-03-27 00:16:10'),
(76, 20, 'default', 33, 1, '2021-03-27 00:16:10'),
(77, 21, 'XS', 10, 1, '2021-03-27 00:24:13'),
(78, 21, 'S', 3, 1, '2021-03-27 00:24:13'),
(79, 21, 'M', 5, 1, '2021-03-27 00:24:13'),
(80, 21, 'L', 7, 1, '2021-03-27 00:24:13'),
(81, 21, 'XL', 30, 1, '2021-03-27 00:24:13'),
(82, 21, 'XXL', 5, 1, '2021-03-27 00:24:13'),
(83, 22, '34', 0, 1, '2021-03-27 00:24:13'),
(84, 22, '35', 0, 1, '2021-03-27 00:24:13'),
(85, 22, '36', 3, 1, '2021-03-27 00:24:13'),
(86, 22, '37', 4, 1, '2021-03-27 00:24:13'),
(87, 22, '38', 5, 1, '2021-03-27 00:24:13'),
(88, 22, '39', 7, 1, '2021-03-27 00:24:13'),
(89, 22, '40', 0, 1, '2021-03-27 00:24:13'),
(90, 22, '41', 0, 1, '2021-03-27 00:24:13'),
(91, 22, '42', 0, 1, '2021-03-27 00:24:13'),
(92, 22, '43', 0, 1, '2021-03-27 00:24:13'),
(93, 23, 'default', 5, 1, '2021-03-27 00:24:13'),
(94, 24, 'default', 0, 1, '2021-03-27 00:24:13'),
(95, 25, 'default', 0, 1, '2021-03-27 00:24:13'),
(96, 26, 'XS', 0, 1, '2021-03-27 00:30:47'),
(97, 26, 'S', 4, 1, '2021-03-27 00:30:47'),
(98, 26, 'M', 5, 1, '2021-03-27 00:30:47'),
(99, 26, 'L', 6, 1, '2021-03-27 00:30:47'),
(100, 26, 'XL', 0, 1, '2021-03-27 00:30:47'),
(101, 26, 'XXL', 0, 1, '2021-03-27 00:30:47'),
(102, 27, '34', 0, 1, '2021-03-27 00:30:47'),
(103, 27, '35', 0, 1, '2021-03-27 00:30:47'),
(104, 27, '36', 1, 1, '2021-03-27 00:30:47'),
(105, 27, '37', 3, 1, '2021-03-27 00:30:47'),
(106, 27, '38', 5, 1, '2021-03-27 00:30:47'),
(107, 27, '39', 7, 1, '2021-03-27 00:30:47'),
(108, 27, '40', 0, 1, '2021-03-27 00:30:47'),
(109, 27, '41', 0, 1, '2021-03-27 00:30:47'),
(110, 27, '42', 0, 1, '2021-03-27 00:30:47'),
(111, 27, '43', 0, 1, '2021-03-27 00:30:47'),
(112, 28, 'default', 3, 1, '2021-03-27 00:30:47'),
(113, 29, 'default', 0, 1, '2021-03-27 00:30:47'),
(114, 30, 'default', 0, 1, '2021-03-27 00:30:47'),
(115, 31, 'XS', 0, 1, '2021-03-27 00:37:51'),
(116, 31, 'S', 1, 1, '2021-03-27 00:37:51'),
(117, 31, 'M', 3, 1, '2021-03-27 00:37:51'),
(118, 31, 'L', 5, 1, '2021-03-27 00:37:51'),
(119, 31, 'XL', 0, 1, '2021-03-27 00:37:51'),
(120, 31, 'XXL', 0, 1, '2021-03-27 00:37:51'),
(121, 32, '34', 0, 1, '2021-03-27 00:37:51'),
(122, 32, '35', 1, 1, '2021-03-27 00:37:51'),
(123, 32, '36', 3, 1, '2021-03-27 00:37:51'),
(124, 32, '37', 5, 1, '2021-03-27 00:37:51'),
(125, 32, '38', 5, 1, '2021-03-27 00:37:51'),
(126, 32, '39', 0, 1, '2021-03-27 00:37:51'),
(127, 32, '40', 0, 1, '2021-03-27 00:37:51'),
(128, 32, '41', 0, 1, '2021-03-27 00:37:51'),
(129, 32, '42', 0, 1, '2021-03-27 00:37:51'),
(130, 32, '43', 0, 1, '2021-03-27 00:37:51'),
(131, 33, 'default', 3, 1, '2021-03-27 00:37:51'),
(132, 34, 'default', 0, 1, '2021-03-27 00:37:51'),
(133, 35, 'default', 0, 1, '2021-03-27 00:37:51'),
(134, 36, 'XS', 0, 1, '2021-03-27 10:11:38'),
(135, 36, 'S', 0, 1, '2021-03-27 10:11:38'),
(136, 36, 'M', 14, 1, '2021-03-27 10:11:38'),
(137, 36, 'L', 15, 1, '2021-03-27 10:11:38'),
(138, 36, 'XL', 145, 1, '2021-03-27 10:11:38'),
(139, 36, 'XXL', 0, 1, '2021-03-27 10:11:38'),
(140, 37, '27', 0, 1, '2021-03-27 10:11:38'),
(141, 37, '28', 60, 1, '2021-03-27 10:11:38'),
(142, 37, '29', 20, 1, '2021-03-27 10:11:38'),
(143, 37, '30', 15, 1, '2021-03-27 10:11:38'),
(144, 37, '31', 5, 1, '2021-03-27 10:11:38'),
(145, 37, '32', 0, 1, '2021-03-27 10:11:38'),
(146, 37, '33', 0, 1, '2021-03-27 10:11:38'),
(147, 37, '34', 0, 1, '2021-03-27 10:11:38'),
(148, 37, '35', 0, 1, '2021-03-27 10:11:38'),
(149, 37, '36', 0, 1, '2021-03-27 10:11:38'),
(150, 38, 'XS', 0, 1, '2021-03-27 10:17:14'),
(151, 38, 'S', 0, 1, '2021-03-27 10:17:14'),
(152, 38, 'M', 0, 1, '2021-03-27 10:17:14'),
(153, 38, 'L', 15, 1, '2021-03-27 10:17:14'),
(154, 38, 'XL', 145, 1, '2021-03-27 10:17:14'),
(155, 38, 'XXL', 60, 1, '2021-03-27 10:17:14'),
(156, 39, '27', 0, 1, '2021-03-27 10:17:14'),
(157, 39, '28', 0, 1, '2021-03-27 10:17:14'),
(158, 39, '29', 0, 1, '2021-03-27 10:17:14'),
(159, 39, '30', 0, 1, '2021-03-27 10:17:14'),
(160, 39, '31', 0, 1, '2021-03-27 10:17:14'),
(161, 39, '32', 15, 1, '2021-03-27 10:17:14'),
(162, 39, '33', 145, 1, '2021-03-27 10:17:14'),
(163, 39, '34', 27, 1, '2021-03-27 10:17:14'),
(164, 39, '35', 29, 1, '2021-03-27 10:17:14'),
(165, 39, '36', 0, 1, '2021-03-27 10:17:14'),
(166, 40, 'XS', 0, 1, '2021-03-27 10:23:14'),
(167, 40, 'S', 25, 1, '2021-03-27 10:23:14'),
(168, 40, 'M', 35, 1, '2021-03-27 10:23:14'),
(169, 40, 'L', 20, 1, '2021-03-27 10:23:14'),
(170, 40, 'XL', 30, 1, '2021-03-27 10:23:14'),
(171, 40, 'XXL', 0, 1, '2021-03-27 10:23:14'),
(172, 41, '27', 0, 1, '2021-03-27 10:23:14'),
(173, 41, '28', 25, 1, '2021-03-27 10:23:14'),
(174, 41, '29', 35, 1, '2021-03-27 10:23:14'),
(175, 41, '30', 20, 1, '2021-03-27 10:23:14'),
(176, 41, '31', 30, 1, '2021-03-27 10:23:14'),
(177, 41, '32', 35, 1, '2021-03-27 10:23:14'),
(178, 41, '33', 0, 1, '2021-03-27 10:23:14'),
(179, 41, '34', 0, 1, '2021-03-27 10:23:14'),
(180, 41, '35', 0, 1, '2021-03-27 10:23:14'),
(181, 41, '36', 0, 1, '2021-03-27 10:23:14'),
(183, 43, 'XS', 0, 1, '2021-03-27 10:29:07'),
(184, 43, 'S', 15, 1, '2021-03-27 10:29:07'),
(185, 43, 'M', 25, 1, '2021-03-27 10:29:07'),
(186, 43, 'L', 30, 1, '2021-03-27 10:29:07'),
(187, 43, 'XL', 35, 1, '2021-03-27 10:29:07'),
(188, 43, 'XXL', 0, 1, '2021-03-27 10:29:07'),
(189, 44, 'XS', 0, 1, '2021-03-27 10:30:46'),
(190, 44, 'S', 15, 1, '2021-03-27 10:30:46'),
(191, 44, 'M', 20, 1, '2021-03-27 10:30:46'),
(192, 44, 'L', 25, 1, '2021-03-27 10:30:46'),
(193, 44, 'XL', 30, 1, '2021-03-27 10:30:46'),
(194, 44, 'XXL', 35, 1, '2021-03-27 10:30:46'),
(195, 45, 'XS', 15, 1, '2021-03-27 10:32:32'),
(196, 45, 'S', 25, 1, '2021-03-27 10:32:32'),
(197, 45, 'M', 30, 1, '2021-03-27 10:32:32'),
(198, 45, 'L', 35, 1, '2021-03-27 10:32:32'),
(199, 45, 'XL', 0, 1, '2021-03-27 10:32:32'),
(200, 45, 'XXL', 0, 1, '2021-03-27 10:32:32'),
(201, 46, 'XS', 0, 1, '2021-03-27 10:33:51'),
(202, 46, 'S', 0, 1, '2021-03-27 10:33:51'),
(203, 46, 'M', 0, 1, '2021-03-27 10:33:51'),
(204, 46, 'L', 0, 1, '2021-03-27 10:33:51'),
(205, 46, 'XL', 0, 1, '2021-03-27 10:33:51'),
(206, 46, 'XXL', 0, 1, '2021-03-27 10:33:51'),
(207, 47, 'XS', 15, 1, '2021-03-27 10:34:45'),
(208, 47, 'S', 20, 1, '2021-03-27 10:34:45'),
(209, 47, 'M', 25, 1, '2021-03-27 10:34:45'),
(210, 47, 'L', 30, 1, '2021-03-27 10:34:45'),
(211, 47, 'XL', 0, 1, '2021-03-27 10:34:45'),
(212, 47, 'XXL', 0, 1, '2021-03-27 10:34:45'),
(213, 48, 'XS', 0, 1, '2021-03-27 10:39:08'),
(214, 48, 'S', 15, 1, '2021-03-27 10:39:08'),
(215, 48, 'M', 20, 1, '2021-03-27 10:39:08'),
(216, 48, 'L', 25, 1, '2021-03-27 10:39:08'),
(217, 48, 'XL', 30, 1, '2021-03-27 10:39:08'),
(218, 48, 'XXL', 0, 1, '2021-03-27 10:39:08'),
(219, 49, '27', 0, 1, '2021-03-27 10:39:08'),
(220, 49, '28', 0, 1, '2021-03-27 10:39:08'),
(221, 49, '29', 17, 1, '2021-03-27 10:39:08'),
(222, 49, '30', 27, 1, '2021-03-27 10:39:08'),
(223, 49, '31', 34, 1, '2021-03-27 10:39:08'),
(224, 49, '32', 54, 1, '2021-03-27 10:39:08'),
(225, 49, '33', 0, 1, '2021-03-27 10:39:08'),
(226, 49, '34', 50, 1, '2021-03-27 10:39:08'),
(227, 49, '35', 0, 1, '2021-03-27 10:39:08'),
(228, 49, '36', 0, 1, '2021-03-27 10:39:08'),
(230, 51, 'default', 890, 1, '2021-03-27 10:43:08'),
(231, 52, 'default', 145, 1, '2021-03-27 10:43:49'),
(232, 53, 'default', 234, 1, '2021-03-27 10:44:45'),
(233, 54, 'default', 236, 1, '2021-03-27 10:46:01'),
(234, 55, 'default', 123, 1, '2021-03-27 10:47:28'),
(235, 56, 'default', 890, 1, '2021-03-27 10:49:00'),
(236, 57, 'default', 145, 1, '2021-03-27 10:51:10'),
(237, 58, 'default', 234, 1, '2021-03-27 10:51:43'),
(238, 59, 'default', 236, 1, '2021-03-27 10:52:11'),
(239, 60, 'default', 0, 1, '2021-03-27 11:03:16'),
(240, 61, 'default', 30, 1, '2021-03-27 11:03:23'),
(241, 62, 'default', 50, 1, '2021-03-27 11:05:00'),
(242, 63, 'default', 50, 1, '2021-03-27 11:05:49'),
(243, 64, 'default', 50, 1, '2021-03-27 11:08:09'),
(244, 65, 'default', 50, 1, '2021-03-27 11:17:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_gifts`
--

CREATE TABLE `tbl_gifts` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `change_code` int(11) NOT NULL,
  `gift_code` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_code` tinyint(2) NOT NULL DEFAULT 0 COMMENT 'tiền mặt or percent',
  `quantity` int(4) NOT NULL COMMENT 'số lượng',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_gifts`
--

INSERT INTO `tbl_gifts` (`id`, `cate_id`, `affiliate_id`, `change_code`, `gift_code`, `type_code`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 3, 'k8IiOHSKlpf75RUw', 1, 2, 1, '2021-03-27 11:08:31', '2021-03-27 11:08:31'),
(2, 6, 1, 3, 'GVYLkf0cFvJaPZlB', 1, 2, 1, '2021-03-27 11:43:08', '2021-03-27 11:43:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` double NOT NULL COMMENT 'Điểm tích lũy khi mua hàng',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `name`, `avatar`, `email`, `phone`, `password`, `address`, `point`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trần Minh Đức', '16168154776B9C8DB1-792C-449B-AE68-D9DA0B253EC8.jpeg', 'tranminhduc.790@gmail.com', '0347577288', '123456789', '69 Hoàng Bông', 0, 1, '2021-03-27 10:24:37', '2021-03-27 10:24:37'),
(2, 'Hoàng Bug', '1616817644lap-trinh-vien.jpg', 'hoangbug123@gmail.com', '0972593950', '1223', 'số 9, ngõ 268 ngọc hồi, thanh trì, hà nội', 0, 1, '2021-03-27 11:00:44', '2021-03-27 11:00:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_money` double NOT NULL COMMENT 'tổn tiền đơn hàng',
  `ship_method` tinyint(4) NOT NULL,
  `pay_method` tinyint(4) NOT NULL,
  `date_order` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT 'mặc địh chờ xác nhận',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `member_id`, `note`, `total_money`, `ship_method`, `pay_method`, `date_order`, `status`, `updated_at`) VALUES
(1, 1, '', 594000, 1, 1, '2021-03-27 10:25:02', 1, '2021-03-27 10:25:02'),
(2, 2, 'hiih', 129000, 1, 1, '2021-03-27 11:28:00', 5, '2021-03-27 11:28:00'),
(3, 2, 'hkyjt', 387000, 1, 1, '2021-03-27 11:44:11', 1, '2021-05-11 08:34:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_referal`
--

CREATE TABLE `tbl_order_referal` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `referal_id` int(11) NOT NULL,
  `rose` double NOT NULL,
  `total_rose` double NOT NULL COMMENT 'Tiền hoa hồng nhận đc',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_referal`
--

INSERT INTO `tbl_order_referal` (`id`, `order_id`, `referal_id`, `rose`, `total_rose`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 3, 11610, 1, '2021-03-27 11:44:11', '2021-03-27 11:44:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `cate_pro_id` int(11) NOT NULL COMMENT 'id danh mục ',
  `brand_id` int(11) NOT NULL COMMENT 'id nhãn hiệu',
  `product_sets_id` int(11) DEFAULT NULL COMMENT 'bộ đồ',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên',
  `main_image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ảnh chính',
  `price` double NOT NULL COMMENT 'giá ',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mô tả',
  `sale` tinyint(4) DEFAULT 0 COMMENT 'giảm giá theo phần trăm',
  `views` double NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 2 COMMENT 'trạng thái:\r\n0. Dừng bán\r\n1. Đang bán\r\n2. New Arrivals\r\n3. Best Sellers\r\n4. Hot Sales',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `cate_pro_id`, `brand_id`, `product_sets_id`, `name`, `main_image`, `price`, `description`, `sale`, `views`, `status`, `created_at`, `updated_at`) VALUES
(11, 1, 2, 3, 'Đầm xám ôm A đính eo', '1617039386anh1.png', 333000, '<ul><li>Chất liệu : Len dệt kim cao cấp</li><li>Màu sắc : Như hình</li><li>Kích Thước : Free size 45- 65 kg | Chiều cao 1m55 - 1m70.</li><li>Xuất xứ : Hàng nhập</li></ul>', 3, 0, 1, '2021-03-27 00:08:06', '2021-03-30 00:36:26'),
(12, 2, 2, 3, 'Giày cao gót vuông 7p kem mềm phối màu cực xinh__ LZ043', '1617039360anh5.png', 350000, '<p>Thương hiệu</p><p>No Brand</p><p>Mũi giày</p><p>Mũi nhọn</p><p>Chiều cao gót (cm)</p><p>7</p><p>Kiểu gót giày</p><p>Gót vuông</p><p>Chất liệu bên trong</p><p>Chất liệu tổng hợp</p><p>Chất liệu bên ngoài</p><p>Da mềm</p>', 5, 0, 1, '2021-03-27 00:08:06', '2021-03-30 00:36:00'),
(13, 3, 2, 3, 'Đồng hồ Diamond D DM5308B5IG', '1617039294anh3.png', 5000000, '<p>Đường kính mặt</p><p><a href=\"javascript://\">24mm</a></p><p>Chống nước</p><p><a href=\"javascript://\">3ATM</a></p><p>Chất liệu mặt</p><p>Kính sapphire</p><p>Năng lượng sử dụng</p><p>Quartz/Pin</p><p>Size dây</p><p>8mm</p><p>Chất liệu dây</p><p>Hợp kim mạ PVD , đính đá swarovsky</p><p>Chất liệu vỏ</p><p>Hợp kim mạ PVD , đính đá swarovsky</p><p>Kiểu dáng</p><p>Nữ</p><p>Xuất xứ</p><p>China</p><p>Chế độ bảo hành</p><p>Bảo hành quốc tế&nbsp;<strong>10</strong>&nbsp;năm</p>', 3, 0, 1, '2021-03-27 00:08:06', '2021-03-30 00:35:22'),
(14, 4, 2, 3, 'Thắt lưng nữ dây nịt nữ thời trang NT150', '1617039406b63bcb4d17da705331ac96b2bb35b551.jpg', 245000, '<p><strong>- Chất liệu : da bò&nbsp;</strong></p><p><strong>- Kích thước: 2.8cmx 105cm&nbsp;</strong></p><p><strong>- Màu sắc: đen&nbsp;</strong></p><p><strong>- Sản xuất: Việt Nam&nbsp;</strong></p><p><strong>- Bảo hành 1 năm&nbsp;</strong></p><p><strong>- Đổi trả trong 15 ngày&nbsp;</strong></p>', 2, 0, 1, '2021-03-27 00:08:06', '2021-03-30 00:36:46'),
(15, 5, 2, 3, 'Ví Dài Khóa Kéo Kate', '1617039209anh19psd.png', 560000, '<p>Nằm trong Bộ Sưu Tập Kate, Ví Dài Khóa Kéo Kate khoác lên mình dáng vẻ lịch thiệp, sang trọng.</p><ul><li>Chất liệu:&nbsp;<a href=\"https://www.leonardo.vn/blogs/news/da-saffiano-ke-thong-linh-trong-the-gioi-chat-lieu-che-tac\">Da Saffiano nhập khẩu</a></li><li>Kích thước: 18 x 10 x 2 cm</li><li>Để được tiền, smart phone, các loại giấy tờ, thẻ.</li><li>1 ngăn kéo lớn, 1 ngăn lớn đựng điện thoại, 2 ngăn nhỏ.</li><li>7 khe thẻ card.</li></ul>', 5, 0, 1, '2021-03-27 00:08:06', '2021-03-30 00:33:29'),
(16, 1, 2, 4, 'Đầm len suông cổ phối ren', '1617039278anh8.png', 359000, '<ul><li>- Chất liệu : Len</li><li>&nbsp;</li><li>- Màu sắc : Như hình</li><li>&nbsp;</li><li>Kích Thước : Free size 45- 65 kg | Chiều cao 1m55 - 1m70.</li><li>Xuất xứ : Hàng nhập</li></ul>', 7, 0, 1, '2021-03-27 00:16:10', '2021-03-30 00:34:38'),
(17, 2, 2, 4, 'Giày cao gót đúp vuông 10p bản ngang hở gót', '1617039433anh2.png', 179000, '<p>Thương hiệu</p><p>No Brand</p><p>Mũi giày</p><p>Hở mũi</p><p>Chiều cao gót (cm)</p><p>10</p><p>Kiểu gót giày</p><p>Gót vuông</p><p>Chất liệu bên trong</p><p>Chất liệu tổng hợp</p><p>Chất liệu bên ngoài</p><p>Da lộn</p>', 4, 0, 1, '2021-03-27 00:16:10', '2021-03-30 00:37:13'),
(18, 3, 2, 4, 'Đồng hồ Diamond D DM38025IG', '1617039463anh4.png', 5180000, '<p><a href=\"javascript://\">26mm</a></p><p>Chống nước</p><p><a href=\"javascript://\">3ATM</a></p><p>Chất liệu mặt</p><p>Kính sapphire</p><p>Năng lượng sử dụng</p><p>Quartz/Pin</p><p>Size dây</p><p>8mm</p><p>Chất liệu dây</p><p>Hợp kim mạ PVD rose gold , đính đá swarovsky</p><p>Chất liệu vỏ</p><p>Hợp kim mạ PVD , đính đá swarovsky</p><p>Kiểu dáng</p><p>Đồng hồ Nữ</p><p>Xuất xứ</p><p>China</p><p>Chế độ bảo hành</p><p>Bảo hành quốc tế&nbsp;<strong>10</strong>&nbsp;năm</p>', 5, 0, 1, '2021-03-27 00:16:10', '2021-03-30 00:37:43'),
(19, 4, 2, 4, 'Đai váy thắt lưng nữ Nutushop kiểu dáng thời trang cá tính chất liệu da thật bản nhỏ hàng cao cấp NT288', '1617039479anh6.png', 275000, '<p><strong>- Chất liệu : da bò&nbsp;</strong></p><p><strong>- Kích thước: 1.4cm x 100cm&nbsp;</strong></p><p><strong>- Màu sắc: đen&nbsp;</strong></p><p><strong>- Sản xuất: Việt Nam&nbsp;</strong></p><p><strong>- Bảo hành 1 năm&nbsp;</strong></p><p><strong>- Đổi trả trong 15 ngày&nbsp;</strong></p>', 8, 0, 1, '2021-03-27 00:16:10', '2021-03-30 00:37:59'),
(20, 5, 2, 4, 'Ví nữ thời trang hai ngăn kéo họa tiết kẻ VT006', '1617039501anh5.png', 560000, '<p><strong>Ví nữ thời trang hai ngăn kéo họa tiết kẻ công suất lớn VT006</strong></p><p>- Chất liệu da pu cao cấp, mềm mịn, chống thấm nước, chống bám bụi, độ bền da trên 5 năm.<br>- Kích thước: 19.5 x 10 x 4 cm ( dài, rộng, dày).&nbsp;<br>- Thiết kế khóa đôi với 2 ngăn chính lớn, nhiều ngăn khóa nhỏ và ngăn đựng thẻ bên trong, chứa đồ thỏa thích: điện thoại, tiền, các loại thẻ, chìa khóa,...<br>- Quai đeo cổ tay tiện lợi và chắc chắn.<br>- Họa tiết và màu sắc sang trọng: đen, đỏ</p>', 7, 0, 1, '2021-03-27 00:16:10', '2021-03-30 00:38:21'),
(21, 1, 3, 4, 'Đầm Len Chấm Bi Duyên Dáng', '1617039528anh3.png', 370000, '<ul><li>Chất liệu : Len dệt kim cao cấp</li><li>Màu sắc : Như hình</li><li>Kích Thước : Free size 45- 65 kg | Chiều cao 1m55 - 1m70.</li><li>Xuất xứ : Hàng nhập</li></ul>', 5, 0, 1, '2021-03-27 00:24:13', '2021-03-30 00:38:48'),
(22, 2, 3, 4, 'Giày Búp Bê Mũi Nhọn Đế 1,5cm Mềm Êm Chân Hot Trend MBS169 - SEUN SHOES', '1617074098anh8.png', 430000, '<p>Thương hiệu</p><p>No Brand</p><p>Mũi giày</p><p>Mũi nhọn</p><p>Chất liệu bên ngoài</p><p>Chất liệu tổng hợp</p>', 3, 0, 1, '2021-03-27 00:24:13', '2021-03-30 10:14:58'),
(23, 3, 3, 4, 'Đồng hồ Diamond D DM64205IG-B', '1617074041srwatch-sl22034302-1572335729.jpg', 5530000, '<p>Đường kính mặt</p><p><a href=\"javascript://\">33mm</a></p><p>Chống nước</p><p><a href=\"javascript://\">3ATM</a></p><p>Chất liệu mặt</p><p>Kính sapphire</p><p>Năng lượng sử dụng</p><p>Quartz/Pin</p><p>Size dây</p><p>16mm</p><p>Chất liệu dây</p><p>Dây da</p><p>Chất liệu vỏ</p><p>Hợp kim mạ PVD , đính đá swarovsky</p><p>Kiểu dáng</p><p>Đồng hồ Nữ</p><p>Xuất xứ</p><p>China</p><p>Chế độ bảo hành</p><p>Bảo hành quốc tế&nbsp;<strong>10</strong>&nbsp;năm</p>', 2, 0, 1, '2021-03-27 00:24:13', '2021-03-30 10:14:01'),
(24, 4, 3, 4, 'Thắt lưng nữ dây nịt nữ Nutushop da thật hàng cao cấp kiểu dáng thời trang cá tính - NT285', '1617074197anh8.png', 275000, '<p><strong>- Chất liệu : da bò&nbsp;</strong></p><p><strong>- Kích thước: 2.8cm x 100cm&nbsp;</strong></p><p><strong>- Màu sắc: đen&nbsp;</strong></p><p><strong>- Sản xuất: Việt Nam&nbsp;</strong></p><p><strong>- Bảo hành 1 năm&nbsp;</strong></p><p><strong>- Đổi trả trong 15 ngày&nbsp;</strong></p>', 6, 0, 1, '2021-03-27 00:24:13', '2021-03-30 10:16:37'),
(25, 5, 3, 4, 'Ví nữ thời trang VT001', '1617074265anh5.png', 799000, '<ul><li>Mã sản phẩm: 1012WAL0210</li><li>Loại sản phẩm: Ví Cầm Tay</li><li>Chất liệuDa nhân tạo</li><li>Hoa văn, chi tiết: Một màu, trang trí kim loại</li><li>Kích thước (dài x rộng x cao)19 x 3.2 x 9.8 cm</li><li>Kiểu khóa: Nút bấm</li><li>Số ngăn 2 ngăn lớn, 3 ngăn nhỏ, 10 ngăn đựng thẻ</li><li>Kích cỡ: Trung bình</li><li>Phù hợp sử dụng: Đi tiệc, sử dụng hàng ngày</li></ul>', 7, 0, 1, '2021-03-27 00:24:13', '2021-03-30 10:17:45'),
(26, 1, 3, 5, 'Đầm Len Chấm Bi Duyên Dáng', '1617074353anh7.png', 499000, '<ul><li>Chất liệu : Len dệt kim cao cấp</li><li>Màu sắc : Như hình</li><li>Kích Thước : Free size 45- 65 kg | Chiều cao 1m55 - 1m70.</li><li>Xuất xứ : Hàng nhập</li></ul>', 4, 0, 1, '2021-03-27 00:30:47', '2021-03-30 10:19:13'),
(27, 2, 3, 5, 'Giày Búp Bê Mũi Nhọn Đế 1,5cm Mềm Êm Chân Hot Trend MBS169 - SEUN SHOES', '1617074159anh4.png', 450000, '<p>Thương hiệu</p><p>No Brand</p><p>Mũi giày</p><p>Mũi nhọn</p><p>Chất liệu bên ngoài</p><p>Chất liệu tổng hợp</p>', 5, 0, 1, '2021-03-27 00:30:47', '2021-03-30 10:15:59'),
(28, 3, 3, 5, 'Đồng hồ Diamond D DM64205IG-B', '1617073984anh1.png', 5530000, '<p>Đường kính mặt</p><p><a href=\"javascript://\">33mm</a></p><p>Chống nước</p><p><a href=\"javascript://\">3ATM</a></p><p>Chất liệu mặt</p><p>Kính sapphire</p><p>Năng lượng sử dụng</p><p>Quartz/Pin</p><p>Size dây</p><p>16mm</p><p>Chất liệu dây</p><p>Dây da</p><p>Chất liệu vỏ</p><p>Hợp kim mạ PVD , đính đá swarovsky</p><p>Kiểu dáng</p><p>Đồng hồ Nữ</p><p>Xuất xứ</p><p>China</p><p>Chế độ bảo hành</p><p>Bảo hành quốc tế&nbsp;<strong>10</strong>&nbsp;năm</p>', 5, 0, 1, '2021-03-27 00:30:47', '2021-03-30 10:13:05'),
(29, 4, 3, 5, 'Thắt lưng nữ dây nịt nữ Nutushop da thật hàng cao cấp kiểu dáng thời trang cá tính - NT285', '1617074225anh4.png', 230000, '<p><strong>- Chất liệu : da bò&nbsp;</strong></p><p><strong>- Kích thước: 2.8cm x 100cm&nbsp;</strong></p><p><strong>- Màu sắc: đen&nbsp;</strong></p><p><strong>- Sản xuất: Việt Nam&nbsp;</strong></p><p><strong>- Bảo hành 1 năm&nbsp;</strong></p><p><strong>- Đổi trả trong 15 ngày&nbsp;</strong></p>', 3, 0, 1, '2021-03-27 00:30:47', '2021-03-30 10:17:05'),
(30, 5, 3, 5, 'Ví Cầm Tay Da Vân Nổi Đính Kim Loại Dáng Dài - WAL 0210 - Màu Kem', '1617074294anh19psd.png', 550000, '<ul><li>Mã sản phẩm: 1012WAL0210</li><li>Loại sản phẩm: Ví Cầm Tay</li><li>Chất liệu: Da nhân tạo</li><li>Hoa văn, chi tiết: Một màu, trang trí kim loại</li><li>Kích thước (dài x rộng x cao)19 x 3.2 x 9.8 cm</li><li>Kiểu khóa: nút bấm</li><li>Số ngăn 2 ngăn lớn, 3 ngăn nhỏ, 10 ngăn đựng thẻ</li><li>Kích cỡ: Trung bình</li><li>Phù hợp sử dụng: Đi tiệc, sử dụng hàng ngày</li></ul>', 4, 0, 1, '2021-03-27 00:30:47', '2021-03-30 10:18:14'),
(31, 1, 3, 6, 'Đầm len tay dài họa tiết sang trọng', '1617074325anh5.png', 559000, '<ul><li>- Chất liệu : Len dệt cao cấp</li><li>- Màu sắc : Như hình</li><li>- Kích Thước : Freesize phù hợp từ 45kg 65kg | Chiều cao 1m55 - 1m70.</li></ul>', 4, 0, 1, '2021-03-27 00:37:51', '2021-03-30 10:18:45'),
(32, 2, 3, 6, 'Giày oxford nữ chất da siêu chất êm chân - MBS182', '1617074130anh3.png', 169000, '<p>Thương hiệu</p><p>No Brand</p><p>Mũi giày</p><p>Mũi nhọn</p><p>Chất liệu đế</p><p>Chất liệu tổng hợp</p><p>Chất liệu bên trong</p><p>Chất liệu tổng hợp</p><p>Chất liệu bên ngoài</p><p>Chất liệu tổng hợp</p>', 3, 0, 1, '2021-03-27 00:37:51', '2021-03-30 10:15:30'),
(33, 3, 3, 6, 'Đồng hồ Diamond D DM38025IG', '1617073949385-022dlw-1585040495.jpg', 5180000, '<p>Đường kính mặt</p><p><a href=\"javascript://\">26mm</a></p><p>Chống nước</p><p><a href=\"javascript://\">3ATM</a></p><p>Chất liệu mặt</p><p>Kính sapphire</p><p>Năng lượng sử dụng</p><p>Quartz/Pin</p><p>Size dây</p><p>8mm</p><p>Chất liệu dây</p><p>Hợp kim mạ PVD rose gold , đính đá swarovsky</p><p>Chất liệu vỏ</p><p>Hợp kim mạ PVD , đính đá swarovsky</p><p>Kiểu dáng</p><p>Đồng hồ Nữ</p><p>Xuất xứ</p><p>China</p><p>Chế độ bảo hành</p><p>Bảo hành quốc tế&nbsp;<strong>10</strong>&nbsp;năm</p>', 7, 0, 1, '2021-03-27 00:37:51', '2021-03-30 10:12:29'),
(34, 4, 3, 6, 'Đai váy thắt lưng nữ Nutushop kiểu dáng thời trang cá tính chất liệu da thật bản nhỏ hàng cao cấp NT287', '1617073902anh7.png', 240000, '<p><strong>- Chất liệu : da bò&nbsp;</strong></p><p><strong>- Kích thước: 1cm x 100cm&nbsp;</strong></p><p><strong>- Màu sắc: đen&nbsp;</strong></p><p><strong>- Sản xuất: Việt Nam&nbsp;</strong></p><p><strong>- Bảo hành 1 năm&nbsp;</strong></p><p><strong>- Đổi trả trong 15 ngày&nbsp;</strong></p>', 1, 0, 1, '2021-03-27 00:37:51', '2021-03-30 10:11:42'),
(35, 5, 3, 6, 'Ví Dự Tiệc Envelope Vân Cá Sấu Khóa Cài Metallic - WAL 0208 - Màu Hồng Nhạt', '1617073855anh1.png', 545000, '<ul><li>Mã sản phẩm: 1012WAL0208</li><li>Loại sản phẩm: Ví Cầm Tay</li><li>Chất liệu: Da nhân tạo</li><li>Hoa văn, chi tiết: Vân da cá sấu</li><li>Kích thước (dài x rộng x cao)19.1 x 2.3 x 10 cm</li><li>Kiểu khóa: Nút bấm</li><li>Số ngăn 2 ngăn lớn, 3 ngăn nhỏ, 4 ngăn đựng thẻ</li><li>Kích cỡ: Trung bình</li><li>Kiểu ví: Ví dài</li></ul>', 5, 0, 1, '2021-03-27 00:37:51', '2021-03-30 10:10:55'),
(36, 6, 5, 7, 'Vest VB-0312202101 Đen', '1617076043anh1.png', 1445000, '<p><strong>Chất liệu:</strong>&nbsp;28% Rayon, 70% Spun, 2% Spandex</p><p><strong>Kiểu dáng:</strong>&nbsp;Form slimfit ôm vừa người, tôn dáng&nbsp;</p><p><strong>Thiết kế:</strong>&nbsp;Ve áo thiết kế chữ K tinh tế, sang trọng</p><p><strong>Ưu điểm:</strong>&nbsp;Co dãn đàn hồi tốt, bền màu lâu</p>', 0, 0, 1, '2021-03-27 10:11:38', '2021-03-30 10:47:23'),
(37, 8, 5, 7, 'Quần âu nam QB-032701', '1617076511anh5.png', 900000, '<p><strong>Chất liệu:&nbsp;</strong>100%Poly by Nano</p><p><strong>Kiểu dáng:</strong>&nbsp;Ống đứng tôn dáng người mặc</p><p><strong>Thiết kế:</strong>&nbsp;Lót cạp dày chắc chắn. Đảm bảo độ bền mặc lâu không bị mòn rách</p><p><strong>Ưu điểm:</strong>&nbsp;Tại phần mở rộng quần Biluxury có&nbsp;vải dư nhiều hơn các nhãn hàng khác,&nbsp;tối đa 2,5cm cả vòng mông, thoải mái điều chỉnh</p>', 0, 0, 1, '2021-03-27 10:11:38', '2021-03-30 10:55:11'),
(38, 6, 5, 8, 'Vest VB-0312202102 Xanh Đen', '1617076610anh2.png', 1499000, '<p><strong>Chất liệu:</strong>&nbsp;28% Rayon, 70% Spun, 2% Spandex</p><p><strong>Kiểu dáng:</strong>&nbsp;Form slimfit ôm vừa người, tôn dáng&nbsp;</p><p><strong>Thiết kế:</strong>&nbsp;Ve áo thiết kế chữ K tinh tế, sang trọng</p><p><strong>Ưu điểm:</strong>&nbsp;Co dãn đàn hồi tốt, bền màu lâu</p>', 0, 0, 1, '2021-03-27 10:17:14', '2021-03-30 10:56:50'),
(39, 8, 5, 8, 'Vest VB-0312202102 Xanh Đen', '1617076537anh4.png', 1500000, '<p><strong>Chất liệu:&nbsp;</strong>100%Poly by Nano</p><p><strong>Kiểu dáng:</strong>&nbsp;Ống đứng tôn dáng người mặc</p><p><strong>Thiết kế:</strong>&nbsp;Lót cạp dày chắc chắn. Đảm bảo độ bền mặc lâu không bị mòn rách</p><p><strong>Ưu điểm:</strong>&nbsp;Tại phần mở rộng quần Biluxury có&nbsp;vải dư nhiều hơn các nhãn hàng khác,&nbsp;tối đa 2,5cm cả vòng mông, thoải mái điều chỉnh</p>', 0, 0, 1, '2021-03-27 10:17:14', '2021-03-30 10:55:37'),
(40, 6, 5, 9, 'Vest VB-0312202103 Xanh navy', '1617076636anh3.png', 1800000, '<p><strong>Chất liệu:</strong>&nbsp;28% Rayon, 70% Spun, 2% Spandex</p><p><strong>Kiểu dáng:</strong>&nbsp;Form slimfit ôm vừa người, tôn dáng&nbsp;</p><p><strong>Thiết kế:</strong>&nbsp;Ve áo thiết kế chữ K tinh tế, sang trọng</p><p><strong>Ưu điểm:</strong>&nbsp;Co dãn đàn hồi tốt, bền màu lâu</p>', 0, 0, 1, '2021-03-27 10:23:14', '2021-03-30 10:57:16'),
(41, 8, 5, 9, 'Quần Âu QAB-032703', '1617076558anh8.png', 1500000, '<p><strong>Chất liệu:&nbsp;</strong>100%Poly by Nano</p><p><strong>Kiểu dáng:</strong>&nbsp;Ống đứng tôn dáng người mặc</p><p><strong>Thiết kế:</strong>&nbsp;Lót cạp dày chắc chắn. Đảm bảo độ bền mặc lâu không bị mòn rách</p><p><strong>Ưu điểm:</strong>&nbsp;Tại phần mở rộng quần Biluxury có&nbsp;vải dư nhiều hơn các nhãn hàng khác,&nbsp;tối đa 2,5cm cả vòng mông, thoải mái điều chỉnh</p>', 0, 0, 1, '2021-03-27 10:23:14', '2021-03-30 10:56:00'),
(43, 7, 5, NULL, 'Sơ Mi Công Sở SMB032701', '1617076802ao-so-mi-cong-so-nam-a03-3-1-.jpg', 1400000, '<p><strong>Chất liệu:</strong>&nbsp;88% Poly, 12% Moadal thoáng khí, mềm mát</p><p><strong>Kiểu dáng:</strong>&nbsp;Body fit ôm người, tôn dáng, nổi bật ưu điểm cơ thể</p><p><strong>Thiết kế:</strong>&nbsp;Tỉ mỉ trên từng chi tiết,&nbsp;màu sắc của khuy áo và đường chỉ cần phải phù hợp với màu của &nbsp;vải 100%</p><p><strong>Ưu điểm:</strong>&nbsp;Số lượng kim trên áo somi của Bi là 8 mũi/ 1 cm.&nbsp;<strong>Gấp 2 lần</strong>&nbsp;so với sơ mi ngoài thị trường</p>', 0, 0, 1, '2021-03-27 10:29:07', '2021-03-30 11:00:02'),
(44, 7, 5, NULL, 'Sơ Mi Công Sở SMB032702', '1617076587anh4.png', 1300000, '<p><strong>Thiết kế:</strong><br>Sản phẩm có đường chỉ may tỉ mỉ, tinh tế.</p><p>Thiết kể kiểu sơ mi cổ điển với cổ đức, dáng ôm sát. Áo sơ mi đơn giản, dễ mặc, dễ kết hợp với nhiều kiểu trang phục khác nhau</p><p><strong>Mục đích sử dụng:</strong><br>Áo sơ mi là lựa chọn hàng đầu cho bạn đi làm, đi học, đi chơi, sử dụng trong lễ cưới hay đi sự kiện kết hợp cùng vest,....&nbsp;mang đến một hình ảnh soái ca gọn gàng, chỉnh chu, sang trọng và nam tính quyến rũ.&nbsp;</p>', 0, 0, 1, '2021-03-27 10:30:46', '2021-03-30 10:56:27'),
(45, 7, 5, NULL, 'Sơ Mi Công Sở SMB032703', '16168159523.png', 1299000, '<p><strong>Thiết kế:</strong><br>Sản phẩm có đường chỉ may tỉ mỉ, tinh tế.</p><p>Thiết kể kiểu sơ mi cổ điển với cổ đức, dáng ôm sát. Áo sơ mi đơn giản, dễ mặc, dễ kết hợp với nhiều kiểu trang phục khác nhau</p><p><strong>Mục đích sử dụng:</strong><br>Áo sơ mi là lựa chọn hàng đầu cho bạn đi làm, đi học, đi chơi, sử dụng trong lễ cưới hay đi sự kiện kết hợp cùng vest,....&nbsp;mang đến một hình ảnh soái ca gọn gàng, chỉnh chu, sang trọng và nam tính quyến rũ.&nbsp;</p>', 0, 0, 1, '2021-03-27 10:32:32', '2021-03-27 10:33:03'),
(46, 7, 5, NULL, 'Sơ Mi Công Sở SMB032704', '1617076473l-094438-dong-phuc-cong-so-nam-02.jpg', 999000, '<p><strong>Thiết kế:</strong><br>Sản phẩm có đường chỉ may tỉ mỉ, tinh tế.</p><p>Thiết kể kiểu sơ mi cổ điển với cổ đức, dáng ôm sát. Áo sơ mi đơn giản, dễ mặc, dễ kết hợp với nhiều kiểu trang phục khác nhau</p><p><strong>Mục đích sử dụng:</strong><br>Áo sơ mi là lựa chọn hàng đầu cho bạn đi làm, đi học, đi chơi, sử dụng trong lễ cưới hay đi sự kiện kết hợp cùng vest,....&nbsp;mang đến một hình ảnh soái ca gọn gàng, chỉnh chu, sang trọng và nam tính quyến rũ.&nbsp;</p>', 0, 0, 1, '2021-03-27 10:33:51', '2021-03-30 10:54:33'),
(47, 7, 5, NULL, 'Sơ Mi Công Sở SMB032705', '1617076447anh4.png', 1000000, '<p><strong>Thiết kế:</strong><br>Sản phẩm có đường chỉ may tỉ mỉ, tinh tế.</p><p>Thiết kể kiểu sơ mi cổ điển với cổ đức, dáng ôm sát. Áo sơ mi đơn giản, dễ mặc, dễ kết hợp với nhiều kiểu trang phục khác nhau</p><p><strong>Mục đích sử dụng:</strong><br>Áo sơ mi là lựa chọn hàng đầu cho bạn đi làm, đi học, đi chơi, sử dụng trong lễ cưới hay đi sự kiện kết hợp cùng vest,....&nbsp;mang đến một hình ảnh soái ca gọn gàng, chỉnh chu, sang trọng và nam tính quyến rũ.&nbsp;</p>', 0, 0, 1, '2021-03-27 10:34:45', '2021-03-30 10:54:07'),
(48, 6, 5, 10, 'Vest VB-0802202104 Nâu Nhạt', '1617076393anh2.png', 1800000, '<p><strong>Chất liệu:</strong>&nbsp;28% Rayon, 70% Spun, 2% Spandex</p><p><strong>Kiểu dáng:</strong>&nbsp;Form slimfit ôm vừa người, tôn dáng&nbsp;</p><p><strong>Thiết kế:</strong>&nbsp;Ve áo thiết kế chữ K tinh tế, sang trọng</p><p><strong>Ưu điểm:</strong>&nbsp;Co dãn đàn hồi tốt, bền màu lâu</p>', 0, 0, 1, '2021-03-27 10:39:08', '2021-03-30 10:53:13'),
(49, 8, 5, 10, 'Quần Âu Nam QAB-032705', '1617076359anh-6.png', 1500000, '<p><strong>Chất liệu:&nbsp;</strong>100%Poly by Nano</p><p><strong>Kiểu dáng:</strong>&nbsp;Ống đứng tôn dáng người mặc</p><p><strong>Thiết kế:</strong>&nbsp;Lót cạp dày chắc chắn. Đảm bảo độ bền mặc lâu không bị mòn rách</p><p><strong>Ưu điểm:</strong>&nbsp;Tại phần mở rộng quần Biluxury có&nbsp;vải dư nhiều hơn các nhãn hàng khác,&nbsp;tối đa 2,5cm cả vòng mông, thoải mái điều chỉnh</p>', 0, 0, 1, '2021-03-27 10:39:08', '2021-03-30 10:52:39'),
(51, 9, 5, NULL, 'Cà Vạt CV-032702', '1616816588CV031915.png', 699000, '<p><strong>CHI TIẾT:</strong></p><p>- Cà vạt nam bản nhỏ thời thượng, phù hợp với nhiều đối tượng trong những hoàn cảnh khác nhau.</p><p>- Thiết kế hiệu ứng mặt biển đầy ấn tượng, mang đến diện mạo nổi bật và thời trang cho người mặc.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu 100% Polyester mang đến độ bóng sắc nét, không bị bai dão, luôn bền màu. Cà vạt có khả năng chống bám bụi, chống nhăn, hạn chế thấm nước, độ bền cao.</p>', 0, 0, 1, '2021-03-27 10:43:08', '2021-03-27 10:53:13'),
(52, 9, 5, NULL, 'Cà Vạt CV-032703', '1617076837dBxjhYG6ecLpMKsmTyHP.jpg', 549000, '<p><strong>CHI TIẾT:</strong></p><p>- Cà vạt nam bản nhỏ thời thượng, phù hợp với nhiều đối tượng trong những hoàn cảnh khác nhau.</p><p>- Thiết kế hiệu ứng mặt biển đầy ấn tượng, mang đến diện mạo nổi bật và thời trang cho người mặc.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu 100% Polyester mang đến độ bóng sắc nét, không bị bai dão, luôn bền màu. Cà vạt có khả năng chống bám bụi, chống nhăn, hạn chế thấm nước, độ bền cao.</p>', 0, 0, 1, '2021-03-27 10:43:49', '2021-03-30 11:00:37'),
(53, 9, 5, NULL, 'Cà Vạt CV-032704', '1617076820cavat-xanh-caro-717x1024.jpg', 549000, '<p><strong>CHI TIẾT:</strong></p><p>- Cà vạt nam bản nhỏ thời thượng, phù hợp với nhiều đối tượng trong những hoàn cảnh khác nhau.</p><p>- Thiết kế hiệu ứng mặt biển đầy ấn tượng, mang đến diện mạo nổi bật và thời trang cho người mặc.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu 100% Polyester mang đến độ bóng sắc nét, không bị bai dão, luôn bền màu. Cà vạt có khả năng chống bám bụi, chống nhăn, hạn chế thấm nước, độ bền cao.</p>', 0, 0, 1, '2021-03-27 10:44:45', '2021-03-30 11:00:20'),
(54, 9, 5, NULL, 'Cà Vạt CV-032705', '1617040120IMG-E4617-300x366.jpg', 499000, '<p><strong>CHI TIẾT:</strong></p><p>- Cà vạt nam bản nhỏ thời thượng, phù hợp với nhiều đối tượng trong những hoàn cảnh khác nhau.</p><p>- Thiết kế hiệu ứng mặt biển đầy ấn tượng, mang đến diện mạo nổi bật và thời trang cho người mặc.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu 100% Polyester mang đến độ bóng sắc nét, không bị bai dão, luôn bền màu. Cà vạt có khả năng chống bám bụi, chống nhăn, hạn chế thấm nước, độ bền cao.</p>', 0, 0, 1, '2021-03-27 10:46:01', '2021-03-30 00:48:40'),
(55, 10, 6, NULL, 'Thắt lưng da nam ARTL22701', '1617076297day-lung-nam-da-bo-mat-khoa-truot-d890-13v-2-370x370.jpg', 549000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu xanh navy thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ chrome trẻ trung với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 10:47:28', '2021-03-30 10:51:37'),
(56, 10, 6, NULL, 'Thắt lưng da nam ARTL22702', '1617076233day-lung-quan-tay-khoa-lan-d590-1107d-den-van-370x370.jpg', 1500000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu nâu thiết kế tối giản. Bề mặt dập vân da voi mạnh mẽ , mặt dưới da nubuck cao cấp mềm mịn.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18K sang trọng với logo Aristino tinh tế. Mặt kim đơn giản và chắc chắn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 10:49:00', '2021-03-30 10:50:33'),
(57, 10, 6, NULL, 'Thắt lưng da nam ARTL22703', '1617076270that-lung-da-bo-nam-d590-1163-10b-nau-van-370x370.jpg', 1000000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 10:51:10', '2021-03-30 10:51:10'),
(58, 10, 6, NULL, 'Thắt lưng da nam ARTL22704', '1617076249day-lung-nam-cho-quan-jean-djlahy-015-v-1-370x370.jpg', 1499000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 10:51:43', '2021-03-30 10:50:49'),
(59, 10, 6, NULL, 'Thắt lưng da nam ARTL22705', '1617039925b63bcb4d17da705331ac96b2bb35b551.jpg', 1499000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 10:52:11', '2021-03-30 00:45:25'),
(60, 10, 6, NULL, 'Thắt lưng da nam ARTL22706', '1617039880anh5.png', 1499000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 11:03:16', '2021-03-30 00:44:40'),
(61, 10, 6, NULL, 'Thắt lưng da nam ARTL22706', '1617039909anh8.png', 1499000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 11:03:23', '2021-03-30 00:45:09'),
(62, 10, 6, NULL, 'Thắt lưng da nam ARTL22707', '1617039893anh1.png', 1800000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 11:05:00', '2021-03-30 00:44:53'),
(63, 10, 6, NULL, 'Thắt lưng da nam ARTL22708', '1617039868anh2.png', 1600000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 11:05:49', '2021-05-15 17:03:20'),
(64, 10, 6, NULL, 'Thắt lưng da nam ARTL22709', '1617039833anh1.png', 1400000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p><p>&nbsp;</p>', 0, 0, 1, '2021-03-27 11:08:09', '2021-03-30 00:43:53'),
(65, 10, 6, NULL, 'Thắt lưng da nam ARTL22710', '1617039563anh2.png', 899000, '<p><strong>CHI TIẾT:</strong></p><p>- Thắt lưng da màu đen thiết kế tối giản. Bề mặt dập vân da cá sấu đẳng cấp, mặt sau da rugato bền đẹp, hạn chế trầy xước và thấm nước.</p><p>- Bản dây 32mm thanh mảnh dễ kết hợp với trang phục công sở.</p><p>- Mặt thép không rỉ mạ vàng 18k sang trọng với logo Aristino tinh tế. Mặt kim đơn giản, chắc chắn với kết cấu xoay đặc biệt có thể chuyển đổi nhanh giữa hai mặt dây giúp phối đồ linh hoạt hơn.</p><p><strong>CHẤT LIỆU:</strong></p><p>- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, không xảy ra hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, bền chắc và mềm mại hơn sau thời gian dài sử dụng.</p>', 0, 0, 1, '2021-03-27 11:17:14', '2021-03-30 00:39:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_sets`
--

CREATE TABLE `tbl_product_sets` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name_sets` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tên bộ đồ',
  `image_sets` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ảnh bộ đồ',
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` tinyint(4) NOT NULL,
  `views` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_sets`
--

INSERT INTO `tbl_product_sets` (`id`, `brand_id`, `product_name_sets`, `image_sets`, `price`, `description`, `sale`, `views`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'Đồ công sở nữ 2', '1617073703banner.jpg', 31075000, '<p>Set đồ vest công sở này của QUEEN Fashion Eva&nbsp;đi kèm với quần âu cùng chất liệu đáp ứng yêu cầu của nhiều quý khách hàng là giáo viên, công chức làm việc trong môi trường công sở “khắt khe” về trang phục. Mẫu quần âu cũng được thiết kế khá trẻ trung với kiểu ôm đùi và ống dưới bo gọn kết hợp đẹp với giày cao gót.</p>', 5, 0, 4, '2021-03-27 00:08:06', '2021-03-30 10:08:23'),
(4, 2, 'Đồ công sở nữ 3', '1617073720banner3.jpg', 48989000, '<p>Dù có là một tín đồ thời trang bắt kịp từng xu hướng của mỗi mùa thì đôi lúc nàng vẫn rơi vào trường hợp không biết diện gì cho hợp với môi trường, thời tiết hay tâm trạng. Đặc biệt các nàng công sở sẽ hay gặp tình huống này nhất. Hiểu được điều này, MARC sẽ đơn giản hóa việc chọn đồ cho nàng bằng cách chọn ra 10 set đồ&nbsp;<strong>thời trang nữ công sở</strong>&nbsp;tiêu biểu nhất để giới thiệu. Điều này sẽ tối ưu hóa thời gian chọn và phối đồ cho các nàng, đồng thời cho nàng những gợi ý hay ho để thiên biến vạn hóa cùng các items công sở quen thuộc.</p>', 9, 0, 3, '2021-03-27 00:16:10', '2021-03-30 10:08:40'),
(5, 3, 'Đồ công sở nữ 4', '1617073731banner4.jpg', 28757000, '<p>Cách phối này cũng không hề đòi hỏi nàng phải cao tay hay đầu tư công sức. Nàng công sở nào hẳn cũng sở hữu áo sơ mi và chân váy bút chì, thế thì cứ thoải mái phối chúng với nhau và chọn thêm vài phụ kiện đi kèm phù hợp, nàng sẽ dễ dàng có ngay trang phục đi làm thật đẹp và chỉn chu. Nếu chán chân váy bút chì bình thường, nàng hãy chọn chân váy dáng đắp chéo kẻ ô như gợi ý của MARC, tổng thể sẽ có điểm nhấn và thú vị hơn đấy.&nbsp;</p>', 5, 0, 4, '2021-03-27 00:30:47', '2021-03-30 10:08:51'),
(6, 3, 'Đồ công sở nữ 5', '1617073743banner5.jpg', 25973000, '<p>Chân váy bút chì tuy tôn dáng hiệu quả song không phải lúc nào cũng khiến người mặc thấy thoải mái, nhất là khi di chuyển, vậy nên MARC gợi ý là đôi khi nàng nên thử chuyển sang chân váy midi dáng xòe. Cách kết hợp áo sơ mi và chân váy dáng xòe khiến phong cách&nbsp;<strong>thời trang nữ công sở</strong>&nbsp;của nàng có phần nhẹ nhàng, nữ tính, đặc biệt outfit này là lựa chọn lý tưởng cho các nàng điệu. Những cô nàng không tự tin với đôi chân của mình cũng có thể chọn cách phối này để che đi khuyết điểm ở chân. Đồng thời với độ xòe nhẹ nhàng của mình, mẫu chân váy này có thể giúp nàng giấu đi phần nào chỗ bụng dưới kém thon gọn nếu nàng sở hữu cơ thể mũm mĩm.</p>', 0, 0, 1, '2021-03-27 00:37:51', '2021-03-30 10:09:03'),
(7, 5, 'Set đồ công sở SCS22701', '1616814698VESTBI-22701.png', 7035000, '<p><strong>Chất liệu:</strong></p><p>Mặt vải dày dặn, ít nhăn nhàu, mềm mát, thoáng khí, co giãn nhẹ tạo cảm giác thoải mái, khỏe khoắn khi mặc và áo&nbsp;vest lên chuẩn form</p><p><strong>Kiểu dáng:</strong></p><p>Kiểu dáng slimfit, trẻ trung – lịch lãm – sang trọng,&nbsp;Form vest&nbsp;ôm vừa phải gọn gàng và lịch lãm</p><p><strong>Thiết kế:</strong><br>Sản phẩm có đường chỉ may tỉ mỉ, tinh tế.Thiết kế ôm dáng, tôn body, 2 túi trước có nắp túi, có 1 cúc cài. Các phụ kiện từ chỉ may đến khuy đều được chọn lựa tinh tế, phối màu hoàn hảo cho một bộ Vest đẳng cấp.</p><p><strong>Mục đích sử dụng:</strong><br>Áo vest mang đến một hình ảnh chỉnh chu, sang trọng và nam tính quyến rũ. Và bạn có thể sử dụng vest trong nhiều hoàn cảnh khác nhau như: Lễ cưới, sự kiện, tham gia tiệc, đi làm,hẹn hò.... hay bất kỳ lúc cần có phong thái đỉnh cao, chuyên nghiệp</p>', 0, 0, 3, '2021-03-27 10:11:38', '2021-03-27 10:12:04'),
(8, 5, 'Set đồ công sở SCS22702', '1616815442VESTBI-22702.png', 8997000, '<p><strong>Chất liệu:</strong></p><p>Mặt vải dày dặn, ít nhăn nhàu, mềm mát, thoáng khí, co giãn nhẹ tạo cảm giác thoải mái, khỏe khoắn khi mặc và áo&nbsp;vest lên chuẩn form</p><p><strong>Kiểu dáng:</strong></p><p>Kiểu dáng slimfit, trẻ trung – lịch lãm – sang trọng,&nbsp;Form vest&nbsp;ôm vừa phải gọn gàng và lịch lãm</p><p><strong>Thiết kế:</strong><br>Sản phẩm có đường chỉ may tỉ mỉ, tinh tế.Thiết kế ôm dáng, tôn body, 2 túi trước có nắp túi, có 1 cúc cài. Các phụ kiện từ chỉ may đến khuy đều được chọn lựa tinh tế, phối màu hoàn hảo cho một bộ Vest đẳng cấp.</p><p><strong>Mục đích sử dụng:</strong><br>Áo vest mang đến một hình ảnh chỉnh chu, sang trọng và nam tính quyến rũ. Và bạn có thể sử dụng vest trong nhiều hoàn cảnh khác nhau như: Lễ cưới, sự kiện, tham gia tiệc, đi làm,hẹn hò.... hay bất kỳ lúc cần có phong thái đỉnh cao, chuyên nghiệp</p>', 0, 0, 3, '2021-03-27 10:17:14', '2021-03-27 10:24:02'),
(9, 5, 'Set đồ công sở SCS22703', '1616815394VESTBI-22703.png', 9900000, '<p><strong>Chất liệu:</strong></p>\r\n\r\n<p>Mặt vải d&agrave;y dặn, &iacute;t nhăn nh&agrave;u, mềm m&aacute;t, tho&aacute;ng kh&iacute;, co gi&atilde;n nhẹ tạo cảm gi&aacute;c thoải m&aacute;i, khỏe khoắn khi mặc v&agrave; &aacute;o&nbsp;vest l&ecirc;n chuẩn form</p>\r\n\r\n<p><strong>Kiểu d&aacute;ng:</strong></p>\r\n\r\n<p>Kiểu d&aacute;ng slimfit, trẻ trung &ndash; lịch l&atilde;m &ndash; sang trọng,&nbsp;Form vest&nbsp;&ocirc;m vừa phải gọn g&agrave;ng v&agrave; lịch l&atilde;m</p>\r\n\r\n<p><strong>Thiết kế:</strong><br />\r\nSản phẩm c&oacute; đường chỉ may tỉ mỉ, tinh tế.Thiết kế &ocirc;m d&aacute;ng, t&ocirc;n body, 2 t&uacute;i trước c&oacute; nắp t&uacute;i, c&oacute; 1 c&uacute;c c&agrave;i. C&aacute;c phụ kiện từ chỉ may đến khuy đều được chọn lựa tinh tế, phối m&agrave;u ho&agrave;n hảo cho một bộ Vest đẳng cấp.</p>\r\n\r\n<p><strong>Mục đ&iacute;ch sử dụng:</strong><br />\r\n&Aacute;o vest mang đến một h&igrave;nh ảnh chỉnh chu, sang trọng v&agrave; nam t&iacute;nh quyến rũ. V&agrave; bạn c&oacute; thể sử dụng vest trong nhiều ho&agrave;n cảnh kh&aacute;c nhau như: Lễ cưới, sự kiện, tham gia tiệc, đi l&agrave;m,hẹn h&ograve;.... hay bất kỳ l&uacute;c cần c&oacute; phong th&aacute;i đỉnh cao, chuy&ecirc;n nghiệp</p>\r\n', 0, 0, 1, '2021-03-27 10:23:14', '2021-03-27 10:23:14'),
(10, 5, 'Set đồ công sở SCS22705', '1616816348VESTBI-22705.png', 9900000, '<p><strong>Chất liệu:</strong></p>\r\n\r\n<p>Mặt vải d&agrave;y dặn, &iacute;t nhăn nh&agrave;u, mềm m&aacute;t, tho&aacute;ng kh&iacute;, co gi&atilde;n nhẹ tạo cảm gi&aacute;c thoải m&aacute;i, khỏe khoắn khi mặc v&agrave; &aacute;o&nbsp;vest l&ecirc;n chuẩn form</p>\r\n\r\n<p><strong>Kiểu d&aacute;ng:</strong></p>\r\n\r\n<p>Kiểu d&aacute;ng slimfit, trẻ trung &ndash; lịch l&atilde;m &ndash; sang trọng,&nbsp;Form vest&nbsp;&ocirc;m vừa phải gọn g&agrave;ng v&agrave; lịch l&atilde;m</p>\r\n\r\n<p><strong>Thiết kế:</strong><br />\r\nSản phẩm c&oacute; đường chỉ may tỉ mỉ, tinh tế.Thiết kế &ocirc;m d&aacute;ng, t&ocirc;n body, 2 t&uacute;i trước c&oacute; nắp t&uacute;i, c&oacute; 1 c&uacute;c c&agrave;i. C&aacute;c phụ kiện từ chỉ may đến khuy đều được chọn lựa tinh tế, phối m&agrave;u ho&agrave;n hảo cho một bộ Vest đẳng cấp.</p>\r\n\r\n<p><strong>Mục đ&iacute;ch sử dụng:</strong><br />\r\n&Aacute;o vest mang đến một h&igrave;nh ảnh chỉnh chu, sang trọng v&agrave; nam t&iacute;nh quyến rũ. V&agrave; bạn c&oacute; thể sử dụng vest trong nhiều ho&agrave;n cảnh kh&aacute;c nhau như: Lễ cưới, sự kiện, tham gia tiệc, đi l&agrave;m,hẹn h&ograve;.... hay bất kỳ l&uacute;c cần c&oacute; phong th&aacute;i đỉnh cao, chuy&ecirc;n nghiệp</p>\r\n', 0, 0, 1, '2021-03-27 10:39:08', '2021-03-27 10:39:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_program_sell`
--

CREATE TABLE `tbl_program_sell` (
  `id` int(11) NOT NULL,
  `rose_id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề chương trình',
  `rose_old` float NOT NULL,
  `rose_new` float NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mô tả',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_program_sell`
--

INSERT INTO `tbl_program_sell` (`id`, `rose_id`, `image`, `title`, `rose_old`, `rose_new`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1616818309dam-co-tron-tay-coc-15.jpg', 'Những mẫu đầm xòe trơn màu hot trend hè 2021', 3, 10, '<p>hihihih</p>', 1, '2021-03-27 11:11:49', '2021-03-27 11:11:49'),
(2, 2, '1616818352ao-thun-coc-tay-01.jpg', 'Viết cho tuổi đôi mươi', 3, 6, '<p>hahahahah</p>', 1, '2021-03-27 11:12:32', '2021-03-27 11:12:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `rate` tinyint(1) NOT NULL COMMENT 'số sao max = 5',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ratio_rose`
--

CREATE TABLE `tbl_ratio_rose` (
  `id` int(11) NOT NULL,
  `cate_pro_id` int(11) NOT NULL,
  `rose_old` float NOT NULL,
  `rose_new` float NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ratio_rose`
--

INSERT INTO `tbl_ratio_rose` (`id`, `cate_pro_id`, `rose_old`, `rose_new`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 10, 1, '2021-03-27 11:11:08', '2021-03-27 11:11:08'),
(2, 2, 3, 6, 1, '2021-03-27 11:11:16', '2021-03-27 11:11:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_referal`
--

CREATE TABLE `tbl_referal` (
  `id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `affiliate_code` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_referal`
--

INSERT INTO `tbl_referal` (`id`, `affiliate_id`, `program_id`, `affiliate_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1_2_qZpGHutgndy2YaJ4', 1, '2021-03-27 11:39:51', '2021-03-27 11:39:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slides`
--

CREATE TABLE `tbl_slides` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_slide` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_status_order`
--

CREATE TABLE `tbl_status_order` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'quyền hạn',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `avatar`, `email`, `phone`, `address`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '1616772703lap-trinh-vien.jpg', 'admin001@gmail.com', '0385522987', 'Hà Nội', 'ef3c5ba2f1b82cf5b11c21615f193e60', 0, 1, '2021-03-26 22:31:43', '2021-03-26 22:31:43'),
(2, 'Hoang Bug', '1616773745lap-trinh-vien.jpg', 'hoangbug123@gmail.com', '0946825001', 'Hà Nội', '43cca4b3de2097b9558efefd0ecc3588', 0, 1, '2021-03-26 22:49:05', '2021-03-26 22:49:05'),
(3, 'Admin', '1616773988lap-trinh-vien.jpg', 'admin002@gmail.com', '0972593950', 'Hà Nội', 'dfe0f87e03262877516fcd13224c59c8', 0, 1, '2021-03-26 22:53:08', '2021-03-26 22:53:08'),
(4, 'Admin', '1616774373lap-trinh-vien.jpg', 'admin003@gmail.com', '0946822205', 'Hà Nội', 'dfe0f87e03262877516fcd13224c59c8', 0, 1, '2021-03-26 22:59:33', '2021-03-26 22:59:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_affiliate_partner`
--
ALTER TABLE `tbl_affiliate_partner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cate_blog` (`cate_blog_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category_blogs`
--
ALTER TABLE `tbl_category_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category_products`
--
ALTER TABLE `tbl_category_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_change_code`
--
ALTER TABLE `tbl_change_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_category` (`cate_id`);

--
-- Chỉ mục cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_product` (`product_id`),
  ADD KEY `comment_member` (`member_id`);

--
-- Chỉ mục cho bảng `tbl_comments_detail`
--
ALTER TABLE `tbl_comments_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_comment` (`comment_id`);

--
-- Chỉ mục cho bảng `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_decentralization_user`
--
ALTER TABLE `tbl_decentralization_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_user_decen` (`user_id`),
  ADD KEY `constraint_decen_user` (`decentralization_id`);

--
-- Chỉ mục cho bảng `tbl_detail_images`
--
ALTER TABLE `tbl_detail_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_detail_orders`
--
ALTER TABLE `tbl_detail_orders`
  ADD KEY `fk_order_id` (`order_id`),
  ADD KEY `fk_product_id_detail_order` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_detail_size`
--
ALTER TABLE `tbl_detail_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id_size` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_categoryPro` (`cate_id`),
  ADD KEY `constraint_changeCode` (`change_code`),
  ADD KEY `constraint_user` (`affiliate_id`);

--
-- Chỉ mục cho bảng `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_id_order` (`member_id`);

--
-- Chỉ mục cho bảng `tbl_order_referal`
--
ALTER TABLE `tbl_order_referal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id_referal` (`order_id`),
  ADD KEY `fk_referal_id` (`referal_id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cate_product` (`cate_pro_id`),
  ADD KEY `fk_brand_product` (`brand_id`),
  ADD KEY `fk_sets_product` (`product_sets_id`);

--
-- Chỉ mục cho bảng `tbl_product_sets`
--
ALTER TABLE `tbl_product_sets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_brand_product_sets` (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_program_sell`
--
ALTER TABLE `tbl_program_sell`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_rose` (`rose_id`);

--
-- Chỉ mục cho bảng `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id_rate` (`product_id`),
  ADD KEY `fk_member_id` (`member_id`);

--
-- Chỉ mục cho bảng `tbl_ratio_rose`
--
ALTER TABLE `tbl_ratio_rose`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cate_product_rose` (`cate_pro_id`);

--
-- Chỉ mục cho bảng `tbl_referal`
--
ALTER TABLE `tbl_referal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_id` (`affiliate_id`),
  ADD KEY `fk_program_id` (`program_id`);

--
-- Chỉ mục cho bảng `tbl_slides`
--
ALTER TABLE `tbl_slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_status_order`
--
ALTER TABLE `tbl_status_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_affiliate_partner`
--
ALTER TABLE `tbl_affiliate_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_category_blogs`
--
ALTER TABLE `tbl_category_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category_products`
--
ALTER TABLE `tbl_category_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_change_code`
--
ALTER TABLE `tbl_change_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_comments_detail`
--
ALTER TABLE `tbl_comments_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_decentralization`
--
ALTER TABLE `tbl_decentralization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_decentralization_user`
--
ALTER TABLE `tbl_decentralization_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_images`
--
ALTER TABLE `tbl_detail_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT cho bảng `tbl_detail_size`
--
ALTER TABLE `tbl_detail_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT cho bảng `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_order_referal`
--
ALTER TABLE `tbl_order_referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `tbl_product_sets`
--
ALTER TABLE `tbl_product_sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_program_sell`
--
ALTER TABLE `tbl_program_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_ratio_rose`
--
ALTER TABLE `tbl_ratio_rose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_referal`
--
ALTER TABLE `tbl_referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_slides`
--
ALTER TABLE `tbl_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_status_order`
--
ALTER TABLE `tbl_status_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD CONSTRAINT `fk_cate_blog` FOREIGN KEY (`cate_blog_id`) REFERENCES `tbl_category_blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_change_code`
--
ALTER TABLE `tbl_change_code`
  ADD CONSTRAINT `constraint_category` FOREIGN KEY (`cate_id`) REFERENCES `tbl_category_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `comment_member` FOREIGN KEY (`member_id`) REFERENCES `tbl_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_comments_detail`
--
ALTER TABLE `tbl_comments_detail`
  ADD CONSTRAINT `detail_comment` FOREIGN KEY (`comment_id`) REFERENCES `tbl_comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_decentralization_user`
--
ALTER TABLE `tbl_decentralization_user`
  ADD CONSTRAINT `constraint_decen_user` FOREIGN KEY (`decentralization_id`) REFERENCES `tbl_decentralization` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_user_decen` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_detail_images`
--
ALTER TABLE `tbl_detail_images`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_detail_orders`
--
ALTER TABLE `tbl_detail_orders`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_id_detail_order` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_detail_size`
--
ALTER TABLE `tbl_detail_size`
  ADD CONSTRAINT `fk_product_id_size` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_gifts`
--
ALTER TABLE `tbl_gifts`
  ADD CONSTRAINT `constraint_categoryPro` FOREIGN KEY (`cate_id`) REFERENCES `tbl_category_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_changeCode` FOREIGN KEY (`change_code`) REFERENCES `tbl_change_code` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_user` FOREIGN KEY (`affiliate_id`) REFERENCES `tbl_affiliate_partner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `fk_member_id_order` FOREIGN KEY (`member_id`) REFERENCES `tbl_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order_referal`
--
ALTER TABLE `tbl_order_referal`
  ADD CONSTRAINT `fk_order_id_referal` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_referal_id` FOREIGN KEY (`referal_id`) REFERENCES `tbl_referal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `fk_brand_product` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cate_product` FOREIGN KEY (`cate_pro_id`) REFERENCES `tbl_category_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sets_product` FOREIGN KEY (`product_sets_id`) REFERENCES `tbl_product_sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product_sets`
--
ALTER TABLE `tbl_product_sets`
  ADD CONSTRAINT `fk_brand_product_sets` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_program_sell`
--
ALTER TABLE `tbl_program_sell`
  ADD CONSTRAINT `constraint_rose` FOREIGN KEY (`rose_id`) REFERENCES `tbl_ratio_rose` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `tbl_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_id_rate` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_ratio_rose`
--
ALTER TABLE `tbl_ratio_rose`
  ADD CONSTRAINT `fk_cate_product_rose` FOREIGN KEY (`cate_pro_id`) REFERENCES `tbl_category_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_referal`
--
ALTER TABLE `tbl_referal`
  ADD CONSTRAINT `fk_affiliate_id` FOREIGN KEY (`affiliate_id`) REFERENCES `tbl_affiliate_partner` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_program_id` FOREIGN KEY (`program_id`) REFERENCES `tbl_program_sell` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

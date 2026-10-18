<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuyển dụng | TNP Rénovation Inc. — Montréal</title>
    <meta name="description" content="TNP Rénovation Inc. tuyển 2–3 nhân viên xây dựng tại Montréal. Công việc cải tạo nội thất, nhà bếp, phòng tắm. Liên hệ ứng tuyển trực tiếp.">
    <link rel="icon" type="image/svg+xml" href="favicon.svg?v=tnp-1">
    <link rel="stylesheet" href="assets/css/site.css">
    <link rel="stylesheet" href="assets/css/header.css?v=2">
</head>
<body>
<?php require __DIR__ . '/partials/header.php'; ?>
<main id="main">
    <section class="hero" id="tuyen-dung">
        <div class="container hero-grid">
            <div class="hero-copy"><p class="eyebrow"><span class="status-dot"></span> TNP ĐANG TUYỂN DỤNG · MONTRÉAL</p><h1>Cùng xây dựng<br>những không gian<br><em>tốt đẹp hơn.</em></h1><p class="hero-description">Gia nhập đội ngũ TNP Rénovation. Mang tay nghề của bạn đến những dự án cải tạo nhà ở — và cùng chúng tôi phát triển lâu dài.</p><div class="hero-actions"><a class="button" href="#ung-tuyen">Ứng tuyển ngay <span aria-hidden="true">↗</span></a><a class="text-link" href="#cong-viec">Tìm hiểu công việc <span aria-hidden="true">↓</span></a></div><div class="hero-facts"><div><strong>02–03</strong><span>Nhân viên xây dựng</span></div><div><strong>Trong nhà</strong><span>Cho mùa đông này</span></div><div><strong>Montréal</strong><span>Québec, Canada</span></div></div></div>
            <div class="hero-art"><div class="art-label">YOUR SKILLS. OUR NEXT CHAPTER.</div><a class="poster-link" href="assets/images/business-card.png" target="_blank" rel="noopener" aria-label="Xem danh thiếp TNP đầy đủ"><img src="assets/images/business-card.png" alt="Danh thiếp TNP Rénovation Inc. — Justin Pham, thông tin liên hệ" width="1659" height="948"></a><div class="art-caption"><span>BUILDING BETTER SPACES</span><span>INSIDE & OUT. ↗</span></div></div>
        </div>
    </section>
    <div class="specialties"><div class="container">NHÀ BẾP <span>✦</span> PHÒNG TẮM <span>✦</span> SÀN NHÀ <span>✦</span> HOÀN THIỆN NỘI THẤT</div></div>
    <section class="section container" id="cong-viec"><div class="section-heading"><div><p class="eyebrow">01 / CÔNG VIỆC & TAY NGHỀ</p><h2>Làm tốt từng chi tiết.<br>Tự hào mỗi công trình.</h2></div><p>Chúng tôi tìm kiếm đồng đội tham gia các dự án cải tạo và sửa chữa nhà ở trong nhà, từ thi công đến hoàn thiện.</p></div><div class="work-grid"><?php foreach ($responsibilities as $responsibility): ?><article class="work-item"><span class="number"><?= escapeHtml($responsibility[0]) ?></span><h3><?= escapeHtml($responsibility[1]) ?></h3><p><?= escapeHtml($responsibility[2]) ?></p></article><?php endforeach; ?></div><div class="requirements"><strong>Điều chúng tôi tìm kiếm</strong><p>Biết sử dụng dụng cụ xây dựng, đo đạc chính xác và đảm bảo chất lượng công trình. Ưu tiên ứng viên có kinh nghiệm; TNP cũng chào đón người nghiêm túc, có trách nhiệm và sẵn sàng học hỏi.</p></div></section>
    <section class="benefits-section" id="quyen-loi"><div class="container benefits-grid"><div><p class="eyebrow">02 / CƠ HỘI TẠI TNP</p><h2>Một đội ngũ.<br>Cùng nhau tiến xa.</h2><p>Tay nghề được trân trọng.<br>Nỗ lực có cơ hội phát triển.</p></div><ul class="benefits-list"><?php foreach ($benefits as $benefit): ?><li><span aria-hidden="true">✓</span><?= escapeHtml($benefit) ?></li><?php endforeach; ?></ul></div></section>
    <section class="section container application-section" id="ung-tuyen"><div><p class="eyebrow">03 / GIA NHẬP ĐỘI NGŨ</p><h2>Bắt đầu bằng<br>một cuộc trò chuyện.</h2><p>Chào đón ứng viên mọi quốc tịch. Hãy liên hệ trực tiếp với <?= escapeHtml($company['contact_name']) ?> để trao đổi kinh nghiệm và công việc.</p><div class="notice"><strong>Điều kiện quan trọng</strong><p>Ứng viên phải có giấy phép lao động hợp lệ tại Canada.</p></div></div><div class="contact-card"><span class="contact-label">LIÊN HỆ ỨNG TUYỂN</span><h3><?= escapeHtml($company['contact_name']) ?></h3><a class="phone" href="tel:<?= escapeHtml($company['phone_link']) ?>"><?= escapeHtml($company['phone']) ?> <span aria-hidden="true">↗</span></a><a class="email" href="mailto:<?= escapeHtml($company['email']) ?>?subject=<?= rawurlencode('Ứng tuyển nhân viên xây dựng — TNP Rénovation') ?>"><?= escapeHtml($company['email']) ?></a><p><?= escapeHtml($company['location']) ?></p><a class="button" href="mailto:<?= escapeHtml($company['email']) ?>?subject=<?= rawurlencode('Ứng tuyển nhân viên xây dựng — TNP Rénovation') ?>">Mở email ứng tuyển <span aria-hidden="true">↗</span></a><small>Nút này mở ứng dụng email trên thiết bị của bạn. Bạn có thể đính kèm CV và giới thiệu kinh nghiệm trước khi gửi.</small></div></section>
</main>
<?php require __DIR__ . '/partials/footer.php'; ?>
</body>
</html>

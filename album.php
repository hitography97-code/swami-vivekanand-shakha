<?php

$imageFiles = [];
$imagePatterns = ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.webp', '*.JPG', '*.JPEG', '*.PNG', '*.GIF', '*.WEBP'];

foreach ($imagePatterns as $pattern) {
    $imageFiles = array_merge($imageFiles, glob(__DIR__ . '/images/' . $pattern) ?: []);
}

$imageFiles = array_values(array_unique($imageFiles));
sort($imageFiles, SORT_NATURAL | SORT_FLAG_CASE);

$posterFiles = [];
$photoFiles = [];

foreach ($imageFiles as $imageFile) {
    if (preg_match('/poster|flyer|banner|notice|calendar/i', basename($imageFile))) {
        $posterFiles[] = $imageFile;
    } else {
        $photoFiles[] = $imageFile;
    }
}

$posterDocuments = glob(__DIR__ . '/images/*.{pdf,PDF}', GLOB_BRACE) ?: [];
sort($posterDocuments, SORT_NATURAL | SORT_FLAG_CASE);

?>

<!DOCTYPE html>
<html lang="mr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album - स्वामी विवेकानंद शाखा</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="navbar">
        <div class="logo">
            <img src="images/img.jpg" alt="स्वामी विवेकानंद शाखा" class="brand-logo">
            <span class="brand-name">स्वामी विवेकानंद शाखा</span>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="album.php" aria-current="page">Album</a>
            <a href="monthly_review.php">मासिक आढावा</a>
        </nav>
    </header>

    <main class="album-page">
        <div class="album-heading">
            <span>PHOTO GALLERY</span>
            <h1>शाखा Album</h1>
            <p>शाखेतील आठवणी आणि उपक्रमांचे फोटो</p>
        </div>

        <section class="branch-columns" aria-label="शाखा आणि व्यवस्था प्रमुख माहिती">
            <div class="branch-profile">
                <img src="https://swaroopwardhinee.org/wp-content/uploads/2024/08/Attachment_791559-683x1024.jpg"
                    alt="स्वामी विवेकानंद शाखा">
                <div class="branch-profile-content">
                    <span>शाखा परिचय</span>
                    <h2>स्वामी विवेकानंद शाखा</h2>
                    <p><strong>स्थापना:</strong> ०४ जुलै १९८२</p>
                    <p><strong>संपर्क:</strong> <a href="tel:8055680941">८०५५ ६८ ०९४१</a></p>
                </div>
            </div>

            <div class="branch-profile management-lead">
                <div class="management-avatar">HC</div>
                <div class="branch-profile-content">
                    <span>शाखा प्रमुख</span>
                    <h2>श्री. Hitesh Choudhary</h2>
                    <p>शाखेच्या दैनंदिन व्यवस्था, उपक्रम आणि विद्यार्थ्यांच्या मार्गदर्शनाची जबाबदारी.</p>
                    <p><strong>संपर्क:</strong> <a href="tel:8983932075">८९८३ ९३ २०७५</a></p>
                </div>
            </div>

            <div class="role-card"><span>तासिका प्रमुख</span>
                <h2>नरसिंग कदम</h2>
                <p>शैक्षणिक तासिका आणि शिक्षकांचे व्यवस्थापन.</p>
            </div>
            <div class="role-card"><span>संपर्क प्रमुख</span>
                <h2>राहुल शहाबादी</h2>
                <p>शाळा, पालक आणि वर्धक संपर्काची जबाबदारी.</p>
            </div>
            <div class="role-card"><span>कार्यक्रम प्रमुख</span>
                <h2>स्वयंसूर्यवंशी</h2>
                <p>कार्यक्रम, उपक्रम आणि परिपाठाचे नियोजन.</p>
            </div>
            <div class="role-card"><span>मैदान प्रमुख</span>
                <h2>यश पवार</h2>
                <p>मैदान व्यवस्था, खेळ आणि शारीरिक प्रशिक्षण.</p>
            </div>
        </section>

        <section class="poster-box" aria-label="शाखा पोस्टर संग्रह">
            <div class="album-section-heading">
                <span>POSTER COLLECTION</span>
                <h2>शाखेचे पोस्टर</h2>
                <p>उपक्रम, सूचना आणि कार्यक्रमांची पोस्टर येथे पाहा.</p>
            </div>

            <div class="poster-grid">
                <?php foreach ($posterFiles as $posterFile): ?>
                    <?php
                    $posterName = basename($posterFile);
                    $posterUrl = 'images/' . rawurlencode($posterName);
                    $posterTitle = pathinfo($posterName, PATHINFO_FILENAME);
                    ?>
                    <a class="poster-item" href="<?php echo htmlspecialchars($posterUrl, ENT_QUOTES, 'UTF-8'); ?>"
                        target="_blank" rel="noopener">
                        <img src="<?php echo htmlspecialchars($posterUrl, ENT_QUOTES, 'UTF-8'); ?>"
                            alt="<?php echo htmlspecialchars($posterTitle, ENT_QUOTES, 'UTF-8'); ?>">
                        <strong><?php echo htmlspecialchars($posterTitle, ENT_QUOTES, 'UTF-8'); ?></strong>
                    </a>
                <?php endforeach; ?>

                <?php foreach ($posterDocuments as $posterDocument): ?>
                    <?php
                    $documentName = basename($posterDocument);
                    $documentUrl = 'images/' . rawurlencode($documentName);
                    ?>
                    <a class="poster-item poster-document"
                        href="<?php echo htmlspecialchars($documentUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"
                        rel="noopener">
                        <span class="poster-document-icon">PDF</span>
                        <strong><?php echo htmlspecialchars(pathinfo($documentName, PATHINFO_FILENAME), ENT_QUOTES, 'UTF-8'); ?></strong>
                        <small>पोस्टर उघडा</small>
                    </a>
                <?php endforeach; ?>

                <?php if (!$posterFiles && !$posterDocuments): ?>
                    <p class="poster-empty">Poster files पाहण्यासाठी `images` folder मध्ये poster image किंवा PDF ठेवा.</p>
                <?php endif; ?>
            </div>
        </section>

        <div class="album-section-heading photo-heading">
            <span>PHOTO GALLERY</span>
            <h2>शाखेचे फोटो</h2>
        </div>

        <section class="album-grid" aria-label="शाखा फोटो अल्बम">
            <?php foreach ($photoFiles as $imageFile): ?>
                <?php
                $imageName = basename($imageFile);
                $imageUrl = 'images/' . rawurlencode($imageName);
                $imageTitle = pathinfo($imageName, PATHINFO_FILENAME);
                ?>
                <figure class="album-photo">
                    <a href="<?php echo htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"
                        rel="noopener">
                        <img src="<?php echo htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8'); ?>"
                            alt="<?php echo htmlspecialchars($imageTitle, ENT_QUOTES, 'UTF-8'); ?>">
                    </a>
                    <figcaption><?php echo htmlspecialchars($imageTitle, ENT_QUOTES, 'UTF-8'); ?></figcaption>
                </figure>
            <?php endforeach; ?>

            <a class="album-external" href="https://t.me/vivekanandashakha/1/17" target="_blank"
                rel="noopener noreferrer">
                <span class="album-external-icon">📷</span>
                <strong>Hitesh Choudhary</strong>
                <span>२ फोटो पाहण्यासाठी Telegram post उघडा</span>
                <b>Open photos ↗</b>
            </a>
        </section>
    </main>

    <footer>
        <p>© 2026 स्वामी विवेकानंद शाखा</p>
    </footer>
</body>

</html>
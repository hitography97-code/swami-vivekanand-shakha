<?php

include "db.php";

$student_count = 0;
$present_count = 0;

$result = $conn->query(
    "SELECT COUNT(*) AS total FROM students"
);

if ($result) {
    $student_count =
        $result->fetch_assoc()['total'];
}

$today = date("Y-m-d");

$result = $conn->query(
    "SELECT COUNT(*) AS total
     FROM attendance
     WHERE attendance_date='$today'
     AND status='Present'"
);

if ($result) {
    $present_count =
        $result->fetch_assoc()['total'];
}

?>

<!DOCTYPE html>

<html lang="mr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>स्वामी विवेकानंद शाखा </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arya:wght@400;700&family=Ranga:wght@400;700&family=Tiro+Devanagari+Marathi:ital@0;1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header>

        <div class="logo">

            <img src="https://swaroopwardhinee.org/wp-content/uploads/2024/07/SWA_-ROOPWARDHINEE_LOGO-01-1-300x75.png"
                alt="स्व-रूपवर्धिनी logo" class="brand-logo">

        </div>

        <nav class="main-nav">

            <a href="index.php">Home</a>

            <a href="register.php">
                Student Registration
            </a>

            <a href="students.php">
                Students
            </a>

            <a href="attendance.php">
                Attendance
            </a>

            <a href="study.php">
                Study
            </a>

            <a href="mcq.php">
                MCQ Game 🎮
            </a>

            <a href="monthly_review.php">
                मासिक आढावा
            </a>

            <a href="monthly_review_2.php">
                मासिक आढावा २
            </a>

        </nav>

    </header>


    <section class="hero">

        <div class="hero-content">

            <div class="hero-copy">
                <h1>
                    स्वामी विवेकानंद शाखा
                </h1>

                <p>
                    विद्यार्थ्यांच्या शिक्षण, संस्कार,
                    व्यक्तिमत्त्व विकास आणि सामाजिक
                    जाणीव निर्माण करण्यासाठी कार्यरत.
                </p>

                <p class="hero-verse">
                    रूपरंग वा असो गंधही | यातील माझे काहीच नाही |
                    श्रेयाचा मज नको लेशही | निर्माल्यात विरावे ||
                </p>

                <a class="btn" href="register.php">

                    विद्यार्थी नोंदणी करा

                </a>
            </div>

            <img src="images/img.jpg" alt="Swami Vivekananda" class="hero-portrait">

            <img src="images/sticker.png" class="sticker" alt="Sticker" onerror="this.hidden = true;">

        </div>

    </section>

    <section class="stats" aria-label="शाखा आकडेवारी">

        <div class="card">

            <h2>
                <?php echo $student_count; ?>
            </h2>

            <p>
                नोंदणीकृत विद्यार्थी
            </p>

        </div>


        <div class="card">

            <h2>
                <?php echo $present_count; ?>
            </h2>

            <p>
                आजची उपस्थिती
            </p>

        </div>


        <div class="card">

            <h2>
                1982
            </h2>

            <p>
                शाखा स्थापना
            </p>

        </div>

    </section>

    <section class="instagram-panel">

        <div class="insta-link-box">

            <span class="insta-label">Instagram</span>

            <a href="https://www.instagram.com/swami_vivekanand_shakha/" target="_blank" rel="noreferrer">
                swami_vivekanand_shakha
            </a>

        </div>

    </section>

    <section class="youtube-section">

        <div class="youtube-header">
            <h2>Our YouTube Videos</h2>
        </div>

        <div class="youtube-box">

            <a class="youtube-thumb-link" href="https://youtu.be/agFEmGUZ4xo?t=164" target="_blank" rel="noreferrer">
                <img class="youtube-thumb" src="https://img.youtube.com/vi/agFEmGUZ4xo/maxresdefault.jpg"
                    alt="YouTube video preview">
            </a>

            <div class="youtube-info">
                <p>
                    स्नेह, सेवा आणि संस्कार यांचा प्रवाह दाखवणारे कार्यक्रम, उपक्रम आणि व्हिडिओ
                    बघण्यासाठी या YouTube व्हिडिओवर भेट द्या.
                </p>

                <a href="https://youtu.be/agFEmGUZ4xo?t=164" target="_blank" rel="noreferrer">
                    Watch on YouTube
                </a>

                <span class="youtube-meta">Official YouTube Video</span>
            </div>

        </div>

    </section>


    <section class="home-menu">

        <h2>
            विद्यार्थी विभाग
        </h2>

        <div class="menu-grid">

            <a href="register.php">
                👨‍🎓
                <br>
                विद्यार्थी नोंदणी
            </a>

            <a href="attendance.php">
                ✅
                <br>
                Presenti
            </a>

            <a href="study.php">
                📚
                <br>
                Study Material
            </a>

            <a href="mcq.php">
                🎮
                <br>
                MCQ Game
            </a>

            <a href="students.php">
                👥
                <br>
                Students
            </a>

            <a href="attendance_report.php">
                📊
                <br>
                Attendance Report
            </a>

            <a href="monthly_review.php">
                📝
                <br>
                मासिक आढावा
            </a>

            <a href="monthly_review_2.php">
                📋
                <br>
                मासिक आढावा २
            </a>

            <a href="album.php">
                🖼️
                <br>
                Album
            </a>

        </div>

    </section>

    <section class="mission-block">

        <div class="mission-inner">

            <div class="mission-header">
                <h2>विकसित व्हावे अर्पित होऊन जावे</h2>
            </div>

            <p>
                ‘स्व’-रूपवर्धिनी या स्वयंसेवी संस्थेचे कार्य १३ मे १९७९ रोजी सुरू झाले.
                ही संस्था शिक्षण क्षेत्रात कार्यरत असूनही ती औपचारिक शाळा नाही.
                संस्थेचा उद्देश हा विद्यार्थ्यांच्या सर्वांगीण विकासासाठी आहे, ज्यामुळे ते एक
                चांगले नागरिक बनू शकतील. ‘स्व’-रूपवर्धिनीचा उपक्रम हा औपचारिक शाळेच्या
                वेळेनंतर चालविला जातो आणि विद्यार्थ्यांमध्ये योग्य मूल्ये आणि योग्य विषय
                रुजविण्यासाठी खास तयार केला जातो. विशेषतः ज्या विद्यार्थ्यांमध्ये विकासाची
                क्षमता आहे, परंतु त्यांना आर्थिक किंवा सामाजिक अडचणींचा सामना करावा लागत आहे,
                अशा विद्यार्थ्यांसाठी संस्था कार्यरत आहे. पुणे शहरातील सोळा सेवा वस्त्यांमध्ये
                मुला-मुलींसाठी ‘स्व’-रूपवर्धिनीचे कार्य चालू आहे.
            </p>

            <p>
                या कामाच्या माध्यमातून समाजात दिसून आलेल्या विविध समस्यांना योग्य दिशा
                देण्यासाठी संस्थेने विविध प्रकल्पांची सुरुवात केली आहे. यात महिला विभाग,
                स्पर्धा परीक्षा केंद्र, उत्थान प्रकल्प, पहाट प्रकल्प, फिरती प्रयोगशाळा,
                कौशल्य विकास केंद्र यांसारख्या विविध आयाम असणाऱ्या प्रकल्पांचा समावेश आहे.
                हे प्रकल्प समाजातील विविध घटकांसाठी आवश्यक असे विविध सेवा आणि उपक्रम
                प्रदान करतात, ज्यामुळे एकत्रितपणे समाजाच्या सर्वांगीण विकासाला हातभार
                लावला जातो. ‘स्व’-रूपवर्धिनीचे हे कार्य समाजातील दुर्बल घटकांना शक्ती
                देणारे आहे, ज्यामुळे त्यांचे जीवन अधिक समृद्ध आणि अर्थपूर्ण होईल.
            </p>

            <h3 class="small-heading">मदत हेच आमचे ध्येय</h3>

            <h3 class="small-heading orange">सेवा परमो धर्म</h3>

            <div class="value-grid">
                <div class="value-item">
                    <img src="https://swaroopwardhinee.org/wp-content/uploads/2024/07/educate_1.png"
                        alt="शिक्षणाच्या संधी">
                    <h4>शिक्षणाच्या संधी</h4>
                    <p>आर्थिक आणि सामाजिकदृष्ट्या कमकुवत विद्यार्थ्यांना शिक्षणाच्या उत्तम संधी उपलब्ध करणे.</p>
                </div>

                <div class="value-item">
                    <img src="https://swaroopwardhinee.org/wp-content/uploads/2024/07/solidarity_2.png"
                        alt="सर्वांगीण विकास">
                    <h4>सर्वांगीण विकास</h4>
                    <p>विद्यार्थ्यांच्या सर्वांगीण विकासासाठी आवश्यक सुविधा आणि मार्गदर्शन प्रदान करणे.</p>
                </div>

                <div class="value-item">
                    <img src="https://swaroopwardhinee.org/wp-content/uploads/2024/07/home_3.png"
                        alt="प्रेरक शिक्षकांचे मार्गदर्शन">
                    <h4>प्रेरक शिक्षकांचे मार्गदर्शन</h4>
                    <p>अनुभवी आणि संवेदनशील शिक्षकांच्या नेतृत्वाखाली विद्यार्थ्यांना योग्य मार्गदर्शन व प्रेरणा देणे.
                    </p>
                </div>

                <div class="value-item">
                    <img src="https://swaroopwardhinee.org/wp-content/uploads/2024/07/charity_4.png"
                        alt="संपूर्ण समर्थन">
                    <h4>संपूर्ण समर्थन</h4>
                    <p>आवश्यक सर्व प्रकारची मदत आणि समर्थन प्रदान करून अडथळे दूर करणे.</p>
                </div>
            </div>

            <div class="quote-block">
                <h3>उठ तरूणा जागा हो आमच्या पवित्र कामाचा धागा हो !</h3>
                <p>संस्थापक, ‘स्व’-रूपवर्धिनी</p>
                <strong>कै. कृष्णाजी लक्ष्मण तथा किशाभाऊ पटवर्धन</strong>
            </div>

            <p class="founder-story">
                वेगवेगळ्या शाळांमध्ये काम करत असताना दिवंगत के. एल. पटवर्धन यांना असे विद्यार्थी भेटले.
                जे हुशार होते पण त्यांच्यातील सुप्त गुण विकसित करण्यासाठी त्यांना योग्य संधी आणि वातावरण
                मिळाले नाही. आयुष्यभर रामकृष्ण परमहंस यांच्या आध्यात्मिक शिकवणीचा आणि डॉ. हेडगेवारांच्या
                विचारांचा त्यांच्यावर प्रभाव होता. त्यांना दादाराव परमार्थ यांच्याकडूनही प्रेरणा मिळाली ज्यांनी
                त्यांना आयुष्यात समाज/राष्ट्राची सेवा करण्यास सांगितले.
            </p>

            <p class="founder-story">
                मुख्याध्यापक म्हणून सेवानिवृत्त झाल्यानंतर, आपल्या समाजातील वंचित आणि आर्थिकदृष्ट्या दुर्बल
                घटकातील तरुण, हुशार आणि सक्षम मुलांच्या सुप्त गुणांना समृद्ध करण्यासाठी आणि त्यांना
                सामाजिक संपत्ती बनविण्यासाठी त्यांनी आपले जीवन समर्पित करण्याचा निर्णय घेतला. या
                कल्पनेबद्दल त्याने आपल्या सहकारी आणि मित्रांना सांगितले.
            </p>

            <blockquote>
                जाति पंथ जरि अनेक येथे धर्म आपुला एक असे |<br>
                कर्तुत्वाला समान संधी उच्चनीचता भेद नसे ||<br>
                सप्त सुरांच्या मैफलीतुनी निनादते जणू एक ताण |<br>
                जय भारत जय हिंदुस्तान ||
            </blockquote>

            <div class="team-link-wrap">
                <a href="https://swaroopwardhinee.org/about/#" target="_blank" rel="noopener">
                    View all team
                </a>
            </div>

            <div class="founder-gallery">
                <img src="https://swaroopwardhinee.org/wp-content/uploads/2024/07/Late_K_L_Patwardhan.png"
                    alt="Founder portrait">
                <img src="https://swaroopwardhinee.org/wp-content/uploads/2024/08/WhatsApp-Image-2024-08-31-at-12.19.17-PM.jpeg"
                    alt="Community work image">
            </div>

            <h3 class="small-heading">आमचे ध्येय</h3>

            <p>
                जात, रंग आणि पंथाचा कोणताही विवेक न ठेवता आपल्या समाजातील वंचित आणि आर्थिकदृष्ट्या
                दुर्बल घटकातील तरुण, हुशार आणि सक्षम विद्यार्थ्यांच्या सुप्त गुणांना समृद्ध करण्यासाठी
                आणि त्यांना सामाजिक संपत्ती बनवण्यासाठी आम्ही समर्पित आहोत. भारतीय नागरिकांचे
                सामाजिक, सांस्कृतिक, शैक्षणिक, शारीरिक आणि आर्थिक दर्जा सुधारण्यासाठी आम्ही विविध
                उपक्रम आणि प्रकल्प आयोजित करतो.
            </p>

        </div>

    </section>


    <footer>

        <p>
            © 2026 स्वामी विवेकानंद शाखा
        </p>

    </footer>

</body>

</html>
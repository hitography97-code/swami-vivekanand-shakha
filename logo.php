<!DOCTYPE html>
<html lang="mr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>स्वामी विवेकानंद शाखा</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5ebdf 0%, #efe6df 100%);
            font-family: "Segoe UI", "Noto Sans Devanagari", Arial, sans-serif;
            padding: 24px;
        }

        .logo-box {
            width: min(1000px, 100%);
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid #efd8b9;
            border-radius: 22px;
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.08);
            padding: 30px;
            backdrop-filter: blur(6px);
        }

        .logo-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .photo {
            width: min(430px, 100%);
            border-radius: 18px;
            border: 4px solid #f0d4a4;
            box-shadow: 0 15px 28px rgba(0, 0, 0, 0.12);
        }

        .title {
            text-align: center;
        }

        .title h1 {
            margin: 0;
            font-size: clamp(28px, 4vw, 56px);
            color: #b73a00;
            font-weight: 900;
            letter-spacing: 0.04em;
            line-height: 1.1;
        }

        .title p {
            margin: 18px 0 0;
            font-size: clamp(18px, 2vw, 24px);
            color: #3d2b27;
            font-weight: 700;
        }

        .badge {
            display: inline-block;
            margin-top: 18px;
            background: #fff2e7;
            color: #a84f18;
            border: 1px solid #f2d5b2;
            padding: 10px 18px;
            border-radius: 999px;
            font-weight: 700;
            letter-spacing: 0.08em;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="logo-box">
        <div class="logo-content">
            <img class="photo" src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Swami_Vivekananda_1893.jpg"
                alt="Swami Vivekananda">

            <div class="title">
                <h1>स्वामी विवेकानंद शाखा</h1>
                <p>सेवा • शिक्षण • संस्कार • समाजकार्य</p>
                <div class="badge">Swami Vivekanand Shakha</div>
            </div>
        </div>
    </div>
</body>

</html>
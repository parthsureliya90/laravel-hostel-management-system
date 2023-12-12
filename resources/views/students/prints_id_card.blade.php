<html>

<head>
    <title>{{ $title }}</title>

    <link rel="stylesheet" id="css-main" href="{{ config('app.URL') }}id/idCard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Poppins:wght@600&family=Roboto+Slab:wght@500&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <br>
    <div class="container">
        <div class="padding">
            <div class="font">
                <div class="top">
                    <img src="{{ config('app.URL') }}students/{{ $data[0]->photo }}">
                </div>
                <div class="bottom">
                    <p>{{ $data[0]->fname . ' ' . $data[0]->mname . ' ' . $data[0]->lname }}</p>
                    <p class="no">
                        {{ $college }}<br> ( {{ $data[0]->cource }})
                    </p>

                    <br>
                    <p class="no">Student : {{ $data[0]->student_contacts }}</p>
                    <p class="no">Father : {{ $data[0]->father_contacts }}</p>
                    <p class="no">Blood Group : {{ $data[0]->blood_group }}</p>
                    <div
                        style="    position: absolute;
    top: 90%;
    text-align: center;
    background: #f2f2f2;
    bottom: 0;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    width: 100%;
    vertical-align: middle;">
                        {{ $name }}</div>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', 'My Portfolio')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Boostrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

        <!--CSS Styles for Homepage, Hotels, & Contacts-->
        <style>
            .img-cont {
            position: relative;
            }


            .search-box {
            max-width: 80%;
            transform: translate(-50%, 50%);
            z-index: 10;
            }


            @media (max-width: 768px) {
            .search-box {
                max-width: 95%;
                transform: translate(-50%, 30%);
                padding: 1rem;
            }
            }

            .search-input {
            border: none;
            background: transparent;
            outline: none;
            box-shadow: none;
            text-align: center;
            color: #6c757d; 
            font-size: 0.9rem;
            width: 100%;
            }

            .search-input::placeholder {
            color: #6c757d;
            opacity: 0.8;
            }

            .search-input:focus {
            outline: none;
            color: #000; 
            }

            @media (max-width: 768px) {
            .search-box {
                max-width: 95%;
                transform: translate(-50%, 30%);
                padding: 1rem;
            }
            }

            .blue {
                color: var(--main-blue);
            }

            .bold {
                font-weight: bold;
            }

            .xl {
                font-size: 2em;
            }

            .large {
                font-size: 1.2em;
            }

            .box {
                background-color: white;
                border-radius: 30px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                height: auto;
            }

            .gray {
            color: #505050;
            }


            .viewBtn {
                background-color: var(--main-blue);
                color: white;
                border-radius: 30px;
                border: none;
                font-size: 1.1em;
                font-weight: 600;
            }

            .viewBtn:hover {
                background-color: #004080; 
                transition: all 0.2s ease;
                cursor: pointer;
            }

            :root {
                --main-blue: #0057AB;
            }

            body {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                font-family: "Poppins", sans-serif;
            }


            .resultText {
                font-size: 1.2em;
            }

            .blueText {
                color: var(--main-blue);
            }

            .boldText {
                font-weight: 600;
            }

            .sortText {
                color: #505050;
                font-size: 1em;
            }

            .sortIcon {
                width: 2.5%;
                height: 2.5%;
            }

            #sortHotels {
                border-radius: 30px;
                font-size: .9em;
                margin-top: 0;
            }

            .result {
                color: black;
                font-size: .8em;
                font-weight: 400;
            }

            .image-container {
            background-color: #f8f9fa; 
            position: relative;
            text-align: center;
            }

            .hotelsPic {
            object-fit: cover;
            width: 100%;
            height: auto;
            border-radius: 0;  
            }

            .white-box {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-top: -200px; 
            position: relative;
            z-index: 2;
            }


            .hotel-card {
                border: 2px solid #D9D9D9;
                height: 37vh;
                width: 78%;
                border-radius: 30px;
            }

            .hotelName {
                font-size: 1.3em;
                font-weight: 700;
            }

            .hotel-info {
                font-size: .7em;
            }

            .star-icon {
                color: var(--main-blue);
            }

            .fee-subtext {
                font-size: .5em;
                color: #505050;
            }

            .gray {
                color: #969696;
            }

            .offers-container {
                width: auto;
                height: auto;
                border: 1.5px solid #969696;
                border-radius: 30px;
                font-size: .8em;
            }

            .offers {
                color: #505050;
            }

            .viewBtn {
                background-color: var(--main-blue);
                color: white;
                border-radius: 30px;
                border: none;
                font-size: 1.1em;
                font-weight: 600;
            }

            .filter-container {
                width: 48%;
                border: 2px solid #D9D9D9;
                border-radius: 30px;
                height: auto;
            }

            .filterText {
                font-size: 1.1em;
            }


            .custom-checkbox-container {
            display: block;
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            cursor: pointer;
            user-select: none;
            font-size: 16px;
            }


            .custom-checkbox-container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            }


            .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%; 
            transition: 0.2s;
            }


            .custom-checkbox-container:hover input ~ .checkmark {
            background-color: #ccc;
            }


            .custom-checkbox-container input:checked ~ .checkmark {
            background-color: #2196F3;
            }


            .checkmark:after {
            content: "";
            position: absolute;
            display: none;
            }


            .custom-checkbox-container input:checked ~ .checkmark:after {
            display: block;
            }


            .custom-checkbox-container .checkmark:after {
            left: 9px;
            top: 4px;
            width: 8px;
            height: 15px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            }

            .price-input {
                width: 50%;
                border: 1.5px solid #969696;
                border-radius: 30px;
                font-size: .8em;
            }



            .white-box input.fake-span {
                text-align: center;
            }

            .fake-span {
            border: none;
            background: none;
            outline: none;
            color: #505050;
            font-family: "Poppins", sans-serif;
            font-size: 1em;
            text-align: center;
            width: 100%;
            cursor: text;
            }

            .fake-span:focus {
            outline: none;
            border: none;
            box-shadow: none;
            }

            .fake-span::placeholder {
            color: #b8b8b8;
            opacity: 1;
            }

            .search-input {
                border: none;
                background: transparent;
                outline: none;
                box-shadow: none;
                text-align: center;
                color: #505050;
                font-family: "Poppins", sans-serif;
                font-size: 1em;
                width: 100%;
            }

            .search-input::placeholder {
                color: #b8b8b8;
                opacity: 1;
            }

            .search-input:focus {
                color: #000;
                outline: none;
            }

            .border-right {
                border-right: 1px solid #D9D9D9;
            }


            .viewBtn:hover {
                background-color: #004080; 
                transition: all 0.2s ease;
                cursor: pointer;
            }

            .applyBtn {
                background-color: var(--main-blue);
                color: white;
                border: none;
                border-radius: 30px;
                font-size: 1em;
                font-weight: 600;
                width: 100%;
                transition: all 0.2s ease;
            }

            .applyBtn:hover {
                background-color: #004080;
                cursor: pointer;
            }

            .input-group-text {
                background-color: #f8f9fa;
                border-right: none;
                font-weight: 600;
                color: #333;
            }

            .price-input.form-control {
                border-left: none;
            }

            .price-input::placeholder {
                color: #aaa;
            }

            .hotel-card {
                border: 2px solid #D9D9D9;
                border-radius: 30px;
                display: flex;
                width: 78%;
                overflow: hidden; 
            }

            .hotel-info-wrapper {
                flex: 1;             
                display: flex;
                flex-direction: column;
            }

            .hotel-img-wrapper {
                flex: 0 0 33.3333%;  
                padding: 1rem;     
                display: flex;
                align-items: stretch; 
            }

            .hotel-img {
                width: 100%;
                height: 100%;
                object-fit: cover;   
                border-radius: 20px;  
            }
            
            i {
                    color: var(--main-blue);
                    font-size: 2em;
                }
        </style>
    </head>
    <body>
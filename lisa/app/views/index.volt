<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lisa - Text Extraction</title>

    {{ assets.outputCss('styles') }}
    {{ assets.outputJs('scripts') }}

    <style>
        .loader-container {
            width: 100%;
            height: 100%;
            background-color: black;
            /* opacity: 0.9; */
            position: fixed;
            display: flex;
            align-content: center;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 0 !important;
            z-index: 1500;
        }

        .loader {
            width: 300px;
            height: 300px;
            border: 5px solid;
            /* color: #3498db; */
            border-radius: 50%;
            /* border-top-color: transparent; */
            border-color: #FFDD53;
            animation: loader 1.2s linear infinite;
        }
    </style>
</head>

<body>
    <div class="loader-container" style="text-align: center;">
        <img class="loader" style="margin-top: 100px;" src="https://localhost/lisa/public/img/judge%20scale.gif">
        <h1 style="color: white; margin-top: 100px;">โปรดรอสักครู่...</h1>
    </div>
    {% if dispatcher.getControllerName() == "authen" or dispatcher.getControllerName() == "upload" %}
    {{partial('layouts/navbar')}}
    {{partial('layouts/sidebar')}}
    {% endif %}

    {% if dispatcher.getControllerName() == "authen" or dispatcher.getControllerName() == "upload" %}
    <div style="margin-left: 300px; padding: 30px;">
        {{ content() }}
    </div>
    {% else%}
      {{ content() }}
    {% endif %}
</body>
<script>
    $(window).on("load", function () {
        $(".loader-container").fadeOut(2000);
        $(".successMessage").fadeOut(4000);
        $(".errorMessage").fadeOut(4000);
    });
</script>

</html>
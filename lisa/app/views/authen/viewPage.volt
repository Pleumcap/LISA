<style>
  #titleDetail{
            display: flex;
            flex-direction: row;
            align-items: center;
         }

         #backward_button{
            width: 60px;
            height: 60px;
            cursor: pointer;
         }
</style>

<div id="titleDetail">
    <img id="backward_button" src="https://localhost/lisa/public/img/icon/icon128_back.png" alt="backward icon" style="cursor: pointer;">
    <div style="font-size: 48px; font-family: RSU_BOLD; margin-left: 60px;">ต้นฉบับของเอกสาร</div>
</div>
<div class="text-center">

{% for index, i in viewPage %}
<img src="{{ i }}" width="1190" height="1684"><br>
{% endfor %}
</div>

<script>
     $(document).on('click','#backward_button', function(){
        window.history.back();
    });
</script>

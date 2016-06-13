<div class="cd-popup" role="alert">
    <div class="cd-popup-container">
        <p><i class="ion-android-sad"></i><br>
            <br>
            @if(isset($error_message))
                {{ $error_message }}
            @endif</p>
        <ul class="cd-buttons">
            <li><a href="#" class="popup-close">Закрыть</a></li>
        </ul>
        <a href="#" class="cd-popup-close img-replace"></a>
    </div>
</div>
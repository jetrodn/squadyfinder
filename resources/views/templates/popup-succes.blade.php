<div class="cd-popup" role="alert">
    <div class="cd-popup-container">
        <p><i class="ion-checkmark-round"></i><br>
            <br>
            @if(isset($success_message))
                {{ $success_message }}
            @endif</p>
        <ul class="cd-buttons">
            <li><a href="#" class="popup-close">Закрыть</a></li>
        </ul>
        <a href="#" class="cd-popup-close img-replace"></a>
    </div>
</div>
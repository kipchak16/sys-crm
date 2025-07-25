@if(session()->has("message"))
    <div class="container">
        <div id="flash-message" class="alert alert-{{ session("message_type") }}">
            {{ session("message") }}
        </div>
    </div>
    <script>
        setTimeout(function () {
            const alertBox = document.getElementById("flash-message");
            if (alertBox) {
                alertBox.classList.add("fade-slide-out");
                setTimeout(() => alertBox.remove(), 700); // animasyonun bitmesini bekle
            }
        }, 3000);
    </script>
@endif


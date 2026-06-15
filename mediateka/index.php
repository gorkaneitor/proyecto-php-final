<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediateka - Twenty One Pilots</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mediateka.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/logos/top_logo.png">
</head>

<body>
    <?php include '../header.php'; ?>
    <main class="mediateka-main">
        <!-- CARRUSEL-A -->
        <section class="media-section carousel-section">
            <h2>Irudiak</h2>
            <div class="carousel-container">
                <button class="carousel-arrow left-arrow" onclick="moveCarousel(-1)">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <div class="carousel-wrapper">
                    <div class="carousel">
                        <img class="carousel-slide" src="../img/covers/2.jpg" alt="Imagen 1">
                        <img class="carousel-slide" src="../img/covers/3.jpg" alt="Imagen 2">
                        <img class="carousel-slide" src="../img/covers/14.jpg" alt="Imagen 3">
                    </div>
                </div>
                <button class="carousel-arrow right-arrow" onclick="moveCarousel(1)">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
            <div class="carousel-indicators">
                <span class="indicator active" onclick="currentCarouselSlide(0)"></span>
                <span class="indicator" onclick="currentCarouselSlide(1)"></span>
                <span class="indicator" onclick="currentCarouselSlide(2)"></span>
            </div>
        </section>

        <!-- AUDIOAK -->
        <section class="media-section audio-section">
            <h2>Audioak</h2>
            <div class="audio-container">
                <div class="audio-player">
                    <audio id="audioPlayer" controls>
                        <source src="../audio/TOP_House of Gold.mp3" type="audio/mpeg">
                        Zure nabegadoreak ez du audio elementu hau onartzen.
                    </audio>
                </div>
                <div class="audio-controls">
                    <div class="control-group">
                        <label for="volumeControl">Bolumena:</label>
                        <input type="range" id="volumeControl" min="0" max="100" value="75" onchange="changeVolume(this.value)">
                        <span id="volumeValue">75%</span>
                    </div>
                </div>
                <div class="audio-playlist">
                    <h3>Kantak</h3>
                    <div class="playlist-items">
                        <button class="playlist-item active" onclick="playAudio(0)">House of Gold</button>
                        <button class="playlist-item" onclick="playAudio(1)">Stressed Out</button>
                        <button class="playlist-item" onclick="playAudio(2)">The Outside</button>
                    </div>
                </div>
                <div class="audio-nav-buttons">
                    <button onclick="previousAudio()">
                        <i class="fa fa-chevron-left"></i> Aurrekoa
                    </button>
                    <button onclick="nextAudio()">
                        Hurrengoa <i class="fa fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- YOUTUBEKO BIDEOAK -->
        <section class="media-section video-section">
            <h2>Bideoak</h2>
            <div class="video-container">
                <div class="youtube-player">
                    <iframe id="youtubeFrame" width="100%" height="500"
                        src="https://www.youtube.com/embed/mDyxykpYeu8"
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="video-controls">
                    <div class="video-playlist">
                        <h3>Kantak</h3>
                        <div class="playlist-items">
                            <button class="playlist-item active" onclick="playVideo(0)">
                                <i class="fa fa-play"></i> House of Gold
                            </button>
                            <button class="playlist-item" onclick="playVideo(1)">
                                <i class="fa fa-play"></i> Stressed Out
                            </button>
                            <button class="playlist-item" onclick="playVideo(2)">
                                <i class="fa fa-play"></i> The Outside
                            </button>
                        </div>
                    </div>
                    <div class="video-nav-buttons">
                        <button class="nav-btn" onclick="previousVideo()">
                            <i class="fa fa-chevron-left"></i> Aurrekoa
                        </button>
                        <button class="nav-btn" onclick="nextVideo()">
                            Hurrengoa <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include '../footer.php'; ?>

    <script>
        // ====== CARRUSEL-A ======
        let currentSlide = 0;

        function moveCarousel(n) {
            const slides = document.querySelectorAll('.carousel-slide');
            const indicators = document.querySelectorAll('.indicator');
            currentSlide += n;

            if (currentSlide >= slides.length) currentSlide = 0;
            if (currentSlide < 0) currentSlide = slides.length - 1;

            showCarouselSlide();
        }

        function currentCarouselSlide(n) {
            currentSlide = n;
            showCarouselSlide();
        }

        function showCarouselSlide() {
            const slides = document.querySelectorAll('.carousel-slide');
            const indicators = document.querySelectorAll('.indicator');

            slides.forEach((slide, index) => {
                slide.classList.remove('active');
                indicators[index].classList.remove('active');
            });

            slides[currentSlide].classList.add('active');
            indicators[currentSlide].classList.add('active');

            document.querySelector('.carousel').style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        // ====== AUDIOAK ======
        const audioPlaylist = [
            '../audio/TOP_House of Gold.mp3',
            '../audio/TOP_Stressed Out.mp3',
            '../audio/TOP_The Outside.mp3'
        ];
        let currentAudioIndex = 0;

        function changeVolume(value) {
            const audio = document.getElementById('audioPlayer');
            audio.volume = value / 100;
            document.getElementById('volumeValue').textContent = value + '%';
        }

        function playAudio(index) {
            currentAudioIndex = index;
            const audio = document.getElementById('audioPlayer');
            audio.src = audioPlaylist[currentAudioIndex];
            audio.play();
            updateAudioPlaylistButtons();
        }

        function nextAudio() {
            currentAudioIndex = (currentAudioIndex + 1) % audioPlaylist.length;
            playAudio(currentAudioIndex);
        }

        function previousAudio() {
            currentAudioIndex = (currentAudioIndex - 1 + audioPlaylist.length) % audioPlaylist.length;
            playAudio(currentAudioIndex);
        }

        function updateAudioPlaylistButtons() {
            const buttons = document.querySelectorAll('.audio-playlist .playlist-item');
            buttons.forEach((btn, index) => {
                btn.classList.remove('active');
                if (index === currentAudioIndex) {
                    btn.classList.add('active');
                }
            });
        }

        // ====== YOUTUBEKO BIDEOAK ======
        const youtubeVideos = [
            'mDyxykpYeu8', // House of Gold
            'pXRviuL6vMY', // Stressed Out
            'eNcvblM8-_o', // The Outside
        ];

        let currentVideoIndex = 0;

        function playVideo(index) {
            currentVideoIndex = index;
            updateYoutubePlayer();
            updatePlaylistButtons();
        }

        function nextVideo() {
            currentVideoIndex = (currentVideoIndex + 1) % youtubeVideos.length;
            updateYoutubePlayer();
            updatePlaylistButtons();
        }

        function previousVideo() {
            currentVideoIndex = (currentVideoIndex - 1 + youtubeVideos.length) % youtubeVideos.length;
            updateYoutubePlayer();
            updatePlaylistButtons();
        }

        function updateYoutubePlayer() {
            const videoId = youtubeVideos[currentVideoIndex];
            const iframeUrl = `https://www.youtube.com/embed/${videoId}`;
            document.getElementById('youtubeFrame').src = iframeUrl;
        }

        function updatePlaylistButtons() {
            const buttons = document.querySelectorAll('.video-playlist .playlist-item');
            buttons.forEach((btn, index) => {
                btn.classList.remove('active');
                if (index === currentVideoIndex) {
                    btn.classList.add('active');
                }
            });
        }
    </script>
</body>

</html>
<?php
    include("sambungan.php");
    include("pengundi_menu.php");

    if (!isset($_SESSION["idpengguna"])) {
        header("Location: login.php");
        exit();
    }

    $idpengundi = $_SESSION["idpengguna"];

    // Ambil data undian. Kita perlukan idcalon untuk logik wallpaper
    $sql = "SELECT * FROM pengundi JOIN calon ON pengundi.idcalon = calon.idcalon 
            WHERE pengundi.idpengundi = '$idpengundi'";
    $result = mysqli_query($sambungan, $sql);
    $data = mysqli_fetch_array($result);
    
    $idcalon = $data['idcalon']; // Ambil ID (C01, C02, C03)
    $namacalon = $data['namacalon'];

    // Wallpaper asal jika tiada padanan
    $wallpaper = "imej/back.jpg";
    $video_url = "";

    // LOGIK BERDASARKAN ID (C01, C02, C03) - Lebih tepat daripada nama
    if ($idcalon == "C01") { 
        $wallpaper = "imej/wallpaper_peter.jpg";
        $video_url = "video/peter.mp4"; 
    } elseif ($idcalon == "C02") { 
        $wallpaper = "imej/wallpaper_wind.jpg";
        $video_url = "video/wind.mp4";
    } elseif ($idcalon == "C03") { 
        $wallpaper = "imej/wallpaper_orv.jpg";
        $video_url = "video/orv.mp4";
    }
?>

<style>
    body { 
        background-image: url('<?php echo $wallpaper; ?>') !important; 
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        transition: 0.8s;
    }
    .konten-video {
        margin-top: 50px;
        text-align: center;
        background: rgba(0, 0, 0, 0.7); /* Latar belakang gelap supaya teks nampak jelas */
        padding: 30px;
        display: inline-block;
        border-radius: 20px;
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        border: 2px solid rgba(255,255,255,0.2);
    }
    video {
        border: 4px solid white;
        border-radius: 10px;
        box-shadow: 0px 0px 30px rgba(0,0,0,1);
    }
    h2, p {
        color: white;
        text-shadow: 2px 2px 4px #000;
    }
</style>

<div class="konten-video">
    <h2>TERIMA KASIH! ANDA TELAH MENGUNDI <?php echo $namacalon; ?></h2>
    
    <?php if ($video_url != ""): ?>
        <video width="750" controls autoplay muted>
            <source src="<?php echo $video_url; ?>" type="video/mp4">
            Browser anda tidak menyokong video HTML5.
        </video>
    <?php else: ?>
        <p style="color:yellow;">Maaf, video untuk calon ini tidak ditemui.</p>
    <?php endif; ?>
    
    <br><br>
    <p style="background: #28a745; display: inline-block; padding: 8px 20px; border-radius: 30px; font-weight: bold;">
        Status: Undian Berjaya Disimpan
    </p>
</div>
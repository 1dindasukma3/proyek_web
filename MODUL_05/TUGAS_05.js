$(document).ready(function() {  
    // Tampilkan gambar dengan efek fade-in  
    $(".gallery img").css("opacity", "1");  
  
    // Tambahkan event listener pada setiap gambar  
    $(".gallery img").click(function() {  
      // Dapatkan sumber gambar  
      var imgSrc = $(this).attr("src");  
  
      // Tampilkan gambar dalam modal  
      $("#modalImg").attr("src", imgSrc);  
      $("#myModal").css("display", "block");  
    });  
  
    // Tutup modal saat klik tombol close atau di luar gambar  
    $(".close, .modal").click(function() {  
      $("#myModal").css("display", "none");  
    });  
  });
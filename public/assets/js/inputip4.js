//input mask bundle ip address
$(document).ready(function(){
    var ipv4_address = $('.ipv4');
    ipv4_address.inputmask({
        alias: "ip",
        greedy: false // Mask awal akan ditampilkan sebagai "" bukan "-____".
    });
});
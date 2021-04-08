function capitalize_Words(str) {
    return str.replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}

function loading() {
    $('#loader').show();
    $('.div-loading').addClass('background-load');
}

function matikanLoading() {
    $('#loader').hide();
    $('.div-loading').removeClass('background-load');
}

function uang(bilangan)
{
    var	reverse = bilangan.toString().split('').reverse().join('');
	var ribuan 	= reverse.match(/\d{1,3}/g);
    ribuan	= ribuan.join('.').split('').reverse().join('');
    return ribuan;
}


function hapusvalidasi(key) {
    let pesan = $('#' + key).parent();
    let text = $('.' + key);
    pesan.removeClass('has-danger');
    text.text(null);
}

function isEmpty(obj) {
  return Object.keys(obj).length === 0;
}

function randomColor() {
    const hex = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "A", "B", "C", "D", "E", "F"];
     let hexColor = "#";
     for (let i = 0; i < 6; i++) {
         hexColor += hex[Math.floor(Math.random() * hex.length)];
     }
     return hexColor;
}

function inputRupiah(number) {
       let number_string = number.replace(/[^,\d]/g, "").toString(),
           split = number_string.split(","),
           sisa = split[0].length % 3,
           rupiah = split[0].substr(0, sisa),
           ribuan = split[0].substr(sisa).match(/\d{3}/gi);

       // tambahkan titik jika yang di input sudah menjadi angka ribuan
       if (ribuan) {
           let separator = sisa ? "." : "";
           rupiah += separator + ribuan.join(".");
       }
       return (rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah);
}

function wordWrap(str, maxWidth) {
    var newLineStr = "<br>"; done = false; res = '';
    while (str.length > maxWidth) {                 
        found = false;
        // Inserts new line at first whitespace of the line
        for (i = maxWidth - 1; i >= 0; i--) {
            if (testWhite(str.charAt(i))) {
                res = res + [str.slice(0, i), newLineStr].join('');
                str = str.slice(i + 1);
                found = true;
                break;
            }
        }
        // Inserts new line at maxWidth position, the word is too long to wrap
        if (!found) {
            res += [str.slice(0, maxWidth), newLineStr].join('');
            str = str.slice(maxWidth);
        }

    }
    return res + str;
}

function testWhite(x) {
    var white = new RegExp(/^\s$/);
    return white.test(x.charAt(0));
}
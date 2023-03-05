
const adminDropDown = document.querySelector('.adminDropDown');
const arrowDropdown = document.querySelector('.arrowDropdown');
const listDropdown = document.querySelector('.listDropdown');
adminDropDown.addEventListener('click', () => {
    arrowDropdown.classList.toggle('arrowDropdownRotate');
    listDropdown.classList.toggle('listDropdownShow');
});

// cek input search
function checkInput() {
    const searchInput = document.querySelector('.inputSearch').value.replace(/\s/g,'');
    const btnSearch = document.querySelector('.btnSearch');

    if (searchInput.length > 0 ) {
    btnSearch.disabled = false;
    } else {
    btnSearch.disabled = true;
    }
}

// tabel pengguna akan bershadow bila discroll lebih dari 50 px
const containerDataUser = document.querySelector('.containerDataUser');
const sectionNamePAB = document.querySelector('.sectionNamePAB');
containerDataUser.addEventListener('scroll', () => {
    if (containerDataUser.scrollTop > 50) {
        sectionNamePAB.classList.add('sectionNamePABShadow');
    } else {
        sectionNamePAB.classList.remove('sectionNamePABShadow');
    }
});

// alert tambah pengguna atau pembayaran
const tambahkanPenggunaAPembayaran = document.querySelector('.tambahkanPenggunaAPembayaran');
const containerAlertPAP = document.querySelector('.containerAlertPAP');
const batalTambahkanTabel = document.querySelector('.batalTambahkanTabel');
tambahkanPenggunaAPembayaran.addEventListener('click', () => {
    containerAlertPAP.style.display = 'flex';
});
batalTambahkanTabel.addEventListener('click', () => {
    containerAlertPAP.style.display = 'none';
});

// alert tambah pengguna
const tTP = document.querySelector('.tTP');
const alertTBP = document.querySelector('.alertTBP');
const batalTambahUser = document.querySelector('.batalTambahUser');
tTP.addEventListener('click', () => {
    containerAlertPAP.style.display = 'none';
    alertTBP.style.display = 'flex';
});
batalTambahUser.addEventListener('click', () => {
    alertTBP.style.display = 'none';
});
// alert tambah pembayaran pengguna
const tTPP = document.querySelector('.tTPP');
const aTPP = document.querySelector('.aTPP');
const batalTambahPembayaran = document.querySelector('.batalTambahPembayaran');
tTPP.addEventListener('click', () => {
    containerAlertPAP.style.display = 'none';
    aTPP.style.display = 'flex';
});
batalTambahPembayaran.addEventListener('click', () => {
    aTPP.style.display = 'none';
});

// cek user form
const InputNP = document.querySelector('.InputNP');
const selectTblP = document.querySelector('.selectTblP');
const btnTblP = document.querySelector('.btnTblP');
const erorrNotif = document.querySelectorAll('.erorrNotif');
btnTblP.disabled = true;
InputNP.addEventListener('input', checkValidityTblUser);
selectTblP.addEventListener('change', checkValidityTblUser);

function checkValidityTblUser() {
    const valueWithoutSpaces = InputNP.value.replace(/\s+/g, '');
    const valueLength = valueWithoutSpaces.length;

    if (valueLength > 2 && selectTblP.selectedIndex !== 0) {
        btnTblP.disabled = false;
        btnTblP.style.opacity = 1;
    } else {
        btnTblP.disabled = true;
        btnTblP.style.opacity = 0.5;
    }
}

batalTambahUser.addEventListener('click', resetForm);

function resetForm() {
    InputNP.value = '';

    selectTblP.selectedIndex = 0;

    btnTblP.disabled = true;
    btnTblP.style.opacity = 0.5;

    erorrNotif[0].style.display = 'none';
    erorrNotif[1].style.display = 'none';
}

// check pay form
const selectTblPay = document.querySelectorAll('.selectTblPay');
const inputText = document.querySelectorAll('.inputText');
const buttonPay = document.querySelector('.buttonPay');
const erorrNotif2 = document.querySelectorAll('.erorrNotif-2');
buttonPay.disabled = true; // Mengatur awal disabled
selectTblPay[0].addEventListener('change', checkValidity);
selectTblPay[1].addEventListener('change', checkValidity);
inputText[0].addEventListener('input', checkValidity);
inputText[1].addEventListener('input', checkValidity);
inputText[2].addEventListener('input', checkValidity);
function checkValidity() {
    if (
        selectTblPay[0].selectedIndex !== 0 &&
        selectTblPay[1].selectedIndex !== 0 &&
        inputText[0].value.length > 3 &&
        inputText[1].value.length > 1 &&
        inputText[2].value.length > 0
    ) {
        buttonPay.disabled = false; // Mengaktifkan buttonPay
        buttonPay.style.opacity = 1;
    } else {
        buttonPay.disabled = true; // Menonaktifkan buttonPay
        buttonPay.style.opacity = 0.5;
    }
}
batalTambahPembayaran.addEventListener('click', resetFormPembayaran);
function resetFormPembayaran() {
    // Mereset nilai selectTblPay ke keadaan awal
    selectTblPay[0].selectedIndex = 0;
    selectTblPay[1].selectedIndex = 0;

    // Mereset nilai inputText ke keadaan awal
    inputText[1].value = '';
    inputText[2].value = '';

    // Menghapus nilai dari inputDate
    inputDate.forEach(date => date.value = '');
    inputDate[0].disabled = false;
    inputDate[1].disabled = false;
    inputDate[0].style.opacity = 1;
    inputDate[1].style.opacity = 1;

    // Menonaktifkan kembali buttonPay
    buttonPay.disabled = true;
    buttonPay.style.opacity = 0.5;

    // memeatika pesan kesalahan laravel
    erorrNotif2[0].style.display = 'none';
    erorrNotif2[1].style.display = 'none';
    erorrNotif2[2].style.display = 'none';
    erorrNotif2[3].style.display = 'none';
    erorrNotif2[4].style.display = 'none';
    erorrNotif2[5].style.display = 'none';
}

// validasi tanggal hilang jika biaya yang telah dibayar bernilai 0
const telahBayar = document.querySelector('.telahBayar');
const inputDate = document.querySelectorAll('.inputDate');
telahBayar.addEventListener('input', () => {
    const numberValue = telahBayar.value;
    if(numberValue === '0') {
        inputDate[0].disabled = true;
        inputDate[1].disabled = true;
        inputDate[0].style.opacity = 0.4;
        inputDate[1].style.opacity = 0.4;
    } else {
        inputDate[0].disabled = false;
        inputDate[1].disabled = false;
        inputDate[0].style.opacity = 1;
        inputDate[1].style.opacity = 1;
    }
});

// validasi user tidak boleh memasukan angka lebih kecil dari 0
const inputs = document.querySelectorAll('.inputNumber');
inputs.forEach(input => {
    input.addEventListener('input', function() {
        if (parseFloat(input.value) <= 0 && input.value !== '0') {
            input.value = '';
        }
        if (/^0\d/.test(input.value)) {
            input.value = '';
        }
        if (/^-?0$/.test(input.value)) {
            input.value = '0';
        }
    });
});


// tabel pengguna akan bershadow bila discroll lebih dari 50 px
const containerTabelPembayaran = document.querySelectorAll('.containerTabelPembayaran');
const trTablePembayaranPengguna = document.querySelectorAll('.trTablePembayaranPengguna');
for(let e = 0; e < containerTabelPembayaran.length || e < trTablePembayaranPengguna.length; e++) {
    containerTabelPembayaran[e].addEventListener('scroll', () => {
        if (containerTabelPembayaran[e].scrollTop > 50) {
            trTablePembayaranPengguna[e].classList.add('trTablePembayaranPenggunaShadow');
        } else {
            trTablePembayaranPengguna[e].classList.remove('trTablePembayaranPenggunaShadow');
        }
    });
}


// menampilkan detail pembayaran pengguna
const showDetailPembayaran = document.querySelectorAll('.showDetailPembayaran');
const tabelDetailPembayaran = document.querySelectorAll('.tabelDetailPembayaran');
const closeTableDetailPembayaran = document.querySelectorAll('.closeTableDetailPembayaran');
for(let d = 0; d < showDetailPembayaran.length || d < tabelDetailPembayaran.length || d < closeTableDetailPembayaran.length; d++) {
    showDetailPembayaran[d].addEventListener('click', () => {
        tabelDetailPembayaran[d].style.display = 'flex'
    });

    // close detail pembayaran pengguna
    closeTableDetailPembayaran[d].addEventListener('click', () => {
        tabelDetailPembayaran[d].style.display = 'none'
    })
}

// aler hapus user
const buttonHapusUser = document.querySelectorAll('.buttonHapusUser');
const alertHapusUser = document.querySelectorAll('.alertHapusUser');
const tidakHapusUser = document.querySelectorAll('.tidakHapusUser');
for(let a = 0; a < buttonHapusUser.length || a < alertHapusUser.length || a < tidakHapusUser.length; a++) {
    buttonHapusUser[a].addEventListener('click', () => {
        alertHapusUser[a].style.display = 'flex';
    });
    tidakHapusUser[a].addEventListener('click', () => {
        alertHapusUser[a].style.display = 'none';
    });
}

// aler user berhasil ditambahkan
const alertUserBerhasil = document.querySelector('.alert-user-berhasil');
setTimeout(() => {
    alertUserBerhasil.style.transform = 'translateY(100%)';
}, 5000);

// validasi admin tidak boleh memasukan angka maksimal yang ditentukan laravel
// Fungsi untuk membatasi nilai maksimum
function limitMaxValue(input, max) {
    input.addEventListener("input", function() {
        if (this.value > max) {
        this.value = max;
        }
    });
}

    // Ambil semua elemen inputNumberMax
    var inputss = document.getElementsByClassName("inputNumberMax");

    // Terapkan batasan nilai maksimum pada semua elemen inputNumberMax
    limitMaxValue(inputss[0], 5000);
    limitMaxValue(inputss[1], 2147483647);
    limitMaxValue(inputss[2], 2147483647);

// validasi tanggal
const inputNumberFix = document.querySelectorAll('.inputNumberFix');
const dateRequired = document.querySelectorAll('.dateRequired');

// cek inputNumberFix ketika nilai berubah
inputNumberFix[0].addEventListener('input', () => {
    // kondisi 1
    if (parseInt(inputNumberFix[0].value) < parseInt(inputNumberFix[1].value)) {
    inputNumberFix[1].value = inputNumberFix[0].value;
    }
    
    // kondisi 2
    if (parseInt(inputNumberFix[0].value) === parseInt(inputNumberFix[1].value)) {
    dateRequired[0].required = true;
    dateRequired[1].required = true;
    } else {
    dateRequired[0].required = false;
    dateRequired[1].required = false;
    }
});

// cek inputNumberFix ketika nilai berubah
inputNumberFix[1].addEventListener('input', () => {
    // kondisi 1
    if (parseInt(inputNumberFix[1].value) > parseInt(inputNumberFix[0].value)) {
    inputNumberFix[1].value = inputNumberFix[0].value;
    }    
    // kondisi 3
    if (parseInt(inputNumberFix[0].value) === parseInt(inputNumberFix[1].value)) {
    dateRequired[0].required = true;
    dateRequired[1].required = true;
    } else {
    dateRequired[0].required = false;
    dateRequired[1].required = false;
    }
});    


const inputNumberDua = document.querySelector('.inputNumberDua');
const dateRequiredTwo = document.querySelector('.dateRequiredTwo');

inputNumberDua.addEventListener('input', function(event) {
    const totalFixTwoValue = parseInt(event.target.value, 10);

    if (totalFixTwoValue > 0) {
        dateRequiredTwo.required = true;
    } else {
        dateRequiredTwo.required = false;
    }
});
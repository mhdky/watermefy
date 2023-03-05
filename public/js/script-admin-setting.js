// aler user berhasil ditambahkan
const alertUserBerhasil = document.querySelector('.alert-user-berhasil');
setTimeout(() => {
    alertUserBerhasil.style.transform = 'translateY(100%)';
}, 5000);

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

function previewImage() {
    const inputFile = document.querySelector('.inputFile');
    const imgPreview = document.querySelector('.imgPreview');

    const oFReader = new FileReader();
    oFReader.readAsDataURL(inputFile.files[0]);

    oFReader.onload = function(oFReader) {
        imgPreview.src = oFReader.target.result;
    }
}

// tampilkan aler hapus akun
const deleteAccount = document.querySelector('.deleteAccount');
const alertDeleteAccount = document.querySelector('.alertDeleteAccount');
deleteAccount.addEventListener('click', () => {
    alertDeleteAccount.style.display = 'flex';
});

// tutup alert hapus akun dan hilangkan isi value pada input passworrd
const noDeleteAccount = document.querySelector('.noDeleteAccount');
const passwordDeleteAccount = document.querySelector('.passwordDeleteAccount');
noDeleteAccount.addEventListener('click', () => {
    alertDeleteAccount.style.display = 'none';
    passwordDeleteAccount.value = '';
    buttonDeleteAcount.disabled = true;
});

// validasi tombol submit hapus akun
const checkLengthValueInput = document.querySelector('.checkLengthValue');
const buttonDeleteAcount = document.querySelector('.buttonDeleteAcount');

checkLengthValueInput.addEventListener('input', function(event) {
    const checkLengthValue = event.target.value.replace(/\s/g, '');

    if (checkLengthValue.length > 7) {
        buttonDeleteAcount.disabled = false;
    } else {
        buttonDeleteAcount.disabled = true;
    }
});

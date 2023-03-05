// BURGER BUTTON
function burgerButton() {
    const lineBurgerButton = document.querySelectorAll('.lineBurgerButton');
    const listNavMobile = document.querySelector('.listNavMobile');
    
    lineBurgerButton[0].classList.toggle('lineBurgerOne');
    lineBurgerButton[2].classList.toggle('lineBurgerButtonThree');
    lineBurgerButton[1].classList.toggle('lineBurgerButtonTwo');
    listNavMobile.classList.toggle('listNavMobileShow');
}

// SEARCH
function buttonSearch() {
    const containerFormSearch = document.querySelector('.containerFormSearch');
    const formSearch = document.querySelector('.formSearch');
    const closeSearch = document.querySelector('.closeSearch');

    formSearch.style.transform = 'translateY(0)';
    containerFormSearch.style.display = 'flex'; 
    closeSearch.style.display = 'block';
}

function closeSearch() {
    const containerFormSearch = document.querySelector('.containerFormSearch');
    const formSearch = document.querySelector('.formSearch');
    const closeSearch = document.querySelector('.closeSearch');

    formSearch.style.transform = 'translateY(100%)';
    closeSearch.style.display = 'none';
    setTimeout(() => {
        containerFormSearch.style.display = 'none';
    }, 300);
}

const btnDropDownNamaPengguna = document.querySelectorAll('.btnDropDownNamaPengguna');
const dropDownNamaPengguna = document.querySelectorAll('.dropDownNamaPengguna'); 
const arrowDown = document.querySelectorAll('.arrowDown'); 
for(let b = 0; b < btnDropDownNamaPengguna.length || b < dropDownNamaPengguna.length || b < arrowDown.length; b++) {
    btnDropDownNamaPengguna[b].addEventListener('click', () => {
        btnDropDownNamaPengguna[b].classList.toggle('btnDropDownNamaPenggunaMargin');
        dropDownNamaPengguna[b].classList.toggle('dropDownNamaPenggunaShow');
        arrowDown[b].classList.toggle('arrowDownShow');
    });
}

// cek input search desktop
function checkInput() {
    const searchInput = document.querySelector(".inputSearch").value.replace(/\s/g,'');
    const btnSearch = document.querySelector(".btnSearch");

    if (searchInput.length > 0 ) {
    btnSearch.disabled = false;
    } else {
    btnSearch.disabled = true;
    }
}
// cek input search mobile
function checkInputMobile() {
    const searchInput = document.querySelector(".inputSearchMobile").value.replace(/\s/g,'');
    const btnSearch = document.querySelector(".btnSearchMobile");
    
    if (searchInput.length > 0 ) {
    btnSearch.disabled = false;
    } else {
    btnSearch.disabled = true;
    }
}
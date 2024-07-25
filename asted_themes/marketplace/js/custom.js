// чекбокс

const passwordCheckBox = document.querySelector(".password-check-box");

// passwordCheckBox.onclick = function () {
//     document.querySelector(".check-icon").classList.toggle("check-icon-open");
// };

// Смена с Войти/Регистрация

const openModal = document.querySelector(".acc-button");
const modalWrapper = document.querySelector(".modal-wrapper");
openModal.onclick = function () {
    modalWrapper.classList.toggle("open-modal");
    document.body.style.overflow = "hidden";
    document.body.style.paddingRight = "17px";
    document.querySelector(".modal-panel").classList.add("open-modal-panel");
};

document.addEventListener("click", (event) => {
    if (
        event.target == modalWrapper &&
        modalWrapper.classList.contains("open-modal")
    ) {
        modalWrapper.classList.remove("open-modal");
        document.body.style.overflow = "auto";
        document.body.style.paddingRight = "0";
        document
            .querySelector(".modal-panel")
            .classList.remove("open-modal-panel");
    }
});

const userItem = document.querySelectorAll(".user-item");
const fizUser = document.querySelector(".fiz-user");
const urUser = document.querySelector(".ur-user");

const fUser = document.querySelector(".f-user");
const pUser = document.querySelector(".p-user");

userItem.forEach((item) => {
    item.onclick = function () {
        userItem.forEach((el) => {
            el.classList.remove("user-active");
        });

        item.classList.add("user-active");

        if (fUser.classList.contains("user-active")) {
            fizUser.classList.add("activer-user-status");
            urUser.classList.remove("activer-user-status");
        } else {
            fizUser.classList.remove("activer-user-status");
            urUser.classList.add("activer-user-status");
        }
    };
});

const login = document.querySelector(".login");
const registration = document.querySelector(".registration");

const loginUr = document.querySelector(".login-ur");
const registrationUr = document.querySelector(".registration-ur");

const loginTab = document.querySelector(".modal-tab-invite");
const regTab = document.querySelector(".modal-tab-registration");
const forgotBlock = document.querySelector('.forgot-password-block');

let tabPanelItem = document.querySelectorAll(".modal-tab");

tabPanelItem.forEach((item) => {
    item.onclick = function () {
        tabPanelItem.forEach((el) => {
            el.classList.remove("active-tab");
        });

        item.classList.add("active-tab");

        if (regTab.classList.contains("active-tab")) {
            login.classList.remove("active-modal-panel");
            registration.classList.add("active-modal-panel");
            forgotBlock.classList.remove('active-modal-panel');

        } else {
            login.classList.add("active-modal-panel");
            registration.classList.remove("active-modal-panel");
            forgotBlock.classList.remove('active-modal-panel');
        }

        if (regTab.classList.contains("active-tab")) {
            loginUr.classList.remove("active-modal-panel");
            registrationUr.classList.add("active-modal-panel");
            forgotBlock.classList.remove('active-modal-panel');
        } else {
            loginUr.classList.add("active-modal-panel");
            registrationUr.classList.remove("active-modal-panel");
            forgotBlock.classList.remove('active-modal-panel');
        }
    };
});

document.querySelectorAll('.forgot-button').forEach((button) => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.active-modal-panel').forEach((panel)=>{
            panel.classList.remove('active-modal-panel');
        });
        forgotBlock.classList.add('active-modal-panel');
    });
});

// const rateButton = document.querySelector(".rate-button");
// const dropdownMenuRate = document.querySelector(".dropdown-menu-rate");
// rateButton.onclick = function () {
//     dropdownMenuRate.classList.add("open-item");
// };

const langButton = document.querySelector(".lang-button");
const dropdownMenuLang = document.querySelector(".dropdown-menu-lang");
const rateButton = document.querySelector(".rate-button");
const dropdownMenuRate = document.querySelector(".dropdown-menu-rate");

langButton.onclick = function (event) {
    dropdownMenuLang.classList.toggle("open-item");

    event.stopPropagation();
    if (dropdownMenuRate.classList.contains("open-item")) {
        dropdownMenuRate.classList.remove("open-item");
    }
};

rateButton.onclick = function (event) {
    dropdownMenuRate.classList.toggle("open-item");
    event.stopPropagation();
    if (dropdownMenuLang.classList.contains("open-item")) {
        dropdownMenuLang.classList.remove("open-item");
    }
};

document.addEventListener("click", () => {
    if (dropdownMenuLang.classList.contains("open-item")) {
        dropdownMenuLang.classList.remove("open-item");
    }

    if (dropdownMenuRate.classList.contains("open-item")) {
        dropdownMenuRate.classList.remove("open-item");
    }
});

try {
    const swiper = new Swiper(".swiper", {
        direction: "horizontal",
        loop: true,

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        slidesPerView: 1,
        spaceBetween: 10,
        // Responsive breakpoints
        breakpoints: {
            640: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
        },
    });
} catch { }

// Fancybox.bind('[data-fancybox="gallery"]', {
//     // Your custom options
// });

let modalButton = document.querySelectorAll(".modal-button");
let userItems = document.querySelectorAll(".user-item");

modalButton.forEach((el) => {
    el.onclick = function () {
        userItems.forEach((item) => {
            if (item.classList.contains("user-active")) {
                if (item.children[0].textContent === "Поставщик") {
                    location.href = "provider.html";
                } else {
                    location.href = "user.html";
                }
            }
        });
    };
});

const userMenuList = document.querySelectorAll(".user-menu-list li a");

userMenuList.forEach((el) => {
    el.onclick = function () {
        userMenuList.forEach((item) => {
            item.classList.remove("active-list-item");
        });
        el.classList.add("active-list-item");
    };
});

const userSex = document.querySelectorAll(".sex-user div");

userSex.forEach((el) => {
    el.onclick = function () {
        userSex.forEach((item) => {
            item.classList.remove("sex-user-active");
        });
        el.classList.add("sex-user-active");
    };
});

const userDetailTabs = document.querySelectorAll(".user-detail-tabs li a");

userDetailTabs.forEach((el) => {
    el.onclick = function () {
        userDetailTabs.forEach((item) => {
            item.classList.remove("active-detail-tab");
        });

        if (el.textContent === "Личные данные") {
            document
                .querySelector(".user-data-block")
                .classList.remove("none-block");
            document.querySelector(".notiсe-block").classList.add("none-block");
            el.classList.add("active-detail-tab");
        } else {
            document
                .querySelector(".user-data-block")
                .classList.add("none-block");
            document
                .querySelector(".notiсe-block")
                .classList.remove("none-block");
            el.classList.add("active-detail-tab");
        }
    };
});

const purchasesTabList = document.querySelectorAll(".purchases-tab-list li");
const cards = document.querySelectorAll(".purchases-card");

purchasesTabList.forEach((el) => {
    el.onclick = function () {
        purchasesTabList.forEach((item) => {
            item.classList.remove("purchases-active-tab");
        });
        el.classList.add("purchases-active-tab");
        let activeTab = el.getAttribute("data-tab");

        if (activeTab === "buy") {
            cards.forEach((it) => {
                if (it.getAttribute("data-status") === "buy") {
                    it.parentElement.classList.remove("none-block");
                } else {
                    it.parentElement.classList.add("none-block");
                }
            });
        }

        if (activeTab === "cancel") {
            cards.forEach((it) => {
                if (it.getAttribute("data-status") === "cancel") {
                    it.parentElement.classList.remove("none-block");
                } else {
                    it.parentElement.classList.add("none-block");
                }
            });
        }

        if (activeTab === "all") {
            cards.forEach((it) => {
                it.parentElement.classList.remove("none-block");
            });
        }
    };
});

const userHistoryTabs = document.querySelectorAll(".user-history-tabs li a");

userHistoryTabs.forEach((el) => {
    el.onclick = function () {
        userHistoryTabs.forEach((item) => {
            item.classList.remove("active-history-tab");
        });

        if (el.textContent === "Доставка") {
            document
                .querySelector(".history-block")
                .classList.add("none-block");
            document.querySelector(".delivery").classList.remove("none-block");
            el.classList.add("active-history-tab");
        } else {
            document
                .querySelector(".history-block")
                .classList.remove("none-block");
            document.querySelector(".delivery").classList.add("none-block");
            el.classList.add("active-history-tab");
        }
    };
});

const favouritesTabList = document.querySelectorAll(
    ".favourites-tab-list ul li"
);

favouritesTabList.forEach((el) => {
    el.onclick = function () {
        favouritesTabList.forEach((item) => {
            item.classList.remove("favourites-active-tab");
        });
        el.classList.add("favourites-active-tab");
    };
});

const userFavouritesTabs = document.querySelectorAll(
    ".user-favourites-tabs li a"
);

userFavouritesTabs.forEach((el) => {
    el.onclick = function () {
        userFavouritesTabs.forEach((item) => {
            item.classList.remove("active-history-tab");
        });

        console.log(el.textContent);

        if (el.textContent === "Бренды") {
            document.querySelector(".favourites").classList.add("none-block");
            document.querySelector(".brands").classList.remove("none-block");
            el.classList.add("active-history-tab");
        } else {
            document
                .querySelector(".favourites")
                .classList.remove("none-block");
            document.querySelector(".brands").classList.add("none-block");
            el.classList.add("active-history-tab");
        }
    };
});


const sideBarItem = document.querySelectorAll('.side-bar-item')
const currentItem = document.querySelector('.current-item')


sideBarItem.forEach((el) => {
    el.onclick = function () {
        let currentImg = el.classList[1]
        currentItem.className = `side-bar-item current-item ${currentImg}`
        currentItem.children[0].textContent = el.children[0].textContent
    }
})

document.querySelector('.button-close').addEventListener('click', function(){
    document.querySelector('.side-bar-wrapper').style.display = 'none';
});

document.querySelector('.side-bar-btn').addEventListener('click', function(){
    document.querySelector('.side-bar-wrapper').style.display = 'block';
})


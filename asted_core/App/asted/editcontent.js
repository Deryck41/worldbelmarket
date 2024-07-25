window.addEventListener("load", () => {
    const astedContentBlocks = [...document.querySelectorAll("[data-astedcode]")];
    const astedSubmitBtn = document.querySelector(".asted-submit-btn");
    const astedMarker = document.querySelector(".asted-marker");
    const astedModal = document.querySelector(".asted-update-modal");
    const astedConform = document.querySelector(".asted-modal-confirm");
    const astedModalClose = document.querySelector(".asted-moodal__close");
    const astedModalMessage = document.querySelector(".asted-modal__message");
    // const astedSettingsBtn = document.querySelector(".asted-settings");
    const astedSidebar = document.querySelector(".asted-sidebar");
    const astedSidebarClose = document.querySelector(".asted-sidebar-close");
    const astedDataForAdd = [...document.querySelectorAll("[data-astedblock]")];
    const astedSliderPreviewImage = document.querySelector(
      ".asted-slider-preview-image"
    );
    const astedSliderVariants = [
      ...document.querySelectorAll(".asted-square-image"),
    ];
  
    const removeActiveState = (items, classname) => {
      items.forEach((item) => {
        item.classList.remove(classname);
      });
    };
  
    astedSliderVariants?.forEach((sliderVariant) => {
      sliderVariant.addEventListener("click", () => {
        removeActiveState(astedSliderVariants, "asted-square-image_active");
        astedSliderPreviewImage.setAttribute(
          "src",
          sliderVariant.querySelector("img").getAttribute("src")
        );
        sliderVariant.classList.add("asted-square-image_active");
      });
    });
  
    astedDataForAdd?.forEach((dataItem, index) => {
      const blockForInsert = `<div class="asted-settings-block-wrapper" style="display:flex;gap:15px;justify-content:center" data-astedposition:${index}>
      <div class="asted-edit-bock" data-astededit="${dataItem.dataset.astedblock}">
        <i style="color:black;font-size:24px;cursor:pointer" class="fa-solid fa-plus"></i>
      </div>
      <div class="asted-remove-block" data-astedremove="${dataItem.dataset.astedblock}">
        <i style="color:black;font-size:24px;cursor:pointer" class="fa-solid fa-trash"></i>
      </div>
    </div>`;
  
      dataItem.insertAdjacentHTML("beforebegin", blockForInsert);
    });
  
    const settingsBlocks = [
      ...document.querySelectorAll(".asted-settings-block-wrapper"),
    ];
    const blocksForRemove = [];
  
    const removeFn = (index) => {
      astedDataForAdd[index].remove();
      settingsBlocks[index].remove();
    };
  
    document
      .querySelectorAll(".asted-remove-block")
      .forEach((removeBlock, index) => {
        removeBlock.addEventListener("click", () => {
          blocksForRemove.push(astedDataForAdd[index].dataset.astedblock);
  
          if (astedDataForAdd[index].dataset.astedunique) {
            confirm(
              "Вы действительно хотите удалить этот блок? Данный блок является уникальным и его нельзя будет восстановить"
            )
              ? removeFn(index)
              : "";
          } else {
            confirm("Удалить блок?") ? removeFn(index) : "";
          }
        });
      });
  
    const astedEditBtns = [...document.querySelectorAll("[data-astededit]")];
  
    astedEditBtns?.forEach((editBtn, index) => {
      editBtn.addEventListener("click", () => {
        astedSidebar?.classList.add("asted-sidebar_active");
        document.body.style.overflow = "hidden";
      });
    });
  
    astedSidebarClose?.addEventListener("click", () => {
      astedSidebar?.classList.remove("asted-sidebar_active");
      document.body.style.overflow = "scroll";
    });
  
    astedSidebar?.addEventListener("click", (e) => {
      if (e.target.classList.contains("asted-sidebar_active")) {
        astedSidebar?.classList.remove("asted-sidebar_active");
        document.body.style.overflow = "scroll";
      }
    });
  
    // astedSettingsBtn?.addEventListener("click", () => {
    //   astedSidebar?.classList.add("asted-sidebar_active");
    //   document.body.style.overflow = "hidden";
    // });
  
    astedConform?.addEventListener("click", () => {
      history.go();
    });
  
    astedModalClose?.addEventListener("click", () => {
      history.go();
    });
  
    astedModal?.addEventListener("click", (e) => {
      if (e.target.classList.contains("asted-update-modal_active")) {
        history.go();
      }
    });
  
    astedMarker?.addEventListener("click", () => {
      astedContentBlocks?.forEach((block) => {
        if (block.children.length) {
          [...block.children].forEach((children) => {
            children.classList.toggle("asted-bordered");
          });
        }
        block.classList.toggle("asted-bordered");
        if (block.classList.contains("asted-bordered")) {
          astedMarker.textContent = "Отключить редактирование";
          block.setAttribute("contenteditable", true);
        } else {
          block.removeAttribute("contenteditable");
          astedMarker.textContent = "Включить редактирование";
        }
      });
    });
  
    const initialValues = astedContentBlocks?.map((block) => {
      return { [`${block.dataset.astedcode}`]: block.innerHTML };
    });
  
    astedSubmitBtn?.addEventListener("click", () => {
      const result = [];
      astedContentBlocks?.forEach((block, index) => {
        if (
          block.innerHTML !== initialValues[index][`${block.dataset.astedcode}`]
        ) {
          block.removeAttribute("class");
          if (block.children.length) {
            [...block.children].forEach((children) => {
              children.removeAttribute("class");
            });
          }
          result.push({ [`${block.dataset.astedcode}`]: block.innerHTML });
        }
      });
  
      if (result.length) {
        fetch("/asted_core/App/asted/core.php", {
          method: "POST",
          body: JSON.stringify(result),
          headers: {
            "Content-Type": "text/json",
          },
        })
          .then((response) => response.json())
          .then((response) => {
            astedModal.classList.add("asted-update-modal_active");
            if (response.status === "ok") {
              astedModalMessage.textContent =
                "Данные успешно отправлены, послезакрытия модального окна страница перезагрузится и вы увидите обновленные данные";
            } else {
              astedModalMessage.textContent =
                "К сожалению что-то пошло не так, проверьте интернет соединение или попробуйте еще раз";
            }
          })
          .catch((error) => {
            console.log(error.message);
          });
      } else {
        alert("Вы не изменили ни одного поля");
      }
    });
  });
  
let newDeal = document.querySelector('.deal__column--new'),
  documentalDeal = document.querySelector('.deal__column--documental'),
  referenceDeal = document.querySelector('.deal__column--reference'),
  workDeal = document.querySelector('.deal__column--work'),
  closedDeal = document.querySelector('.deal__column--closed'),
  dealColumn = document.querySelector('.deal__column'),
  modalDeal = document.querySelector('.modal__deal'),
  modalDealAdd = modalDeal.querySelector('.modal__add'),
  modalDealClosed = modalDeal.querySelector('.add__info--closed'),
  modalProject = document.querySelector('.modal__project'),
  modalOpenClosed = modalProject.querySelector('.open__info--closed'),
  projectTitle = modalProject.querySelector('.info__title--title'),
  projectCoins = modalProject.querySelector('#coin__project'),
  projectCount = modalProject.querySelector('#count__project'),
  projectFile = modalProject.querySelector('#file__project'),
  projectDate = modalProject.querySelector('#date__project');


function actionClickButtonAdd(block) {
  addProject = block.querySelector('.column__button--add'),
    addProject.addEventListener('click', function () {

    })
}

function takeData(e) {
  let children = e.target.lastElementChild.children;
  projectTitle.textContent = e.target.children[1].textContent;
  projectCoins.value = children[0].value;
  projectCount.value = children[2].value;
  projectDate.value = children[3].defaultValue;
  projectFile.setAttribute('href', `/templates/doc/${children[1].defaultValue}`);
}


function dataCollection(e) {
  modalProject.classList.add('show');
  modalOpen.classList.add('show');
  dealColumn.classList.add('filter');
  let children = e.target.lastElementChild.children;
  projectTitle.textContent = e.target.children[1].textContent;
  projectCoins.value = children[0].value;
  projectCount.value = children[2].value;
  projectDate.value = children[3].defaultValue;
  projectFile.setAttribute('href', `/templates/doc/${children[1].defaultValue}`);
}

function modalDataСollection(block) {
  let project = block.querySelectorAll('.project');
  if (project.length > 1) {
    project.forEach(item => {
      item.addEventListener('click', function (e) {
        dataCollection(e)
      })
    })
  } else {
    project = block.querySelector('.project');
    project.addEventListener('click', function (e) {
      dataCollection(e)
    })
  }
}

function createProjectInfo(classButton, title, coin, cointotal, file, count) {
  let projectTag = document.createElement("div");
  let projectImage = document.createElement("img");
  let projectTitle = document.createElement('h4');
  let projectTitleText = document.createTextNode(title);
  let projectBlockInfo = document.createElement('div');
  let projectInfoCoin = document.createElement('input');
  let projectInfoCoinTotal = document.createElement('input');
  let projectInfoFile = document.createElement('input');
  let projectInfoCount = document.createElement('input');
  projectTag.classList.add('project');
  projectImage.classList.add('project__icon');
  projectImage.setAttribute('src', './templates/img/laed-deal-icon.svg');
  projectTag.appendChild(projectImage)
  projectTitle.classList.add('project__title');
  projectTitle.appendChild(projectTitleText);
  projectTag.appendChild(projectTitle);
  projectBlockInfo.classList.add('block__info--none');
  projectInfoCoin.classList.add('block__info--coin');
  projectInfoCoin.setAttribute('type', 'text');
  projectInfoCoin.setAttribute('value', coin);
  projectInfoCoinTotal.classList.add('block__info--cointotal');
  projectInfoCoinTotal.setAttribute('type', 'text');
  projectInfoCoinTotal.setAttribute('value', cointotal);
  projectInfoFile.classList.add('block__info--file');
  projectInfoFile.setAttribute('type', 'download');
  projectInfoFile.setAttribute('value', file);
  projectInfoCount.classList.add('block__info--count');
  projectInfoCount.setAttribute('type', 'number');
  projectInfoCount.setAttribute('value', count);
  projectBlockInfo.appendChild(projectInfoCoin);
  projectBlockInfo.appendChild(projectInfoCoinTotal);
  projectBlockInfo.appendChild(projectInfoFile);
  projectBlockInfo.appendChild(projectInfoCount);
  classButton.appendChild(projectTag);
  classButton.appendChild(projectBlockInfo);
}

function coinsProjectBlock(blockItem) {
  
  
  let coinView = blockItem.querySelector('.column__coins span');//Твой
  let dealCoin = blockItem.querySelectorAll('.block__info--coin'); //Твой
  
  let dealtotalCoin = blockItem.querySelectorAll('.block__info--coinstotal'); //Твой
  let cointotalView = blockItem.querySelector('.column__coinstotal span'); //Мой
  
  let coinEnter = 0;//Твой
  let coinEnterTotal = 0;//Мой
  
  dealCoin.forEach(item => {
    coinEnter += +item.value;
  })//Твой
  
  dealtotalCoin.forEach(item => {
    coinEnterTotal += +item.value;
  })//Мой
  
  
  coinView.textContent = coinEnter;//Твой
  cointotalView.textContent = coinEnterTotal;//Мой
}

modalOpenClosed.addEventListener('click', function () {
  modalProject.classList.remove('show');
  modalOpen.classList.remove('show');
  dealColumn.classList.remove('filter');
})

modalDealClosed.addEventListener('click', function () {
  modalDealAdd.classList.remove('show');
  modalDeal.classList.remove('show');
  dealColumn.classList.remove('filter');
})

coinsProjectBlock(newDeal)
coinsProjectBlock(documentalDeal)
coinsProjectBlock(referenceDeal)
coinsProjectBlock(workDeal)
coinsProjectBlock(closedDeal)

modalDataСollection(newDeal)
modalDataСollection(documentalDeal)
modalDataСollection(referenceDeal)
modalDataСollection(workDeal)
modalDataСollection(closedDeal)

actionClickButtonAdd(newDeal)
actionClickButtonAdd(documentalDeal)
actionClickButtonAdd(referenceDeal)
actionClickButtonAdd(workDeal)
actionClickButtonAdd(closedDeal)

saveProject()


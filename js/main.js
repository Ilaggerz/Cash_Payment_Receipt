document.addEventListener("readystatechange", (e) => {
  if (e.target.readyState === "complete") {
    console.log("readyState: complete");
  }
  initApp();
});

const initApp = () => {
  const generateRecNoBtn = document.querySelector("#generate__rec__no");
  const inputGenerateRecNo = document.querySelector("#generate__receipt__no");
  const selectHomeTypes = document.querySelector("#home__types");
  const monthlyRent = document.querySelector("#monthly__rent");
  const getCurrentYear = document.getElementById("getCurrentYear");
  const printBtn = document.querySelector("#print__btn");


  let randomNum;

  const d = new Date();
  getCurrentYear.innerHTML = d.getFullYear();
  const generateRandomNum = () => {
    randomNum = Math.floor(Math.random() * 99999) + 10000;
    return randomNum;
  };

  generateRecNoBtn.addEventListener("click", (e) => {
    e.preventDefault();

    inputGenerateRecNo.value = generateRandomNum();
  });

  selectHomeTypes.addEventListener("change", () => {
    if (selectHomeTypes.value.toLowerCase() === "bungalow") {
      monthlyRent.value = 30000;
    } else if (selectHomeTypes.value.toLowerCase() === "single-detached") {
      monthlyRent.value = 15000;
    } else if (selectHomeTypes.value.toLowerCase() === "single-attached") {
      monthlyRent.value = 20000;
    } else if (selectHomeTypes.value.toLowerCase() === "duplex") {
      monthlyRent.value = 50000;
    } else if (selectHomeTypes.value.toLowerCase() === "townhouse") {
      monthlyRent.value = 80000;
    } else if (selectHomeTypes.value.toLowerCase() === "quadroplex") {
      monthlyRent.value = 60000;
    } else if (selectHomeTypes.value.toLowerCase() === "rowhouse") {
      monthlyRent.value = 90000;
    }
  });
};
